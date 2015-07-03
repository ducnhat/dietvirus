<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;

    protected $table = 'posts';

    protected $dates = ['created_at', 'publish_at', 'updated_at', 'deleted_at'];

    protected $fillable = ['title', 'description', 'content', 'image', 'publish_at', 'category', 'user_id', 'is_published'];

    public function category(){
        return $this->belongsTo('App\PostCategory', 'category_id');
    }
}
