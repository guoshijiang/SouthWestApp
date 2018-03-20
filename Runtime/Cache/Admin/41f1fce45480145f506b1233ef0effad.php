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
    <table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#a8c7ce">
      <tr>
          <td width="5%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10">ID</span></div></td>
          <td width="5%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10">培训课程名称</span></div></td>
          <td width="5%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10">培训讲师</span></div></td>         
          <td width="5%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10">讲师头像</span></div></td>
          <td width="5%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10">讲师简介</span></div></td>         
          <td width="5%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10">培训费用</span></div></td>
          <td width="5%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10">培训人数限定</span></div></td>
          <td width="5%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10">报名截止时间</span></div></td>  
          <td width="5%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10">培训开始时间</span></div></td>
          <td width="5%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10">培训方式</span></div></td>
          <td width="5%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10">添加时间</span></div></td>          
          <td width="5%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10">修改时间</span></div></td>
          <td width="6%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10">操作</span></div></td>
			</tr>
      <?php if(is_array($info)): foreach($info as $k=>$v): ?><tr>
              <td height="100" bgcolor="#FFFFFF" class="STYLE6"><div align="center"><span class="STYLE19" ><?php echo ($v["train_id"]); ?></span></div></td>
              <td height="100" bgcolor="#FFFFFF" class="STYLE6"><div align="center"><span class="STYLE19" ><?php echo ($v["train_cname"]); ?></span></div></td>
              <td height="100" bgcolor="#FFFFFF" class="STYLE6"><div align="center"><span class="STYLE19" ><?php echo ($v["train_teacher"]); ?></span></div></td> 
              <td height="100" bgcolor="#FFFFFF" class="STYLE6"><div align="center"><span class="STYLE19" ><img src= '<?php echo (SET_URL); echo (substr($v["teacher_sphoto"],2)); ?>' alt="图片"></span></div></td>
              <td height="100" bgcolor="#FFFFFF" class="STYLE6"><div align="center"><span class="STYLE19" ><?php echo ($v["teacher_profile"]); ?></span></div></td>            
              <td height="100" bgcolor="#FFFFFF" class="STYLE6"><div align="center"><span class="STYLE19" ><?php echo ($v["train_price"]); ?></span></div></td>              
              <td height="100" bgcolor="#FFFFFF" class="STYLE6"><div align="center"><span class="STYLE19" ><?php echo ($v["train_pnum"]); ?></span></div></td>             
              <td height="100" bgcolor="#FFFFFF" class="STYLE6"><div align="center"><span class="STYLE19" ><?php echo ($v["train_btimend"]); ?></span></div></td>              
              <td height="100" bgcolor="#FFFFFF" class="STYLE6"><div align="center"><span class="STYLE19" ><?php echo ($v["train_time"]); ?></span></div></td>
              <td height="100" bgcolor="#FFFFFF" class="STYLE6"><div align="center"><span class="STYLE19" ><?php echo ($v["train_way"]); ?></span></div></td>
              <td height="100" bgcolor="#FFFFFF" class="STYLE6"><div align="center"><span class="STYLE19" > <?php echo date('Y-m-d H:i:s',$v[add_time]);?></span></div></td>
              <td height="100" bgcolor="#FFFFFF" class="STYLE6"><div align="center"><span class="STYLE19" > <?php echo date('Y-m-d H:i:s',$v[upd_time]);?></span></div></td>                    
              <td height="100" bgcolor="#FFFFFF">
              	<div align="center" class="STYLE21">          
                  <a style='color:rgb(59,99,119)'  href="<?php echo U('addtrItem',array('train_id'=>$v['train_id']));?>">添加培训介绍</a>&nbsp;&nbsp;<br/>             		
                  <a style='color:rgb(59,99,119)'  href="<?php echo U('trDetail',array('train_id'=>$v['train_id']));?>">详情</a>&nbsp;&nbsp;                 
                  <a style='color:rgb(59,99,119)'  href="<?php echo U('updTraining',array('train_id'=>$v['train_id']));?>">修改</a>&nbsp;&nbsp;              		
              		<a style='color:rgb(59,99,119)'  href=" <?php echo U('delTraining',array('train_id'=>$v['train_id']));?>" onclick="if(confirm('确认要删除我么？主人')){return true;}else{return false;}" >删除</a><br/>
                  <a style='color:rgb(59,99,119)'  href="<?php echo U('updtrItem',array('train_id'=>$v['train_id']));?>">修改培训介绍</a>&nbsp;&nbsp;<br/>             		              		 
              	</div>
              </td>
            </tr><?php endforeach; endif; ?>
    </table></td>
  </tr>
 </table>
 



</html>