<!--


  /\ \   /\  __ \   /\  ___\   /\ \_\ \   /\ \/\ \   /\ "-./  \   /\  == \ /\  ___\   
 _\_\ \  \ \ \/\ \  \ \  __\   \ \  __ \  \ \ \_\ \  \ \ \-./\ \  \ \  _-/ \ \___  \  
/\_____\  \ \_____\  \ \_____\  \ \_\ \_\  \ \_____\  \ \_\ \ \_\  \ \_\    \/\_____\ 
\/_____/   \/_____/   \/_____/   \/_/\/_/   \/_____/   \/_/  \/_/   \/_/     \/_____/ 


-->
<?php include '../common.php';?>
<!DOCTYPE html> 
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
		<meta name="keywords" content="joeHumps, user review app, user review, like button, likes app, happiness meters, user rating meters, likes dislikes" /> 
		<meta name="description" content="Joehumps helps you to find out whether your users are happy or not."/>
		<!-- Framework CSS --> 
		<link rel="stylesheet" href="/css/core.css" type="text/css" media="screen, projection"> 
		<link rel="stylesheet" href="/css/screen.css" type="text/css" media="screen, projection"> 
		<link rel="stylesheet" href="/css/print.css" type="text/css" media="print"> 
		<!--[if lt IE 8]><link rel="stylesheet" href="/css/ie.css" type="text/css" media="screen, projection"><![endif]--> 
		<link rel="stylesheet" href="/css/buttons.css" type="text/css" media="screen, projection" /> 
		<!--js-->
		<script type="text/javascript" src="/js/head.js"></script>
		<script type="text/javascript">
       		head.js('/js/cookie.js','http://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js','/js/core.js',function(){});
		</script>
	</head>
	<body>
		<div class="container prepend-1">
			<div class="span-4" id="sidebar">
				<ul>
					<li><a href="/sites" title="sites" alt="sites">SITES</a></li>
					<li><a href="/account" title="account" alt="account">ACCOUNT</a></li>
					<li><a  href="/signout" title="signout" alt="signout">SIGNOUT</a></li>
				</ul>
			</div>	<!--end: sidebar-->
			<div class="span-10">
				<div>
					<h3 class="quiet">Name & email</h3>
					<form method="post" action="/account/update" id="first"> 
						<div class="span-10">
							<label for="realName" class="quiet">Real name</label><br/> 
							<input id="realName" class="quiet text" name="realName" <?php echo "value=\"$realName\"";?>/> 
						</div>
					
						<div class="span-10">
							<label for="email" class="quiet">Email</label><br/> 
							<input id="email" class="quiet text" name="email" <?php echo "value=\"$email\"";?>/> 
						</div>
						<hr class="space"/>
						<input type="submit" class="clean-green" value="Save">
						<img src="/assets/ajax-loader.gif" id="signup-processing" alt="processing..."/> 
						<div class="display-none notify"></div>
					</form>
				</div><!--end:#first-->
				<hr class="space"/>
				<div>
					<h3 class="quiet">Change password</h3>
					<form method="post" action="/account/update/password"  id="second"> 
						<div class="span-10">
							<label for="currPass" class="quiet">Current password</label><br/> 
							<input id="currPass" class="quiet text" type="password" name="currPass"/> 
						</div>
					
						<div class="span-10">
							<label for="password" class="quiet">New password</label><br/> 
							<input id="password" class="quiet text" type="password" name="password"/> 
						</div>
						<hr class="space"/>
						<input type="submit" class="clean-green" value="Change password">
						<img src="/assets/ajax-loader.gif" id="signup-processing" alt="processing..."/> 
						<div class="display-none notify"></div>
					</form>
				</div><!--end:#second-->			
			</div>
			<hr class="span-15"/>
			<div class="span-12 quiet" id="footer">
				<?php realName();?>
				<a href="#" >help</a>
				<a href="#" >about</a>
			</div>
		</div>
	</body>
</html>

	