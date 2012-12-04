<?php 
	$theme = explode(',',$theme);	
	//theme => background-col,message, indi-message
	$k = ($likes + $dislikes);
	if ($k > 0)
	{
		$l = ($likes/$k)*100;
		$d = ($dislikes/$k)*100;
	}
	else
	{
		$l = 3;
		$d = 0;
	}		
?>
<!DOCTYPE html> 
<html>
	<head> 
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
		<meta name="keywords" content="" /> 
		<meta name="description" content=""/>  
		<link href='http://fonts.googleapis.com/css?family=Droid+Sans' rel='stylesheet' type='text/css'> 
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>
		<?php echo "<script type=\"text/javascript\"> var sid = '$siteId';</script>\n";?>
		<script type="text/javascript">
			$(function(){
				$('.send').click(function(){
					$('.handle').animate({opacity : 0}, 200);
					var action = $(this).attr('id');
					var type = 'increment';
					if (action == "no") type='decrement';
					$.post('/'+type+'/'+sid,{},function(backpass){
						$('.handle').text('your review has been saved').animate({opacity : 1}, 600);
						$('.container').load('http://humps.cz.cc/indicator/'+sid);	
					});
					return false;
				});
			});
		</script>
	</head> 
	
	<style>
	*{padding:0;margin:0;}
	html {font-size:100.01%;background-color:<?php echo $theme[0]?>;}
	body {font-size:70%;color:#666;font-family: 'Droid Sans', arial, serif;}
	.scale{background-color:#E8E8E8;height:5px;width:100px;margin-top:5px;}
	.count{height:5px;}
	.likes .count{background-color:#ADD8E6;width:<?php echo $l.'px'?>;}
	.dislikes .count{background-color:#F08080;width:<?php echo $d.'px'?>;}
	.meter{width:210px;padding:6px;}
	span {margin-left:5px;}
	.dislikes{float:right;}
	.likes{float:left;}
	.handle{margin-bottom:10px;padding:5px;border-top:1px solid #e2e2e2;border-bottom:1px solid #e2e2e2;background-color:rgba(0,0,0,0.04);}
	.info{margin-top:40px;padding-left:1px;}
	.info, .info a{color:#aaa;}
	.info a{float:right;padding:0 0 3px 0; border-bottom:1px solid #d7e4f4;}
	.info a:hover{border-color:#94b8E2;}
	a{padding-left:10px;color:#06C;text-decoration:none;}
	a:hover{color:#94b8E2;}
	</style>
	
	<body>
		<div class="container">
			<div class="meter">
				<div class="handle"><?php echo $theme[1]?><a href="#" class="send" id="yes">yes</a> <a href="#" class="send" id="no">no</a></div>	
				<div class="likes">
					<span>likes</span> 
					<div class="scale"><div class="count"></div></div>
				</div>
				<div class="dislikes">
					<span>dislikes</span> 
					<div class="scale"><div class="count"></div></div>
				</div>	
				<div class="info"><?php if($k > 0)echo "total votes : ".$k;?><a href="#">joeHumps</a></div>
			</div>
		</div>
	</body>
</html>

