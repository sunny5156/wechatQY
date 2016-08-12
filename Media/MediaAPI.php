<?php

namespace Media;

use Core\Net\Curl;
/**
 * 素材
 * @author sunny5156 <137898350@qq.com>
 * @version
 */
class MediaAPI{
    
    //上传临时素材
    private $mediaTempUploadURL = "https://qyapi.weixin.qq.com/cgi-bin/material/add_mpnews?access_token=ACCESS_TOKEN";
    
    //获取临时素材
    private $mediaTempDetialURL = "https://qyapi.weixin.qq.com/cgi-bin/media/get?access_token=ACCESS_TOKEN&media_id=MEDIA_ID";
    
    //上传永久素材
    private $mediaUploadURL = "https://qyapi.weixin.qq.com/cgi-bin/material/add_mpnews?access_token=ACCESS_TOKEN";
    
    //获取永久素材
    private $mediaDetailURL = "https://qyapi.weixin.qq.com/cgi-bin/material/get?access_token=ACCESS_TOKEN&media_id=MEDIA_ID&agentid=AGENTID";
    
    //删除永久素材
    private $mediaDeleteURL = "https://qyapi.weixin.qq.com/cgi-bin/material/del?access_token=ACCESS_TOKEN&agentid=AGENTID&media_id=MEDIA_ID";
    
    //修改永久素材
    private $mediaUpdateURL = "https://qyapi.weixin.qq.com/cgi-bin/material/update_mpnews?access_token=ACCESS_TOKEN";
    
    //获取素材总数
    private $mediaGetCountURL = "https://qyapi.weixin.qq.com/cgi-bin/material/get_count?access_token=ACCESS_TOKEN&agentid=AGENTID";
    
    //获取素材类表
    private $mediaGetListURL = "https://qyapi.weixin.qq.com/cgi-bin/material/batchget?access_token=ACCESS_TOKEN";
    
    private $_curl = '';
    
    public function __construct(){
        $this->_curl = new Curl();
    }
    
    public function uploadTempMedia(){
        
    }
    
    
   
    
}