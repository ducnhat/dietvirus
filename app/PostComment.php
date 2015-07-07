<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class PostComment extends Model
{
    use SoftDeletes;

    protected $table = 'post_comments';

    protected $dates = ['display_at', 'reply_at', 'created_at', 'updated_at', 'deleted_at'];

    protected $fillable = ['post_id', 'name', 'email', 'message', 'is_display', 'user_id', 'display_at', 'reply_user', 'reply_message', 'reply_at'];

    protected $casts = [
        'is_display' => 'boolean',
    ];

    public function user(){
        return $this->belongsTo('App\User', 'user_id');
    }

    public function setReplyMessageAttribute($value){
        $this->attributes['reply_message'] = trim($value);
    }
}
