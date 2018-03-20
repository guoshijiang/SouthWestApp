<?php
namespace Home\Controller;
use Tools\HomeController;
class UserController extends HomeController
{
	//登录接口
  public function login($phone = null, $password = null)
  {
    $User = D('User');
    if($phone == null || $password == null) 
    {
      $array['status'] = 400;
      $array['msg'] = "error";  
      echo json_encode($array, JSON_UNESCAPED_SLASHES);
      exit;
    }
    if($result = $User -> checkPhonePassword($phone, $password)) 
    {
      $data['loginip'] = get_client_ip();
      $data['logintime'] = date('Y-m-d H:i:s',time());
      $User -> where('user_id='.$result['user_id']) -> save($data); 
      $token = $User -> createToken($result); 
      $UserInfo = $User -> where('user_id='.$result['user_id'])
      	 -> field('user_id, username, user_pho, token')
      	 -> select();
      	 
      $cosSerinfo = D('Costumservice')->field('cos_phone')
        ->order('upd_time desc')->limit(3)->select();
      
      $output = array
		   (
		    	'status' => 200, 
		    	'msg' => 'success', 
		    	'data' => array
		    	( 	
		    		 'user_id'  => $UserInfo[0]['user_id'],
		    		 'username' => $UserInfo[0]['username'],
		    		 'user_pho' => $UserInfo[0]['user_pho'],
		    		 'token'    => $UserInfo[0]['token'],
					 	 cosSerinfo => $cosSerinfo,      			 	 
		      ), 
			 );
		  echo json_encode($output, JSON_UNESCAPED_SLASHES);
			exit;
    }
    else
    {
      $array['status'] = 500;
      $array['msg'] = "error";
      echo json_encode($array, JSON_UNESCAPED_SLASHES);
      exit;
    }
  }
  
  //注册接口
  public function register()
  {
		 $User     =    D('User'); 
		 $username =    I('get.username'); 
     $phone    =    I('get.phone');
     $password =    I('get.password');
     $result   = $User->create();
     if (!$result)
     {
       $array['status'] = 200;
       $array['msg'] = $User->getError();
       echo json_encode($array, JSON_UNESCAPED_SLASHES);
       exit;
     } 
     else 
     {
       $User -> loginip = get_client_ip();
       $User -> regtime = date('Y-m-d H:i:s',time());
       $data['user_id'] = $User -> add();  
       $data['logintime'] = date('Y-m-d H:i:s',time());
       $token = $User -> createToken($data); 
       $array['token'] = $token;
       $output = array
       (
      	 'status' => 200, 
      	 'msg' => 'success', 
      	 'data' => array
      	 ( 
       		token => $token,
         ), 
       );
       echo json_encode($output, JSON_UNESCAPED_SLASHES);
       exit;
     }
  }
  
  //验证码注册接口
  public function registerPhone()
  {
  	if(IS_POST)
    {
	  	$User = D('User'); 
	    $begin = session('begintime');
	    $end   = time();
	    $ss    = $end - $begin;  
	    $sendyzm  = session('verifyCode'); 
	    if($ss > 72000)
	    {
	       unset($_SESSION['begintime']);
	    } 
	    if($ss > 420)
	    {
	    	$registerInfo = D('Vcode')->where(array('phone'=>$phone))->delete();
	      unset($_SESSION['verifyCode']);
	    }
	    $username = I('post.username');
	    $phone = I('post.phone');
	    $user_email = I('post.user_email');
	    $pwd_one = I('post.pwd_one');
	    $pwd_two = I('post.pwd_two');
	    $chknumber =I('post.chknumber');
	    if($username == null || $phone == null || $user_email == null ||
	     		$pwd_one == null  || $pwd_two == null || $chknumber == null)
	    {
	     		$array['status'] = 401;
		      $array['msg'] = "client error, params can not null";
		      echo json_encode($array, JSON_UNESCAPED_SLASHES);
		      exit;   
	    }  
	    $user = D('User')->field('username')->select();
	    $sum = '';
	    $count = count($user);
	    for($i = 0; $i < $count; $i++)
	    {
	      	$sum .= $user[$i]['username'].',';
	    }
	    $sum = rtrim($sum, ",");       
	    if(strpos($sum, $username) !== false)
	    { 
	       	$array['status'] = 402;
			    $array['msg'] = "This UserName Is Already Rigster";
			    echo json_encode($array, JSON_UNESCAPED_SLASHES);
			    exit; 
	    } 
	      
	    if(preg_match("/^1[34578]{1}\d{9}$/", $phone))
	    {
      	$user = D('User')->field('phone')->select();
        $sum = '';
        $count = count($user);
        for($i = 0; $i < $count; $i++)
        {
        	$sum .= $user[$i]['phone'].',';
        }
        $sum = rtrim($sum, ",");       
        if(strpos($sum, $phone) !== false)
        { 
         	$array['status'] = 405;
			    $array['msg'] = "Phone Number Is Already Rigster";
			    echo json_encode($array, JSON_UNESCAPED_SLASHES);
			    exit; 
        } 
        $pattern = "/^([0-9A-Za-z\\-_\\.]+)@([0-9a-z]+\\.[a-z]{2,3}(\\.[a-z]{2})?)$/i";
        if (preg_match( $pattern, $user_email))
        {
        	if($pwd_one === $pwd_two)
        	{
        		 $vcodeRet = D('Vcode')->field('code_number')->select();
        		 $total = '';
        		 $countNum = count($vcodeRet);
		         for($j = 0; $j < $countNum; $j++)
		         {
		        		$total .= $vcodeRet[$j]['code_number'].',';
		         }
		         $total = rtrim($total, ",");  
		         
        	 	 if(strpos($total, $chknumber) !== false)
        	 	 {        	 	 	 
			      	 $User->username = $username;
			      	 $User->user_pho = './Userphoimgs/login-user.png';
			      	 $User->phone = $phone;
			      	 $User->user_email = $user_email;
			      	 $User->password = md5($pwd_one);  	 
				       $User->loginip = get_client_ip();
				       $User->regtime = date('Y-m-d H:i:s',time());
				       $data['user_id'] = $User -> add();  
				       $data['logintime'] = date('Y-m-d H:i:s',time());
				       $token = $User->createToken($data); 
				       $array['token'] = $token;
				       $output = array
				       (
				      	 'status' => 200, 
				      	 'msg' => 'success', 
				      	 'data' => array
				      	 ( 
				       		 token => $token,
				         ), 
				       );
				       echo json_encode($output, JSON_UNESCAPED_SLASHES);
				       $registerInfo = D('Vcode')->where(array('phone' => $phone))->delete();
				       exit;			      
        	 	 }
        	 	 else
        	 	 {
        	 	 	 $array['status'] = 403;
				       $array['msg'] = "Input Verify Code Is Wrong";
				       echo json_encode($array, JSON_UNESCAPED_SLASHES);
				       exit;
        	 	 }        	 	 
        	}
        	else
        	{
        		$array['status'] = 404;
			      $array['msg'] = "twice password is different";
			      echo json_encode($array, JSON_UNESCAPED_SLASHES);
			      exit;       		
        	}
        }
        else
        {
        	$array['status'] = 407;
	        $array['msg'] = "Email is not match rules";
	        echo json_encode($array, JSON_UNESCAPED_SLASHES);
	        exit;
        }       
	    }
	    else
	    {
		    $array['status'] = 406;
		    $array['msg'] = "Input phone Number is match rules";
		    echo json_encode($array, JSON_UNESCAPED_SLASHES);
		    exit;
	    }
    }
    else
    {
    	$array['status'] = 2000;
	    $array['msg'] = "Option";
	    echo json_encode($array, JSON_UNESCAPED_SLASHES);
	    exit;
    }  
  }
  
  //注册获取验证码接口
  public function checkAndGetVerifyCode()
  {
  	if(IS_GET)
    {	
	    $phone = I('get.phone');
	    if(preg_match("/^1[34578]{1}\d{9}$/", $phone))
	    {
		    $user = D('User')->field('phone')->select();
		    $sum = '';
		    $count = count($user);
		    for($i = 0; $i < $count; $i++)
		    {
		      $sum .= $user[$i]['phone'].',';
		      echo $num;
		    }
		    $sum = rtrim($sum, ",");
		    if(strpos($sum, $phone) === false)
		    {
		      $begin = session('begintime');
		      $end = time();
		      $ss= $end - $begin;
		      if($ss > 60)
		      {
		        $begintime =time();
		        session('begintime', $begintime);            	
		        $verifyCode = rand(111111, 999999); 
		        $data['code_number'] = $verifyCode;
		  	    $data['phone'] = $phone; 		  	
		  			$data['add_time'] = $data['upd_time']= time();
		  			$vCodeRet= D('Vcode')->add($data);    
		        session('verifyCode', $verifyCode);     
		        $this->sendphone($verifyCode, $phone);   
		      }
		      else
		      {
		       	$array['status'] = 401;
			      $array['msg'] = "Get Verify Code Frequently";
			      echo json_encode($array, JSON_UNESCAPED_SLASHES);
			      exit;
		      }
		    }
		    else
		    {
		     	$array['status'] = 402;
			    $array['msg'] = "Phone Number Have Already Register";
			    echo json_encode($array, JSON_UNESCAPED_SLASHES);
			    exit;
		    }
	    }
	    else
	    {
	     	 $array['status'] = 403;
			   $array['msg'] = "Phone Number Is Not Rules";
			   echo json_encode($array, JSON_UNESCAPED_SLASHES);
			   exit;
	    }
	  }
  }
  
  //修改电话号码获取验证码接口
  public function uptPhoneNumVerifyCode()
  {
  	 if(IS_GET)
  	 {
	     $phone = I('get.phone');
	     if(preg_match("/^1[34578]{1}\d{9}$/", $phone))
	     {
	       $user = D('User')->field('phone')->select();
	       $sum = '';
	       $count = count($user);
	       for($i = 0; $i < $count; $i++)
	       {
	         $sum .= $user[$i]['phone'].',';
	       }
	       $sum = rtrim($sum, ",");
	       if(strpos($sum, $phone) === false)
	       {
	         $begin = session('begintime');
	         $end = time();
	         $ss = $end - $begin;
	         if($ss > 60)
	         {
	            $begintime =time();
	            session('begintime', $begintime);
	            $sendCode = rand(111111, 999999);
	            $data['code_number'] = $sendCode;
			  	    $data['phone'] = $phone; 		  	
			  			$data['add_time'] = $data['upd_time']= time();
			  			$vCodeRet= D('Pcode')->add($data); 
	            session('sendCode', $sendCode);
	            $this->sendphone($sendCode, $phone); 
	         }
	         else
	         {
	         	 $array['status'] = 401;
			       $array['msg'] = "Get Verify Code Frequently";
			       echo json_encode($array, JSON_UNESCAPED_SLASHES);
			       exit;
	         }
	       }
	       else
	       {
	       	 $array['status'] = 402;
			     $array['msg'] = "Phone Number Have Already Register";
			     echo json_encode($array, JSON_UNESCAPED_SLASHES);
			     exit;
	       }
	     } 
	     else
	     {
	     	 $array['status'] = 403;
			   $array['msg'] = "Phone Number Is Not Rules";
			   echo json_encode($array, JSON_UNESCAPED_SLASHES);
			   exit;
	     }
     }
  }
   
  //忘记密码获取验证码接口
  public function wjPwdGetVerifyCode()
  {
  	 if(IS_GET)
  	 {
	      $phone = I('get.phone');
	      if(preg_match("/^1[34578]{1}\d{9}$/", $phone))
	      {
		       $user = D('User')->field('phone')->select();
		       $sum = '';
		       $count = count($user);
		       for($i = 0; $i < $count; $i++)
		       {
		         $sum .= $user[$i]['phone'].',';
		       }
		       $sum = rtrim($sum, ",");
		       if(strpos($sum, $phone) !== false)
		       {
		         $begin = session('begintime');
		         $end = time();
		         $ss = $end - $begin;
		         if($ss > 60)
		         {
		            $begintime =time();
		            session('begintime', $begintime);
		            $pwdCode = rand(111111, 999999);
		            $data['code_number'] = $pwdCode;
				  	    $data['phone'] = $phone; 		  	
				  			$data['add_time'] = $data['upd_time']= time();
				  			$vCodeRet= D('Pwdcode')->add($data); 
		            session('pwdCode', $pwdCode);
		            $this->sendphone($pwdCode, $phone); 
		         }
		         else
		         {
		         	 $array['status'] = 401;
				       $array['msg'] = "Get Verify Code Frequently";
				       echo json_encode($array, JSON_UNESCAPED_SLASHES);
				       exit;
		         }
		       }
		       else
		       {
		       	 $array['status'] = 402;
				     $array['msg'] = "Phone Number Have Not Register";
				     echo json_encode($array, JSON_UNESCAPED_SLASHES);
				     exit;
		       }
	      } 
	      else
	      {
		     	 $array['status'] = 403;
				   $array['msg'] = "Phone Number Is Not Rules";
				   echo json_encode($array, JSON_UNESCAPED_SLASHES);
				   exit;
	      }
     }
  }
   
  //修改电话号码
  function updatePhoneNumber()
  { 
   	$begin = session('begintime');
    $end   = time();
    $ss    = $end - $begin;   
    if($ss > 72000)
    {
     	unset($_SESSION['count']);
      unset($_SESSION['begintime']);
    } 
    if($ss > 420)
    {
      unset($_SESSION['sendCode']);
    }
    $phone = I('get.phone');
   	$yzCode = I('get.verifyNum');
   	$vCode  = session('sendCode');
   	if($phone == null || $yzCode == null)
   	{
   	 	$array['status'] = 401;
			$array['msg'] = "client error, param is null";
			echo json_encode($array, JSON_UNESCAPED_SLASHES);
			exit;    
   	}
   	$header = getAllHeaders();
		$token = $header['x-access-token'];
    $userdata = D('User') -> checkTokenAndEchoInfo($token);
    $user_id = $userdata['user_id'];
    
    $pcodeRet = D('Pcode')->field('code_number')->select();
		$total = '';
		$countNum = count($pcodeRet);
	  for($j = 0; $j < $countNum; $j++)
	  {
	  	$total .= $pcodeRet[$j]['code_number'].',';
	  }
	  $total = rtrim($total, ",");  
   	if(strpos($total, $yzCode) !== false)
   	{
   	 	$user = D('User')->where(array('user_id'=>$user_id))->select();
	    $upd_time = time();
	    $arr =array
	    (
	      'user_id' => $user_id,
	      'username'=> $user[0][username],
	      'user_real_name'=> $user[0][user_real_name],
	      'user_pho'=> $user[0][user_pho],
	      'user_birth'=> $user[0][user_birth],
	      'user_sex'=> $user[0][user_sex],
	      'user_age'=> $user[0][user_age],
	      'user_card'=> $user[0][user_card],
	      'password'=> $user[0][password],   
	      'token'=> $user[0][token],
	      'phone'=> $phone,
	      'user_email'=> $user[0][user_email],
	      'user_qq'=> $user[0][user_qq],
	      'user_wechat'=> $user[0][user_wechat],    
	      'regtime'=>$user[0][regtime],   
	      'logintime'=>$user[0][logintime], 
	      'loginip'=>$user[0][loginip],
	    );
	    $user = D('User');
	    $user ->create();
	    if($user ->save($arr))
	    {
	     	$UserInfo = D('User')->where(array('user_id' => $user_id))->select();
	     	$output = array
		    (
		    	'status' => 200, 
		    	'msg' => 'success', 
		    	'data' => array
		    	( 	
		    		 'user_id'  => $UserInfo[0]['user_id'],
		    		 'username' => $UserInfo[0]['username'],
		    		 'user_pho' => $UserInfo[0]['user_pho'],
		    		 'token'    => $UserInfo[0]['token'],
		      ), 
			 );
		   echo json_encode($output, JSON_UNESCAPED_SLASHES);
		   $registerInfo = D('Pcode')->where(array('code_number'=>$yzCode))->delete();
			 exit;
	    }
	    else
	    {
	     	$array['status'] = 404;
	      $array['msg'] = "Update Fail";
	      echo json_encode($array, JSON_UNESCAPED_SLASHES);
	      exit;	
	    } 
   	}
   	else
   	{
   	 		$array['status'] = 403;
        $array['msg'] = "Input Verify Code Is Wrong";
        echo json_encode($array, JSON_UNESCAPED_SLASHES);
        exit;	
   	}
  }
  
  //忘记密码接口
  public function wjUpdPwdVerify()
  {
  	$begin = session('begintime');
    $end   = time();
    $ss    = $end - $begin;   
    if($ss > 72000)
    {
     	unset($_SESSION['count']);
      unset($_SESSION['begintime']);
    } 
    if($ss > 420)
    {
      unset($_SESSION['pwdCode']);
    }
    $phone = I('post.phone');
   	$updCode = I('post.verifyNum');
   	$newPwdOne = I('post.newpwdone');
   	$newPwdTwo = I('post.newpwdtwo');
   	$pwdCode = session('pwdCode');
   	if($phone == null || $updCode == null || $newPwdOne == null || $newPwdTwo == null)
   	{
   	 	$array['status'] = 401;
			$array['msg'] = "client error, param is null";
			echo json_encode($array, JSON_UNESCAPED_SLASHES);
			exit;    
   	}
    if($newPwdOne != $newPwdTwo)
    {
    	$array['status'] = 402;
			$array['msg'] = "Twice Input Password Is Different";
			echo json_encode($array, JSON_UNESCAPED_SLASHES);
			exit;
    }
    $pcodeRet = D('Pwdcode')->field('code_number')->select();
		$total = '';
		$countNum = count($pcodeRet);
	  for($j = 0; $j < $countNum; $j++)
	  {
	  	$total .= $pcodeRet[$j]['code_number'].',';
	  }
	  $total = rtrim($total, ",");      
   	if(strpos($total, $updCode) !== false)
   	{	
   		$user = D('User')->where(array('phone'=>$phone))->select();
	    $upd_time = time();
	    $arr =array
	    (
	      'user_id' => $user[0][user_id],
	      'username'=> $user[0][username],
	      'user_real_name'=> $user[0][user_real_name],
	      'user_pho'=> $user[0][user_pho],
	      'user_birth'=> $user[0][user_birth],
	      'user_sex'=> $user[0][user_sex],
	      'user_age'=> $user[0][user_age],
	      'user_card'=> $user[0][user_card],
	      'password'=> md5($newPwdTwo),  
	      'token'=> $user[0][token],
	      'phone'=> $user[0][phone],
	      'user_email'=> $user[0][user_email],
	      'user_qq'=> $user[0][user_qq],
	      'user_wechat'=> $user[0][user_wechat],    
	      'regtime'=>$user[0][regtime],   
	      'logintime'=>$user[0][logintime], 
	      'loginip'=>$user[0][loginip],
	    );
	    $user = D('User');
	    $user ->create();
	    if($user->save($arr))
	    {
	     	$UserInfo = D('User')->where(array('phone' => $phone))->select();
	     	$output = array
		    (
		    	'status' => 200, 
		    	'msg' => 'success', 
		    	'data' => array
		    	( 	
		    		 'user_id'  => $UserInfo[0]['user_id'],
		    		 'username' => $UserInfo[0]['username'],
		    		 'user_pho' => $UserInfo[0]['user_pho'],
		    		 'token'    => $UserInfo[0]['token'],
		      ), 
			  );
		    echo json_encode($output, JSON_UNESCAPED_SLASHES);
		    $registerInfo = D('Pwdcode')->where(array('code_number'=>$updCode))->delete();
			  exit;
			}
			else
	    {
	     	$array['status'] = 404;
	      $array['msg'] = "Update Fail";
	      echo json_encode($array, JSON_UNESCAPED_SLASHES);
	      exit;	
	    } 
   	}
   	else
   	{
   		$array['status'] = 403;
      $array['msg'] = "Input Phone Verify Code Is Wrong";
      echo json_encode($array, JSON_UNESCAPED_SLASHES);
      exit;	
   	}
  }
  
  public function registerGet($username = null, $phone = null, $password = null)
  {
		$User = D('User');
    $result = isset($_GET['username']) ? $User -> create($_GET) : $User -> create();    
    if (!$result)
    {
      $array['status'] =500;
      $array['msg'] = $User->getError();
      echo json_encode($array, JSON_UNESCAPED_SLASHES);
      exit;
    } 
    else 
    {
      $User -> loginip = get_client_ip();
      $User -> regtime = date('Y-m-d H:i:s',time());
      $data['user_id'] = $User->add(); 
      $data['logintime'] = date('Y-m-d H:i:s',time());
      $token = $User -> createToken($data); 
      $array['status'] = 200;
      $array['msg'] = "success";
      $array['token'] = $token;
      echo json_encode($array, JSON_UNESCAPED_SLASHES);
      exit;
    }
  }
  
  //修改密码接口
  public function modifyPwd() 
  {   
    $User = D('User');
    $old_password = I('post.old_password'); 
    $password_one =I('post.password_one');
    $password_two =I('post.password_two');
    $header = getAllHeaders();
		$token = $header['x-access-token'];
    $resultByCheckToken = $User->checkTokenAndEchoInfo($token);
    $user_id = $resultByCheckToken['user_id'];
    if($old_password == null || $password_one == null || $password_two == null) 
    {
      $array['status'] = 401;
      $array['msg'] = "params is null";
      echo json_encode($array, JSON_UNESCAPED_SLASHES);
      exit;
    } 
    else if($password_one != $password_two)
    {
    	$array['status'] = 402;
      $array['msg'] = "twice input password is different";
      echo json_encode($array, JSON_UNESCAPED_SLASHES);
      exit;
    }
    else 
    {
      $resultByMidifyPassword = $User->modifyPassword($user_id, $old_password, $password_one);
      if($resultByMidifyPassword) 
      {
        $array['status'] = 200;
        $array['msg'] = "success";
      } 
      else
      {
        $array['status'] = 404;
        $array['msg'] = "Update Fail";
      }
    }
    echo json_encode($array, JSON_UNESCAPED_SLASHES);
    exit;
  }
  
  public function userInfoStable()
  {
  	$username = I('post.username');               
  	$phone = I('post.phone');                     
  	$user_real_name = I('post.user_real_name');   	
  	$user_birth = I('post.user_birth');           
  	$user_sex = I('post.user_sex');               
  	$user_age = I('post.user_age');               
  	$user_card = I('post.user_card');             
  	$user_email = I('post.user_email');           
  	$user_qq = I('post.user_qq');                 
  	$user_wechat = I('post.user_wechat');         
  	$header = getAllHeaders();
		$token = $header['x-access-token'];
    $userdata = D('User') -> checkTokenAndEchoInfo($token);
  	$User = D('User');
    $userInfo = D('User') ->find($userdata['user_id']);
    if($userInfo == null)
    {
  	 	$output['status'] = 200;
     	$output['msg'] = "can not find this user information";
     	$output['data'] = $userInfo;
     	echo json_encode($output, JSON_UNESCAPED_SLASHES);
	   	exit;
    }
    else
    {
    	if($username != null)
    	{
    		$User->username = $username;
    	}
    	if($phone != null)
    	{
    		$User->phone = $phone;
    	}
    	else
    	{
    		$User->phone = $userInfo['phone'];
    	}
    	
    	if($user_real_name != null)
    	{
    		$User->user_real_name = $user_real_name; 
    	}
    	if($user_birth != null)
    	{
    		$User->user_birth = $user_birth; 
    	}
    	if($user_sex != null)
    	{
    		$User->user_sex = $user_sex;  
    	}
    	else
    	{
    		$User->user_sex = $userInfo['user_sex'];
    	}
    	if($user_age != null)
    	{
    		$User->user_age = $user_age;  
    	}
    	if($user_card != null)
    	{
    		$User->user_card = $user_card;  
    	}
    	if(user_email != null)
    	{
    		$User->user_email	= $user_email;     
    	}
    	if($user_qq != null)
    	{
    		$User->user_qq = $user_qq;
    	}
    	if($user_wechat != null)
    	{
    	 	$User->user_wechat = $user_wechat;
    	} 
    	$rstInfo = $User -> where(array('user_id'=> $userdata['user_id']))->save();
    	if(!$rstInfo)
   		{
   			$output['status'] = 200;
	      $output['msg'] = "update userinfo fail";
	      $output['data'] = $rstInfo;
	      echo json_encode($output, JSON_UNESCAPED_SLASHES);
		    exit;
   		}
   		else
   		{
   			$rstInfo = $User
   				 ->field('user_id, username, user_pho, token, phone, user_birth, user_sex')
   			   ->where(array('user_id'=> $userdata['user_id']))->select();
   			   
   			$cosSerinfo = D('Costumservice')->field('cos_phone')
        		->order('upd_time desc')->limit(3)->select();
        		
        $output = array
		   (
		    	'status' => 200, 
		    	'msg' => 'success', 
		    	'data' => array
		    	( 	
		    		 'user_id'  => $rstInfo[0]['user_id'],
		    		 'username' => $rstInfo[0]['username'],
		    		 'user_pho' => $rstInfo[0]['user_pho'],
		    		 'token'    => $rstInfo[0]['token'],
					 	  cosSerinfo => $cosSerinfo,      			 	 
		      ), 
			 );	
	     echo json_encode($output, JSON_UNESCAPED_SLASHES);
		   exit;
   		}
    }
  }
   
  public function sendphone($sendyzm, $phone_num)
  {
  	if($sendyzm == null || $phone_num == null) 
  	{
  		 $array['status'] = 400;
       $array['msg'] = "error";
       $array['data'] = $sendyzm;
       echo json_encode($array, JSON_UNESCAPED_SLASHES);
    	 exit;
  	}
  	else
  	{
  		sendTemplateSMS($phone_num, array($sendyzm, '5分钟'), "213785"); //213785
  	}
  }
  
  public function getCosterTelPhone()
  {
  	if(IS_POST)
    {
	  	$cosSerinfo = D('Costumservice')->field('cos_phone')
	        ->order('upd_time desc')->limit(3)->select();
	        
	    if($cosSerinfo == null)
	    {
	    	$array['status'] = 200;
	      $array['msg'] = "database is null";
	      $array['data'] = $cosSerinfo;
	      echo json_encode($array, JSON_UNESCAPED_SLASHES);
	      exit;	
	    }
	    else
	    {
	    	$array['status'] = 200;
	      $array['msg'] = "success";
	      $array['data'] = $cosSerinfo;
	      echo json_encode($array, JSON_UNESCAPED_SLASHES);
	      exit;
	    } 
    }
  }
  
  public function setUserPhoto()
  {
  	if(IS_POST)
  	{
	  	$header = getAllHeaders();
			$token = $header['x-access-token'];
	    $userdata = D('User') -> checkTokenAndEchoInfo($token);
	    $user_id = $userdata['user_id'];
	    $User = new \Model\UserModel();
      $shuju = $User -> create();
      $shuju['upd_time']  = time();
      $this->deal_logo($shuju);
      if($userPho->save($shuju))
      {
        echo "200";
      }
      else
      {
        echo "400";
      }	
  	}	
  }
  
  private function deal_logo(&$data)
  {
	   if($_FILES['user_photo']['error']===0)
	   {
	      if(!empty($data['user_id']))
	      {
	        $oldinfo = D('User')->find($data['user_id']);
	        if(!empty($oldinfo['user_ypho']))
	        {
	             unlink($oldinfo['user_ypho']);
	        }
	        if(!empty($oldinfo['user_pho']))
	        {
	            unlink($oldinfo['user_ypho']);
	        }
	      }
	     $cfg = array
	     (
	        'rootPath' => './Userphoimgs/',
	      );
	     $up = new \Think\Upload($cfg);
	     $z = $up -> uploadOne($_FILES['user_photo']);
	     $bigname = $up->rootPath.$z['savepath'].$z['savename'];
	     $data['user_ypho'] = $bigname;
	     $im = new \Think\Image();
	     $im -> open($bigname);
	     $im -> thumb(80,80,1);
	     $smallname = $up->rootPath.$z['savepath'].'s_'.$z['savename'];
	     $im -> save($smallname);
	     $data['user_pho'] = $smallname;
	   }
  }
}
