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
  .xuanzhou
  {
    margin-left: 20px;
    font-size: 24px;
  }
  .btn
  {
    font-size: 18px;
  }
  a
  {
    text-decoration:none;
    color:#00a7eb;
  }
  .liang
  {
    /* background-color: red;*/
    border: solid 1px red;
    -moz-border-radius:5px;
    -webkit-border-radius:5px;
    border-radius:5px;
    background:red;
    font-size: 24px;
    margin-left: 20px;
  }
  .dyn_img
  {
   width: 80px;
   height: 80px;
  }
</style>
  <tr>
    <td>
    <table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#a8c7ce" id='yuangong_table'>
      <tr>
         <div class="xuanzhou_box">
               <form action="/index.php/Admin/Dynamic/showlist" method="post"  >
                    <input type="text" class="txt" placeholder="请输入文章标题" id="dyn_title" name="dyn_title" value=""/>
                    <input type="button" class="btn" id="button" onclick="search()" value="搜索" />
              </form>
         </div>
      </tr> 
      <tr>
         <div class="xuanzhou_box" id="xuanzhou_box">
               <span id="tt">
                   <a  class="xuanzhou liang" href="javascript:;"  target="_self"  value='0' >全部</a>
              <?php if(is_array($cateinfo)): foreach($cateinfo as $key=>$v): ?><a   class="xuanzhou" href="javascript:;" target="_self"  value='<?php echo ($v["cat_id"]); ?>' ><?php echo ($v["cat_name"]); ?></a><?php endforeach; endif; ?>
              </span>
         </div>
      </tr>
       <tr>
         <div class="xuanzhou_box">
                <span style="float: left;font-size: 16px; line-height: 35px;padding:0 5px;">有<strong style="color: red"  id="totalnum"></strong>条满足条件的结果（每页显示5条）</span>
         </div>
      </tr>  
      <tr>
          <td width="5%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10">ID</span></div></td>
          <td width="5%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10">文章标题</span></div></td>
          <td width="8%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10">所属分类</span></div></td>
          <td width="18%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10">文章内容</span></div></td>
          <td width="8%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10">文章顶配图</span></div></td>
          <td width="8%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10">文章中配图</span></div></td>
          <td width="8%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10">文章底配图</span></div></td>
          <td width="8%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10">添加时间</span></div></td>
          <td width="8%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10">修改时间</span></div></td>
          <td width="8%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10">基本操作</span></div></td>
      </tr>
    </table></td>
  </tr>
 </table>
<div id="Pagination" class="pagination">
</div>

<script type="text/javascript">
var   num_entries;
var   array_item;
var   totalnum = document.getElementById("totalnum");

$(function()
{
  $('#xuanzhou_box a').click(function()
  {
    $('#xuanzhou_box a').attr('class','xuanzhou');
    $(this).attr('class','liang');
  });
});

var cat_id =0;   
$("#tt a").click(function()
{
  cat_id = $(this).attr("value");
  findByCatid();
});

var dyn_title;
function search()
{
  dyn_title= document.getElementById("dyn_title").value;
  findByCatid();
}

function findByCatid()
{
 $.ajax(
 {
   url:"/index.php/Admin/Dynamic/find",
   data:{'cat_id':cat_id,'dyn_title':dyn_title},
   dataType:'json',
   type:'get',
   success:function(msg)
   {
     var item = msg.split(',');
     num_entries = item[0];
     array_item  = item[1];
     totalnum.innerHTML = array_item;
     item.splice(0,2);
     dyn_ids = item.join();
     ajaxFunc();           
   }
 });
}
 
 function ajaxFunc()
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
    function pageselectCallback(page_index, jq){
      $.ajax({
       url:"/index.php/Admin/Dynamic/getDynamic",
       data:{'page_index':page_index,'dyn_ids':dyn_ids},
       dataType:'json',
       type:'get',
       success:function(msg)
       {
          var s = "";
          $.each(msg,function(n, v)
          {
          	 var h_img   = v.dyn_pho_headimg;
          	 var c_img   = v.dyn_pho_centerimg;
          	 var b_img   = v.dyn_pho_bottomimg;
          	 
          	 var himg    = "http://www.zgxnjz.cn"+h_img;
          	 var cimg    = "http://www.zgxnjz.cn"+c_img;
          	 var bimg    = "http://www.zgxnjz.cn"+b_img;
          	 
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
             var add_time = Y1+M1+D1+h1+m1 ;
             s +='<tr>'+
                	'<td class="STYLE6" height="100" bgcolor="#FFFFFF">'+
                	  '<div align="center"><span class="STYLE19"> '+v.dyn_id+ '</span></div>'+
                  '</td>'+
             
                 '<td class="STYLE6" height="100" bgcolor="#FFFFFF">'+
                   '<div align="center"><span class="STYLE19">'+v.dyn_title+'</span></div>'+
                '</td>'+
                
                 '<td class="STYLE6" height="100" bgcolor="#FFFFFF">'+
                   '<div align="center"><span class="STYLE19">'+v.cat_name+'</span></div>'+
                '</td>'+
                
                 '<td class="STYLE6" height="100" bgcolor="#FFFFFF">'+
                   '<div align="center"><span class="STYLE19">'+v.dyn_content+'</span></div>'+
                '</td>'+
                
                 '<td class="STYLE6" height="100" bgcolor="#FFFFFF">'+
                   '<div align="center"><span class="STYLE19">'+
                   		'<img class="dyn_img" src="'+himg+'" alt="图片">'+
                   '</span></div>'+
                '</td>'+
                
                 '<td class="STYLE6" height="100" bgcolor="#FFFFFF">'+
                   '<div align="center"><span class="STYLE19">'+
                   		'<img class="dyn_img" src="'+cimg+'" alt="图片">'+
                   '</span></div>'+
                '</td>'+
                
                 '<td class="STYLE6" height="100" bgcolor="#FFFFFF">'+
                   '<div align="center"><span class="STYLE19">'+
                   		'<img class="dyn_img" src="'+bimg+'" alt="图片">'+                  
                    '</span></div>'+
                '</td>'+
                
                 '<td class="STYLE6" height="100" bgcolor="#FFFFFF">'+
                   '<div align="center"><span class="STYLE19">'+add_time+'</span></div>'+
                '</td>'+
                
                 '<td class="STYLE6" height="100" bgcolor="#FFFFFF">'+
                   '<div align="center"><span class="STYLE19">'+upd_time+'</span></div>'+
                '</td>'+
                
                '<td height="100" bgcolor="#FFFFFF">'+
									'<div class="STYLE21" align="center">'+
										'<a style="color:rgb(59,99,119)" href="/index.php/Admin/Dynamic/upd_play/dyn_id/'+v.dyn_id+'">修改</a>'+
											'&nbsp;&nbsp;&nbsp;'+
												'<a style="color:rgb(59,99,119)" href=" /index.php/Admin/Dynamic/delplay/dyn_id/'+v.dyn_id+'">删除</a>'+  
									'</div>'+
								'</td>'+
              '</tr>';
          });
          $('#yuangong_table tr:gt(3)').remove();
          $('#yuangong_table').append(s);  
        }
      });
    }
  }
 findByCatid();
</script>



</html>