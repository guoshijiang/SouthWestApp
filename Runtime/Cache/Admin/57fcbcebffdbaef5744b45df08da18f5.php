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
    table tr td
    {
      margin:8px 8px;
    }  
    td.STYLE6
    {
      height: 30px;
      width:50%;
      font-size: 16px;
      font-weight:bold;
      color: #666;
    }
    
    td .STYLE19
    {
    	height: 30px;
      width:50%;
      font-size: 16px;
      color: #666;
    }
    
    span.STYLE19
    {
    	text-align:center;
    }
    
 </style>
    <table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#a8c7ce">
    	 <tr>    	
        <td bgcolor="#FFFFFF" class="STYLE6">
        	<div align="right">
        		<span class="STYLE19">ID：</span>
          </div>
        </td>       
        <td  bgcolor="#FFFFFF" class="STYLE19">
        	<div align="left">
        		<span class="STYLE19"><?php echo ($info["train_id"]); ?></span>
        	</div>
        </td>  
      </tr> 
      <tr>    	
        <td bgcolor="#FFFFFF" class="STYLE6">
        	<div align="right">
        		<span class="STYLE19">培训课程名称：</span>
          </div>
        </td>       
        <td  bgcolor="#FFFFFF" class="STYLE19">
        	<div align="left">
        		<span class="STYLE19"><?php echo ($info["train_cname"]); ?></span>
        	</div>
        </td>  
      </tr> 
      
       <tr>    	
        <td bgcolor="#FFFFFF" class="STYLE6">
        	<div align="right">
        		<span class="STYLE19">培训讲师：</span>
          </div>
        </td>   
        <td  bgcolor="#FFFFFF" class="STYLE19">
        	<div align="left">
        		<span class="STYLE19"><?php echo ($info["train_teacher"]); ?></span>
        	</div>
        </td>  
      </tr>
      <tr>    	
        <td bgcolor="#FFFFFF" class="STYLE6">
        	<div align="right">
        		<span class="STYLE19">讲师头像：</span>
          </div>
        </td>   
        <td  bgcolor="#FFFFFF" class="STYLE19">
        	<div align="left">
        		<span class="STYLE19"><img src= '<?php echo (SET_URL); echo (substr($info["teacher_sphoto"],2)); ?>' alt="图片"></span>
        	</div>
        </td>  
      </tr>
       <tr>    	
        <td bgcolor="#FFFFFF" class="STYLE6">
        	<div align="right">
        		<span class="STYLE19">讲师简介：</span>
          </div>
        </td>   
        <td  bgcolor="#FFFFFF" class="STYLE19">
        	<div align="left">
        		<span class="STYLE19"><?php echo ($info["teacher_profile"]); ?></span>
        	</div>
        </td>  
      </tr>
              
      <tr>    	
        <td bgcolor="#FFFFFF" class="STYLE6">
        	<div align="right">
        		<span class="STYLE19">培训费用：</span>
          </div>
        </td>   
        <td  bgcolor="#FFFFFF" class="STYLE19">
        	<div align="left">
        		<span class="STYLE19"><?php echo ($info["train_price"]); ?></span>
        	</div>
        </td>  
      </tr>
      
      
      <tr>    	
        <td bgcolor="#FFFFFF" class="STYLE6">
        	<div align="right">
        		<span class="STYLE19">培训人数限定：</span>
          </div>
        </td>   
        <td  bgcolor="#FFFFFF" class="STYLE19">
        	<div align="left">
        		<span class="STYLE19"><?php echo ($info["train_pnum"]); ?></span>
        	</div>
        </td>  
      </tr>
      <tr>    	
        <td bgcolor="#FFFFFF" class="STYLE6">
        	<div align="right">
        		<span class="STYLE19">培训时间：</span>
          </div>
        </td>   
        <td  bgcolor="#FFFFFF" class="STYLE19">
        	<div align="left">
        		<span class="STYLE19"><?php echo ($info["train_time"]); ?></span>
        	</div>
        </td>  
      </tr>  
      
      
       <tr>    	
        <td bgcolor="#FFFFFF" class="STYLE6">
        	<div align="right">
        		<span class="STYLE19">培训方式：</span>
          </div>
        </td>   
        <td  bgcolor="#FFFFFF" class="STYLE19">
        	<div align="left">
        		<span class="STYLE19"><?php echo ($info["train_way"]); ?></span>
        	</div>
        </td>  
      </tr> 
      
      
      
      <tr>    	
        <td bgcolor="#FFFFFF" class="STYLE6">
        	<div align="right">
        		<span class="STYLE19">培训地点：</span>
          </div>
        </td>   
        <td  bgcolor="#FFFFFF" class="STYLE19">
        	<div align="left">
        		<span class="STYLE19"><?php echo ($info["train_addr"]); ?></span>
        	</div>
        </td>  
      </tr> 
      
      <tr>    	
        <td bgcolor="#FFFFFF" class="STYLE6">
        	<div align="right">
        		<span class="STYLE19">培训方电话：</span>
          </div>
        </td>   
        <td  bgcolor="#FFFFFF" class="STYLE19">
        	<div align="left">
        		<span class="STYLE19"><?php echo ($info["train_tel"]); ?></span>
        	</div>
        </td>  
      </tr> 
      
      <tr>    	
        <td bgcolor="#FFFFFF" class="STYLE6">
        	<div align="right">
        		<span class="STYLE19">培训方QQ：</span>
          </div>
        </td>   
        <td  bgcolor="#FFFFFF" class="STYLE19">
        	<div align="left">
        		<span class="STYLE19"><?php echo ($info["train_qq"]); ?></span>
        	</div>
        </td>  
      </tr> 
      
      <tr>    	
        <td bgcolor="#FFFFFF" class="STYLE6">
        	<div align="right">
        		<span class="STYLE19">培训方微信：</span>
          </div>
        </td>   
        <td  bgcolor="#FFFFFF" class="STYLE19">
        	<div align="left">
        		<span class="STYLE19"><?php echo ($info["train_wechat"]); ?></span>
        	</div>
        </td>  
      </tr> 
  
      <tr>    	
        <td bgcolor="#FFFFFF" class="STYLE6">
        	<div align="right">
        		<span class="STYLE19">培训条目：</span>
          </div>
        </td>   
        <td  bgcolor="#FFFFFF" class="STYLE19">
        	<?php if(is_array($tinfo)): foreach($tinfo as $k=>$v): ?><div align="left" height="500px">
	        		<span class="STYLE19"><?php echo ($v["tinfo_item"]); ?></span>
	        	</div><?php endforeach; endif; ?>
        </td>  
      </tr>    
      <tr>    	
        <td bgcolor="#FFFFFF" class="STYLE6">
        	<div align="right">
        		<span class="STYLE19">培训内容：</span>
          </div>
        </td>     
        <td  bgcolor="#FFFFFF" class="STYLE19">
	        <?php if(is_array($tinfo)): foreach($tinfo as $k=>$v): ?><div align="left">
	        		<span class="STYLE19"><?php echo ($v["tinfo_content"]); ?></span>
	        	</div><?php endforeach; endif; ?>
       </td>       
      </tr>      
      <tr>    	
        <td bgcolor="#FFFFFF" class="STYLE6">
        	<div align="right">
        		<span class="STYLE19">添加时间：</span>
          </div>
        </td>   
        <td  bgcolor="#FFFFFF" class="STYLE19">
        	<div align="left">
        		<span class="STYLE19"><?php echo ($info["add_time"]); ?></span>
        	</div>
        </td>  
      </tr>  
      <tr>    	
        <td bgcolor="#FFFFFF" class="STYLE6">
        	<div align="right">
        		<span class="STYLE19">修改时间：</span>
          </div>
        </td>   
        <td  bgcolor="#FFFFFF" class="STYLE19">
        	<div align="left">
        		<span class="STYLE19"><?php echo ($info["upd_time"]); ?></span>
        	</div>
        </td>  
      </tr>   
</table>
    



</html>