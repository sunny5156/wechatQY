<?php
namespace User;

use Core\Net\Curl;

class User{
    
    
    //1 创建成员
    private $userCreateURL = "https://qyapi.weixin.qq.com/cgi-bin/user/create?access_token=ACCESS_TOKEN";
    //2 更新成员
    private $userUpdateURL = "https://qyapi.weixin.qq.com/cgi-bin/user/update?access_token=ACCESS_TOKEN";
    //3 删除成员
    private $userDeleteURL = "https://qyapi.weixin.qq.com/cgi-bin/user/delete?access_token=ACCESS_TOKEN&userid=USERID";
    //4 批量删除成员
    private $userDeleteAllURL = "https://qyapi.weixin.qq.com/cgi-bin/user/batchdelete?access_token=ACCESS_TOKEN";
    //5 获取成员
    private $userGetByUseridURL = "https://qyapi.weixin.qq.com/cgi-bin/user/get?access_token=ACCESS_TOKEN&userid=USERID";
    //6 获取部门下的成员
    private $userGetDepAllURL = "https://qyapi.weixin.qq.com/cgi-bin/user/simplelist?access_token=ACCESS_TOKEN&department_id=DEPARTMENT_ID&fetch_child=FETCH_CHILD&status=STATUS";
    //7 获取部门成员(详情)
    private $userGetDetailURL = "https://qyapi.weixin.qq.com/cgi-bin/user/list?access_token=ACCESS_TOKEN&department_id=DEPARTMENT_ID&fetch_child=FETCH_CHILD&status=STATUS";
    
    
    
    private $_curl = '' ;
    
    
    public function __construct(){
        $this->_curl = new Curl();
    }
    
    public function createUser($user , $accessToken){
        
        try {
            
            $this->userCreateURL = str_replace('ACCESS_TOKEN', $accessToken , $this->userCreateURL);
            
            $res = $this->_curl->post($this->userCreateURL, json_encode($user));
            
            $res = json_decode($res,true);
            
        }catch (\Exception $e){
            
        }
        
        return $res;
    }
    
    public function updateUser($user , $accessToken){
        try {
        
            $this->userUpdateURL = str_replace('ACCESS_TOKEN', $accessToken , $this->userUpdateURL);
        
            $res = $this->_curl->post($this->userUpdateURL, json_encode($user));
        
            $res = json_decode($res,true);
        
        }catch (\Exception $e){
        
        }
        
        return $res;
    }

}