<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderSentKey extends Model
{
    use SoftDeletes;

    protected $table = "order_sent_keys";

    protected $fillable = ['order_id', 'product_key_id'];
}
