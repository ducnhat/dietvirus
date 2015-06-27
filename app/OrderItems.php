<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderItems extends Model
{
    use SoftDeletes;

    public $table = 'order_items';

    public $fillable = ['order_id', 'product_id', 'name', 'price', 'quantity'];

    public $dates = ['created_at', 'updated_at', 'deleted_at'];

    public function order(){
        return $this->belongsTo('App\Order', 'order_id');
    }

    public function product(){
        return $this->belongsTo('App\Product', 'product_id');
    }
}
