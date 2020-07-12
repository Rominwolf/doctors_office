<?php
//干员编号；星级；职业；英文名…
$bagers = array("char_197_poca", 6, "sniper", "Poca",
              "char_197_poca", 2, "sniper", "Poca",
              "char_197_poca", 1, "sniper", "Poca",
              "char_197_poca", 3, "sniper", "Poca",
              "char_197_poca", 3, "sniper", "Poca",
              "char_197_poca", 5, "sniper", "Poca",
              "char_197_poca", 4, "sniper", "Poca",
              "char_197_poca", 4, "sniper", "Poca",
              "char_197_poca", 5, "sniper", "Poca",
              "char_197_poca", 2, "sniper", "Poca");

//createBags($bags);

function createBags($bags = array()){
header("Content-type: image/png");

$imageUrl = "images/bags/ten/";
$canvas = imagecreatefrompng($imageUrl . "bg.png");

//字体文件
$font_file = "fonts/SourceHanSansCN-Regular.otf";
$font_file_bold = "fonts/SourceHanSansCN-Bold.otf";
$font_file_song = "fonts/SourceHanSerifCN-Bold.otf";

//文本颜色
$font_color_white = imagecolorallocate($canvas, 255, 255, 255);//白色
$font_color_black = imagecolorallocate($canvas, 0, 0, 0);//黑色
$font_color_trans = imagecolorallocatealpha ($canvas, 0, 0, 0, 0);//透明色

$left = 78;

for($i = 0 ; $i < count($bags) ; $i+=4){
    //添加局部变量
    $bagLink = $imageUrl . $bags[$i+1] . ".png";//干员背景连接
    $avatarLink = "./images/Avatar/half/ten/" . $bags[$i] . ".png";//干员头像连接
    $professionLink = "./images/profession/bicolor/" . $bags[$i+2] . ".png";//职业本地链接
    
    //干员背景图片
    list($w,$h) = getimagesize($bagLink);
    $bag = @imagecreatefrompng($bagLink);
    imagecopyresized($canvas, $bag, $left, 0, 0, 0, $w, $h, $w, $h);
    imagedestroy($bag);
    
    //下载干员头像并添加立绘
    $avatarUrl = "https://andata.somedata.top/dataX/char/halfPic/" . $bags[$i] . "_1.png?x-oss-process=image/";
    $avatarInfo = $avatarUrl . "info";
    $avatarInfo = json_decode(file_get_contents($avatarInfo));
    $avatarWidth = $avatarInfo->ImageWidth->value;
    $avatarHeight = $avatarInfo->ImageHeight->value;
    
    if(!file_exists($avatarLink)){
        if($avatarWidth != 180)$avatarUrl = $avatarUrl . "resize,p_164/";
        $avatarUrl = $avatarUrl . "crop,x_0,y_0,w_146,h_316,g_north";
        downloadFileToLocal($avatarUrl, $avatarLink);
    }
    
    list($w,$h) = getimagesize($avatarLink);
    $avatar = @imagecreatefrompng($avatarLink);
    imagecopyresized($canvas, $avatar, $left, 112, 0, 0, 82, 252, $w, $h);
    imagedestroy($avatar);
    
    //添加职业背景图和图片
    $box_left = $left + 10;
    $box_top = 321;
    imagefilledrectangle($canvas, $box_left, $box_top, $box_left + 60, $box_top + 60, $font_color_white);
    
    list($w,$h) = getimagesize($professionLink);
    $profession = @imagecreatefrompng($professionLink);
    imagefilter($profession, IMG_FILTER_NEGATE);
    imagecopyresized($canvas, $profession, $box_left + 1, $box_top + 1, 0, 0, 60, 60, $w, $h);
    imagedestroy($profession);
    
    $left += 82;
}

imagepng($canvas);
imagedestroy($canvas);
};

function downloadFileToLocal($file_url, $save_to){
    $content = file_get_contents($file_url);
    file_put_contents($save_to, $content);
};