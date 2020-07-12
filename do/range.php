<?php
//精英后攻击范围长；精英后攻击范围宽；攻击范围删除格子(A,B...)；攻击范围干员位置(A)；
function createRangeImage($range = array()){
header("Content-type: image/png");
$canvas = imagecreatetruecolor(2048, 2048);

//颜色
$color_white = imagecolorallocate($canvas, 255, 255, 255);//白色
$color_black = imagecolorallocate($canvas, 0, 0, 0);//黑色
$color_blue = imagecolorallocate($canvas, 3, 169, 244);//天蓝色
$font_file = "fonts/SourceHanSansCN-Regular.otf";

imagefill($canvas, 0, 0, $color_white);

$x = 18;
for($i = 0; $i < $range[0]; $i++){
    if($i<9)imagettftext ($canvas, 8, 0, $x+1, 12, $color_black, $font_file, $i+1);
    if($i>8)imagettftext ($canvas, 8, 0, $x-2, 12, $color_black, $font_file, $i+1);

    $x += 15;
}
$y = 26;
for($i = 0; $i < $range[1]; $i++){
    imagettftext ($canvas, 8, 0, 4, $y, $color_black, $font_file, $i+1);
    $y += 15;
}

$bgpx = array(0, 0);
$bgpx[1] = $y - 10;
$bgpx[0] = $x;

//精英后格子制作
//当前处理的格子；格子x轴；格子y轴；是否需要排除
$operator_atk = array(1, 16, 16, false);
$operator_atk_explode = explode(",", $range[2]);//排除的格子列表
for($i = 0; $i < $range[1]; $i++){
    //创建所有格子
    for($k = 0; $k < $range[0]; $k++){
        //检测是否是排除的格子
        for($j = 0; $j < count($operator_atk_explode); $j++){
            if($operator_atk[0] == $operator_atk_explode[$j]) $operator_atk[3] = true;
        }
        
        if(!$operator_atk[3])
            imagerectangle ($canvas, $operator_atk[1], $operator_atk[2], $operator_atk[1]+11, $operator_atk[2]+11, $color_black);
        
        //修改干员位置格子
        if($operator_atk[0] == $range[3])
            imagefilledrectangle($canvas, $operator_atk[1], $operator_atk[2], $operator_atk[1]+11, $operator_atk[2]+11, $color_black);
        
        $operator_atk[3] = false;
        
        $operator_atk[1] += 15;
        $operator_atk[0]++;
    }

    $operator_atk[1] = 16;
    $operator_atk[2] += 15;
}

$target = imagecreatetruecolor($bgpx[0], $bgpx[1]);
imagefill($target, 0, 0, $color_white);
imagecopy($target, $canvas, 0, 0, 0, 0, $bgpx[0], $bgpx[1]);
//imagecopyresampled($target, $canvas, 0, 0, 0, 0, $bgpx[0], $bgpx[1], 256, 256);
//var_dump($bgpx);

imagepng($target);
imagedestroy($canvas);
imagedestroy($target);
};