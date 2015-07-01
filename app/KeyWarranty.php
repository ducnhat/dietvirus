<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KeyWarranty extends Model
{
    use SoftDeletes;

    protected $table = 'key_warranty';

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    protected $fillable = ['name', 'email', 'phone', 'product_key_id', 'error_message', 'status'];
}
