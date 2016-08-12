<?php

namespace Department;

use Core\Net\Curl;

class DepartmentAPI {
    
    //创建部门（POST）   
	private  $departmentCreateURL = "https://qyapi.weixin.qq.com/cgi-bin/department/create?access_token=ACCESS_TOKEN";  
	//更新部门（POST）   
	private  $departmentUpdateURL = "https://qyapi.weixin.qq.com/cgi-bin/department/update?access_token=ACCESS_TOKEN";  
	//删除部门（GET）   
	private  $departmentDeleteURL = "https://qyapi.weixin.qq.com/cgi-bin/department/delete?access_token=ACCESS_TOKEN&id=ID";  
	//获取部门列表（GET）   [获取特定部门]
	private  $departmentListByIdURL = "https://qyapi.weixin.qq.com/cgi-bin/department/list?access_token=ACCESS_TOKEN&id=ID";  
	//获取部门（GET）   [获取全部组织机构]
	private  $departmentListURL = "https://qyapi.weixin.qq.com/cgi-bin/department/list?access_token=ACCESS_TOKEN"; 
	
	private $_curl = '';
	
	function __construct(){
	    $this->_curl = new Curl();
	}
	
    /***
     * 创建部门
     * @param array $department
     * @param string $accessToken
     * @author sunny5156<137898350@qq.com>
     * @version 
     * @todo  2016年8月11日 下午4:06:45
     */
	public function createDepartment($department = array(),$accessToken){
	    $res = '';
	    try{
	        $this->departmentCreateURL = str_replace('ACCESS_TOKEN', $accessToken, $this->departmentCreateURL);
            $res = $this->_curl->post($this->departmentCreateURL, json_encode($department,JSON_UNESCAPED_UNICODE));	        
	        
	        $res = json_decode($res,true);
	    }catch (\Exception $e){
	       //@todo 
	    }
	    
	    return $res;
	}
	/**
	 * 更新部门
	 * @param array $department
	 * @param string $accessToken
	 * @author sunny5156<137898350@qq.com>
	 * @version 
	 * @todo  2016年8月11日 下午4:09:36
	 */
	public function updateDepartment($department = array(),$accessToken){
	    $res = '';
	    
	    try{
	        $this->departmentUpdateURL = str_replace('ACCESS_TOKEN', $accessToken, $this->departmentUpdateURL);
	        $res = $this->_curl->post($this->departmentUpdateURL, json_encode($department,JSON_UNESCAPED_UNICODE));
	         
	        $res = json_decode($res,true);
	    }catch (\Exception $e){
	        //@todo
	    }
	     
	    return $res;
	}
	/**
	 * 删除部门
	 * @param unknown $departmentId
	 * @param string $accessToken
	 * @author sunny5156<137898350@qq.com>
	 * @version 
	 * @todo  2016年8月11日 下午4:09:49
	 */
	public function deleteDepartment($departmentId ,$accessToken){
	    $res = '';
	    try{
	        $this->departmentDeleteURL = str_replace('ACCESS_TOKEN', $accessToken, $this->departmentDeleteURL);
	        $this->departmentDeleteURL = str_replace('ID', $departmentId, $this->departmentDeleteURL);
	        $res = $this->_curl->get($this->departmentDeleteURL);
	    
	        $res = json_decode($res,true);
	    }catch (\Exception $e){
	        //@todo
	    }
	    return $res;
	}
	/**
	 * 获取指定部门下的子部门
	 * @param unknown $departmentId
	 * @param unknown $accessToken
	 * @author sunny5156<137898350@qq.com>
	 * @version 
	 * @todo  2016年8月11日 下午4:10:09
	 */
	public function getDepartmentListById($departmentId , $accessToken){
	    $res = array();
	    
	    try{
	        $this->departmentListByIdURL = str_replace('ACCESS_TOKEN', $accessToken, $this->departmentListByIdURL);
	        $this->departmentListByIdURL = str_replace('ID', $departmentId, $this->departmentListByIdURL);
	        $res = $this->_curl->get($this->departmentListByIdURL);
	         
	        $res = json_decode($res,true);
	    }catch (\Exception $e){
	        //@todo
	    }
	     
	    return $res;
	}
	/**
	 * 获取所有部门
	 * @param unknown $accessToken
	 * @author sunny5156<137898350@qq.com>
	 * @version 
	 * @todo  2016年8月11日 下午4:10:21
	 */
	public function getDepartmentList($accessToken){
	    $res = array();
	    try{
	        $this->departmentListURL = str_replace('ACCESS_TOKEN', $accessToken, $this->departmentListURL);
	        $res = $this->_curl->get($this->departmentListURL);
	         
	        $res = json_decode($res,true);
	    }catch (\Exception $e){
	        //@todo
	    }
	     
	    return $res;
	}
	
    
}