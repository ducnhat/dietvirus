<?php

function money_format($number, $suffix = null){
    if($suffix == null){
        $suffix = env('MONEY_SUFFIX');
    }

    return number_format($number, 0, ',', '.') . $suffix;
}

//function coupon_value($number){
//    if($number <= 100){
//        $suffix = "%";
//    }else{
//        $suffix = env('MONEY_SUFFIX');
//    }
//
//    return number_format($number, 0, ',', '.') . $suffix;
//}

?>