<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', 'address_id', 'shipping_id', 'promo_id', 'status', 'total', 'discount', 'shipping_cost', 'final_total'
    ];
    public function user() { return $this->belongsTo(User::class); }
    public function address() { return $this->belongsTo(Address::class); }
    public function shipping() { return $this->belongsTo(Shipping::class); }
    public function promo() { return $this->belongsTo(Promo::class); }
    public function items() { return $this->hasMany(OrderItem::class); }
}
