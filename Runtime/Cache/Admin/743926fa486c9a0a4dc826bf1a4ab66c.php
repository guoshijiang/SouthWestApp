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


<script type="text/javascript" src='<?php echo (PLUGIN_URL); ?>jquerypage/jquery-page.js'></script>
<link rel="stylesheet" type="text/css" href="<?php echo (CSS_ADMIN_URL); ?>page.css">
<style type="text/css">
  .xuanzhou_box{
    height: 50px;
    line-height: 50px;
  }
  .txt{
    height: 24px;
    line-height: 24px;
    margin-left: 50px;
  }
  .xuanzhou{
    margin-left: 20px;
    font-size: 24px;
  }
  .btn{
    font-size: 18px;
  }
  a{
    text-decoration:none;
    color:#00a7eb;
  }
  .liang{
    /* background-color: red;*/
    border: solid 1px red;
    -moz-border-radius:5px;
    -webkit-border-radius:5px;
    border-radius:5px;
    background:red;
    font-size: 24px;
    margin-left: 20px;
  }
  .yuangong_img{
   width: 80px;
   height: 80px;
  }
</style>
  <tr>
    <td>
    <table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#a8c7ce" id='yuangong_table'>
       <tr>
          <td width="" colspan="10" height="40" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10"><span style="color: red; font-size: 20px;"><?php echo ($infogoods[goods_name]); ?></span>&nbsp;&nbsp;详细信息</span></div></td>
       </tr>
        <tr>
          <td width="5%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10">商品名称</span></div></td>
          <td width="5%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10">价格</span></div></td>
          <td width="5%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10">数量</span></div></td>
          <td width="5%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10">重量</span></div></td>
          <td width="6%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10">商品属性图片1</span></div></td>
          <td width="6%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10">商品属性图片2</span></div></td>
          <td width="6%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10">商品属性图片3</span></div></td>
          <td width="8%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10">添加时间</span></div></td>
          <td width="8%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10">修改时间</span></div></td>
          <td width="12%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10">基本操作</span></div></td>
      </tr>
      <tr>
        <td height="100" bgcolor="#FFFFFF" class="STYLE6"><div align="center"><span class="STYLE19" ><?php echo ($infogoods[goods_name]); ?></span></div></td>
        <td height="100" bgcolor="#FFFFFF" class="STYLE6"><div align="center"><span class="STYLE19" ><?php echo ($infogoods[goods_price]); ?></span></div></td>
        <td height="100" bgcolor="#FFFFFF" class="STYLE6"><div align="center"><span class="STYLE19" ><?php echo ($infogoods[goods_number]); ?></span></div></td>
        <td height="100" bgcolor="#FFFFFF" class="STYLE6"><div align="center"><span class="STYLE19" ><?php echo ($infogoods[goods_weight]); ?></span></div></td>
        <td height="100" bgcolor="#FFFFFF" class="STYLE6"><div align="center"><span class="STYLE19"><img class="yuangong_img" src='<?php echo (SET_URL); echo (substr($infogoods[goods_s_xc1],2)); ?>'alt='图片'  /></span></div></td>
        <td height="100" bgcolor="#FFFFFF" class="STYLE6"><div align="center"><span class="STYLE19"><img class="yuangong_img" src='<?php echo (SET_URL); echo (substr($infogoods[goods_s_xc2],2)); ?>'alt='图片'  /></span></div></td>
        <td height="100" bgcolor="#FFFFFF" class="STYLE6"><div align="center"><span class="STYLE19"><img class="yuangong_img" src='<?php echo (SET_URL); echo (substr($infogoods[goods_s_xc3],2)); ?>'alt='图片'  /></span></div></td>
        <td height="100" bgcolor="#FFFFFF" class="STYLE6"><div align="center"><span class="STYLE19" > <?php echo date('Y-m-d H:i',$infogoods[add_time]);?></span></div></td>
        <td height="100" bgcolor="#FFFFFF" class="STYLE6"><div align="center"><span class="STYLE19" > <?php echo date('Y-m-d H:i',$infogoods[upd_time]);?></span></div></td>
        <td height="100" bgcolor="#FFFFFF"><div align="center" class="STYLE21"><a style='color:rgb(59,99,119)'  href="<?php echo U('upd',array('goods_id'=>$infogoods[goods_id]));?>">修改</a>
      </tr>
      <tr>
          <td width="" colspan="9" height="40" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10"><span style="color: red; font-size: 20px;">属性信息</span></span></div></td>
          <td width="" height="40" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10"><span style="color: red; font-size: 20px;"><a href="<?php echo U('tianjiatype',array('goods_id'=>$infogoods[goods_id]));?>">添加属性</a></span></div></td>
       </tr>
      <tr>
          <td width="5%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10">属性名称</span></div></td>
          <td width="5%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10">价格</span></div></td>
          <td width="5%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10">数量</span></div></td>
          <td width="5%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10">重量</span></div></td>
          <td width="6%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10">商品属性图片1</span></div></td>
          <td width="6%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10">商品属性图片2</span></div></td>
          <td width="6%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10">商品属性图片3</span></div></td>
          <td width="8%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10">添加时间</span></div></td>
          <td width="8%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10">修改时间</span></div></td>
          <td width="12%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10">基本操作</span></div></td>
      </tr>
      <?php if(is_array($info)): foreach($info as $k=>$v): ?><tr>
              <td height="100" bgcolor="#FFFFFF" class="STYLE6"><div align="center"><span class="STYLE19" ><?php echo ($v["goods_name"]); ?></span></div></td>
              <td height="100" bgcolor="#FFFFFF" class="STYLE6"><div align="center"><span class="STYLE19" ><?php echo ($v["goods_price"]); ?></span></div></td>
              <td height="100" bgcolor="#FFFFFF" class="STYLE6"><div align="center"><span class="STYLE19" ><?php echo ($v["goods_number"]); ?></span></div></td>
              <td height="100" bgcolor="#FFFFFF" class="STYLE6"><div align="center"><span class="STYLE19" ><?php echo ($v["goods_weight"]); ?></span></div></td>
              <td height="100" bgcolor="#FFFFFF" class="STYLE6"><div align="center"><span class="STYLE19"><img class="yuangong_img" src='<?php echo (SET_URL); echo (substr($v["goods_s_xc1"],2)); ?>'alt='图片'  /></span></div></td>
              <td height="100" bgcolor="#FFFFFF" class="STYLE6"><div align="center"><span class="STYLE19"><img class="yuangong_img" src='<?php echo (SET_URL); echo (substr($v["goods_s_xc2"],2)); ?>'alt='图片'  /></span></div></td>
              <td height="100" bgcolor="#FFFFFF" class="STYLE6"><div align="center"><span class="STYLE19"><img class="yuangong_img" src='<?php echo (SET_URL); echo (substr($v["goods_s_xc3"],2)); ?>'alt='图片'  /></span></div></td>
              <td height="100" bgcolor="#FFFFFF" class="STYLE6"><div align="center"><span class="STYLE19" > <?php echo date('Y-m-d H:i',$v[add_time]);?></span></div></td>
              <td height="100" bgcolor="#FFFFFF" class="STYLE6"><div align="center"><span class="STYLE19" > <?php echo date('Y-m-d H:i',$v[upd_time]);?></span></div></td>
              <td height="100" bgcolor="#FFFFFF"><div align="center" class="STYLE21"><a style='color:rgb(59,99,119)'  href="<?php echo U('updtype',array('goodtype_id'=>$v['goodtype_id']));?>">修改</a>&nbsp;&nbsp;&nbsp;
              <a style='color:rgb(59,99,119)'  href=" <?php echo U('deltype',array('goodtype_id'=>$v['goodtype_id']));?>" onclick="if(confirm('确认要删除我么？主人')){return true;}else{return false;}" >删除</a>  </div></td>
            </tr><?php endforeach; endif; ?>
    </table></td>
  </tr>
 </table>
 



</html>