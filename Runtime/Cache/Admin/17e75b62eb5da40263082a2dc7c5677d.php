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
.addhire{
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
.hire_box{
  height: 30px;
  line-height: 30px;
  width: 100%;
  border: solid 1px #fff;
}
.hire_box input{
  margin-top: 5px;
}
.hire_box div{
  float: left;
}
.hire_left{
  width: 400px;
  text-align: right;
}
/*.hire-right{
  width: 600px;
}*/
.gudingtype{
  margin-top:10px;
  margin-bottom: 10px;
}
.hire-submit{
  text-align: center;
}
.hire_box_submit{
  margin-top: 10px;
  border: solid 1px #fff;
}
.hire_goods_introduce{
  border: solid 1px #fff;
  height: 100px;
}
.hire_goods_introduce textarea{
  height: 80px;
  width: 400px;
}
.hire_goods_introduce div{
  float: left;
  margin-top: 7px;
}
.hire_cat{
   border: solid 1px #fff;
   height: 30px;
   line-height: 30px;
}
.hire_cat div{
  float: left;
}
.hire_cat select{
  margin-top: 5px;
}
</style>
<tr>
    <td>
    <form action="/index.php/Admin/Hire/addhire" method="post" enctype="multipart/form-data">
    <table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#a8c7ce">
      <div class="addhire">
      	
           <div class="hire_box">
              <div class="hire_left">招聘职位：</div>
              <div class="hire-right"><input type="text" name="hire_name" /></div>
           </div>
           
           <div class="hire_box">
              <div class="hire_left">招聘区域：</div>
              <div class="hire-right"><input type="text" name="hire_area" /></div>
           </div>
           
            <div class="hire_box">
              <div class="hire_left">学历要求：</div>
              <div class="hire-right"> 
                    小学<input type="radio" name="hire_degree" value="0" />
                    中学<input type="radio" name="hire_degree" value="1" />
                    中职<input type="radio" name="hire_degree" value="2" />
                    高职<input type="radio" name="hire_degree" value="3" />
                    大专<input type="radio" name="hire_degree" value="4" />
                    本科<input type="radio" name="hire_degree" value="5" checked="checked"/>
                    硕士研究生<input type="radio" name="hire_degree" value="6"/>
                    博士研究生<input type="radio" name="hire_degree" value="7"/>
             </div>
           </div>
    
            <div class="hire_box">
              <div class="hire_left">工作区域：</div>
              <div class="hire-right"><input type="text" name="work_area" /></div>
           </div>
           
           <div class="hire_box">
              <div class="hire_left">工作年限：</div>
              <div class="hire-right"> 
                 1-3年<input type="radio" name="work_year" value="0" checked="checked"/>
                 3-5年<input type="radio" name="work_year" value="1" />
                 5-10年<input type="radio" name="work_year" value="2" />
                 10年以上<input type="radio" name="work_year" value="3" />
             </div>
           </div>
           
           <div class="hire_box">
              <div class="hire_left">工作经验：</div>
              <div class="hire-right"><input type="text" name="work_exp" /></div>
           </div>
           
           <div class="hire_box">
              <div class="hire_left">薪资待遇：</div>
              <div class="hire-right"><input type="text" name="office_salary" /></div>
           </div>
           
            <div class="hire_box">
              <div class="hire_left">招聘联系人：</div>
              <div class="hire-right"><input type="text" name="hire_person" /></div>
           </div>
           
            <div class="hire_box">
              <div class="hire_left">招聘联系电话：</div>
              <div class="hire-right"><input type="text" name="hire_tel" /></div>
           </div>
           
            <div class="hire_box">
              <div class="hire_left">招聘联系QQ：</div>
              <div class="hire-right"><input type="text" name="hire_qq" /></div>
           </div>
           
           <div class="hire_box">
              <div class="hire_left">招聘联系微信：</div>
              <div class="hire-right"><input type="text" name="hire_wechat" /></div>
           </div>
           
            <div class="hire_box">
              <div class="hire_left">简历发送邮箱：</div>
              <div class="hire-right"><input type="text" name="hire_email" /></div>
           </div>
           
          <div class="hire_box_submit">
             <div class="hire-submit"><input type="submit" value='添加' /></div>
          </div>
      </div>
    </table>
    </form>
    </td>
  </tr>
 </table>
</body>



</html>