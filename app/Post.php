<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Post extends Model
{
    use SoftDeletes;

    protected $table = 'posts';

    protected $dates = ['created_at', 'publish_at', 'updated_at', 'deleted_at'];

    protected $fillable = ['title', 'description', 'content', 'image', 'publish_at', 'category_id', 'user_id', 'is_published'];

    public function setPublishAtAttribute($value){
        $this->attributes['publish_at'] = Carbon::createFromFormat('d-m-Y H:i', $value)->toDateTimeString();
    }

    public function getImageAttribute(){
        return env('HOMEPAGE') . config('app.image_upload_path') . "posts/" . $this->attributes['id'] . ".jpg";
    }

    public function category(){
        return $this->belongsTo('App\PostCategory', 'category_id');
    }

    public function user(){
        return $this->belongsTo('App\User', 'user_id');
    }

    public function comments(){
        return $this->hasMany('App\PostComment', 'post_id');
    }

    public function getComments(){
        $comments = $this->comments()->where('is_display', 1)->orderBy('created_at', 'desc')->get();

        if($comments->count()){
            return $comments;
        }

        return false;
    }
}
