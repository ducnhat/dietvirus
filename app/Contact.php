<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table = 'contacts';

    protected $dates = ['created_at', 'updated_at'];

    protected $fillable = ['name', 'email', 'title', 'message', 'is_reply', 'reply_message', 'user_id', 'reply_at'];

    protected $casts = [
        'is_reply' => 'boolean',
    ];

    public function user(){
        return $this->belongsTo('App\User', 'user_id');
    }
}
