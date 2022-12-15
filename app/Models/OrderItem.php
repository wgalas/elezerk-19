<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'user_id',
        'quantity',
        'product_id',
        'price',
    ];

    public function order () {
        return $this->belongsTo(Order::class);
    }

    public function user () {
        return $this->belongsTo(User::class);
    }

    public function product () {
        return $this->belongsTo(Product::class);
    }
}
