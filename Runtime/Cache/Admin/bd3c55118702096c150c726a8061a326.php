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
         <div class="xuanzhou_box">
               <form action="/index.php/Admin/Yuangong/showlist" method="post"  >
                    <input type="text" class="txt" placeholder="请输入姓名关键字" id="yuangong_name" name="yuangong_name" value=""/>
                    <input type="button" class="btn" id="button" onclick="search()" value="搜索" />
              </form>
         </div>
      </tr> 
      <tr>
         <div class="xuanzhou_box" id="xuanzhou_box">
             <!--  <span></span> -->
               <span id="tt">
                   <a  class="xuanzhou liang" href="javascript:;"  target="_self"  value='0' >全部</a>
              <?php if(is_array($cateinfo)): foreach($cateinfo as $key=>$v): ?><a   class="xuanzhou" href="javascript:;" target="_self"  value='<?php echo ($v["cat_id"]); ?>' ><?php echo ($v["cat_name"]); ?></a><?php endforeach; endif; ?>
              </span>
         </div>
      </tr>
       <tr>
         <div class="xuanzhou_box">
                <span style="float: left;font-size: 16px; line-height: 35px;padding:0 5px;">有<strong style="color: red"  id="zongshu"></strong>条满足条件的结果（每页显示5条）</span>
         </div>
      </tr>  
      <tr>
          <td width="5%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10">头像</span></div></td>
          <td width="5%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10">姓名</span></div></td>
          <td width="8%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10">职业</span></div></td>
          <td width="9%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10">联系方式</span></div></td>
          <td width="5%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10">员工价格</span></div></td>
          <td width="12%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10">简介</span></div></td>
          <td width="8%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10">员工星级 </span></div></td>
          <td width="8%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10">服务次数</span></div></td>         
          <td width="12%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10">经理推荐</span></div></td>
          <td width="8%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10">添加时间</span></div></td>
          <td width="8%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10">修改时间</span></div></td>
          <td width="8%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10">基本操作</span></div></td>
      </tr>
    </table></td>
  </tr>
 </table>
<div id="Pagination" class="pagination">
</div>
</body>
<script type="text/javascript">
$(function()
{
  $('#xuanzhou_box a').click(function()
  {
    $('#xuanzhou_box a').attr('class','xuanzhou');
    $(this).attr('class','liang');
  });
});

var cat_id =0;
var cat_id10  = $("#tt a");
cat_id10.click(function()
{
  cat_id = $(this).attr("value");
   ss();
});

var yuangong_name;
function search()
{
  yuangong_name= document.getElementById("yuangong_name").value;
  ss();
}
var num_entries;
var aa;
var zongshu= document.getElementById("zongshu");
function ss()
{
 $.ajax(
 {
   url:"/index.php/Admin/Yuangong/find",
   data:{'cat_id':cat_id,'yuangong_name':yuangong_name},
   dataType:'json',
   type:'get',
   success:function(msg)
   {
     var arr1 = msg.split(',');
     num_entries = arr1[0];
     aa          = arr1[1];
     zongshu.innerHTML = aa;
     arr1.splice(0,2);
     yuangong_ids = arr1.join();
     ajs();           
   }
 });
}
function ajs()
{
  (function() 
  {
    $("#Pagination").pagination(num_entries, 
    {
      num_edge_entries: 1, 
      num_display_entries: 4, 
      callback: pageselectCallback,
      items_per_page:5 
    });
  })(); 
  function pageselectCallback(page_index, jq)
  {
    $.ajax(
    {
      url:"/index.php/Admin/Yuangong/getyuangong",
      data:{'page_index':page_index,'yuangong_ids':yuangong_ids},
      dataType:'json',
      type:'get',
      success:function(msg)
      {
         var s = "";
         $.each(msg,function(n,v)
         {
	         var img1   = v.yuangong_s_tx;
	         var img    = "http://www.zgxnjz.cn"+img1;
	         var date1 = v.upd_time*1000;
	         var date2 = v.add_time*1000;
	         var date = new Date(date1);
           Y = date.getFullYear() + '-';
           M = (date.getMonth()+1 < 10 ? '0'+(date.getMonth()+1) : date.getMonth()+1) + '-';
           D = (date.getDate() < 10 ? '0'+ date.getDate() : date.getDate())+ ' ';
           h = (date.getHours()  < 10 ? '0'+ date.getHours() : date.getHours())+ ':';
           m = (date.getMinutes()< 10 ? '0'+ date.getMinutes() : date.getMinutes()) ;
           var upd_time = Y+M+D+h+m ;
           var dates = new Date(date2);
           Y1 = dates.getFullYear() + '-';
           M1 = (dates.getMonth()+1 < 10 ? '0'+(dates.getMonth()+1) : dates.getMonth()+1) + '-';
           D1 = (dates.getDate() < 10 ? '0'+ dates.getDate() : dates.getDate())+ ' ';
           h1 = (dates.getHours()  < 10 ? '0'+ dates.getHours() : dates.getHours())+ ':';
           m1 = (dates.getMinutes()< 10 ? '0'+ dates.getMinutes() : dates.getMinutes()) ; 
           var add_time = Y1+M1+D1+h1+m1;           
           s +='<tr>'+
	           '<td class="STYLE6" height="100" bgcolor="#FFFFFF">'+
	             '<div align="center">'+
	             		'<span class="STYLE19">'+
	             		   '<img class="yuangong_img" src="'+img+'" alt="图片">'+
	             	  '</span>'+
	             '</div>'+
	           '</td>'+
	             		             		
	           '<td class="STYLE6" height="100" bgcolor="#FFFFFF">'+
	              '<div align="center">'+
	             		 '<span class="STYLE19">'+v.yuangong_name+'</span>'+
	              '</div>'+
	           '</td>'+
	             		            		
	           '<td class="STYLE6" height="100" bgcolor="#FFFFFF">'+
	          	 '<div align="center">'+
	          		 '<span class="STYLE19">'+v.cat_name+'</span>'+
	           	 '</div>'+
	           '</td>'+
	           
	           '<td class="STYLE6" height="100" bgcolor="#FFFFFF">'+
	              '<div align="center">'+
	                '<span class="STYLE19">'+v.yuangong_phone+'</span>'+
	              '</div>'+
	           '</td>'+
	           
	           '<td class="STYLE6" height="100" bgcolor="#FFFFFF">'+
	              '<div align="center">'+
	                 '<span class="STYLE19">'+v.yuangong_price+'</span>'+
	              '</div>'+
	           '</td>'+
	           
	           '<td class="STYLE6" height="100" bgcolor="#FFFFFF">'+
	              '<div align="center">'+
	                 '<span class="STYLE19">'+v.yuangong_jianjie+'</span>'+
	              '</div>'+
	           '</td>'+
	           
	            
	           '<td class="STYLE6" height="100" bgcolor="#FFFFFF">'+
	              '<div align="center">'+
	                 '<span class="STYLE19">'+v.yg_star+'</span>'+
	              '</div>'+
	           '</td>'+
	           
	            
	           '<td class="STYLE6" height="100" bgcolor="#FFFFFF">'+
	              '<div align="center">'+
	                 '<span class="STYLE19">'+v.service_num+'</span>'+
	              '</div>'+
	           '</td>'+
	           
	           '<td class="STYLE6" height="100" bgcolor="#FFFFFF">'+
	              '<div align="center">'+
	                 '<span class="STYLE19">'+v.yuangong_tuijian+'</span>'+
	              '</div>'+
	          ' </td>'+
	           
	           '<td class="STYLE6" height="100" bgcolor="#FFFFFF">'+
	              '<div align="center">'+
	                 '<span class="STYLE19">'+add_time+'</span>'+
	              '</div>'+
	           '</td>'+
	           
	           '<td class="STYLE6" height="100" bgcolor="#FFFFFF">'+
	              '<div align="center">'+
	                 '<span class="STYLE19">'+upd_time+'</span>'+
	              '</div>'+
	          '</td>'+
	           
	           '<td height="100" bgcolor="#FFFFFF">'+
	              '<div class="STYLE21" align="center">'+
	                 '<a style="color:rgb(59,99,119)" href="/index.php/Admin/Yuangong/upd/yuangong_id/'+v.yuangong_id+'">修改</a>&nbsp;&nbsp;&nbsp;'+
	                 '<a style="color:rgb(59,99,119)" href=" /index.php/Admin/Yuangong/del/yuangong_id/'+v.yuangong_id+'">删除</a> '+
	              '</div>'+
	           '</td>'+           
          '</tr>'
         });
        $('#yuangong_table tr:gt(3)').remove();
        $('#yuangong_table').append(s);  
       }
    });
  }
}
ss();
</script>



</html>