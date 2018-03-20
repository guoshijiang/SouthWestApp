<?php
namespace Home\Controller;
use Tools\HomeController;
class RegisterloginController extends HomeController 
{
	/*
  public function register()
  {
    $begin = session('begintime');
    $end   = time();
    $ss    = $end - $begin;
    if($ss > 72000)
    {
      unset($_SESSION['count']);
      unset($_SESSION['begintime']);
      unset($_SESSION['userphone1']);
      unset($_SESSION['userphone2']);
      unset($_SESSION['userphone3']);
    }
    if($ss > 420)
    {
      unset($_SESSION['sendyzm']);
    }
    $user_phone     = I('post.user_phone');
    $checkchknumber = I('post.checkchknumber');
    $sendyzm        = session('sendyzm');
    $user_email     = I('post.user_email');
    $user_pwd       = I('post.user_pwd');
    $user_pwd2      = I('post.user_pwd2');
    $add_time       = time();
    $upd_time       = time();
    $dl_time        = time();
    if(IS_POST)
    {
      if(preg_match("/^1[34578]{1}\d{9}$/", $user_phone))
      {
        $user = D('User')->field('user_phone')->select();
        $sum = '';
        $count = count($user);
        for($i = 0; $i < $count; $i++)
        {
          $sum .= $user[$i]['user_phone'].',';
        }
        $sum = rtrim($sum, ",");
        if(strpos($sum, $user_phone) !== false)
        {
          $this -> redirect('Registerlogin/register');
        }
        $pattern = "/^([0-9A-Za-z\\-_\\.]+)@([0-9a-z]+\\.[a-z]{2,3}(\\.[a-z]{2})?)$/i";
        if (preg_match( $pattern, $user_email ))
        {
          if($user_pwd === $user_pwd2)
          {
            if($checkchknumber == $sendyzm)
            {
              $user = new \Model\UserModel();
              $arr =array
              (
                 'user_phone' =>$user_phone,
                 'user_email' =>$user_email, 
                 'user_pwd'   =>$user_pwd, 
                 'add_time'   =>$add_time,
                 'upd_time'   =>$upd_time,
                 'dl_time'    =>$dl_time,  
              );
              $user ->create();
              $s = 1;
              if($user->add($arr))
              {
                unset($_SESSION['sendyzm']);
                $this -> redirect('User/login',array('ss'=>1));
              }
              else
              {
                $this -> error('注册失败。',U('Registerlogin/register'),1);
              }
            }
            else
            {
              $this -> redirect('Registerlogin/register');
            }
          }
          else
          {
            $this -> redirect('Registerlogin/register');
          }
        }
        else
        {
          $this -> redirect('Registerlogin/register');
        }
      }
      else
      {
       $this -> redirect('Registerlogin/register');
      } 
    }
    else
    {
      $this ->display();
    }  
  }
  
  //个人信息之修改手机号码
  function xiugaisjh()
  {
  	if(IS_POST)
  	{
      $user_id = session('user_id');
      $user_phone = I('post.user_phone');
      $user = D('User')->where(array('user_id'=>$user_id))->select();
      $upd_time   = time();
      $arr =array
      (
	       'user_id'                =>$user_id,
	       'user_phone'             =>$user_phone,
	       'user_name'              =>$user[0][user_name],
	       'user_company'           =>$user[0][user_company],
	       'user_code'              =>$user[0][user_code],
	       'user_address'           =>$user[0][user_address],
	       'sheng'                  =>$user[0][sheng],
	       'shi'                    =>$user[0][shi],
	       'xian'                   =>$user[0][xian],
	       'en_user_name'           =>$user[0][en_user_name],
	       'en_user_company'        =>$user[0][en_user_company],
	       'en_user_city'           =>$user[0][en_user_city],
	       'en_user_address'        =>$user[0][en_user_address],
	       'qq'                     =>$user[0][qq],
	       'weixin'                 =>$user[0][weixin],
	       'user_pwd'               =>$user[0][user_pwd],
	       'add_time'               =>$user[0][add_time],
	       'upd_time'               =>$upd_time,
	       'dl_time'                =>$user[0][dl_time],
          
       );
       $user = D('User');
       $user ->create();
       if($user ->save($arr))
       {
         $this -> redirect('User/usermess', array('ss' => 11));
       }
       else
       {
         $this -> redirect('User/usermess', array('ss' => 12));
       }
    }
    else
    {
      $this ->display(); 
    }
  }
  
  //登录页面忘记密码之手机验证 
  public function yanzhengpwd()
  {
    $user_phone = I('post.user_phone');
    if(IS_POST)
    {
      $user = D('User')->where(array('user_phone'=>$user_phone))->field('user_id')->select();
      $this -> redirect('User/mimapwd',array('user_id'=>$user[0][user_id]));
    }
    else
    {
      $this ->display(); 
    }      
  }
  
  //邮箱验证
  public function checkemail()
  {
    $user_email = I('get.user_email');
    $user = D('User') -> field('user_email') -> select();
    $sum = '';
    $count = count($user);
    for($i = 0; $i < $count; $i++)
    {
      $sum .= $user[$i]['user_email'].',';
    }
    $sum = rtrim($sum, ",");
    if(strpos($sum, $user_email) ===false)
    {
      echo '2';
    }
    else
    {
      echo '1';
    }
  }
   
  public function chknumbertp()
  {
     $user_phone = I('post.user_phone');
     if(preg_match("/^1[34578]{1}\d{9}$/",$user_phone))
     {
        $user = D('User') ->field('user_phone') ->select();
        $sum = '';
        $count = count($user);
        for($i = 0; $i < $count; $i++)
        {
          $sum .= $user[$i]['user_phone'].',';
        }
	      $sum = rtrim($sum, ",");
	      if(strpos($sum, $user_phone) === false)
	      {
	         $begin = session('begintime');
	         $end   = time();
	         $ss= $end - $begin;
	         if($ss > 60)
	         {
             $vry = new \Think\Verify();
             if($vry -> check($_POST['chknumber']))
             {	                 
               $begintime =time();
               session('begintime', $begintime);
               $userphone1 =session('userphone1');
               $userphone2 =session('userphone2');
               $userphone3 =session('userphone3');
               if($userphone1=='')
               {
                 $count=1;
                 session('count', $count);
                 $userphone1 = $user_phone;
                 session('userphone1',$userphone1);
                 $sendyzm=  rand(111111, 999999);
                 session('sendyzm',$sendyzm);
                 $this ->  sendphone($sendyzm, $user_phone);		                      
                 echo '1'; 
               }
               else if($user_phone == $userphone1)
               {
                 $count = session('count');
                 $count=$count + 1;
                 session('count', $count);
                 if($count < 4)
                 {
                   $sendyzm=  rand(111111, 999999);
                   session('sendyzm',$sendyzm);
                   $this ->  sendphone($sendyzm,$user_phone);
                   echo '1';
                 }
                 else
                 {
                   echo '该手机验证今日已到上线！';
                 }
               }
               else if($userphone2 == ' ')
               {
                 $count=1;
                 session('count', $count);
                 $userphone2 = $user_phone;
                 session('userphone2',$userphone2);
                 $sendyzm=  rand(111111, 999999);
                 session('sendyzm',$sendyzm);
                 $this ->  sendphone($sendyzm, $user_phone);
                 echo '1';
               }
               else if($user_phone == $userphone2)
               {
                 $count = session('count');
                 $count=$count+1;
                 session('count', $count);
                 if($count < 4)
                 {
                    $sendyzm=  rand(111111, 999999);
                    session('sendyzm',$sendyzm);
                    $this ->  sendphone($sendyzm,$user_phone);
                    echo '1'; 
                 }
                 else
                 {
                   echo '该手机验证今日已到上线！';
                 }
               }
               else if($userphone3 == '')
               {
                 $count=1;
                 session('count',$count);
                 $userphone3 = $user_phone;
                 session('userphone3', $userphone3);
                 $sendyzm=  rand(111111, 999999);
                 session('sendyzm', $sendyzm);
                 $this ->  sendphone($sendyzm, $user_phone);
                 echo '1';
               }
               else if($user_phone == $userphone3)
               {
                 $count = session('count');
                 $count=$count+1;
                 session('count',$count);
                 if($count < 4)
                 {
                    $sendyzm=  rand(111111, 999999);
                    session('sendyzm',$sendyzm);
                    $this ->  sendphone($sendyzm,$user_phone);
                    echo '1';
                 }
                 else
                 {
                    echo '该手机验证今日已到上线！';
                 }
               }
               else
               {
                 echo '明日再来！';
               }
             }
             else
             {
               echo '图片验证码错误！';
             }
	         }
	      }
     }
  }
  */
   
  //发送短信验证码
  /*
  private function sendphone($sendyzm, $user_phone)
  {
  	dump($sendyzm);
  	dump( $user_phone);exit;
	  $ip = getenv("HTTP_X_FORWARDED_FOR");
	  if($ip == '')
	  {
	     $ip = $_SERVER["REMOTE_ADDR"];
	  }
	 
	  $userip = new \Model\IpModel();
	  $arr =array
	  (
	      'ip_sjh'     =>$user_phone,
	      'ip_ip'      =>$ip, 
	      'ip_yzm'     =>$sendyzm, 
	      'add_time'   =>time(),
	  );
	  if($userip->add($arr))
	  {
	 
	   // sendTemplateSMS($user_phone, array($sendyzm, '5分钟'), "1");
	  //}
  }
  */
  
  
  /* 
  //检查手机号码验证是否正确
  public function sjyzm()
  {
    $checkchknumber = I('post.checkchknumber');
    $sjyzm = session('sendyzm');
    if($checkchknumber==' ')
    {
       echo '手机验证码为空！';
    }
    else if($checkchknumber == $sjyzm)
    {
      echo '1';
    }
    else
    {
      echo '手机验证码错误！';
    }
  }
  
  //手机号码验证
  public function sjh()
  {
    $user_phone = I('get.user_phone');
    $user = D('User')->field('user_phone')->select();
    $sum = '';
    $count = count($user);
    for($i = 0; $i < $count;  $i++)
    {
      $sum .= $user[$i]['user_phone'].',';
    }
    $sum = rtrim($sum, ",");
    if(strpos($sum, $user_phone) === false)
    {
      echo '1';
    }
    else
    {
      echo '已经被注册！请重新输入!';
    }
  }
  
  //tp自带的验证码验证
  function verifyImg()
  {  
    $cfg = array
    (
      'seKey'     =>  'ThinkPHP.CN',     //验证码加密密钥
      'codeSet'   =>  '12345678abcdefhijkmnpqrstuvwxyzABCDEFGHJKLMNPQRTUVWXY',
      'expire'    =>  300,               //验证码过期时间（s）
      'fontSize'  =>  14,                //验证码字体大小(px)
      'useCurve'  =>  true,              //是否画混淆曲线
      'useNoise'  =>  ture,              //是否添加杂点 
      'useImgBg'  =>  ture,              //使用背景图片  
      'imageH'    =>  50,                //验证码图片高度
      'imageW'    =>  120,               //验证码图片宽度
      'length'    =>  5,                 //验证码位数
      'fontttf'   =>  '',                //验证码字体，不设置随机获取
    );
    ob_clean();
    $very = new \Think\Verify($cfg);
    $very -> entry();
  } 
  */
}