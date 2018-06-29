<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'mll02_news';

    protected $fillable = [
    ];

    public function cate(){
        return $this->belongsTo('App\Models\Cate');//1 tin thuoc 1 news
    }

    public function news(){
        return $this->belongsTo('App\Models\User');
    }
}
