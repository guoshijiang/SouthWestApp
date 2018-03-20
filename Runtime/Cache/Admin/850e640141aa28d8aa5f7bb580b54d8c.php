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
    border: solid 1px red;
    -moz-border-radius:5px;
    -webkit-border-radius:5px;
    border-radius:5px;
    background:red;
    font-size: 24px;
    margin-left: 20px;
  }
  .order_img
  {
   width: 80px;
   height: 80px;
  }
</style>
  <tr>
    <td>
    <table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#a8c7ce" id='order_table'>
      <tr>
         <div class="xuanzhou_box">
               <form action="/index.php/Admin/Order/showlist" method="post"  >
                    <input type="text" class="txt" placeholder="请输入相应的订单号" id="order_number" name="order_number" value=""/>
                    <input type="button" class="btn" id="button" onclick="search()" value="搜索" />
              </form>
         </div>
      </tr> 
      <tr>
         <div class="xuanzhou_box" id="xuanzhou_box">
               <span id="tt">
                   <a  class="xuanzhou liang" href="javascript:;"  target="_self"  value='0' >全部</a>
              <?php if(is_array($info)): foreach($info as $key=>$v): ?><a   class="xuanzhou" href="javascript:;" target="_self"  value='<?php echo ($v["status_id"]); ?>' ><?php echo ($v["status_value"]); ?></a><?php endforeach; endif; ?>
              </span>
         </div>
      </tr>
       <tr>
         <div class="xuanzhou_box">
                <span style="float: left;font-size: 16px; line-height: 35px;padding:0 5px;">有<strong style="color: red"  id="totalnum"></strong>条满足条件的结果（每页显示5条）</span>
         </div>
      </tr>  
      <tr>
        <td width="5%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10">订单ID</span></div></td>
        <td width="5%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10">订单编号</span></div></td>
        <td width="8%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10">支付方式</span></div></td>
        <td width="8%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10">订单状态</span></div></td>
        <td width="8%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10">订单总价格</span></div></td>
        <td width="8%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10">商品名称</span></div></td>
        <td width="8%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10">商品logo</span></div></td>
        <td width="8%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10">购买商品数量</span></div></td>
        <td width="8%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10">生成订单时间</span></div></td>
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

var order_status;   
$("#tt a").click(function()
{
  order_status = $(this).attr("value");
  findByStatusid();
});

var order_number;
function search()
{
  order_number= document.getElementById("order_number").value;
  findByStatusid();
}

function findByStatusid()
{
 $.ajax(
 {
   url:"/index.php/Admin/Order/find",
   data:{'order_status':order_status,'order_number':order_number},
   dataType:'json',
   type:'get',
   success:function(msg)
   {
     var item = msg.split(',');
     num_entries = item[0];
     array_item  = item[1];
     totalnum.innerHTML = array_item;
     item.splice(0,2);
     order_ids = item.join();
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
       url:"/index.php/Admin/Order/getOrderList",
       data:{'page_index':page_index,'order_ids':order_ids},
       dataType:'json',
       type:'get',
       success:function(msg)
       {
       	  var payWay = "";
       	  var orderStatus = "";
          var s = "";
          $.each(msg,function(n, v)
          {
          	 var goods_img   = v.goods_logo;
          	 var goods_logo_img    = "http://www.zgxnjz.cn"+ goods_img;
             var date1 = v.upd_time*1000;
             var date2 = v.add_time*1000;
             
             
             if(v.order_pay == 0) 
             {
             		payWay = "支付宝支付";
             }
             else if(v.order_pay == 1)
             {
             		payWay = "微信支付";
             }
             else if(v.order_pay == 2)
             {
             		payWay = "银行卡快捷支付";
             }
             else if(v.order_pay == 3)
             {
             		payWay = "货到付款";
             }
             else
             {
             		payWay = "商品处于未付款状态,支付方式未知";
             }
            
             var num = parseInt(v.order_status); 	
             switch(num)
						 {
							 case 1:
							   orderStatus = "待付款";
							   break;
							 case 2:
							   orderStatus = "已取消";
							   break;					  
							 case 3:
							   orderStatus = "进行中";
							   break;						  
							 case 4:
							   orderStatus = "已完成";
							   break;
							 default:
								 orderStatus = "订单状态未知";
						 }
             
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
                	  '<div align="center"><span class="STYLE19"> '+v.order_id+ '</span></div>'+
                  '</td>'+
             
                 '<td class="STYLE6" height="100" bgcolor="#FFFFFF">'+
                   '<div align="center"><span class="STYLE19">'+v.order_number+'</span></div>'+
                '</td>'+
                
                 '<td class="STYLE6" height="100" bgcolor="#FFFFFF">'+
                   '<div align="center"><span class="STYLE19">'+payWay+'</span></div>'+
                '</td>'+
                
                 '<td class="STYLE6" height="100" bgcolor="#FFFFFF">'+
                   '<div align="center"><span class="STYLE19">'+orderStatus+'</span></div>'+
                '</td>'+
                
                 '<td class="STYLE6" height="100" bgcolor="#FFFFFF">'+
                   '<div align="center"><span class="STYLE19">'+v.order_price+'</span></div>'+
                '</td>'+
                
                 '<td class="STYLE6" height="100" bgcolor="#FFFFFF">'+
                   '<div align="center"><span class="STYLE19">'+v.goods_name+'</span></div>'+
                '</td>'+
                
                 '<td class="STYLE6" height="100" bgcolor="#FFFFFF">'+
                   '<div align="center"><span class="STYLE19">'+
                   		'<img class="order_img" src="'+goods_logo_img+'" alt="图片">'+
                   '</span></div>'+
                '</td>'+
                
                  '<td class="STYLE6" height="100" bgcolor="#FFFFFF">'+
                   '<div align="center"><span class="STYLE19">'+v.goods_number+'</span></div>'+
                '</td>'+
                
                 '<td class="STYLE6" height="100" bgcolor="#FFFFFF">'+
                   '<div align="center"><span class="STYLE19">'+v.add_time+'</span></div>'+
                '</td>'+
              '</tr>';
          });
          $('#order_table tr:gt(3)').remove();
          $('#order_table').append(s);  
        }
      });
    }
  }
 findByStatusid();
</script>



</html>