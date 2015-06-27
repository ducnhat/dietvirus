<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\ProductKey;

class Order extends Model
{
    use SoftDeletes;

    public $table = 'orders';

    public $fillable = ['name', 'email', 'phone', 'subtotal', 'discount', 'total', 'is_paid', 'coupon'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    public $dates = ['created_at', 'updated_at', 'deleted_at'];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'is_paid' => 'boolean',
    ];

    /**
     * An order has many order items
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orderItems(){
        return $this->hasMany('App\OrderItems', 'order_id');
    }

    /**
     * Kiếm tra số lượng key cần sử dụng, nếu không đủ trả về false
     *
     * @return bool
     */
    public function checkProductKeyQuantity(){
        $f = true;

        foreach($this->orderItems as $item){
            $count = ProductKey::countProductkey($item->product_id)->first();

            if($count->quantity < $item->quantity){
                $f = false;
            }
        }

        return $f;
    }

    public function getProductKeys(){
        $keys = array();

        foreach($this->orderItems as $item){
            $keys[$item->product_id] = ProductKey::where('product_id', $item->product_id)
                ->whereNull('sold_at')
                ->whereNull('return_at')
                ->take($item->quantity)
                ->get();
        }

        return $keys;
    }
}
