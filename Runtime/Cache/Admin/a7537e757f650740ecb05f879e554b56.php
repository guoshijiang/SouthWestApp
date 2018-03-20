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


<style type="text/css">
.addCosTel{
  margin-top:5px;
  margin-bottom: 5px;
}
  .icon:hover{
  cursor: pointer;
  color: #4fb3dd;
}
.icon{
  height: 30px;
  line-height: 30px;
  margin-left: 10px;
}
.cos_box{
  height: 30px;
  line-height: 30px;
  width: 100%;
  border: solid 1px #fff;
}
.cos_box input{
  margin-top: 5px;
}
.cos_box div{
  float: left;
}
.cos_left{
  width: 400px;
  text-align: right;
}
/*.cos-right{
  width: 600px;
}*/
.gudingtype{
  margin-top:10px;
  margin-bottom: 10px;
}
.cos-submit{
  text-align: center;
}
.cos_box_submit{
  margin-top: 10px;
  border: solid 1px #fff;
}
.cos_goods_introduce{
  border: solid 1px #fff;
  height: 100px;
}
.cos_goods_introduce textarea{
  height: 80px;
  width: 400px;
}
.cos_goods_introduce div{
  float: left;
  margin-top: 7px;
}
.cos_cat{
   border: solid 1px #fff;
   height: 30px;
   line-height: 30px;
}
.cos_cat div{
  float: left;
}
.cos_cat select{
  margin-top: 5px;
}
</style>
<tr>
    <td>
    <form action="/index.php/Admin/Costumservice/addCosTel" method="post" enctype="multipart/form-data">
    <table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#a8c7ce">
      <div class="addCosTel">
           <div class="cos_box">
              <div class="cos_left">客户服务人员姓名：</div>
              <div class="cos-right"><input type="text" name="cos_name" /></div>
           </div>
           
           <div class="cos_box">
              <div class="cos_left">客户服务电话号码：</div>
              <div class="cos-right"><input type="text" name="cos_phone" /></div>
           </div>
          <div class="cos_box_submit">
             <div class="cos-submit"><input type="submit" value='添加' /></div>
          </div>
      </div>
    </table>
    </form>
    </td>
  </tr>
 </table>
</body>



</html>