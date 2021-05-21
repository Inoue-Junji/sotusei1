<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lap extends Model
{
    use HasFactory;
    
    protected $guarded = [
    'id',
    'created_at',
    'updated_at',
  ];
    
    //timestamps利用しない
    public $timestamps = false;
    
     //belongsTo設定
    public function race()
    {
        return $this->belongsTo('App\Runner');
    }
    
    
    
    
}
