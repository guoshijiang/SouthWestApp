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
    <form action="/index.php/Admin/Hire/updhire/hire_id/11" method="post" enctype="multipart/form-data">
      <input type="hidden" name='hire_id' value='<?php echo ($info["hire_id"]); ?>' />
    <table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#a8c7ce">
      <tr>
        <td height="20" bgcolor="#FFFFFF" class="STYLE6"><div align="right"><span class="STYLE19">招聘职位：</span></div></td>
        <td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="left">
        <input type="text" name="hire_name" value="<?php echo ($info["hire_name"]); ?>"/>
        </div></td>
      </tr>
      <tr>
        <td height="20" bgcolor="#FFFFFF" class="STYLE6"><div align="right"><span class="STYLE19">招聘区域：</span></div></td>
        <td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="left">
        <input type="text" name="hire_area" value="<?php echo ($info["hire_area"]); ?>"/>
        </div></td>
      </tr>
      <tr>
        <td height="20" bgcolor="#FFFFFF" class="STYLE6"><div align="right"><span class="STYLE19">学历要求：</span></div></td>
        <td height="20" bgcolor="#FFFFFF" class="STYLE19">
        	<div align="left">
        		小学<input type="radio" name="hire_degree" value="0" <?php if(($info["hire_degree"]) == "0"): ?>checked="checked"<?php endif; ?>/>
        		中学<input type="radio" name="hire_degree" value="1" <?php if(($info["hire_degree"]) == "1"): ?>checked="checked"<?php endif; ?> />
          	中职<input type="radio" name="hire_degree" value="2" <?php if(($info["hire_degree"]) == "2"): ?>checked="checked"<?php endif; ?> />
          	高职<input type="radio" name="hire_degree" value="3" <?php if(($info["hire_degree"]) == "3"): ?>checked="checked"<?php endif; ?> />
          	大专<input type="radio" name="hire_degree" value="4" <?php if(($info["hire_degree"]) == "4"): ?>checked="checked"<?php endif; ?> />
          	本科<input type="radio" name="hire_degree" value="5" <?php if(($info["hire_degree"]) == "5"): ?>checked="checked"<?php endif; ?> />
          	硕士研究生<input type="radio" name="hire_degree" value="6" <?php if(($info["hire_degree"]) == "6"): ?>checked="checked"<?php endif; ?>/>
          	博士研究生<input type="radio" name="hire_degree" value="7" <?php if(($info["hire_degree"]) == "7"): ?>checked="checked"<?php endif; ?>/>
       	 </div>
       	</td>
      </tr>
     <tr>
       <td height="20" bgcolor="#FFFFFF" class="STYLE6"><div align="right"><span class="STYLE19">工作区域：</span></div></td>
       <td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="left">
       <input type="text" name="work_area" value="<?php echo ($info["work_area"]); ?>"/>
       </div></td>
     </tr>
     <tr>
       <td height="20" bgcolor="#FFFFFF" class="STYLE6"><div align="right"><span class="STYLE19">学历要求：</span></div></td>
       <td height="20" bgcolor="#FFFFFF" class="STYLE19">
        <div align="left">
        	1-3年<input type="radio" name="work_year" value="0" <?php if(($info["work_year"]) == "0"): ?>checked="checked"<?php endif; ?>/>
        	3-5年<input type="radio" name="work_year" value="1" <?php if(($info["work_year"]) == "1"): ?>checked="checked"<?php endif; ?> />
          5-10年<input type="radio" name="work_year" value="2" <?php if(($info["work_year"]) == "2"): ?>checked="checked"<?php endif; ?> />
          10年以上<input type="radio" name="work_year" value="3" <?php if(($info["work_year"]) == "3"): ?>checked="checked"<?php endif; ?> />
       	</div>
       </td>
     </tr> 
     <tr>
        <td height="20" bgcolor="#FFFFFF" class="STYLE6"><div align="right"><span class="STYLE19">工作经验：</span></div></td>
        <td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="left">
        <input type="text" name="work_exp" value="<?php echo ($info["work_exp"]); ?>"/>
        </div></td>
     </tr> 
     <tr>
        <td height="20" bgcolor="#FFFFFF" class="STYLE6"><div align="right"><span class="STYLE19">薪资待遇：</span></div></td>
        <td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="left">
        <input type="text" name="office_salary" value="<?php echo ($info["office_salary"]); ?>"/>
        </div></td>
     </tr>
     <tr>
        <td height="20" bgcolor="#FFFFFF" class="STYLE6"><div align="right"><span class="STYLE19">招聘联系人：</span></div></td>
        <td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="left">
        <input type="text" name="hire_person" value="<?php echo ($info["hire_person"]); ?>"/>
        </div></td>
     </tr>
     <tr>
        <td height="20" bgcolor="#FFFFFF" class="STYLE6"><div align="right"><span class="STYLE19">招聘联系电话：</span></div></td>
        <td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="left">
        <input type="text" name="hire_tel" value="<?php echo ($info["hire_tel"]); ?>"/>
        </div></td>
     </tr>   
      <tr>
        <td height="20" bgcolor="#FFFFFF" class="STYLE6"><div align="right"><span class="STYLE19">招聘联系QQ：</span></div></td>
        <td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="left">
        <input type="text" name="hire_qq" value="<?php echo ($info["hire_qq"]); ?>"/>
        </div></td>
     </tr>
     <tr>
        <td height="20" bgcolor="#FFFFFF" class="STYLE6"><div align="right"><span class="STYLE19">招聘联系微信：</span></div></td>
        <td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="left">
        <input type="text" name="hire_wechat" value="<?php echo ($info["hire_wechat"]); ?>"/>
        </div></td>
     </tr>
     
     
      <tr>
        <td height="20" bgcolor="#FFFFFF" class="STYLE6"><div align="right"><span class="STYLE19">简历发送邮箱：</span></div></td>
        <td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="left">
        <input type="text" name="hire_email" value="<?php echo ($info["hire_email"]); ?>"/>
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