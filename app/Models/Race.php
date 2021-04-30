<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Race extends Model
{
    use HasFactory;
    
    //timestamps利用しない
    public $timestamps = false;

    //belongsTo設定
    public function runner()
    {
        return $this->belongsTo('App\Runner');
    }
}
