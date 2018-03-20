<?php
//对$string内容防止xss攻击
//把$string中的非法标签内容都给过滤掉
function fanXSS($string)
{
    require_once './Common/Plugin/htmlpurifier/HTMLPurifier.auto.php';
    // 生成配置对象
    $cfg = HTMLPurifier_Config::createDefault();
    // 以下就是配置：
    $cfg->set('Core.Encoding', 'UTF-8');
    // 设置允许使用的HTML标签
    $cfg->set('HTML.Allowed','div,b,strong,i,em,a[href|title],ul,ol,li,br,span[style],img[width|height|alt|src]');
    // 设置允许出现的CSS样式属性
    $cfg->set('CSS.AllowedProperties', 'font,font-size,font-weight,font-style,font-family,text-decoration,padding-left,color,background-color,text-align');
    // 设置a标签上是否允许使用target="_blank"
    $cfg->set('HTML.TargetBlank', TRUE);
    // 清除空标签    
    $cfg->set('AutoFormat.RemoveEmpty', true);
    // 使用配置生成过滤用的对象
    $obj = new HTMLPurifier($cfg);
    //过滤字符串
    return $obj->purify($string);
}

function sendTemplateSMS($to, $datas, $tempId)
{
	  require_once('./Common/Plugin/message/CCPRestSmsSDK.php');
	  global $accountSid,$accountToken,$appId,$serverIP,$serverPort,$softVersion;
	  $softVersion='2013-12-26';
	  $serverPort='8883';
	  $serverIP='sandboxapp.cloopen.com';
	  $accountToken= '44b8330105db412fb68053695977f092';
	  $accountSid= '8a216da85e6fff2b015e7a3e06230718';
	  $appId='8a216da85e6fff2b015e7a3e0793071e';
	  $rest = new REST($serverIP,$serverPort,$softVersion);
	  $rest->setAccount($accountSid,$accountToken);
	  $rest->setAppId($appId);
	  $result = $rest->sendTemplateSMS($to, $datas, $tempId);
		if($result == NULL ) 
		{
			$array['status'] = 404;
      $array['msg'] = "request verify code error";
      $array['data'] = $result;
      echo json_encode($array, JSON_UNESCAPED_SLASHES);
    	exit; 
	  }
	  if($result->statusCode != 0) 
	  {
	  	$array['status'] = "300";
      $array['msg'] = $result->statusMsg;
      echo json_encode($array, JSON_UNESCAPED_SLASHES);
    	exit;   
	  }
		else
		{
			$smsmessage = $result->TemplateSMS;
			$array['status'] = 200;
      $array['msg'] = $smsmessage->dateCreated;
      $array['data'] = $smsmessage->smsMessageSid;
      echo json_encode($array, JSON_UNESCAPED_SLASHES);
    	exit;  
	  }
} 

//从二维数组$arr中把$field字段内容获得出来拼装为字符串返回
function arrayToString($arr,$field)
{
  $s = array();
  foreach($arr as $k => $v)
  {
    $s[] = $v[$field];
  }
  return implode(',',$s);
}



