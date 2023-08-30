<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
    use HasFactory;
    
    protected $guarded = [
    'id',
    'created_at',
    'updated_at',
  ];
  
  public static function getAllOrderByUpdated_at()
  {
    return self::orderBy('updated_at', 'desc')->get();
  }
  
  //tweetモデルは、userモデルに属する処理 多対１
  public function user()
  {
    return $this->belongsTo(User::class);
  }
  
  // 多対多
  public function users()
  {
    return $this->belongsToMany(User::class)->withTimestamps();
  }
  
}
