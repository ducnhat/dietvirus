<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;
use DB;
use App\OrderSentKey;

class Order extends Model
{
    use SoftDeletes;

    public $table = 'orders';

    public $fillable = ['name', 'email', 'phone', 'subtotal', 'discount', 'total', 'coupon', 'paid_at', 'payment_id', 'payment_type', 'sent_at'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    public $dates = ['created_at', 'updated_at', 'deleted_at', 'paid_at', 'sent_at'];

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

            if(($count->quantity < $item->quantity)){
                $f = false;
            }
        }

        return $f;
    }

    /**
     * Lấy danh sách keys theo đơn hàng
     *
     * @return array
     */
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
                $key->use_for = KEY_USE_FOR_SELL;
                $key->save();

                OrderSentKey::create(['order_id' => $this->id, 'product_key_id' => $key->id]);
            }
        }

        return $result;
    }

    public function checkOrderIsSentKeys(){
        if(is_null($this->sent_at)){
            return true;
        }

        return false;
    }

    public function checkOrderIsPaid(){
        if(is_null($this->paid_at)){
            return false;
        }

        return true;
    }
}
