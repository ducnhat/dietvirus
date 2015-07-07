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

    protected $fillable = ['name', 'coupon', 'condition', 'value', 'quantity', 'is_used', 'start_date', 'end_date'];

    protected $dates = ['start_date', 'end_date'];

    /**
     * Parse start date to sql datetime
     * @param $value
     */
    public function setStartDateAttribute($value){
        $this->attributes['start_date'] = Carbon::createFromFormat('d-m-Y H:i', $value)->toDateTimeString();
    }

    /**
     * Parse end date to sql datetime
     * @param $value
     */
    public function setEndDateAttribute($value){
        $this->attributes['end_date'] = Carbon::createFromFormat('d-m-Y H:i', $value)->toDateTimeString();
    }

    public function getTargetAttribute($value){

        switch($value){
            case 1:
                $target = 'subtotal';
                break;
            default:
                $target = 'subtotal';
        }

        return $target;
    }

    public function getValueAttribute($value){
        if($value <= 100){
            return "$value%";
        }

        return money_format($value, env('MONEY_SUFFIX'));
    }

    public function scopeCheck($query, $coupon){
        $now = Carbon::now()->toDateTimeString();

        return $query->where('coupon', $coupon)
                    ->where('start_date', '<=', $now)
                    ->where('end_date', '>=', $now)
                    ->whereRaw('is_used < quantity');
    }
}
