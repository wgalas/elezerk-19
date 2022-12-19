<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestType extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'assignee_id',
    ];

    public function assignee () {
        return  $this->belongsTo(User::class, 'assignee_id');
    }
}
