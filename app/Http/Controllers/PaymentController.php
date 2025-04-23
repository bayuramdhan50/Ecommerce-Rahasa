<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Payment;
use Midtrans\Snap;
use Midtrans\Config as MidtransConfig;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{
    public function snapToken(Request $request, $orderId)
    {
        $order = Order::with('user')->findOrFail($orderId);
        MidtransConfig::$serverKey = config('services.midtrans.server_key');
        MidtransConfig::$isProduction = config('services.midtrans.is_production');
        MidtransConfig::$isSanitized = true;
        MidtransConfig::$is3ds = true;

        $params = [
            'transaction_details' => [
                'order_id' => 'ORDER-' . $order->id . '-' . time(),
                'gross_amount' => (int) $order->final_total,
            ],
            'customer_details' => [
                'first_name' => $order->user->name,
                'email' => $order->user->email,
            ],
        ];
        $snapToken = Snap::getSnapToken($params);
        return response()->json(['token' => $snapToken]);
    }

    public function midtransCallback(Request $request)
    {
        $notif = $request->all();
        Log::info('Midtrans callback', $notif);
        $orderId = $notif['order_id'] ?? null;
        $status = $notif['transaction_status'] ?? null;
        $payment = Payment::where('external_id', $orderId)->first();
        if ($payment) {
            DB::transaction(function () use ($payment, $status, $notif) {
                $payment->status = $status;
                $payment->meta = $notif;
                $payment->save();
                $order = $payment->order;
                if ($order) {
                    $order->status = $status === 'settlement' ? 'paid' : $status;
                    $order->save();
                    $order->user->notify(new \App\Notifications\OrderStatusNotification($order, 'Status pesanan Anda: ' . $order->status));
                }
            });
        }
        return response()->json(['success' => true]);
    }
}
