<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// ↓1行追加
// use Auth;

class Runner extends Model
{
    use HasFactory;
    
    // アプリケーション側でcreateなどできない値を記述
  // ↓以下の処理を記述
  protected $guarded = [
    'id',
    'created_at',
    'updated_at',
  ];
  
  public static function getAllOrderByGrade()
    {
      $runners = self::orderBy('grade', 'asc')
      ->get();
      return $runners;
    }
    // ↓新しい関数を追加←いじるとエラー出る
  // public static function getMyAllOrderByGrade()
  // {
  //   $runners = self::where('runner_id', Auth::user()->id)
  //     ->orderBy('grade', 'asc')
  //     ->get();
  //   return $runners;
  // }
  //timestamps利用しない
    public $timestamps = false;

    //primaryKeyの変更
    protected $primaryKey = "runner_id";

    //hasMany設定
    public function races()
    {
        return $this->hasMany('App\Race');
    }
    
  
}
