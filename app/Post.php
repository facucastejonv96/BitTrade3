<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
  protected $fillable = [
      'amount', 'currency', 'accepts_both', 'fraction', 'type'
  ];

  public function user()
  {
      return $this->belongsTo(User::class, 'user_id');
  }

  public function scopeAmmount($query , $order){
    if($order != "")
    {
      $query->orderBy('amount', $order);
    }
  }
  public function scopeMin($query , $min, $currency){
    if($min != ""){
      $query->where('amount', '>', $min)->where('currency', $currency);
    }
  }
  public function scopeMax($query , $max, $currency){
    if($max != ""){
      $query->where('amount', '<', $max)->where('currency', $currency);
    }
  }
  public function scopeFraction($query , $int){
    if($int == 1){
      $query->where('fraction', 1);
    }
  }
  public function scopeBoth($query , $int){
    if($int == 1){
      $query->where('fraction', 1);
    }
  }

}
