<?php
$operator_normal = array("艾雅法拉", "Eyjafjalla", "caster", 6, "　输出", "　削弱", "",//7
                  732, 1743, 292, 645, 46, 122, 10, 20,//15
                  70, 70, 19, 21, 1, 1, 1.6, 1.6,//23
                  4, 3, "4,12", 5, "8",//28
//                  7, 7, "1,2,3,5,6,7,8,9,13,14,15,21,29,35,36,37,41,42,43,44,45,47,48,49", 25, "",
                  "部署费用-1,第二天赋效果增强,攻击力+27,部署费用-1,第一天赋效果增强",//29
                  "炎息", "精英1,在场时，所有友方【术师】职业干员的攻击力+7%,精英2,在场时，所有友方【术师】职业干员的攻击力+14%",//31
                  "乱火", "精英2,部署后立即随机获得一定（7~15）的技力",//33
                  "火山学家", "精英0,进驻制造站时，源石类配方的生产力+35%",//35
                  "天灾信使·β", "精英2,进驻人力办公室时，人脉资源的联络速度+45%",//37
                  "lmb,30000,ss,5,30042,7,30023,5",//38
                  "lmb,180000,sss,4,30115,4,30064,5",//39
                  "3301,5", "3301,5,30041,5,30021,4",//41
                  "3302,8,30052,4", "3302,8,30062,3,30032,3", "3302,8,30073,7",//44
                  "3303,8,30083,3,30103,4",//45
                  "二重咏唱,攻击速度+60 第二次及以后使用时追加攻击力+60%的效果,25,35,25,自动回复,手动触发",//46
                  "3303,6,30094,4,30073,7", "3303,12,30024,4,30104,8", "3303,15,30115,6,30064,4",//49
                  "点燃,下次攻击造成相当于攻击力370%的法术伤害，命中目标周围的敌人受到一半的爆炸伤害且在6秒内法术抗性-25% 可充能3次,0,5,即时,自动回复,自动触发",//50
                  "3303,6,30104,4,30083,5", "3303,12,30034,4,30014,10", "3303,15,30115,6,30064,6",//53
                  "火山,攻击力+130%，攻击范围增大，攻击间隔大幅度缩短(-1.1)，攻击变为随机对攻击范围内至多6个敌人发射熔岩,55,80,15,自动回复,手动触发",//54
                  "3303,6,30014,4,30093,7", "3303,12,30044,4,30024,7", "3303,15,30135,6,30054,5",//57
                  "https://andata.somedata.top/dataX/char/profile/char_202_demkni.png",//58
                  "https://andata.somedata.top/dataX/skills/pics/skill_icon_skchr_hmau_",//59
                  "logo_ursus");

//createOperatorEntryForm($operator_normal);

//干员中文名；干员英文名；职业；星级；标签1；标签2；标签3；
//初始生命；满级生命；初始攻击；满级攻击；初始法抗；满级法抗；初始防御；满级防御；
//初始再部署时间；满级再部署时间；初始费用；满级费用；初始阻挡；满级阻挡；初始攻速；满级攻速；
//精英后攻击范围长；精英后攻击范围宽；攻击范围删除格子(A,B...)；攻击范围干员位置(A)；精英前攻击范围(X,Y,A,B...)；
//潜能(1,2,3,4,5)；
//天赋1名字；天赋1详情(条件,描述...)；
//天赋2名字；天赋2详情(条件,描述...)；
//基建1名字；基建1详情(条件,描述...)；
//基建2名字；基建2详情(条件,描述...)；
//精英1材料(名称,数量...)；
//精英2材料(名称,数量...)；
//技能1->2材料(名称,数量...)；技能2->3材料(名称,数量...)；
//技能3->4材料(名称,数量...)；技能4->5材料(名称,数量...)；技能5->6材料(名称,数量...)；
//技能6->7材料(名称,数量...)；
//一技能详情(名字,介绍,初始,消耗,持续,回复方式,触发方式)；一技能专1材料(名称,数量...)；一技能专2材料(名称,数量...)；一技能专3材料(名称,数量...)；
//二技能详情(名字,介绍,初始,消耗,持续,回复方式,触发方式)；二技能专1材料(名称,数量...)；二技能专2材料(名称,数量...)；二技能专3材料(名称,数量...)；
//三技能详情(名字,介绍,初始,消耗,持续,回复方式,触发方式)；三技能专1材料(名称,数量...)；三技能专2材料(名称,数量...)；三技能专3材料(名称,数量...)；
//干员头像图片直链；干员技能ID(A,B,C)；组织Logo

function createOperatorEntryForm($operator = array()){

header("Content-type: image/png");
$canvas = imagecreatefrompng("images/staff.png");

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
$font_color_trans = imagecolorallocatealpha ($canvas, 0, 0, 0, 127);//透明色
$font_color_title_background = imagecolorallocate($canvas, 139, 139, 140);//标题背景色

//检查干员头像是否存在，不存在则下载头像文件
if(!file_exists("./images/Avatar/" . $operator[1] . ".png")){
    downloadFileToLocal($operator[57], "./images/Avatar/" . $operator[1] . ".png");
}


//添加干员头像
list($avatar_operator_w,$avatar_operator_h) = getimagesize("images/Avatar/" . $operator[1] . ".png");
$avatar_operator = @imagecreatefrompng("images/Avatar/" . $operator[1] . ".png");
imagecopyresized($canvas, $avatar_operator, 21, 60, 0, 0, 148, 159, $avatar_operator_w, $avatar_operator_h);

//添加组织图标
$organizationLogo = "./images/Logo/" . $operator[59] . ".png";
list($ow,$oh) = getimagesize($organizationLogo);
$organization = @imagecreatefrompng($organizationLogo);
imagefilter($organization, IMG_FILTER_SMOOTH, 100);
imagefilter($organization, IMG_FILTER_COLORIZE, 0, 0, 0, 127);
imagecopyresized($canvas, $organization, 400, 10, 0, 0, 224, 224, $ow, $oh);

//添加干员职业
list($avatar_operator_w,$avatar_operator_h) = getimagesize("images/profession/" . $operator[2] . ".png");
$avatar_operator = @imagecreatefrompng("images/profession/" . $operator[2] . ".png");
imagecopyresized($canvas, $avatar_operator, 195, 174, 0, 0, 33, 33, $avatar_operator_w, $avatar_operator_h);

//干员中文名
imagettftext ($canvas, 28, 0, 197, 146, $font_color_title_background, $font_file_song, $operator[0]);
$array_operator_chn = imagettftext ($canvas, 28, 0, 194, 144, $font_color_black, $font_file_song, $operator[0]);

//干员英文名
imagettftext ($canvas, 18, 0, $array_operator_chn[2]+24, 140, $font_color_title_background, $font_file_song, $operator[1]);
imagettftext ($canvas, 18, 0, $array_operator_chn[2]+22, 138, $font_color_black, $font_file_song, $operator[1]);

//干员星级
$operator_star_x = 194;
for($i=0; $i < $operator[3]; $i++){
    list($avatar_operator_w,$avatar_operator_h) = getimagesize("images/star.png");
    $avatar_operator = @imagecreatefrompng("images/star.png");
    imagecopyresized($canvas, $avatar_operator, $operator_star_x, 78, 0, 0, 22, 22, $avatar_operator_w, $avatar_operator_h);
    $operator_star_x += 20;
}

//干员标签信息
imagefilledrectangle($canvas, 248+2, 174+2, 327+3, 206+3, $font_color_title_background);
imagefilledrectangle($canvas, 248, 174, 327, 206, $font_color_black);
imagettftext ($canvas, 13, 0, 254, 196, $font_color_white, $font_file, $operator[4]);

if($operator[5] != ""){
    imagefilledrectangle($canvas, 344+2, 174+2, 423+3, 206+3, $font_color_title_background);
    imagefilledrectangle($canvas, 344, 174, 423, 206, $font_color_black);
    imagettftext ($canvas, 13, 0, 350, 196, $font_color_white, $font_file, $operator[5]);
}

if($operator[6] != ""){
    imagefilledrectangle($canvas, 440+2, 174+2, 519+3, 206+3, $font_color_title_background);
    imagefilledrectangle($canvas, 440, 174, 519, 206, $font_color_black);
    imagettftext ($canvas, 13, 0, 446, 196, $font_color_white, $font_file, $operator[6]);
}

//干员属性写入
imagettftext ($canvas, 12, 0, 100, 288, $font_color_black, $font_file, $operator[7]);
imagettftext ($canvas, 12, 0, 170, 288, $font_color_black, $font_file, $operator[8]);
imagettftext ($canvas, 12, 0, 100, 318, $font_color_black, $font_file, $operator[9]);
imagettftext ($canvas, 12, 0, 170, 318, $font_color_black, $font_file, $operator[10]);
imagettftext ($canvas, 12, 0, 100, 348, $font_color_black, $font_file, $operator[11]);
imagettftext ($canvas, 12, 0, 170, 348, $font_color_black, $font_file, $operator[12]);
imagettftext ($canvas, 12, 0, 130, 378, $font_color_black, $font_file, $operator[13]);
imagettftext ($canvas, 12, 0, 180, 378, $font_color_black, $font_file, $operator[14]);
imagettftext ($canvas, 12, 0, 150, 408, $font_color_black, $font_file, $operator[15]);
imagettftext ($canvas, 12, 0, 200, 408, $font_color_black, $font_file, $operator[16]);
imagettftext ($canvas, 12, 0, 135, 438, $font_color_black, $font_file, $operator[17]);
imagettftext ($canvas, 12, 0, 185, 438, $font_color_black, $font_file, $operator[18]);
imagettftext ($canvas, 12, 0, 110, 468, $font_color_black, $font_file, $operator[19]);
imagettftext ($canvas, 12, 0, 145, 468, $font_color_black, $font_file, $operator[20]);
imagettftext ($canvas, 12, 0, 135, 498, $font_color_black, $font_file, $operator[21]);
imagettftext ($canvas, 12, 0, 185, 498, $font_color_black, $font_file, $operator[22]);

//攻击范围
if($operator[23] != "null"){
    //精英后格子制作
    //当前处理的格子；格子x轴；格子y轴；是否需要排除
    $operator_atk = array(1, 45, 570, false);
    $operator_atk_explode = explode(",", $operator[25]);//排除的格子列表
    for($i = 0; $i < $operator[24]; $i++){
        //创建所有格子
        for($k = 0; $k < $operator[23]; $k++){
            //检测是否是排除的格子
            for($j = 0; $j < count($operator_atk_explode); $j++){
                if($operator_atk[0] == $operator_atk_explode[$j]) $operator_atk[3] = true;
            }
            
            if(!$operator_atk[3])
                imagerectangle ($canvas, $operator_atk[1], $operator_atk[2], $operator_atk[1]+11, $operator_atk[2]+11, $font_color_blue);
            
            //修改干员位置格子
            if($operator_atk[0] == $operator[26])
                imagefilledrectangle($canvas, $operator_atk[1], $operator_atk[2], $operator_atk[1]+11, $operator_atk[2]+11, $font_color_black);
            
            $operator_atk[3] = false;
            
            $operator_atk[1] += 15;
            $operator_atk[0]++;
        }
    
        $operator_atk[1] = 45;
        $operator_atk[2] += 15;
    }
    
    //精英前格子制作
    //当前处理的格子；格子x轴；格子y轴；是否需要排除
    $operator_atk = array(1, 45, 570, false);
    $atk_newbox = explode(",", $operator[27]);//特殊标记的格子列表
    $atk_explode = explode(",", str_replace($atk_newbox[0].",".$atk_newbox[1], "", $operator[27]));//排除的格子列表
    
    if($atk_newbox[1] != $operator[24]) $operator_atk[2] += 15;
    
    for($i = 0; $i < $atk_newbox[1]; $i++){
        //创建所有格子
        for($k = 0; $k < $atk_newbox[0]; $k++){
            //检测是否是排除的格子
            for($j = 0; $j < count($atk_explode); $j++){
                if($operator_atk[0] == $atk_explode[$j]) $operator_atk[3] = true;
            }
            
            if(!$operator_atk[3])
                imagerectangle ($canvas, $operator_atk[1], $operator_atk[2], $operator_atk[1]+11, $operator_atk[2]+11, $font_color_black);
            
            $operator_atk[3] = false;
            
            $operator_atk[1] += 15;
            $operator_atk[0]++;
        }
    
        $operator_atk[1] = 45;
        $operator_atk[2] += 15;
    }
    
}

//精英材料
for($l = 37; $l < 39; $l++){
    $operator_elitist = explode(",", $operator[$l]);
    $operator_epos = $l == 37 ? array(374, 280) : array(374, 341);

    //所需龙门币
    $operator_elitist[1] = ($operator_elitist[1] / 1000) . "k";
    imagefilledellipse ($canvas, $operator_epos[0], $operator_epos[1], 16, 16, $font_color_black);
    imagettftext ($canvas, 9, 0, $operator_epos[0]-9, $operator_epos[1]+5, $font_color_black, $font_file_bold, $operator_elitist[1]);
    imagettftext ($canvas, 9, 0, $operator_epos[0]-10, $operator_epos[1]+4, $font_color_white, $font_file_bold, $operator_elitist[1]);

    $operator_epos[0] += 28;
    $operator_epos[1] -= 7;

    for($i = 2; $i < count($operator_elitist) ; $i+=2){
        $operator_eitm = "images/materials/T1.png";
        
        if($i > 2){
            $operator_eitmt = $operator_elitist[$i] % 10;
            $operator_eitm = "images/materials/T" . $operator_eitmt . ".png";
        }
    
        //添加背景图片
        list($operator_eitm_w,$operator_eitm_h) = getimagesize($operator_eitm);
        $operator_eitmp = @imagecreatefrompng($operator_eitm);
        imagecopyresized($canvas, $operator_eitmp, $operator_epos[0], $operator_epos[1], 0, 0, 47, 47, $operator_eitm_w, $operator_eitm_h);
    
        //添加素材图片
        $operator_eitm = "images/materials/" . $operator_elitist[$i] . ".png";
        list($operator_eitm_w,$operator_eitm_h) = getimagesize($operator_eitm);
        $operator_eitmp = @imagecreatefrompng($operator_eitm);
        imagecopyresized($canvas, $operator_eitmp, $operator_epos[0], $operator_epos[1], 0, 0, 47, 47, $operator_eitm_w, $operator_eitm_h);
    
        //添加需求
        imagefilledellipse ($canvas, $operator_epos[0]+36, $operator_epos[1]+7, 16, 16, $font_color_black);
        imagettftext ($canvas, 9, 0, $operator_epos[0]+33, $operator_epos[1]+11, $font_color_white, $font_file_bold, $operator_elitist[$i+1]);
        
        $operator_epos[0] += 64;
    }
}

//潜能
$operator_poten = explode(",", $operator[28]);
imagettftext ($canvas, 12, 0, 290, 456, $font_color_black, $font_file, $operator_poten[0]);
imagettftext ($canvas, 12, 0, 290, 480, $font_color_black, $font_file, $operator_poten[1]);
imagettftext ($canvas, 12, 0, 290, 504, $font_color_black, $font_file, $operator_poten[2]);
imagettftext ($canvas, 12, 0, 460, 456, $font_color_black, $font_file, $operator_poten[3]);
imagettftext ($canvas, 12, 0, 460, 480, $font_color_black, $font_file, $operator_poten[4]);

//天赋
$operator_talent_h = 762;
for($p = 29; $p < 32; $p+=2){
    imagettftext ($canvas, 11, 0, 44, $operator_talent_h, $font_color_black, $font_file_bold, $operator[$p]);
    $operator_talent = explode(",", $operator[$p+1]);
    $operator_talent_h += 24;
    if($operator[$p+1] == "")continue;
    for($i = 0; $i < count($operator_talent); $i+=2){
        $content = $operator_talent[$i] . "  »  " . $operator_talent[$i+1];
        $content = autowrap(10, 0, $font_file, $content, 188);
        $operator_talent_array = imagettftext ($canvas, 10, 0, 44, $operator_talent_h, $font_color_black, $font_file, $content);
        $operator_talent_h = $operator_talent_array[1] + 24;
    }
    $operator_talent_h += 8;
}

//基础技能材料
$operator_epos = array(294, 528);
for($l = 0; $l < 6; $l++){
    if($l % 2 == 0){
        $operator_epos[0] = 294; $operator_epos[1] += 48;
    }else{
        $operator_epos[0] = 466; $operator_epos[1] += 6;
    }

    $operator_elitist = explode(",", $operator[39+$l]);

    if($operator[39+$l] == "")break;
    
    $operator_epos[0] += 28;
    $operator_epos[1] -= 7;

    for($i = 0; $i < count($operator_elitist) ; $i+=2){
        $operator_eitmt = $operator_elitist[$i] % 10;
        $operator_eitm = "images/materials/T" . $operator_eitmt . ".png";
            
        //添加背景图片
        list($operator_eitm_w,$operator_eitm_h) = getimagesize($operator_eitm);
        $operator_eitmp = @imagecreatefrompng($operator_eitm);
        imagecopyresized($canvas, $operator_eitmp, $operator_epos[0], $operator_epos[1], 0, 0, 33, 33, $operator_eitm_w, $operator_eitm_h);
    
        //添加素材图片
        $operator_eitm = "images/materials/" . $operator_elitist[$i] . ".png";
        list($operator_eitm_w,$operator_eitm_h) = getimagesize($operator_eitm);
        $operator_eitmp = @imagecreatefrompng($operator_eitm);
        imagecopyresized($canvas, $operator_eitmp, $operator_epos[0], $operator_epos[1], 0, 0, 33, 33, $operator_eitm_w, $operator_eitm_h);
    
        //添加需求
        imagettftext ($canvas, 10, 0, $operator_epos[0]+13, $operator_epos[1]+22, $font_color_black, $font_file_bold, $operator_elitist[$i+1]);
        imagettftext ($canvas, 10, 0, $operator_epos[0]+12, $operator_epos[1]+21, $font_color_white, $font_file_bold, $operator_elitist[$i+1]);
        
        $operator_epos[0] += 36;
    }
}

//技能
$u = 1;
$operator_epos = array(246, 762);
for($k = 45; $k < 57 ; $k+=4){
    if($operator[$k] == "")break;
    
    //制作专精列表
    for($l = 0; $l < 3; $l++){
        $operator_elitist = explode(",", $operator[$k+1+$l]);
    
        if($operator[$k+1+$l] == "")break;
    
        $operator_epos[0] += 28;
        $operator_epos[1] -= 7;
    
        for($i = 0; $i < count($operator_elitist) ; $i+=2){
            $operator_eitmt = $operator_elitist[$i] % 10;
            $operator_eitm = "images/materials/T" . $operator_eitmt . ".png";
                
            //添加背景图片
            list($operator_eitm_w,$operator_eitm_h) = getimagesize($operator_eitm);
            $operator_eitmp = @imagecreatefrompng($operator_eitm);
            imagecopyresized($canvas, $operator_eitmp, $operator_epos[0], $operator_epos[1], 0, 0, 31, 31, $operator_eitm_w, $operator_eitm_h);
        
            //添加素材图片
            $operator_eitm = "images/materials/" . $operator_elitist[$i] . ".png";
            list($operator_eitm_w,$operator_eitm_h) = getimagesize($operator_eitm);
            $operator_eitmp = @imagecreatefrompng($operator_eitm);
            imagecopyresized($canvas, $operator_eitmp, $operator_epos[0], $operator_epos[1], 0, 0, 31, 31, $operator_eitm_w, $operator_eitm_h);
        
            //添加需求
            $posxshift = strlen($operator_elitist[$i+1]) > 1 ? 8 : 12;
            imagettftext ($canvas, 10, 0, $operator_epos[0]+$posxshift, $operator_epos[1]+21, $font_color_black, $font_file_bold, $operator_elitist[$i+1]);
            imagettftext ($canvas, 10, 0, $operator_epos[0]+$posxshift-1, $operator_epos[1]+20, $font_color_white, $font_file_bold, $operator_elitist[$i+1]);
            
            $operator_epos[0] += 32;
        }
        //右侧添加方块
        if($l < 2) imagefilledrectangle($canvas, $operator_epos[0]+6, $operator_epos[1]+6, $operator_epos[0]+8, $operator_epos[1]+24, $font_color_black);
        
        $operator_epos[0] -= 8;
        $operator_epos[1] += 7;
    }
    
    $operator_epos[1] += 32;
    $operator_sklist = explode(",", $operator[$k]);
    
    //检查干员技能图片是否存在，不存在则下载文件
    $operator_sklimglist = explode(",", $operator[58]);
    if(!file_exists("./images/skills/" . $operator[1] . "_" . (string)($u) . ".png")){
        $dlink = "https://andata.somedata.top/dataX/skills/pics/skill_icon_" . $operator_sklimglist[$u-1] . ".png";
        downloadFileToLocal($dlink, "./images/skills/" . $operator[1] . "_" . (string)($u) . ".png");
    }
    
    //添加技能图片
    $operator_sitm = "images/skills/" . $operator[1] . "_" . (string)($u) . ".png";
    list($operator_sitm_w,$operator_sitm_h) = getimagesize($operator_sitm);
    $operator_si = @imagecreatefrompng($operator_sitm);
    imagecopyresized($canvas, $operator_si, 275, $operator_epos[1], 0, 0, 49, 49, $operator_sitm_w, $operator_sitm_h);
    
    //添加技力信息
    if($operator_sklist[4] == "-1 > -1") $operator_sklist[4] = "即时";
    $content = "技力  »  初始 " . $operator_sklist[2] . " | 消耗 " . $operator_sklist[3] . " | 持续 " . $operator_sklist[4];
    $content = str_replace(">", "›", $content);
    imagettftext ($canvas, 8, 0, 332, $operator_epos[1]+14, $font_color_black, $font_file, $content);
    
    //添加技能名
    $array_skl = imagettftext ($canvas, 18, 0, 332, $operator_epos[1]+42, $font_color_black, $font_file, $operator_sklist[0]);
    
    //添加技能详情
    $skill_intro = explode("#", $operator_sklist[1]);
    $content = autowrap(8, 0, $font_file, "初始 › " . $skill_intro[0], 260);
    $array_sklintro = imagettftext ($canvas, 8, 0, 332, $operator_epos[1]+68, $font_color_deepgrey, $font_file, $content);
    $content = autowrap(8, 0, $font_file, "最高 › " . $skill_intro[1], 260);
    $array_sklintro = imagettftext ($canvas, 8, 0, 332, $array_sklintro[1]+16, $font_color_black, $font_file, $content);

    //添加回复模式和触发方式
    if($operator_sklist[5] == 1){
        imagefilledrectangle($canvas, 275, $operator_epos[1]+54, 324, $operator_epos[1]+70, $font_color_green);
        $operator_sklist[5] = "自动回复";
    }
    if($operator_sklist[5] == 2){
        imagefilledrectangle($canvas, 275, $operator_epos[1]+54, 324, $operator_epos[1]+70, $font_color_red);
        $operator_sklist[5] = "攻击回复";
    }
    if($operator_sklist[5] == 4){
        imagefilledrectangle($canvas, 275, $operator_epos[1]+54, 324, $operator_epos[1]+70, $font_color_yellow);
        $operator_sklist[5] = "受击回复";
    }
    if($operator_sklist[5] == 8){
        imagefilledrectangle($canvas, 275, $operator_epos[1]+54, 324, $operator_epos[1]+70, $font_color_grey);
        $operator_sklist[5] = "立即生效";
    }
    
    if($operator_sklist[6] == 0)$operator_sklist[6] = "　被动";
    if($operator_sklist[6] == 1)$operator_sklist[6] = "手动触发";
    if($operator_sklist[6] == 2)$operator_sklist[6] = "自动触发";
    
    imagefilledrectangle($canvas, 275, $operator_epos[1]+77, 324, $operator_epos[1]+93, $font_color_grey);
    imagettftext ($canvas, 9, 0, 276, $operator_epos[1]+67, $font_color_white, $font_file, $operator_sklist[5]);
    imagettftext ($canvas, 9, 0, 276, $operator_epos[1]+90, $font_color_white, $font_file, $operator_sklist[6]);
    
    $u++;
    $operator_epos[0] = 246;
    $operator_epos[1] = $array_sklintro[1] + 40;
    if($u == 3)$operator_epos[1] -= 0;
}

//基建技能
$operator_talent = explode(",", $operator[34]);
imagettftext ($canvas, 11, 0, 44, 1236, $font_color_black, $font_file_bold, $operator[33] . "（" . $operator_talent[0] . "）");
$operator_talent_h = 1258;
$content = autowrap(10, 0, $font_file, $operator_talent[1], 188);
$operator_talent_array = imagettftext ($canvas, 10, 0, 44, $operator_talent_h, $font_color_black, $font_file, $content);
$operator_talent_h = $operator_talent_array[1] + 32;

if($operator[35] != ""){
    $operator_talent = explode(",", $operator[36]);
    imagettftext ($canvas, 11, 0, 44, $operator_talent_h, $font_color_black, $font_file_bold, $operator[35] . "（" . $operator_talent[0] . "）");
    $operator_talent_h += 22;
    $content = autowrap(10, 0, $font_file, $operator_talent[1], 188);
    $operator_talent_array = imagettftext ($canvas, 10, 0, 44, $operator_talent_h, $font_color_black, $font_file, $content);
}


imagepng($canvas);
imagedestroy($canvas);
}

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