<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cate extends Model
{
    protected $table = 'mll02_category';

    protected $fillable = [
    ];

    public function news(){
        return $this->hasMany('App\Models\News');//1 danh muc co nhieu tin
    }

    //rang buoc parent-child in sql
    public function parent()
    {
        return $this->belongsTo('App\Models\Cate','parent_id','id')->where('parent_id',0)->with('parent');
    }

    public function children()
    {
        return $this->hasMany('App\Models\Cate','parent_id','id')->with('children');
    }
    //delete mult cate-children when click cate-parent
    protected static function boot(){
        parent::boot();
        static::deleting(function($cate){
            $cate->children()->delete();
        });
    }
}
