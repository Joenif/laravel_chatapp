<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Conversations extends Model
{
    protected $fillable = [
        'messages', 'receiver_id', 'user_id', 'is_read',
    ];

    public function users() {
        return $this->belongsTo(User::class);
    }

}
