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
.addtrain{
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
.train_box{
  height: 30px;
  line-height: 30px;
  width: 100%;
  border: solid 1px #fff;
}
.train_box input{
  margin-top: 5px;
}
.train_box div{
  float: left;
}
.train_left{
  width: 400px;
  text-align: right;
}
/*.train-right{
  width: 600px;
}*/
.gudingtype{
  margin-top:10px;
  margin-bottom: 10px;
}
.train-submit{
  text-align: center;
}
.train_box_submit{
  margin-top: 10px;
  border: solid 1px #fff;
}
.train_goods_introduce{
  border: solid 1px #fff;
  height: 100px;
}
.train_goods_introduce textarea{
  height: 80px;
  width: 400px;
}
.train_goods_introduce div{
  float: left;
  margin-top: 7px;
}
.train_cat{
   border: solid 1px #fff;
   height: 30px;
   line-height: 30px;
}
.train_cat div{
  float: left;
}
.train_cat select{
  margin-top: 5px;
}
</style>
<tr>
    <td>
    <form action="/index.php/Admin/Training/addTraining" method="post" enctype="multipart/form-data">
    <table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#a8c7ce">
      <div class="addtrain">
      	
           <div class="train_box">
              <div class="train_left">培训课程名称：</div>
              <div class="train-right"><input type="text" name="train_cname" /></div>
           </div>
           
           <div class="train_box">
              <div class="train_left">培训讲师：</div>
              <div class="train-right"><input type="text" name="train_teacher" /></div>
           </div>
           
           
           <div class="train_box">
          		<div class="train_left">讲师简介：</div>
          		<div class="train-right">
                 <textarea rows="5" cols="30" name="teacher_profile"  style='width:350px;height:80px;'></textarea>
          		</div>
      		 </div>
      		</br></br></br>
           <div class="train_box">
        			<div class="train_left">讲师头像：</div>
        			<div class="train-right">
           				<input type="file" name="teacher_photo" />
        			</div>
           </div>
           
          <div class="train_box">
              <div class="train_left">培训费用：</div>
              <div class="train-right"><input type="text" name="train_price" /></div>
           </div>
                      
           <div class="train_box">
              <div class="train_left">培训人数限定：</div>
              <div class="train-right"><input type="text" name="train_pnum" /></div>
           </div>
           
           <div class="train_box">
              <div class="train_left">报名地点：</div>
              <div class="train-right"><input type="text" name="train_baddr" /></div>
           </div>
           
           <div class="train_box">
              <div class="train_left">报名截止时间：</div>
              <div class="train-right"><input type="text" name="train_btimend" /></div>
           </div>
           
           <div class="train_box">
              <div class="train_left">培训周期：</div>
              <div class="train-right"><input type="text" name="train_cycle" /></div>
           </div>
           
           <div class="train_box">
              <div class="train_left">培训时间：</div>
              <div class="train-right"><input type="text" name="train_time" /></div>
           </div> 
           <div class="train_box">
              <div class="train_left">培训方式：</div>
              <div class="train-right"> 
                 面授<input type="radio" name="train_way" value="0" checked="checked"/>
                 网络授课<input type="radio" name="train_way" value="1" />
             </div>
           </div>
           
           <div class="train_box">
              <div class="train_left">培训地点：</div>
              <div class="train-right"><input type="text" name="train_addr" /></div>
           </div> 
           
           <div class="train_box">
              <div class="train_left">培训方电话：</div>
              <div class="train-right"><input type="text" name="train_tel" /></div>
           </div> 
           
           <div class="train_box">
              <div class="train_left">培训方QQ：</div>
              <div class="train-right"><input type="text" name="train_qq" /></div>
           </div> 
           
           <div class="train_box">
              <div class="train_left">培训方微信：</div>
              <div class="train-right"><input type="text" name="train_wechat" /></div>
           </div> 
           
          <div class="train_box_submit">
             <div class="train-submit"><input type="submit" value='添加' /></div>
          </div>
      </div>
    </table>
    </form>
    </td>
  </tr>
 </table>
</body>



</html>