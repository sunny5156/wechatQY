<?php
namespace Menu;

use Core\Net\Curl;

/**
 * 自定义菜单
 * @author sunny5156 <137898350@qq.com>
 * @version
 */
class MenuAPI{
    
    
    //创建应用菜单（POST）
    private $menuCreateURL = "https://qyapi.weixin.qq.com/cgi-bin/menu/create?access_token=ACCESS_TOKEN&agentid=AGENTID";
    //删除菜单（GET）
    private $menuDeleteURL = "https://qyapi.weixin.qq.com/cgi-bin/menu/delete?access_token=ACCESS_TOKEN&agentid=AGENTID";
    //获取菜单列表（GET）
    private $menuGetURL = "https://qyapi.weixin.qq.com/cgi-bin/menu/get?access_token=ACCESS_TOKEN&agentid=AGENTID";
    
    private $_curl = '';
    
    public function __construct(){
        $this->_curl = new Curl();
    }
    /**
     * 创建菜单
     * @param array $menu
     * @param int $appId
     * @param string $accessToken
     * @author sunny5156<137898350@qq.com>
     * @version 
     * @todo  2016年8月11日 下午5:45:09
     */
    public function createMenu($menu,$appId,$accessToken){
        $res = '';
        try{
            
            $this->menuCreateURL = str_replace('ACCESS_TOKEN', $accessToken, $this->menuCreateURL);
            $this->menuCreateURL = str_replace('AGENTID', $appId, $this->menuCreateURL);
            
            $res = $this->_curl->post($this->menuCreateURL, json_encode($menu,JSON_UNESCAPED_UNICODE));
            
            $res = json_decode($res,true);
            
        }catch (\Exception $e){
            //
        }
        
        return $res;
    }
    
    /**
     * 删除应用菜单
     * @param int $appId
     * @param string $accessToken
     * @author sunny5156<137898350@qq.com>
     * @version 
     * @todo  2016年8月12日 下午1:56:05
     */
    public function deleteMenu($appId,$accessToken){
        $res = '';
        try{
        
            $this->menuDeleteURL = str_replace('ACCESS_TOKEN', $accessToken, $this->menuDeleteURL);
            $this->menuDeleteURL = str_replace('AGENTID', $appId, $this->menuDeleteURL);
        
            $res = $this->_curl->get($this->menuDeleteURL);
        
            $res = json_decode($res,true);
        
        }catch (\Exception $e){
            //
        }
        
        return $res;
    }
    
    /**
     * 获取菜单列表
     * @param int $appId
     * @param string $accessToken
     * @return mixed
     * @author sunny5156<137898350@qq.com>
     * @version 
     * @todo  2016年8月12日 下午1:57:23
     */
    public function getMenuList($appId,$accessToken){
        $res = '';
        try{
        
            $this->menuGetURL = str_replace('ACCESS_TOKEN', $accessToken, $this->menuGetURL);
            $this->menuGetURL = str_replace('AGENTID', $appId, $this->menuGetURL);
        
            $res = $this->_curl->get($this->menuGetURL);
        
            $res = json_decode($res,true);
        
        }catch (\Exception $e){
            //
        }
        
        return $res;
    }


}