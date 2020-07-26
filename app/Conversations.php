<?php

namespace App;

use App\User;
use App\ConversationUsers;
use Illuminate\Database\Eloquent\Model;

class Conversations extends Model
{
    protected $fillable = [
        'messages', 'receiver_id', 'sender_id', 'is_read', 'image'
    ];

    public function users() {
        return $this->belongsTo(User::class);
    }

    public function conversations() {
        return $this->belongsTo(ConversationUsers::class);
    }

}
