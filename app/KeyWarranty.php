<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KeyWarranty extends Model
{
    use SoftDeletes;

    protected $table = 'key_warranty';

    protected $dates = ['created_at', 'updated_at', 'deleted_at', 'resolve_at'];

    protected $fillable = ['name', 'email', 'phone', 'product_key_id', 'error_message', 'status', 'is_warranted', 'resolve', 'resolve_at', 'user_id'];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'is_warranted' => 'boolean',
        'status' => 'boolean',
    ];

    public function productKey(){
        return $this->belongsTo('App\ProductKey', 'product_key_id');
    }

    public function user(){
        return $this->belongsTo('App\User', 'user_id');
    }
}
