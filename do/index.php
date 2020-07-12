<?php
require 'flight/Flight.php';

Flight::route('/', function(){
    echo 'hello world!';
});

Flight::route('/api/items/list', function(){
    $file_path = "items_list.txt";
    $fp = fopen($file_path,"r");
    $str = fread($fp,filesize($file_path));
    echo $str;
});

Flight::route('/api/hr/list', function(){
    $file_path = "hr_list.txt";
    $fp = fopen($file_path,"r");
    $str = fread($fp,filesize($file_path));
    $str = str_replace(array("\r", "\n", "\r\n"), ",", $str);
    echo $str;
});

Flight::route('/api/hr/operates/list', function(){
    $file_path = "hr_operates_list.txt";
    $fp = fopen($file_path,"r");
    $str = fread($fp,filesize($file_path));
    //$str = str_replace(array("\r", "\n", "\r\n"), "[ENTER]", $str);
    echo $str;
});

Flight::route('POST /api/form/operator', function(){
    require 'image.php';
    $operator_raw_data = urldecode(base64_decode(urldecode(Flight::request()->getBody())));
    $operator_array = json_decode($operator_raw_data);
    createOperatorEntryForm($operator_array);
});

Flight::route('POST /api/bag', function(){
    require 'bag.php';
    $operator_raw_data = urldecode(base64_decode(urldecode(Flight::request()->getBody())));
    $operator_array = json_decode($operator_raw_data);
    createOperatorBag($operator_array);
});

Flight::route('POST /api/bags', function(){
    require 'bags.php';
    $operator_raw_data = urldecode(base64_decode(urldecode(Flight::request()->getBody())));
    $operator_array = json_decode($operator_raw_data);
    createBags($operator_array);
});

Flight::route('GET /api/range/@x/@y/@o/@e', function($x, $y, $o, $e){
    require 'range.php';
    $e = str_replace("-", ",", $e);
    $array = array($x, $y, $e, $o);
    createRangeImage($array);
});

Flight::route('GET /api/form/operator/@mode/@custom', function($mode, $custom){
    $custom = base64_encode($custom);
    $file_path = "operators/$custom.txt";
    if(!file_exists($file_path)){echo "false";return;}
    
    if($mode == "check")return;
    
    require 'image.php';
    $fp = fopen($file_path,"r");
    $str = fread($fp,filesize($file_path));
    $operator_array = json_decode($str);
    createOperatorEntryForm($operator_array);
});

function request_post($url = '', $param = '')
{
    if (empty($url) || empty($param)) {
        return false;
    }

    $postUrl = $url;
    $curlPost = $param;
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $postUrl);
    curl_setopt($curl, CURLOPT_HEADER, 0);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_POST, 1);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $curlPost);
    $data = curl_exec($curl);
    curl_close($curl);
    return $data;
};

Flight::start();
