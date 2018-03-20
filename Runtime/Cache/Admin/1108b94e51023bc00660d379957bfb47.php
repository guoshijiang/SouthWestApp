<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
    <style type="text/css">
         *{
         	margin:0;
         	padding:0;
         }
        .header{
        	height: 80px;
        	background: url(<?php echo (IMG_ADMIN_URL); ?>nav.jpg);
        	background-size: cover;
        }
        .header .nav{
        	width: 29%;
        	line-height: 80px;
        	float: right;
        	margin-right: 2%;
        }
        .header .nav a{
        	color: #fff;
        	text-decoration: none;
        }
        .header .nav i{
        	width: 0;
        	height: 50px;
        	border:1px solid #ccc;
        	margin:0 10px;
        }
       
        .header .wen{
        	width: 27%;
        	height: 80px;
        	float: left;
        	color: #EC2194;
        	margin-left: 2%;
        	line-height: 80px;
        	font-weight: bold;
        	text-shadow:10px 8px 8px #3BB72C;
        	
        }
        .header .wen span{
        	font-size: 40px;
        }
        @media screen and (max-width: 1240px) {
            .header .wen span{
                font-size: 30px;
            }
        }
        .header .yh{
            width: 38%;
            height: 80px;
            float: left;
        }
        .header .yh span{
            color: #fff;
            line-height: 80px;
            float: left;
            margin-left: 2%;
        }

    </style>
</head>
<body>
	<div class="header">
	    <div class="wen">
	    	<span>西南家政管理系统</span>
	    </div>
        <div class="yh">
          <span>当前登录用户：<strong style="color:#EC2194;font-size: 18px;"><?php echo (session('name')); ?></strong></span>
          <span>用户角色：<strong style="color:#EC2194;font-size: 18px;"><?php echo ($info[0][role_id]!=="0"?$info[0]['role_name']:'超级管理员'); ?></strong></span>
        </div>
		<div class="nav">  
		    <i></i>
			<a href="<?php echo U('Manager/changepassword',array('mg_id'=>$v['admin_id']));?>" target="rightFrame">修改密码</a>
			<i></i>
			<a href="<?php echo U('Manager/logout');?>" onclick="if(confirm('确认要退出系统么？')){return true;}else{return false;}"  target="_top">退出系统</a>
		</div>
	</div>
</body>
</html>