<?php

function money_format($number){
    return number_format($number, 0, ',', '.') . env('MONEY_SUFFIX');
}

?>