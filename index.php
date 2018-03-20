<?php 
//前台APP端使用 
 header("Content-type:text/html;charset=utf-8");  
 header("Content-type:text/json;charset=utf-8");
 header("Access-Control-Allow-Origin: * ");       
 header("Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE");
 header("Access-Control-Allow-Headers: Origin, X-Requested-with, Content-Type, Content-Length,  POST, Accept, User-Agent, x-access-token, version"); //add by guosj //header('Access-Control-Max-Age: 172800'); 
 
 //开启调试模式 
 define('APP_DEBUG',True); 
 
//引入静态资源常量 
 define('SET_URL',"http://www.zgxnjz.cn/"); 

 //前台 
 define('CSS_HOME_URL',SET_URL."Public/Home/css/"); 
 define('JS_HOME_URL',SET_URL."Public/Home/js/"); 
 define('IMG_HOME_URL',SET_URL."Public/Home/img/"); 

 //后台
 define('CSS_ADMIN_URL',SET_URL."Public/Admin/css/"); 
 define('JS_ADMIN_URL',SET_URL."Public/Admin/js/");
 define('IMG_ADMIN_URL',SET_URL."Public/Admin/images/");
 //插件
 define('PLUGIN_URL',SET_URL."Common/Plugin/");
 require 'ThinkPHP/ThinkPHP.php';
?>
