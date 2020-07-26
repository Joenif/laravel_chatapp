<?php

namespace App;

use App\Conversations;
use Illuminate\Database\Eloquent\Model;

class ConversationUsers extends Model
{
    protected $fillable = ['sender_id','receiver_id'];

    public function conversations() {
        return $this->hasMany(Conversations::class);
    }
}
