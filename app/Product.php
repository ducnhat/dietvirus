<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $table = 'products';

    protected $fillable = ['name', 'image', 'price', 'manufacturer'];

    public function getImageAttribute(){
        return config('app.image_upload_path') . "products/" . $this->attributes['id'] . ".jpg";
    }

//    public function getPriceAttribute(){
//        return number_format($this->attributes['price'], 0, '.', ',');
//    }
}
