<?php
namespace Home\Model;
use Think\Model;
define("ENCODE_KEY", "zgxnjz.cn@xinanjiazheng.com");
class UserModel extends Model 
{
  protected $_validate = array
  (
    array('username','require','用户名不能为空'),
    array('phone','require','电话号码不能为空'),
    array('password','require','密码不能为空'),
    array('username','','用户名已经存在', 0,'unique',1), 
    array('phone','','手机号已经存在', 0,'unique',1),
    //array('email','email','邮箱地址不合法'),
    //array('email','','邮箱地址已经存在',0,'unique',1)
  );

  protected $_auto = array
  (
     array('password','md5', 3, 'function')
  );

  public function getUsernameByUid($user_id) 
  {
    $result = $this -> getByuser_id($user_id);
    return $result ? $result['username'] : null;
  }

	public function checkPhonePassword($phone, $password) 
	{
	   $result = $this -> getByphone($phone);
	   if($result != NULL)
	   {
			 if($result['password'] != md5($password)) 
			 {
			    return false;
			 } 
			 else 
			 {
			   return $result;
			 }
	   } 
	   else 
	  {
			return false;
	  }
	}

	public function createToken($result)
	{
	   $array['user_id'] = $result['user_id'];
	   $array['logintime'] = $result['logintime'];
	   $token = $this -> encrypt($array);
	   $this -> where('user_id='.$result['user_id']) -> setField('token',  $token);
	   return $token;
	}
	
	public function checkToken($str)
	{
	   $result = $this -> field("user_id,username,phone,regtime,logintime,loginip") -> getBytoken($str);
	   return $result == NULL ? false : $result;
	}
	
	public function checkTokenAndEchoInfo($str)
	{
	    if($str == null) 
	    {
	      $array['status'] = 400;
	      $array['msg'] = "client error";
	      echo json_encode($array, JSON_UNESCAPED_SLASHES);	
	      exit;
	    }
	    $result = $this -> checkToken($str);
	    if(!$result) 
	    {
	      $array['status'] = 500;
	      $array['msg'] = "server error";
	      echo json_encode($array, JSON_UNESCAPED_SLASHES);
	      exit;
	    } 
	    else
	    {
	      return $result;
	    }
	}

  public function modifyPassword($user_id, $old_password, $password) 
  {
    $result = $this -> field('password') -> getByuser_id($user_id);
    if($result['password'] != md5($old_password)) 
    {
      return false;
    }
    else
    {
      $data['password'] = md5($password);
      $result = $this -> where('user_id='.$user_id) -> save($data);
      return $result;
    }
  }

  public function encrypt($data) 
	{
    $prep_code = serialize($data);
    $block = mcrypt_get_block_size('des', 'ecb');
    if (($pad = $block - (strlen($prep_code) % $block)) < $block) 
    {
        $prep_code .= str_repeat(chr($pad), $pad);
    }
    $encrypt = mcrypt_encrypt(MCRYPT_DES, ENCODE_KEY, $prep_code, MCRYPT_MODE_ECB);
    return base64_encode($encrypt);
	}
	
  public function decrypt($str)
  {
    $str = base64_decode($str);
    $str = mcrypt_decrypt(MCRYPT_DES, ENCODE_KEY, $str, MCRYPT_MODE_ECB);
    $block = mcrypt_get_block_size('des', 'ecb');
    $pad = ord($str[($len = strlen($str)) - 1]);
    if ($pad && $pad < $block && preg_match('/' . chr($pad) . '{' . $pad . '}$/', $str)) 
    {
      $str = substr($str, 0, strlen($str) - $pad);
    }
    return unserialize($str);
  }
}