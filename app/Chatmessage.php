<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chatmessage extends Model
{
    protected $table = 'chatmessage';
    public function chat()
    {
        return $this->belongsTo(Chat::class, 'chat_id');
    }
}
