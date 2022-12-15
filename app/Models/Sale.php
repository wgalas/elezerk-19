<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'quantity',
        'price',
        'total',
        'user_id',
    ];

    public function user () {
        return $this->belongsTo(User::class);
    }

    public function product () {
        return $this->belongsTo(Product::class);
    }
}
