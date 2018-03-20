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
    <form action="/index.php/Admin/Goods/upd/goods_id/7" method="post" enctype="multipart/form-data">
      <input type="hidden" name='goods_id' value='<?php echo ($info["goods_id"]); ?>' />
    <table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#a8c7ce">
      <tr>
        <td height="20" bgcolor="#FFFFFF" class="STYLE6"><div align="right"><span class="STYLE19">商品名称：</span></div></td>
        <td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="left">
        <input type="text" name="goods_name" value="<?php echo ($info["goods_name"]); ?>"/>
        </div></td>
      </tr>
      <tr>
        <td height="20" bgcolor="#FFFFFF" class="STYLE6"><div align="right"><span class="STYLE19">商品价格：</span></div></td>
        <td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="left">
        <input type="text" name="goods_price" value="<?php echo ($info["goods_price"]); ?>"/>
        </div></td>
      </tr>
       <tr>
        <td height="20" bgcolor="#FFFFFF" class="STYLE6"><div align="right"><span class="STYLE19">数量：</span></div></td>
        <td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="left">
        <input type="text" name="goods_number" value="<?php echo ($info["goods_number"]); ?>" />
        </div></td>
      </tr>
       <tr>
        <td height="20" bgcolor="#FFFFFF" class="STYLE6"><div align="right"><span class="STYLE19">重量：</span></div></td>
        <td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="left">
        <input type="text" name="goods_weight" value="<?php echo ($info["goods_weight"]); ?>"/>
        </div></td>
      </tr>
       <tr>
        <td height="20" bgcolor="#FFFFFF" class="STYLE6"><div align="right"><span class="STYLE19">推荐：</span></div></td>
        <td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="left">
        是：<input type="radio" name="is_rec" value="1" <?php if(($info["is_rec"]) == "1"): ?>checked="checked"<?php endif; ?>/>
        否：<input type="radio" name="is_rec" value="0" <?php if(($info["is_rec"]) == "0"): ?>checked="checked"<?php endif; ?> />
        </div></td>
      </tr>
      <tr>
        <td height="20" bgcolor="#FFFFFF" class="STYLE6"><div align="right"><span class="STYLE19">所属类型：</span></div></td>
        <td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="left">
        <select name='cat_id'>
        <option value='0'>-请选择-</option>
            <?php if(is_array($cateinfo)): foreach($cateinfo as $key=>$v): ?><option value='<?php echo ($v["cat_id"]); ?>'<?php if(($info["cat_id"]) == $v["cat_id"]): ?>selected='selected'<?php endif; ?> ><?php echo ($v["cat_name"]); ?></option><?php endforeach; endif; ?>
        </select>
        </div></td>
      </tr>
      <tr>
          <td height="20" bgcolor="#FFFFFF" class="STYLE6"><div align="right"><span class="STYLE19">描述：</span></div></td>
          <td height="20" bgcolor="#FFFFFF" class="STYLE19">
               <div align="left">
                   <textarea rows="5" cols="30" name="goods_introduce"  style='width:350px;height:80px;'><?php echo ($info["goods_introduce"]); ?></textarea>
               </div>
          </td>
      </tr>
      <tr>
          <td height="20" bgcolor="#FFFFFF" class="STYLE6"><div align="right"><span class="STYLE19">产地：</span></div></td>
          <td height="20" bgcolor="#FFFFFF" class="STYLE19">
               <div align="left">
                   <textarea rows="5" cols="30" name="country"  style='width:350px;height:30px;line-height: 30px;'><?php echo ($info["country"]); ?></textarea>
               </div>
          </td>
      </tr>
      <tr>
        <td height="20" bgcolor="#FFFFFF" class="STYLE6"><div align="right"><span class="STYLE19">商品logo图片：</span></div></td>
        <td height="20" bgcolor="#FFFFFF" class="STYLE19">
           <div align="left"><input type="file" name="goods_tx" /><img src='<?php echo (SET_URL); echo (substr($info["goods_s_logo"],2)); ?>'alt='图片' width="80" height="80" /></div>
        </td>
      </tr>
      <tr>
        <td height="20" bgcolor="#FFFFFF" class="STYLE6"><div align="right"><span class="STYLE19">商品相册图片1：</span></div></td>
        <td height="20" bgcolor="#FFFFFF" class="STYLE19">
           <div align="left"><input type="file" name="goods_xc1" /><img src='<?php echo (SET_URL); echo (substr($info["goods_s_xc1"],2)); ?>'alt='图片' width="80" height="80" /></div>
        </td>
      </tr>
      <tr>
        <td height="20" bgcolor="#FFFFFF" class="STYLE6"><div align="right"><span class="STYLE19">商品相册图片2：</span></div></td>
        <td height="20" bgcolor="#FFFFFF" class="STYLE19">
           <div align="left"><input type="file" name="goods_xc2" /><img src='<?php echo (SET_URL); echo (substr($info["goods_s_xc2"],2)); ?>'alt='图片' width="80" height="80" /></div>
        </td>
      </tr>
      <tr>
        <td height="20" bgcolor="#FFFFFF" class="STYLE6"><div align="right"><span class="STYLE19">商品相册图片3：</span></div></td>
        <td height="20" bgcolor="#FFFFFF" class="STYLE19">
           <div align="left"><input type="file" name="goods_xc3" /><img src='<?php echo (SET_URL); echo (substr($info["goods_s_xc3"],2)); ?>'alt='图片' width="80" height="80" /></div>
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