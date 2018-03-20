<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script type="text/javascript" src="<?php echo (JS_ADMIN_URL); ?>/jquery-1.12.1.min.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<style type="text/css">
body { 
	margin-left: 3px;
	margin-top: 0px;
	margin-right: 3px;
	margin-bottom: 0px;
}
.STYLE1 {
	color: #e1e2e3;
	font-size: 12px;
}
.STYLE6 {color: #000000; font-size: 12px; }
.STYLE10 {color: #000000; font-size: 12px; }
.STYLE19 {
	color: #344b50;
	font-size: 12px;
}
.STYLE21 {
	font-size: 12px;
	color: #3b6375;
}
.STYLE22 {
	font-size: 12px;
	color: #295568;
}
/*a:link{
    color:#e1e2e3; text-decoration:none;
}
a:visited{
    color:#e1e2e3; text-decoration:none;
}*/
</style>
</head>

<body>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="30"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="24" bgcolor="#353c44"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="6%" height="19" valign="bottom"><div align="center"><img src="<?php echo (IMG_ADMIN_URL); ?>tb.gif" width="14" height="14" /></div></td>
              <td width="94%" valign="bottom"><span class="STYLE1"> <?php echo ($daohang["title1"]); ?> -> <?php echo ($daohang["title2"]); ?></span></td>
              </tr>
            </table></td>
            <td><div align="right"><span class="STYLE1">
              <a href="<?php echo ($daohang["act_link"]); ?>"><img src="<?php echo (IMG_ADMIN_URL); ?>add.gif" width="10" height="10" /> <?php echo ($daohang["act"]); ?></a>   &nbsp; 
              </span>
              <span class="STYLE1"> &nbsp;</span></div></td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>


<tr>
    <td>
    <form action="/index.php/Admin/Training/updTraining/train_id/46" method="post" enctype="multipart/form-data">
      <input type="hidden" name='train_id' value='<?php echo ($info["train_id"]); ?>' />
    <table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#a8c7ce">
      <tr>
        <td height="20" bgcolor="#FFFFFF" class="STYLE6"><div align="right"><span class="STYLE19">培训课程名称：</span></div></td>
        <td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="left">
        <input type="text" name="train_cname" value="<?php echo ($info["train_cname"]); ?>"/>
        </div></td>
      </tr>
      <tr>
        <td height="20" bgcolor="#FFFFFF" class="STYLE6"><div align="right"><span class="STYLE19">培训讲师：</span></div></td>
        <td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="left">
        <input type="text" name="train_teacher" value="<?php echo ($info["train_teacher"]); ?>"/>
        </div></td>
      </tr>
      
      <tr>
        <td height="20" bgcolor="#FFFFFF" class="STYLE6"><div align="right"><span class="STYLE19">讲师简介：</span></div></td>
        <td height="20" bgcolor="#FFFFFF" class="STYLE19">
        	<div align="left">
            <textarea rows="5" cols="30" name="teacher_profile"  style='width:350px;height:80px;'><?php echo ($info["teacher_profile"]); ?></textarea>
       		</div>
        </td>
      </tr>
      
      <tr>
        <td height="100" bgcolor="#FFFFFF" class="STYLE6"><div align="right"><span class="STYLE19">讲师头像：</span></div></td>
        <td height="100" bgcolor="#FFFFFF" class="STYLE19">
           <div align="left"><input type="file" name="teacher_photo" /><img src='<?php echo (SET_URL); echo (substr($info["teacher_sphoto"],2)); ?>'alt='图片' width="80" height="80" /></div>
        </td>
      </tr>
      
     <tr>
       <td height="20" bgcolor="#FFFFFF" class="STYLE6"><div align="right"><span class="STYLE19">培训费用：</span></div></td>
       <td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="left">
       <input type="text" name="train_price" value="<?php echo ($info["train_price"]); ?>"/>
       </div></td>
     </tr>
     
     <tr>
       <td height="20" bgcolor="#FFFFFF" class="STYLE6"><div align="right"><span class="STYLE19">培训人数限定：</span></div></td>
       <td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="left">
       <input type="text" name="train_pnum" value="<?php echo ($info["train_pnum"]); ?>"/>
       </div></td>
     </tr>
     
     <tr>
       <td height="20" bgcolor="#FFFFFF" class="STYLE6"><div align="right"><span class="STYLE19">培训报名地点：</span></div></td>
       <td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="left">
       <input type="text" name="train_baddr" value="<?php echo ($info["train_baddr"]); ?>"/>
       </div></td>
     </tr>
     
     <tr>
       <td height="20" bgcolor="#FFFFFF" class="STYLE6"><div align="right"><span class="STYLE19">培训报名截止时间：</span></div></td>
       <td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="left">
       <input type="text" name="train_btimend" value="<?php echo ($info["train_btimend"]); ?>"/>
       </div></td>
     </tr>
     
     <tr>
       <td height="20" bgcolor="#FFFFFF" class="STYLE6"><div align="right"><span class="STYLE19">培训周期：</span></div></td>
       <td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="left">
       <input type="text" name="train_cycle" value="<?php echo ($info["train_cycle"]); ?>"/>
       </div></td>
     </tr>
     
     <tr>
       <td height="20" bgcolor="#FFFFFF" class="STYLE6"><div align="right"><span class="STYLE19">培训时间：</span></div></td>
       <td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="left">
       <input type="text" name="train_time" value="<?php echo ($info["train_time"]); ?>"/>
       </div></td>
     </tr>
     
     <tr>
       <td height="20" bgcolor="#FFFFFF" class="STYLE6"><div align="right"><span class="STYLE19">培训方式：</span></div></td>
       <td height="20" bgcolor="#FFFFFF" class="STYLE19">
        <div align="left">
        	面授<input type="radio" name="train_way" value="0" <?php if(($info["train_way"]) == "0"): ?>checked="checked"<?php endif; ?>/>
        	网络授课<input type="radio" name="train_way" value="1" <?php if(($info["train_way"]) == "1"): ?>checked="checked"<?php endif; ?> />
       	</div>
       </td>
     </tr> 
     
      <tr>
       <td height="20" bgcolor="#FFFFFF" class="STYLE6"><div align="right"><span class="STYLE19">培训地点：</span></div></td>
       <td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="left">
       <input type="text" name="train_addr" value="<?php echo ($info["train_addr"]); ?>"/>
       </div></td>
     </tr>
     
      <tr>
       <td height="20" bgcolor="#FFFFFF" class="STYLE6"><div align="right"><span class="STYLE19">培训方电话：</span></div></td>
       <td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="left">
       <input type="text" name="train_tel" value="<?php echo ($info["train_tel"]); ?>"/>
       </div></td>
     </tr>
     
      <tr>
       <td height="20" bgcolor="#FFFFFF" class="STYLE6"><div align="right"><span class="STYLE19">培训方QQ：</span></div></td>
       <td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="left">
       <input type="text" name="train_qq" value="<?php echo ($info["train_qq"]); ?>"/>
       </div></td>
     </tr>
     
      <tr>
       <td height="20" bgcolor="#FFFFFF" class="STYLE6"><div align="right"><span class="STYLE19">培训方微信：</span></div></td>
       <td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="left">
       <input type="text" name="train_wechat" value="<?php echo ($info["train_wechat"]); ?>"/>
       </div></td>
     </tr>
      <tr>
       <td height="20" bgcolor="#FFFFFF" class="STYLE6" colspan='100'>
         <div align="center"><input type="submit" value='修改' /></div>
       </td>
      </tr>
    </table>
    </form>
    </td>
  </tr>
 </table>
</body>




</html>