<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
  public function post()
  {
      return $this->belongsTo(Post::class, 'post_id');
  }
}
