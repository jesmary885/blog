<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Post extends Model
{
    use HasFactory;

    protected $guarded = ['id','created_at','updated_at'];

    //relacion 1 a muchos inversa
    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    //relacion 1 a muchos inversa
    public function Category(){
        return $this->belongsTo('App\Models\Category');
    }

    //relacion muchos a muchos
    public function Tags(){
        return $this->belongsToMany('App\Models\Tag');
    }

    //relacion 1 a 1 polimorfica
    public function image(){
        return $this->morphOne('App\Models\Image','imageable');
    }
}
