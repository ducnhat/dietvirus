<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Product;
use DB;

class ProductKey extends Model
{
    use SoftDeletes;

    protected $table = 'product_keys';

    protected $fillable = ['key', 'product_id', 'user_id', 'sold_at', 'return_at', 'warranty_at'];

    protected $dates = ['created_at', 'updated_at', 'deleted_at', 'warranty_at', 'return_at', 'sold_at'];

    /**
     * Chuyển key thành chữ hoa
     *
     * @param $value
     */
    public function setKeyAttribute($value){
        $this->attributes['key'] = strtoupper($value);
    }

    /**
     * 1 key thuộc 1 sản phẩm
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product(){
        return $this->belongsTo('App\Product', 'product_id');
    }

    /**
     * 1 key được tạo bởi 1 user
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(){
        return $this->belongsTo('App\User', 'user_id');
    }

    /**
     * Đếm số lượng key còn lại theo sản phẩm
     *
     * @param $query
     * @param $product_id
     * @return mixed
     */
    public function scopeCountProductKey($query, $product_id){
        return $query->select(DB::raw('count(`key`) as quantity'))
            ->where('product_id', $product_id)
            ->whereNull('sold_at')
            ->whereNull('return_at')
            ->whereNull('warranty_at');
    }

    /**
     * Lấy key mới theo key cũ khi bảo hành
     *
     * @param ProductKey $oldKey
     * @return mixed
     */
    public function getNewProductKey(){
        $newKey = $this->where('product_id', $this->product_id)
            ->whereNull('sold_at')
            ->whereNull('warranty_at')
            ->first();

        if($newKey){
            $newKey->sold_at = Carbon::now()->toDateTimeString();
            $newKey->use_for = KEY_USE_FOR_WARRANTY;

            $newKey->save();
        }

        return $newKey;
    }
}
