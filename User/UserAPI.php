<?php
namespace User;

use Core\Net\Curl;

class UserAPI{
    
    
    //1 创建成员
    private $userCreateURL = "https://qyapi.weixin.qq.com/cgi-bin/user/create?access_token=ACCESS_TOKEN";
    //2 更新成员
    private $userUpdateURL = "https://qyapi.weixin.qq.com/cgi-bin/user/update?access_token=ACCESS_TOKEN";
    //3 删除成员
    private $userDeleteURL = "https://qyapi.weixin.qq.com/cgi-bin/user/delete?access_token=ACCESS_TOKEN&userid=USERID";
    //4 批量删除成员
    private $userDeleteAllURL = "https://qyapi.weixin.qq.com/cgi-bin/user/batchdelete?access_token=ACCESS_TOKEN";
    //5 获取成员详情
    private $userGetByUseridURL = "https://qyapi.weixin.qq.com/cgi-bin/user/get?access_token=ACCESS_TOKEN&userid=USERID";
    //6 获取部门下的成员
    private $userGetDepAllURL = "https://qyapi.weixin.qq.com/cgi-bin/user/simplelist?access_token=ACCESS_TOKEN&department_id=DEPARTMENT_ID&fetch_child=FETCH_CHILD&status=STATUS";
    //7 获取部门成员(详情)
    private $userGetDetailURL = "https://qyapi.weixin.qq.com/cgi-bin/user/list?access_token=ACCESS_TOKEN&department_id=DEPARTMENT_ID&fetch_child=FETCH_CHILD&status=STATUS";
    
    private $_curl = '' ;
    
    
    public function __construct(){
        $this->_curl = new Curl();
    }
    
    /**
     * 创建用户
     * @param array||mixed $user
     * @param string $accessToken
     * @return mixed
     * @author sunny5156<137898350@qq.com>
     * @version 
     * @todo  2016年8月12日 下午2:12:04
     */
    public function createUser($user , $accessToken){
        
        try {
            
            $this->userCreateURL = str_replace('ACCESS_TOKEN', $accessToken , $this->userCreateURL);
            
            $res = $this->_curl->post($this->userCreateURL, json_encode($user,JSON_UNESCAPED_UNICODE));
            
            $res = json_decode($res,true);
            
        }catch (\Exception $e){
            
        }
        
        return $res;
    }
    /**
     * 更新用户
     * @param array $user
     * @param string $accessToken
     * @author sunny5156<137898350@qq.com>
     * @version 
     * @todo  2016年8月12日 下午2:13:22
     */
    public function updateUser($user , $accessToken){
        try {
        
            $this->userUpdateURL = str_replace('ACCESS_TOKEN', $accessToken , $this->userUpdateURL);
        
            $res = $this->_curl->post($this->userUpdateURL, json_encode($user,JSON_UNESCAPED_UNICODE));
        
            $res = json_decode($res,true);
        
        }catch (\Exception $e){
            //
        }
        
        return $res;
    }
    /**
     * 删除用户
     * @param int $userId
     * @param string $accessToken
     * @author sunny5156<137898350@qq.com>
     * @version 
     * @todo  2016年8月12日 下午2:17:06
     */
    public function deleteUser($userId , $accessToken){
        try {
        
            $this->userDeleteURL= str_replace('ACCESS_TOKEN', $accessToken , $this->userDeleteURL);
            $this->userDeleteURL= str_replace('USERID', $userId , $this->userDeleteURL);
        
            $res = $this->_curl->get($this->userDeleteURL);
        
            $res = json_decode($res,true);
        
        }catch (\Exception $e){
            //
        }
        
        return $res;
    }
    /**
     * 批量删除用户
     * @param array $userIdList
     * @param string $accessToken
     * @author sunny5156<137898350@qq.com>
     * @version 
     * @todo  2016年8月12日 下午2:20:44
     */
    public function deleteAllUser($userIdList , $accessToken){
        try {
        
            $this->userDeleteAllURL = str_replace('ACCESS_TOKEN', $accessToken , $this->userDeleteAllURL);
        
            $res = $this->_curl->post($this->userDeleteAllURL, json_encode(array('useridlist'=>$userIdList),JSON_UNESCAPED_UNICODE));
        
            $res = json_decode($res,true);
        
        }catch (\Exception $e){
            //
        }
        
        return $res;
    }
    /**
     * 获取用户详情信息
     * @param int $userId
     * @param string $accessToken
     * @author sunny5156<137898350@qq.com>
     * @version 
     * @todo  2016年8月12日 下午2:24:22
     */
    public function getUserDetail($userId , $accessToken){
        try {
        
            $this->userGetByUseridURL= str_replace('ACCESS_TOKEN', $accessToken , $this->userGetByUseridURL);
            $this->userGetByUseridURL= str_replace('USERID', $userId , $this->userGetByUseridURL);
        
            $res = $this->_curl->get($this->userGetByUseridURL);
        
            $res = json_decode($res,true);
        
        }catch (\Exception $e){
            //
        }
        
        return $res;
    }
    /**
     * 获取部门下用户列表
     * @param int $departmentId
     * @param string $accessToken
     * @param number $fetchChild (1/0：是否递归获取子部门下面的成员)
     * @param number $status (0获取全部成员，1获取已关注成员列表，2获取禁用成员列表，4获取未关注成员列表。status可叠加,未填写则默认为4)
     * @author sunny5156<137898350@qq.com>
     * @version 
     * @todo  2016年8月12日 下午2:49:25
     */
    public function getDepartmentUserList($departmentId , $accessToken , $fetchChild = 0,$status = 0){
        try {
        
            $this->userGetDepAllURL= str_replace('ACCESS_TOKEN', $accessToken , $this->userGetDepAllURL);
            $this->userGetDepAllURL= str_replace('DEPARTMENT_ID', $departmentId , $this->userGetDepAllURL);
            $this->userGetDepAllURL= str_replace('FETCH_CHILD', $fetchChild , $this->userGetDepAllURL);
            $this->userGetDepAllURL= str_replace('STATUS', $status , $this->userGetDepAllURL);
        
            $res = $this->_curl->get($this->userGetDepAllURL);
        
            $res = json_decode($res,true);
        
        }catch (\Exception $e){
            //
        }
        
        return $res;
    }
    
    public function getDepartmentUserDetailList($departmentId , $accessToken , $fetchChild = 0,$status = 0){
        try {
        
            $this->userGetDetailURL= str_replace('ACCESS_TOKEN', $accessToken , $this->userGetDetailURL);
            $this->userGetDetailURL= str_replace('DEPARTMENT_ID', $departmentId , $this->userGetDetailURL);
            $this->userGetDetailURL= str_replace('FETCH_CHILD', $fetchChild , $this->userGetDetailURL);
            $this->userGetDetailURL= str_replace('STATUS', $status , $this->userGetDetailURL);
        
            $res = $this->_curl->get($this->userGetDetailURL);
        
            $res = json_decode($res,true);
        
        }catch (\Exception $e){
            //
        }
        
        return $res;
    }

}