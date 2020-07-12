<?php
//干员ID，干员名，干员英文名，职业，星级，组织名，组织logo
//获取方式，干员一句话简介，干员一句话扩展简介
//基础档案，综合体检测试，客观履历
$operator_normal = array("char_197_poca", "哈", "Poca", "sniper", 6, -1, "logo_ursus",
                         "招募寻访", "乌萨斯学生自治团成员早露，准备迎接新的生活。", "给她一点时间。",
                         "【代号】早露↵【性别】女↵【战斗经验】没有战斗经验↵【出身地】乌萨斯↵【生日】10月31日↵【种族】乌萨斯↵【身高】174cm↵【矿石病感染情况】↵参照医学检测报告，确认为非感染者。", "【物理强度】标准↵【战场机动】普通↵【生理耐受】标准↵【战术规划】优良↵【战斗技巧】标准↵【源石技艺适应性】标准", "早露，切尔诺伯格事变前于切城某中学就读，并担任学生会长。↵事变后加入罗德岛，隶属后勤部门，工作期间风评极佳。现经本人申请，作为狙击干员转入前线。");



//createOperatorBag($operator_normal);

function createOperatorBag($operator = array()){
include 'phpqrcode.php';
header("Content-type: image/png");

$bagId = $operator[4] . ".png";
$canvas = imagecreatefrompng("images/bags/" . $bagId);

//字体文件
$font_file = "fonts/SourceHanSansCN-Regular.otf";
$font_file_bold = "fonts/SourceHanSansCN-Bold.otf";
$font_file_song = "fonts/SourceHanSerifCN-Bold.otf";

//文本颜色
$font_color_yellow = imagecolorallocate($canvas, 255, 160, 0);//黄色
$font_color_white = imagecolorallocate($canvas, 255, 255, 255);//白色
$font_color_black = imagecolorallocate($canvas, 0, 0, 0);//黑色
$font_color_blue = imagecolorallocate($canvas, 3, 169, 244);//天蓝色
$font_color_green = imagecolorallocate($canvas, 111, 194, 74);//草绿色
$font_color_red = imagecolorallocate($canvas, 244, 67, 54);//红色
$font_color_grey = imagecolorallocate($canvas, 117, 117, 117);//灰色
$font_color_deepgrey = imagecolorallocate($canvas, 77, 77, 77);//深灰色
$font_color_avatarbg = imagecolorallocate($canvas, 238, 240, 244);//头像背景色
$font_color_trans = imagecolorallocatealpha ($canvas, 255, 255, 255, 0);//透明色
$font_color_title_background = imagecolorallocate($canvas, 139, 139, 140);//标题背景色

//定义全局变量
$starLink = "./images/bags/star.png";//星级本地链接
$avatarLink = "./images/Avatar/half/" . $operator[2] . ".png";//干员头像本地链接
$organizationLogo = "./images/Logo/" . $operator[6] . ".png";//组织LOGO本地链接
$professionLink = "./images/profession/bicolor/" . $operator[3] . ".png";//职业本地链接
$qrcodeLink = "./images/qrcode/" . $operator[0] . ".png";

//检查干员头像是否存在，不存在则下载
if(!file_exists($avatarLink)){
    $avatar = "https://andata.somedata.top/dataX/char/halfPic/" . $operator[0] . "_1.png";
    downloadFileToLocal($avatar, $avatarLink);
}

//检查组织图标是否存在，不存在则下载
if(!file_exists($organizationLogo)){
    $logo = "https://andata.somedata.top/dataX/logo/" . $operator[6] . ".png";
    downloadFileToLocal($logo, $organizationLogo);
}

//干员星级
$sx = 110;
list($sw,$sh) = getimagesize($starLink);
$star = @imagecreatefrompng($starLink);
for($i=0; $i < $operator[4]; $i++){
    imagecopyresized($canvas, $star, $sx, 83, 0, 0, 32, 32, $sw, $sh);
    $sx -= 20;
}

//添加干员头像
$w = 180;
$h = 250;
$scale = 0.6;
$final_w = intval($w*$scale);
$final_h = intval($h*$scale);

list($avatar_w,$avatar_h) = getimagesize($avatarLink);
$avatar = @imagecreatefrompng($avatarLink);

if($avatar_w != $w){
    $dism = round($w / $avatar_w * 100);
    $avatar = "https://andata.somedata.top/dataX/char/halfPic/" . $operator[0] . "_1.png";
    downloadFileToLocal($avatar . "?x-oss-process=image/resize,p_" . $dism . "/format,png", $avatarLink);
    list($avatar_w,$avatar_h) = getimagesize($avatarLink);
    $avatar = @imagecreatefrompng($avatarLink);
}

$target = imagecreatetruecolor($final_w, $final_h);
imagecopy($canvas, $avatar, -$w, -$h, 0, 0, $w, $h);
imagefill($target, 0, 0, $font_color_avatarbg);
imagecopyresampled($target, $avatar, 0, 0, 0, 0, $final_w, $final_h, $w, $h);

imagecopyresized($canvas, $target, 38, 126, 0, 0, $final_w, $final_h, $final_w, $final_h);

//添加组织图标
list($ow,$oh) = getimagesize($organizationLogo);
$organization = @imagecreatefrompng($organizationLogo);
imagecopyresized($canvas, $organization, 156, 124, 0, 0, 104, 104, $ow, $oh);

//添加组织名称
$organization = "　   无隶属团队";
$organization = $operator[5] == 2 ? "　预备行动组A1" : $organization;
$organization = $operator[5] == 3 ? "　预备行动组A4" : $organization;
$organization = $operator[5] == 4 ? "　　莱茵生命" : $organization;
$organization = $operator[5] == 5 ? "　S.W.E.E.P原型" : $organization;
$organization = $operator[5] == 6 ? "　　喀兰贸易" : $organization;
$organization = $operator[5] == 8 ? "乌萨斯学生自治团" : $organization;
$organization = $operator[5] == 10 ? "　   龙门近卫局" : $organization;
$organization = $operator[5] == 11 ? "　  企鹅物流" : $organization;
$organization = $operator[5] == 13 ? "　　黑钢国际" : $organization;
$organization = $operator[5] == 19 ? "　预备行动组A6" : $organization;
$organization = $operator[5] == 15 ? "　　深海猎人" : $organization;

imagettftext ($canvas, 8, 2, 164, 244, $font_color_black, $font_file_bold, $organization);

//添加职业图标
list($pw,$ph) = getimagesize($professionLink);
$profession = @imagecreatefrompng($professionLink);
imagecopyresized($canvas, $profession, 290, 128, 0, 0, 56, 56, $pw, $ph);

//添加职业名称
$professionName = strtoupper($operator[3]) . "//";
$dimensions = imagettfbbox(6, 0, $font_file_bold, $professionName);
$textWidth = abs($dimensions[2] - $dimensions[0]);
$x = 320 - $textWidth + 34;
imagettftext ($canvas, 6, 0, $x, 194, $font_color_white, $font_file_bold, $professionName);

//添加干员名称
if(strlen($operator[1]) < 3)$operatorName = "　　    " . $operator[1];
if(strlen($operator[1]) == 3)$operatorName = "　　  " . $operator[1];
if(strlen($operator[1]) == 6)$operatorName = "　　" . $operator[1];
if(strlen($operator[1]) == 9)$operatorName = "　  " . $operator[1];
if(strlen($operator[1]) >= 12)$operatorName = "　" . $operator[1];
if($operatorName == "")$operatorName = $operator[1];

imagettftext ($canvas, 24, -2, 314, 255, $font_color_black, $font_file_song, $operatorName);
imagettftext ($canvas, 11, 0, 320, 292, $font_color_black, $font_file_song, $operator[2]);

//添加干员简介
$x = 294;
$y = 288;
$dimensions = imagefilledrectangle($canvas, $x, 0, $x+1, 1, $font_color_white);
$lotteryMode = "获取方式// " . $operator[7];
$dimensions = imagettfbbox(7, 0, $font_file_bold, $lotteryMode);
$textWidth = abs($dimensions[2] - $dimensions[0]);
$x = 294 - $textWidth + 4;
imagettftext ($canvas, 7, 0, $x, $y, $font_color_black, $font_file_bold, $lotteryMode);
$y += 20;
imagettftext ($canvas, 7, 0, 32, $y, $font_color_black, $font_file_bold, substr_format($operator[8], 32));
$y += 12;
$introPlc = "—— " . $operator[9];
imagettftext ($canvas, 7, 0, 32, $y, $font_color_black, $font_file_bold, $introPlc);

//添加干员简介
$introduction = $operator[10] . "\n" . $operator[11] . "\n客观履历// "  . substr_format($operator[12], 100);
$introduction = str_replace("\n参照医学检测报告，", "", $introduction);
$introduction = str_replace("【", "", $introduction);
$introduction = str_replace("】", "// ", $introduction);
$introduction = autowrap(7, 0, $font_file_bold, $introduction, 184);
imagettftext ($canvas, 7, 0, 346, 368, $font_color_black, $font_file_bold, $introduction);

//添加干员二维码
$qrcode = QRcode::png("https://kokodayo.fun/details/" . $operator[0], $qrcodeLink, 4, 4);
list($qw,$qh) = getimagesize($qrcodeLink);
$qrcode = @imagecreatefrompng($qrcodeLink);
$qrcode = imagerotate($qrcode, 4, 0);
imagecopyresized($canvas, $qrcode, 47, 568, 0, 0, 148, 148, $qw, $qh);

imagepng($canvas);
imagedestroy($canvas);
};

function autowrap($fontsize, $angle, $fontface, $string, $width) {
    $content = "";
        for ($i=0;$i<mb_strlen($string);$i++) {
        $letter[] = mb_substr($string, $i, 1);
    }
    foreach ($letter as $l) {
        $teststr = $content."".$l;
        $testbox = imagettfbbox($fontsize, $angle, $fontface, $teststr);
        if (($testbox[2] > $width) && ($content !== "")) {
            $content .= "\n";
        }
        $content .= $l;
    }
    return $content;
}

function downloadFileToLocal($file_url, $save_to){
    $content = file_get_contents($file_url);
    file_put_contents($save_to, $content);
}


function substr_format($text, $length, $replace='……', $encoding='UTF-8') {
	if ($text && mb_strlen($text, $encoding)>$length)
	{
		return mb_substr($text, 0, $length, $encoding).$replace;
	}
	return $text;
}