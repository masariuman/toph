<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $table = 'posts';
    protected $fillable = [
        'category_id',
        'title',
        'content',
    ];

    public function category(){
        return $this->belongsTo('App\Category','category_id');
    }
}
