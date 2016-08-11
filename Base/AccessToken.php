<?php
/**
 * 获取Token
 * @author sunny5156 <137898350@qq.com>
 * @version
 */
namespace Base;

use Core\Net\Curl;

class AccessToken {
    
    //请求地址
    public $accessTokenURL = "https://qyapi.weixin.qq.com/cgi-bin/gettoken?corpid=CorpID&corpsecret=SECRET";
    private $_curl = '';
    
    public function __construct(){
        $this->_curl = new Curl();
    }
    
    /**
     * 获取token
     * @param string $corpID
     * @param string $secret
     * @return string
     * @author sunny5156<137898350@qq.com>
     * @version 
     * @todo  2016年8月11日 下午3:42:26
     */
    public function getAccessToken($corpID ,$secret){
        $accessToken = '';
        
        if(empty($corpID)){
            
        }
        
        if(empty($secret)){
            
        }
        
        $this->accessTokenURL = str_replace('CorpID', $corpID, $this->accessTokenURL);
        $this->accessTokenURL = str_replace('SECRET', $secret, $this->accessTokenURL);
        
        try {
            $res = $this->_curl->get($this->accessTokenURL);
            
            $res = json_decode($res,true);
            
            $accessToken = $res['access_token'];
            
        }catch (\Exception $e){
            
        }
        
        return $accessToken;
    }
    
}