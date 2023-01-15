<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coordinator extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'middle_name',
        'employee_no',
        'phone',
        'email',
        'user_id',
    ];

    public function user () {
        return $this->belongsTo(User::class, 'user_id');
    }
}
