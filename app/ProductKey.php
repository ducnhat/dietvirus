<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Product;

class ProductKey extends Model
{
    use SoftDeletes;

    protected $table = 'product_keys';

    protected $fillable = ['key', 'product_id', 'user_id', 'sold_at', 'return_at'];

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    public function getProductIdAttribute($value){
        $product = Product::where('id', $value)->first();

        return $product->name;
    }

    public function getUserIdAttribute($value){
        $user = User::where('id', $value)->first();

        return $user->name;
    }
}
