<?php

function money_format($number, $suffix = null){
    if($suffix == null){
        $suffix = env('MONEY_SUFFIX');
    }

    return number_format($number, 0, ',', '.') . $suffix;
}

function phone_format($number){
    if(  preg_match( '/9(\d{2})(\d{3})(\d{3})$/', $number,  $matches ) )
    {
        $result = "9" . $matches[1] . '-' .$matches[2] . '-' . $matches[3];
    }else if(  preg_match( '/(\d{1})(\d{2})(\d{3})(\d{4})$/', $number,  $matches ) ){
        $result = $matches[1] .$matches[2] . '-' . $matches[3] . '-' . $matches[4];
    }

    return "0$result";
}

/**
 * HÀM TẠO ĐƯỜNG LINK THANH TOÁN QUA NGÂNLƯỢNG.VN VỚI THAM SỐ CƠ BẢN
 *
 * @param string $return_url: Đường link dùng để cập nhật tình trạng hoá đơn tại website của bạn khi người mua thanh toán thành công tại NgânLượng.vn
 * @param string $receiver: Địa chỉ Email chính của tài khoản NgânLượng.vn của người bán dùng nhận tiền bán hàng
 * @param string $transaction_info: Tham số bổ sung, bạn có thể dùng để lưu các tham số tuỳ ý để cập nhật thông tin khi NgânLượng.vn trả kết quả về
 * @param string $order_code: Mã hoá đơn/Tên sản phẩm
 * @param int $price: Tổng tiền phải thanh toán
 * @return string
 */
function buildCheckoutUrl($transaction_info, $order_code, $price)
{

    // Bước 1. Mảng các tham số chuyển tới nganluong.vn
    $arr_param = array(
        'merchant_site_code'=>	strval(env('MERCHANT_SITE_CODE')),
        'return_url'		=>	strtolower(urlencode(env('RETURN_URL'))),
        'receiver'			=>	strval(env('RECEIVER')),
        'transaction_info'	=>	strval($transaction_info),
        'order_code'		=>	strval($order_code),
        'price'				=>	strval($price)
    );
    $secure_code ='';
    $secure_code = implode(' ', $arr_param) . ' ' . $this->secure_pass;
    $arr_param['secure_code'] = md5($secure_code);

    /* Bước 2. Kiểm tra  biến $redirect_url xem có '?' không, nếu không có thì bổ sung vào*/
    $redirect_url = $this->nganluong_url;
    if (strpos($redirect_url, '?') === false)
    {
        $redirect_url .= '?';
    }
    else if (substr($redirect_url, strlen($redirect_url)-1, 1) != '?' && strpos($redirect_url, '&') === false)
    {
        // Nếu biến $redirect_url có '?' nhưng không kết thúc bằng '?' và có chứa dấu '&' thì bổ sung vào cuối
        $redirect_url .= '&';
    }

    /* Bước 3. tạo url*/
    $url = '';
    foreach ($arr_param as $key=>$value)
    {
        if ($key != 'return_url') $value = urlencode($value);

        if ($url == '')
            $url .= $key . '=' . $value;
        else
            $url .= '&' . $key . '=' . $value;
    }

    return $redirect_url.$url;
}

/**  * HÀM KIỂM TRA TÍNH ĐÚNG ĐẮN CỦA ĐƯỜNG LINK KẾT QUẢ TRẢ VỀ TỪ
NGÂNLƯỢNG.VN  *  * @param string $transaction_info: Thông tin về giao
dịch, Giá trị do website gửi sang  * @param string $order_code: Mã hoá
đơn/tên sản phẩm  * @param string $price: Tổng tiền đã thanh toán  *
@param string $payment_id: Mã giao dịch tại NgânLượng.vn  * @param int
$payment_type: Hình thức thanh toán: 1 - Thanh toán ngay (tiền đã
chuyển vào tài khoản NgânLượng.vn của người bán); 2 - Thanh toán Tạm
giữ (tiền người mua đã thanh toán nhưng NgânLượng.vn đang giữ hộ)  *
@param string $error_text: Giao dịch thanh toán có bị lỗi hay không.
$error_text == "" là không có lỗi. Nếu có lỗi, mô tả lỗi được chứa
trong $error_text  * @param string $secure_code: Mã checksum (mã kiểm
tra)  * @return unknown  */

function verifyPaymentUrl($transaction_info, $order_code, $price, $payment_id, $payment_type, $error_text, $secure_code)
{
    // Tạo mã xác thực từ chủ web
    $str = '';
    $str .= ' ' . strval($transaction_info);
    $str .= ' ' . strval($order_code);
    $str .= ' ' . strval($price);
    $str .= ' ' . strval($payment_id);
    $str .= ' ' . strval($payment_type);
    $str .= ' ' . strval($error_text);
    $str .= ' ' . strval($this->merchant_site_code);
    $str .= ' ' . strval($this->secure_pass);

    // Mã hóa các tham số
    $verify_secure_code = '';
    $verify_secure_code = md5($str);

    // Xác thực mã của chủ web với mã trả về từ nganluong.vn
    if ($verify_secure_code === $secure_code) return true;
    else return false;
}

?>