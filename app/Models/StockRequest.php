<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockRequest extends Model
{
    use HasFactory;
    protected $fillable = [
        'store_id', 'product_id', 'qty', 'status', 'note'
    ];
}
