<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'body',
        'user_id',
        'schedule',
    ];

    protected $casts = [
        'schedule' => 'date',
    ];

    public function user () {
        return $this->belongsTo(User::class);
    }
}
