<?php
include '../Core/functions.php';

include '../Core/Net/Curl.php';
include '../Base/AccessTokenAPI.php';
include '../Department/DepartmentAPI.php';
include '../Menu/MenuAPI.php';
include '../User/UserAPI.php';
include '../Media/MediaAPI.php';



use Base\AccessTokenAPI;


use Department\DepartmentAPI;
use Menu\MenuAPI;
use User\UserAPI;
use Media\MediaAPI;



$AccessToken = new AccessTokenAPI();

$corpID = 'wx717d5ec652907c98';

$secret = "qCotkMdaqhNNI-6K-i7QXxCmGD7AsMt3eZE5BZ9O4Wx0_3jde3ZlmCV-wA1-Ya4j";


$token = $AccessToken->getAccessToken($corpID, $secret);

//$token = 'aFCCQnPskfmA7aNh-bZ12tRnYbswnKqCmp7P6HR2M1IQO7nPojmY_Y4qQ1jG5efY';

//debug($token,0);

 $Department = new DepartmentAPI();

$res = $Department->createDepartment(array("name"=>"设计部","parentid"=>5,"order"=>1),$token);

debug($res,0);

$res = $Department->getDepartmentList($token);

debug($res,0);

$res = $Department->getDepartmentListById(5,$token);

debug($res,0);

$menu = new MenuAPI();

$data = [
   "button"=>[
       [	
           "type"=>"view",
           "name"=>"请假",
           "url"=>"http://www.xalesoft.com"
       ],
       [
           "name"=>"菜单",
           "sub_button"=>[
               [
                   "type"=>"view",
                   "name"=>"搜索",
                   "url"=>"http://www.baidu.com/"
               ],
               [
                   "type"=>"pic_photo_or_album",
                   "name"=>"发图",
                   "key"=>"V1001_GOOD"
               ]
           ]
      ]
   ]
];

//$res = $menu->createMenu($data ,7, $token);

//获取菜单
//$res = $menu->getMenuList( 7, $token);

//debug($res); 


//用户
$user = 
[
    "userid"=> "wangfeng",
    "name"=> "汪峰",
    "department"=> [1, 2],
    "position"=>"产品经理",
    "mobile"=> "18913215421",
    "gender"=> "1",
    "email"=> "wangfeng@gzdev.com",
    "extattr"=> ["attrs"=>["name"=>"爱好","value"=>"旅游"],["name"=>"卡号","value"=>"1234567234"]]
];

//$userAPI = new UserAPI();

//$res = $userAPI->createUser($user, $token);
//$res = $userAPI->updateUser($user, $token);
 //$res = $userAPI->getUserDetail('wangfeng', $token);
//$res = $userAPI->getDepartmentUserList(1, $token,1,0);
// $res = $userAPI->getDepartmentUserDetailList(1, $token,1,0);


//debug($res);

//素材

$mediaAPI = new MediaAPI();

//$res = $mediaAPI->getTempMediaDetail("1b7640VH7XDODJhBIHpZpJSKewTMbXLtDJ551tLh4gWvUDHmeIEJEOOUHEFAaSxf_KwYssclRWtrSZdbZFTuXEQ", $token);

//debug($res);

//echo $res;

//echo "<img src='".$res."'>";


?>

<!-- <form method="post" action="https://qyapi.weixin.qq.com/cgi-bin/media/upload?access_token=<?php echo $token?>&type=image" enctype="multipart/form-data"> 
<input type="file" name="media">
<button type="submit">上传</button>
</form> -->


