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
  a{
    text-decoration:none;
    color:#00a7eb;
  }
  
  .xuanzhou_box
  {
    height: 50px;
    line-height: 50px;
  }
  
  .txt
  {
    height: 24px;
    line-height: 24px;
    margin-left: 50px;
  }
 
  .btn
  {
    font-size: 18px;
  }
  
  a{
    text-decoration:none;
    color:#00a7eb;
  }
  
</style>
  <tr>
    <td>
    <table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#a8c7ce">
    	
    	 <tr>
         <div class="xuanzhou_box">
               <form action="/index.php/Admin/Comment/showlist" method="post"  >
                    <input type="text" class="txt" placeholder="评论搜索"  name="keyword"/>
                    <input class="btn" type="submit" id="button" value="搜索" />
              </form>
         </div>
      </tr>  
      
      <tr>
          <td width="5%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10">id</span></div></td>
          <td width="5%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10">评论内容</span></div></td>
          <td width="8%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10">评论用户</span></div></td>
          <td width="18%"height="20" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10">评论的商品</span></div></td>
          <td width="8%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10">评论的员工</span></div></td>
          <td width="8%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10">评论星级</span></div></td>
          <td width="8%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10">服务次数</span></div></td>
          <td width="8%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10">点赞次数</span></div></td>
      		<td width="8%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10">是否展示</span></div></td>
					<td width="8%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10">评论时间</span></div></td>
					<td width="8%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10">更新时间</span></div></td>
					<td width="8%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10">操作</span></div></td>
      </tr>
    
      <?php if(is_array($info)): foreach($info as $k=>$v): ?><tr>
          <td width="5%" height="20" bgcolor="#FFFFFF" class="STYLE6"><div align="center"><span class="STYLE10"><?php echo ($v["cmt_id"]); ?></span></div></td>
          <td width="5%" height="20" bgcolor="#FFFFFF" class="STYLE6"><div align="center"><span class="STYLE10"><?php echo ($v["cmt_msg"]); ?></span></div></td>
          <td width="8%" height="20" bgcolor="#FFFFFF" class="STYLE6"><div align="center"><span class="STYLE10"><?php echo ($v["username"]); ?></span></div></td>
          <td width="18%" height="20" bgcolor="#FFFFFF" class="STYLE6"><div align="center"><span class="STYLE10"><?php echo ($v["goods_name"]); ?></span></div></td>
          <td width="8%" height="20" bgcolor="#FFFFFF" class="STYLE6"><div align="center"><span class="STYLE10"><?php echo ($v["yuangong_name"]); ?></span></div></td>
          <td width="8%" height="20" bgcolor="#FFFFFF" class="STYLE6"><div align="center"><span class="STYLE10"><?php echo ($v["cmt_star"]); ?></span></div></td>
          <td width="8%" height="20" bgcolor="#FFFFFF" class="STYLE6"><div align="center"><span class="STYLE10"><?php echo ($v["cmt_sernum"]); ?></span></div></td>
          <td width="8%" height="20" bgcolor="#FFFFFF" class="STYLE6"><div align="center"><span class="STYLE10"><?php echo ($v["cmt_zannum"]); ?></span></div></td>
      		<td width="8%" height="20" bgcolor="#FFFFFF" class="STYLE6"><div align="center"><span class="STYLE10"><?php echo ($v["is_show"]); ?></span></div></td>
					<td width="8%" height="20" bgcolor="#FFFFFF" class="STYLE6"><div align="center"><span class="STYLE10"><?php echo date('Y-m-d H:i:s',$v[add_time]);?></span></div></td>
					<td width="8%" height="20" bgcolor="#FFFFFF" class="STYLE6"><div align="center"><span class="STYLE10"><?php echo date('Y-m-d H:i:s',$v[upt_time]);?></span></div></td>       
      		 <td height="100" bgcolor="#FFFFFF"><div align="center" class="STYLE21"><a style='color:rgb(59,99,119)'  href="<?php echo U('update_comment',array('cmt_id'=>$v['cmt_id']));?>">修改</a>&nbsp;&nbsp;&nbsp;
           <a style='color:rgb(59,99,119)'  href=" <?php echo U('del_comment',array('cmt_id'=>$v['cmt_id']));?>" onclick="if(confirm('确认要删除我么？主人')){return true;}else{return false;}" >删除</a></div></td>
         </tr><?php endforeach; endif; ?>
    </table></td>                         
  </tr>
 </table>



</html>