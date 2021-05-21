<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Race extends Model
{
    use HasFactory;
    
    //timestamps利用しない
    public $timestamps = false;

    //primaryKeyの変更
    protected $primaryKey = "race_id";



    //belongsTo設定
    public function runner()
    {
        return $this->belongsTo('App\Models\Runner');
    }
    
    //hasMany設定
    public function lap()
    {
        return $this->hasMany('App\Models\Lap');
    }
    
}
