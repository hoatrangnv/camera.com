<?php
namespace common\models;

use yii\db\ActiveRecord;

class I18n extends ActiveRecord
{

    public static $language_keys = [
        '{email signature}',
        '{page title}',
        '{meta title}',
        '{meta description}',
        '{meta keywords}',
        'Hello',
        'Shop',
        'Collection',
        'How to order',
        'Discovery',
        'About us',
        'FAQ',
        'View all',
        'Your cart is empty',
        'Welcome',
        'Login',
        'Logout',
        'Signup',
        'Facebook',
        'Instagram',
        'Policy',
        'Contact',
        'Sort by recently',
        'Sort by random',
        'Sort by price descending',
        'Sort by price ascending',
        'See more',
        'Stock available',
        'Sold out',
        'Follow this product',
        'Your name',
        'Email',
        'Phone number',
        'Save',
        'Send',
        'Submit',
        'Product description',
        'Product details',
        'Shipping policy',
        'Add to cart',
        'View cart',
        'Close notify',
        'Your cart',
        'Next step',
        'Total amount',
        'Username',
        'Password',
        'Remember me',
        'Incorrect username or password',
        'Update',
        'Incorrect password',
        'Old password and new password cannot be same',
        'Forgot password',
        'Please fill in the form below',
        'Request password reset',
        'Address',
        'First name',
        'Last name',
        'Date of birth',
        'Gender',
        'Male',
        'Female',
        'Other',
        'Language',
        'Created at',
        'Updated at',
        'Total purchase value',
        'Total purchase products',
        'Total purchase orders',
        'New password',
        'Confirm new password',
        'Confirm password',
        'Password and confirm password do not match',
        'Select',
        'Incorrect captcha',
        'Captcha',
        'Purchase order details',
        'Customer information',
        'Receiver information',
        'Status',
        'Full name',
        'Shipping fee',
        'Some errors occurred',
        'Please try again',
        'Thank you',
        'Your account created successfully',
        'Your account updated successfully',
        'Your purchase order submitted successfully',
        'Your product following submitted successfully',
        'A product following already exists with the same information',
        'Your password reset request submitted successfully',
        'Unable to reset password for email provided',
        'Password reset for your account',
        'Follow the link below to reset your password',
        'Please choose your new password',
        'Reset password',
        'Wrong password reset token',
        'New password was saved',
        'Thank you for joining us',
        'Hello new customer',
        'Customer name',
        'Delivery to',
        'Note',
        'Email',
        'Product code',
        'Product name',
        'Unit price',
        'Quantity',
        'Total amount',
        'Transaction ID',
        'Below is your recent purchase order information',
        'Dear',
        'Thank you for your purchase',
        'Purchase order review',
        'Country',
        'City',
        'Update account',
        'Change password',
        'There is no user with such email',
    ];
    public static $language_data = [
//        'Hello' => 'Xin chào',
//        'Shop' => 'Cửa hàng',
//        'Collection' => 'Bộ sưu tập',
//        'How to order' => 'Hd đặt hàng',
//        'Discovery' => 'Khám phá',
//        'About us' => 'Về chúng tôi',
//        'FAQ' => 'F.A.Q',
//        'View all' => 'Tất cả',
//        'Your cart is empty' => 'Bạn chưa chọn sản phẩm nào!',
//        'Welcome' => 'Xin chào',
//        'Login' => 'Đăng nhập',
//        'Logout' => 'Đăng xuất',
//        'Signup' => 'Đăng ký',
//        'Facebook' => 'Facebook',
//        'Instagram' => 'Instagram',
//        'Policy' => 'Chính sách',
//        'Contact' => 'Liên hệ',
//        'Sort by recently' => 'Gần đây',
//        'Sort by random' => 'Ngẫu nhiên',
//        'Sort by price descending' => 'Giá giảm',
//        'Sort by price ascending' => 'Giá tăng',
//        'See more' => 'Xem thêm',
//        'Stock available' => 'Còn hàng',
//        'Sold out' => 'Hết hàng',
//        'Follow this product' => 'Theo dõi sản phẩm này',
//        'Your name' => 'Tên của bạn',
//        'Email' => 'Email',
//        'Phone number' => 'Số điện thoại',
//        'Save' => 'Lưu',
//        'Send' => 'Gửi',
//        'Submit' => 'Gửi',
//        'Product description' => 'Mô tả chung',
//        'Product details' => 'Chi tiết',
//        'Shipping policy' => 'Chính sách giao hàng',
//        'Add to cart' => 'Thêm vào giỏ',
//        'View cart' => 'Xem giỏ hàng',
//        'Close notify' => 'Đóng thông báo',
//        'Your cart' => 'Giỏ hàng của bạn',
//        'Next step' => 'Tiếp theo',
//        'Total amount' => 'Thành tiền',
//        'Username' => 'Tên đăng nhập',
//        'Password' => 'Mật khẩu',
//        'Remember me' => 'Ghi nhớ',
//        '{attribute} cannot be blank' => '{attribute} không thể để trống',
//        'Incorrect username or password' => 'Tên đăng nhập hoặc mật khẩu không đúng',
//        'Update' => 'Cập nhật',
//        'Incorrect password' => 'Mật khẩu không đúng',
//        'Old password and new password cannot be same' => 'Mật khẩu mới không được trùng mới mật khẩu hiện tại',
//        'Forgot password' => 'Quên mật khẩu?',
//        'Please fill in the form below' => 'Bạn vui lòng nhập thông tin sau',
//        'Request password reset' => 'Đặt lại mật khẩu',
//        'Address' => 'Địa chỉ',
//        'First name' => 'Tên',
//        'Last name' => 'Họ',
//        'Date of birth' => 'Ngày sinh',
//        'Gender' => 'Giới tính',
//        'Male' => 'Nam',
//        'Female' => 'Nữ',
//        'Other' => 'Khác',
//        'Language' => 'Ngôn ngữ',
//        'Created at' => 'Ngày đăng ký',
//        'Updated at' => 'Cập nhật lần cuối',
//        'Total purchase value' => 'Tổng giá trị đã mua',
//        'Total purchase products' => 'Số sản phẩm đã mua',
//        'Total purchase orders' => 'Tổng số đơn hàng',
//        'New password' => 'Mật khẩu mới',
//        'Confirm new password' => 'Xác minh mật khẩu mới',
//        'Confirm password' => 'Xác minh mật khẩu',
//        'Password and confirm password do not match' => 'Mật khẩu mới không khớp',
//        '{attribute} must be integer' => '{attribute} phải là số tự nhiên',
//        '{attribute} too short' => '{attribute} quá ngắn',
//        '{attribute} too long' => '{attribute} quá dài',
//        'Select' => 'Chọn',
//        'Incorrect captcha' => 'Mã xác nhận không chính xác',
//        'Captcha' => 'Mã xác nhận',
//        'Purchase order details' => 'Thông tin đơn hàng',
//        'Customer information' => 'Thông tin khách hàng',
//        'Receiver information' => 'Thông tin người nhận',
//        'Status' => 'Trạng thái',
//        'Full name' => 'Họ và tên',
//        'Shipping fee' => 'Cước vận chuyển',
//        'Some errors occurred' => 'Có một vài lỗi đã xảy ra',
//        'Please try again' => 'Vui lòng thử lại',
//        'Thank you' => 'Cảm ơn bạn',
//        'Your account created successfully' => 'Tài khoản của bạn đã được tạo thành công',
//        'Your account updated successfully' => 'Tài khoản của bạn đã được cập nhật thành công',
//        'Your purchase order submitted successfully' => 'Đơn hàng đã được gửi thành công, vui lòng kiểm tra email để kiểm tra lại thông tin',
//        'Your product following submitted successfully' => 'Gửi theo dõi thành công, chúng tôi sẽ thông tin đến bạn sớm nhất khi sản phẩm này có hàng',
//        'A product following already exists with the same information' => 'Chúng tôi đã nhận được một theo dõi tương tự như thế này, vì vậy bạn không thể gửi thêm nữa.',
//        'Your password reset request submitted successfully' => 'Chúng tôi đã gửi một đường dẫn đến địa chỉ email bạn vừa nhập, vui lòng kiểm tra hộp thư đến hoặc có thể cả thư spam',
//        'Unable to reset password for email provided' => 'Không reset được mật khẩu cho tài khoản tương ứng với địa chỉ email bạn cung cấp',
//        'Password reset for your account' => 'Cài đặt lại mật khẩu cho tài khoản của bạn',
//        'Follow the link below to reset your password' => 'Vui lòng vào link sau đây để cài đặt lại mật khẩu',
//        'Please choose your new password' => 'Vui lòng chọn mật khẩu mới',
//        'Reset password' => 'Cài đặt lại mật khẩu',
//        'Wrong password reset token' => 'Mã xác thực không đúng',
//        'New password was saved' => 'Mật khẩu mới đã được lưu',
//        'Thank you for joining us' => 'Chào mừng bạn đến với đội của chúng tôi :)',
//        '{email signature}' => 'Luspel Term.',
//        'Hello new customer' => 'Chào người mới',
//        'Customer name' => 'Tên khách hàng',
//        'Delivery to' => 'Địa chỉ nhận hàng',
//        'Note' => 'Ghi chú',
//        'Email' => 'Email',
//        'Product code' => 'Mã sản phẩm',
//        'Product name' => 'Tên sản phẩm',
//        'Unit price' => 'Đơn giá',
//        'Quantity' => 'Số lượng',
//        'Total amount' => 'Thành tiền',
//        'Transaction ID' => 'Mã đơn hàng',
//        'Below is your recent purchase order information' => 'Dưới đây là thông tin đơn hàng chúng tôi vừa nhận được từ bạn',
//        'Dear' => 'Dear',
//        'Thank you for your purchase' => 'Cảm ơn bạn đã đặt hàng, chúng tôi sẽ liên lạc với bạn sớm nhất (trong vòng 12h)',
//        'Purchase order review' => 'Thông tin đơn hàng',
//        'Country' => 'Quốc gia',
//        'City' => 'Thành phố',
//        'Update account' => 'Cập nhật thông tin tài khoản',
//        'Change password' => 'Đổi mật khẩu',
    ];
    
    public static $currency_params = [
        'exchange_rate' => 1,
        'prefix' => '',
        'suffix' => 'VND',
        'thousand_separator' => '.',
        'decimal_point' => ',',
        'number_digits_after_decimal_point' => 0,
    ];

   public static function t($key, $language_id = null)
    {
        
        if (isset(static::$language_data[$key])) {
            return static::$language_data[$key];
        } else {
            return $key;
        }
    }
    
    public static function currency($value)
    {
//        $value = round($value / (float) static::$currency_params['exchange_rate'], (int) static::$currency_params['number_digits_after_decimal_point'], PHP_ROUND_HALF_UP);
//        $whole = floor($value);
//        $fraction = rtrim(ceil(($value - $whole) * pow(10, (int) static::$currency_params['number_digits_after_decimal_point'])), '0');
//        $rev_whole_map = str_split(strrev($whole));
//        $str_val = '';
//        foreach ($rev_whole_map as $i => $char) {
//            if ($i != 0 && $i % 3 == 0) {
//                $str_val = static::$currency_params['thousand_separator'] . $str_val;
//            }
//            $str_val = $char . $str_val;
//        }
//        while (strlen($fraction) < (int) static::$currency_params['number_digits_after_decimal_point']) {
//            $fraction .= '0';
//        }
//        if (strlen($fraction) > 0) {
//            $str_val .= static::$currency_params['decimal_point'] . $fraction;
//        }
        $value = round($value / (float) static::$currency_params['exchange_rate'], (int) static::$currency_params['number_digits_after_decimal_point'], PHP_ROUND_HALF_UP);
        $str_val = number_format($value, (int) static::$currency_params['number_digits_after_decimal_point'], static::$currency_params['decimal_point'], static::$currency_params['thousand_separator']);
        return static::$currency_params['prefix'] . $str_val . static::$currency_params['suffix'];
    }

    public static function setLanguageData($language_data)
    {
        static::$language_data = $language_data;
    }
    
    public static function setCurrencyParams($currency_params)
    {
        foreach (static::$currency_params as $key => $value) {
            if (isset($currency_params[$key])) {
                static::$currency_params[$key] = $currency_params[$key];
            }
        }
//        static::$currency_params = $currency_params;
    }
}