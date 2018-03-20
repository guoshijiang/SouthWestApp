//实现短信发送验证码
<?php
	function sendTemplateSMS($to, $datas, $tempId)
	{
	   $userphone1 =session('userphone1');
	   $userphone2 =session('userphone2');
	   $userphone3 =session('userphone3');
	   if($to==$userphone1 || $to==$userphone2 ||$to==$userphone3)
	   {
	      require_once('./Common/Plugin/message/CCPRestSmsSDK.php');
	      $accountSid= '8a216da85e6fff2b015e7a3e06230718';
	      $accountToken= '44b8330105db412fb68053695977f092';
	      $appId='8a216da85e6fff2b015e7a3e0793071e';
	      $serverIP='app.cloopen.com';
	      $serverPort='8883';
	      $softVersion='2013-12-26';
	         
	      //初始化REST SDK
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
		    //发送模板短信
		    echo "Sending TemplateSMS to $to <br/>";
		    $result = $rest->sendTemplateSMS($to, $datas, $tempId);
		    if($result == NULL )
		    {
		       echo "result error!";
		       break;
		    }
		    if($result->statusCode!=0) 
		    {
		       echo "error code :" . $result->statusCode . "<br>";
		       echo "error msg :" . $result->statusMsg . "<br>";
		    }
		    else
		   {
	       	echo "Sendind TemplateSMS success!<br/>";
	        $smsmessage = $result->TemplateSMS;
	        echo "dateCreated:".$smsmessage->dateCreated."<br/>";
	        echo "smsMessageSid:".$smsmessage->smsMessageSid."<br/>";
		   }
	  }
	} 