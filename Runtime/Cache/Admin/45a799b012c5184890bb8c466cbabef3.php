<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
		<title></title>
		<style>
			html, body
			{
				height:100%;
			}
			body
			{
				background:#c8517b; 
				display: flex;
				justify-content:center; 
				align-items:center;
				overflow:hidden;
			}
			.main
			{
				width:200px;
				height:200px;
				position:relative;
			}
			.main>div
			{
				width:200px;
				height:200px;	
				position:absolute;
				left:0px;
				top:0px;
			}
			
			.circle
			{
				border: solid 1px #ccc;
				border-radius:50%;
				opacity:0;
			}
			.circle.go
			{
				animation-name: change; 
				animation-duration: 3s;
				animation-timing-function: linear;
				animation-iteration-count: infinite;
			}

			.center
			{
				cursor: pointer;
			}

			@keyframes change
			{
				from
				{
					transform:scale(1);
					opacity: 0.4;
				}
				to
				{
					transform:scale(4);
					opacity: 0;
				}
			}
			
			.fort
			{
				font-size:50px;
				height: 80px;
      	color: #EC2194;
      	line-height: 80px;
      	font-weight: bold;
			}
			
</style>
</head>
<body>
	<div class="main">
			<div class="circle"></div>
			<div class="circle"></div>
			<div class="circle"></div>
			<div class="circle"></div>
			<div class="circle"></div>
			<div class="center">
				<img src="<?php echo (IMG_ADMIN_URL); ?>china.png" alt="" />
			</div>
		</div>
		<div class="fort">贵州毕节</div>
		<audio src=""></audio>
		<script>
			 //document.querySelector(".center").onclick  init(); 
			window.onload = function()
			{
				var circles = document.querySelectorAll(".circle");
				for(var i = 0; i < circles.length; i++)
				{
					circles[i].style.animationDelay=i * 0.6 + "s";
					circles[i].classList.add("go");
				}
				var audio = document.querySelector("audio");
				audio.loop = "loop";
				audio.play();
			}
		</script>
</body>
</html>