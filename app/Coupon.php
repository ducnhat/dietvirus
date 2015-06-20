<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Coupon extends Model
{
    /*
     * Target subtotal = COUPON_TARGET_SUBTOTAL
     * Target item = COUPON_TARGET_ITEM
     */

    use SoftDeletes;

    protected $table = 'coupon';

    protected $fillable = ['name', 'coupon', 'condition', 'value', 'quantity', 'start_date', 'end_date'];

    protected $dates = ['start_date', 'end_date'];

    public function setStartDateAttribute($value){
        $this->attributes['start_date'] = Carbon::createFromFormat('d-m-Y H:i', $value)->toDateTimeString();;
    }

    public function setEndDateAttribute($value){
        $this->attributes['end_date'] = Carbon::createFromFormat('d-m-Y H:i', $value)->toDateTimeString();;
    }
}
