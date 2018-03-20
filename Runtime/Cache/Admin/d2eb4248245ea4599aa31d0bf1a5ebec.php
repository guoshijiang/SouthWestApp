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
               <form action="/index.php/Admin/Goods/showlist" method="post"  >
                    <input type="text" class="txt" placeholder="请输入商品关键字" id="goods_name" name="goods_name" value=""/>
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
          <td width="5%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10">商品名称</span></div></td>
          <td width="3%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10">价格</span></div></td>
          <td width="3%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10">数量</span></div></td>
          <td width="3%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10">重量</span></div></td>
          <td width="12%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10">商品详情介绍</span></div></td>
          <td width="4%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10">类型</span></div></td>
          <td width="6%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10">产地</span></div></td>
          <td width="3%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10">是否推荐</span></div></td>
          <td width="5%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10">商品logo图片</span></div></td>
          <td width="5%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10">相册图片1</span></div></td>
          <td width="5%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10">相册图片2</span></div></td>
          <td width="5%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10">相册图片3</span></div></td>
          <td width="15%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10">基本操作</span></div></td>
      </tr>
      <?php if(is_array($info)): foreach($info as $k=>$v): ?><tr>
              <td height="100" bgcolor="#FFFFFF" class="STYLE6"><div align="center"><span class="STYLE19" ><?php echo ($v["goods_name"]); ?></span></div></td>
              <td height="100" bgcolor="#FFFFFF" class="STYLE6"><div align="center"><span class="STYLE19" ><?php echo ($v["goods_price"]); ?></span></div></td>
              <td height="100" bgcolor="#FFFFFF" class="STYLE6"><div align="center"><span class="STYLE19" ><?php echo ($v["goods_number"]); ?></span></div></td>
              <td height="100" bgcolor="#FFFFFF" class="STYLE6"><div align="center"><span class="STYLE19" ><?php echo ($v["goods_weight"]); ?></span></div></td>
              <td height="100" bgcolor="#FFFFFF" class="STYLE6"><div align="center"><span class="STYLE19" ><?php echo ($v["goods_introduce"]); ?></span></div></td>
              <td height="100" bgcolor="#FFFFFF" class="STYLE6"><div align="center"><span class="STYLE19" ><?php echo ($v["cat_name"]); ?></span></div></td>
              <td height="100" bgcolor="#FFFFFF" class="STYLE6"><div align="center"><span class="STYLE19" ><?php echo ($v["country"]); ?></span></div></td>
              <td height="100" bgcolor="#FFFFFF" class="STYLE6"><div align="center"><span class="STYLE19" > <?php echo ($v['is_rec']!=='0'?'推荐':'否'); ?></span></div></td>
              <td height="100" bgcolor="#FFFFFF" class="STYLE6"><div align="center"><span class="STYLE19"><img class="yuangong_img" src='<?php echo (SET_URL); echo (substr($v["goods_s_logo"],2)); ?>'alt='图片'  /></span></div></td>
              <td height="100" bgcolor="#FFFFFF" class="STYLE6"><div align="center"><span class="STYLE19"><img class="yuangong_img" src='<?php echo (SET_URL); echo (substr($v["goods_s_xc1"],2)); ?>'alt='图片'  /></span></div></td>
              <td height="100" bgcolor="#FFFFFF" class="STYLE6"><div align="center"><span class="STYLE19"><img class="yuangong_img" src='<?php echo (SET_URL); echo (substr($v["goods_s_xc2"],2)); ?>'alt='图片'  /></span></div></td>
              <td height="100" bgcolor="#FFFFFF" class="STYLE6"><div align="center"><span class="STYLE19"><img class="yuangong_img" src='<?php echo (SET_URL); echo (substr($v["goods_s_xc3"],2)); ?>'alt='图片'  /></span></div></td>
              <td height="100" bgcolor="#FFFFFF"><div align="center" class="STYLE21"><a style='color:rgb(59,99,119)'  href="<?php echo U('goodsxiangqing',array('goods_id'=>$v['goods_id']));?>">详情</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a style='color:rgb(59,99,119)'  href="<?php echo U('tianjiatype',array('goods_id'=>$v['goods_id']));?>">添加属性</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a style='color:rgb(59,99,119)'  href="<?php echo U('upd',array('goods_id'=>$v['goods_id']));?>">修改</a>&nbsp;&nbsp;&nbsp;
              <a style='color:rgb(59,99,119)'  href=" <?php echo U('del',array('goods_id'=>$v['goods_id']));?>" onclick="if(confirm('确认要删除我么？主人')){return true;}else{return false;}" >删除</a>  </div></td>
            </tr><?php endforeach; endif; ?>
    </table></td>
  </tr>
 </table>
 <!-- 分页信息 start -->
<div id="Pagination" class="pagination">
<!-- 这里显示分页 -->
</div>
<!-- 分页信息 end -->
</body>
<script type="text/javascript">
//"页面加载"完毕就给span标签设置点击高亮显示的onclick事件
 $(function(){
  $('#xuanzhou_box a').click(function(){
    //对应标签高亮显示
    $('#xuanzhou_box a').attr('class','xuanzhou');//全部span标签变暗
    $(this).attr('class','liang');//当前点击的标签"高亮"
  });
});
var cat_id =0;
var cat_id10  = $("#tt a");
  // alert(cat_id10);
   cat_id10.click(function(){
      cat_id = $(this).attr("value");
       // alert(cat_id);
       ss();
   });
var  goods_name;
function search(){
     goods_name= document.getElementById("goods_name").value;
      //alert(goods_name);
     ss();
  }
var num_entries;
var aa;
var zongshu= document.getElementById("zongshu");
function ss(){
   $.ajax({
       url:"/index.php/Admin/Goods/find",
       data:{'cat_id':cat_id,'goods_name':goods_name},
       dataType:'json',
       type:'get',
       success:function(msg){
        //alert(msg);
         var arr1 = msg.split(',');
        //alert(arr1);
         num_entries = arr1[0];
         aa          = arr1[1];
         zongshu.innerHTML = aa;
         arr1.splice(0,2);
         goods_ids = arr1.join();
         //alert(goods_ids);
        ajs();           
    }
   });
 }
 function ajs(){
  (function() {
    $("#Pagination").pagination(num_entries, {
      num_edge_entries: 1, //边缘页数
      num_display_entries: 4, //主体页数
      callback: pageselectCallback,
      items_per_page:5 //每页显示1项
    });
   })(); 
    function pageselectCallback(page_index, jq){
      $.ajax({
       url:"/index.php/Admin/Goods/getgoods",
       data:{'page_index':page_index,'goods_ids':goods_ids},
       dataType:'json',
       type:'get',
       success:function(msg){
        //alert(msg);
           var s = "";
                  $.each(msg,function(n,v){
                     var is_rec    = v.is_rec=='0'?'否':'推荐';
                     var u         = "http://www.zgxnjz.cn";
                     var logo      = v.goods_s_logo;
                     var logo      = u+logo;//商品logo图片
                     var xc1       = v.goods_s_xc1;
                     var xc1       = u+xc1;//商品相册图片1
                     var xc2       = v.goods_s_xc2;
                     var xc2       = u+xc2;//商品相册图片2
                     var xc3       = v.goods_s_xc3;
                     var xc3       = u+xc3;//商品相册图片3
                       s +='<tr><td class="STYLE6" height="100" bgcolor="#FFFFFF"><div align="center"><span class="STYLE19">'+v.goods_name+'</span></div></td><td class="STYLE6" height="100" bgcolor="#FFFFFF"><div align="center"><span class="STYLE19">'+v.goods_price+'</span></div></td><td class="STYLE6" height="100" bgcolor="#FFFFFF"><div align="center"><span class="STYLE19">'+v.goods_number+'</span></div></td><td class="STYLE6" height="100" bgcolor="#FFFFFF"><div align="center"><span class="STYLE19">'+v.goods_weight+'</span></div></td><td class="STYLE6" height="100" bgcolor="#FFFFFF"><div align="center"><span class="STYLE19">'+v.goods_introduce+'</span></div></td><td class="STYLE6" height="100" bgcolor="#FFFFFF"><div align="center"><span class="STYLE19">'+v.cat_name+'</span></div></td><td class="STYLE6" height="100" bgcolor="#FFFFFF"><div align="center"><span class="STYLE19">'+v.country+'</span></div></td><td class="STYLE6" height="100" bgcolor="#FFFFFF"><div align="center"><span class="STYLE19"> '+is_rec+'</span></div></td><td class="STYLE6" height="100" bgcolor="#FFFFFF"><div align="center"><span class="STYLE19"><img class="yuangong_img" src="'+logo+'" alt="logo图片"></span></div></td><td class="STYLE6" height="100" bgcolor="#FFFFFF"><div align="center"><span class="STYLE19"><img class="yuangong_img" src="'+xc1+'" alt="图片"></span></div></td><td class="STYLE6" height="100" bgcolor="#FFFFFF"><div align="center"><span class="STYLE19"><img class="yuangong_img" src="'+xc2+'" alt="图片"></span></div></td><td class="STYLE6" height="100" bgcolor="#FFFFFF"><div align="center"><span class="STYLE19"><img class="yuangong_img" src="'+xc3+'" alt="图片"></span></div></td><td height="100" bgcolor="#FFFFFF"><div class="STYLE21" align="center"><a style="color:rgb(59,99,119)" href="/index.php/Admin/Goods/goodsxiangqing/goods_id/'+v.goods_id+'">详情</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a style="color:rgb(59,99,119)" href="/index.php/Admin/Goods/tianjiatype/goods_id/'+v.goods_id+'">添加属性</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a style="color:rgb(59,99,119)" href="/index.php/Admin/Goods/upd/goods_id/'+v.goods_id+'">修改</a>&nbsp;&nbsp;&nbsp;<a style="color:rgb(59,99,119)" href=" /index.php/Admin/Goods/del/goods_id/'+v.goods_id+'">删除</a>  </div></td> </tr>';
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