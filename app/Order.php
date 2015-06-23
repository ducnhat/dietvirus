<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;

    public $table = 'orders';

    public $fillable = ['name', 'email', 'phone', 'subtotal', 'discount', 'total', 'is_paid'];

    public $dates = ['created_at', 'updated_at', 'deleted_at'];
}
