<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Page extends Model
{
    use SoftDeletes;

    protected $table = 'pages';

    protected $dates = ['created_at', 'publish_at', 'updated_at', 'deleted_at'];

    protected $fillable = ['name', 'content', 'show_on_menu', 'publish_at', 'is_published'];

    protected $casts = [
        'show_on_menu' => 'boolean',
        'is_published' => 'boolean',
    ];

    public function setPublishAtAttribute($value){
        $this->attributes['publish_at'] = Carbon::createFromFormat('d-m-Y H:i', $value)->toDateTimeString();
    }
}
