<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\ProductKey;
use Carbon\Carbon;
use DB;

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
            $count = ProductKey::countProductKey($item->product_id)->first();

            if(empty($count) || ($count->quantity < $item->quantity)){
                $f = false;
            }
//            dd($count);
        }

        return $f;
    }

    public function getProductKeys(){
        $order_keys = array();
        $result = array();

        foreach($this->orderItems as $item){
            $order_keys[$item->product_id] = ProductKey::where('product_id', $item->product_id)
                ->whereNull('sold_at')
                ->whereNull('return_at')
                ->take($item->quantity)
                ->get();
        }

        foreach($order_keys as $keys){
            foreach($keys as $key){
                $result[] = $key;
                $key->sold_at = Carbon::now()->toDateTimeString();
                $key->save();
            }
        }

        return $result;
    }
}
