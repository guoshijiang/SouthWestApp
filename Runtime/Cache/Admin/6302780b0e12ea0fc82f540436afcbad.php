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
    <form action="/index.php/Admin/Yuangong/upd/yuangong_id/70" method="post" enctype="multipart/form-data">
    <input type="hidden" name='yuangong_id' value='<?php echo ($info["yuangong_id"]); ?>' />
    <table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#a8c7ce">
      <tr>
        <td height="20" bgcolor="#FFFFFF" class="STYLE6"><div align="right"><span class="STYLE19">姓名：</span></div></td>
        <td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="left">
        <input type="text" name="yuangong_name" value="<?php echo ($info["yuangong_name"]); ?>" />
        </div></td>
      </tr>
       <tr>
        <td height="20" bgcolor="#FFFFFF" class="STYLE6"><div align="right"><span class="STYLE19">手机号码：</span></div></td>
        <td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="left">
        <input type="text" name="yuangong_phone" value="<?php echo ($info["yuangong_phone"]); ?>"/>
        </div></td>
      </tr>
       <tr>
        <td height="20" bgcolor="#FFFFFF" class="STYLE6"><div align="right"><span class="STYLE19">员工价格：</span></div></td>
        <td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="left">
        <input type="text" name="yuangong_price" value="<?php echo ($info["yuangong_price"]); ?>"/>
        </div></td>
      </tr>
       <tr>
        <td height="20" bgcolor="#FFFFFF" class="STYLE6"><div align="right"><span class="STYLE19">经理推荐：</span></div></td>
        <td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="left">
            <textarea rows="5" cols="30" name="yuangong_tuijian"  style='width:350px;height:40px;'><?php echo ($info["yuangong_tuijian"]); ?></textarea>
        </div></td>
      </tr>
      <tr>
        <td height="20" bgcolor="#FFFFFF" class="STYLE6"><div align="right"><span class="STYLE19">所属类型：</span></div></td>
        <td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="left">
        <select name='cat_id'>
        <option value='0'>-请选择-</option>
            <?php if(is_array($cateinfo)): foreach($cateinfo as $key=>$v): ?><option value='<?php echo ($v["cat_id"]); ?>' <?php if(($info["cat_id"]) == $v["cat_id"]): ?>selected='selected'<?php endif; ?> ><?php echo ($v["cat_name"]); ?></option><?php endforeach; endif; ?>
        </select>
        </div></td>
      </tr>
      <tr>
          <td height="20" bgcolor="#FFFFFF" class="STYLE6"><div align="right"><span class="STYLE19">简介：</span></div></td>
          <td height="20" bgcolor="#FFFFFF" class="STYLE19">
               <div align="left">
                   <textarea rows="5" cols="30" name="yuangong_jianjie"  style='width:350px;height:80px;'><?php echo ($info["yuangong_jianjie"]); ?></textarea>
               </div>
          </td>
      </tr>
      <tr>
        <td height="100" bgcolor="#FFFFFF" class="STYLE6"><div align="right"><span class="STYLE19">头像：</span></div></td>
        <td height="100" bgcolor="#FFFFFF" class="STYLE19">
           <div align="left"><input type="file" name="yuangong_tx" /><img src='<?php echo (SET_URL); echo (substr($info["yuangong_s_tx"],2)); ?>'alt='图片' width="80" height="80" /></div>
        </td>
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