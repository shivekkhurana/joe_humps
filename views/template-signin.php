<!--


  /\ \   /\  __ \   /\  ___\   /\ \_\ \   /\ \/\ \   /\ "-./  \   /\  == \ /\  ___\   
 _\_\ \  \ \ \/\ \  \ \  __\   \ \  __ \  \ \ \_\ \  \ \ \-./\ \  \ \  _-/ \ \___  \  
/\_____\  \ \_____\  \ \_____\  \ \_\ \_\  \ \_____\  \ \_\ \ \_\  \ \_\    \/\_____\ 
\/_____/   \/_____/   \/_____/   \/_/\/_/   \/_____/   \/_/  \/_/   \/_/     \/_____/ 


-->
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
		<div class="container  prepend-1">
			<div class="span-13 quiet">
				<div class="span-2"><h3 class="quiet">Sign in</h3></div><hr/><hr class="space"/>
				
				<form id="signin" action="/authenticate" method="post" class="push-1">
					<div class="span-5 colborder">
						<label for="email" class="quiet">Email </label><br/>
						<input type="text" name="email" id="email" class="text quiet span-5"/>			
					</div>
					<div class= "span-5 last">
						<label for="password" class="quiet">Password </label><span class="small prepend-1"><a href="/forgot_password">forgot password ?</a></span><br/>
						<input type="password" name="password" id="password" class="text quiet span-5"/>
					</div>
					<div class="span-5">
						<input type="submit" class="clean-green" value="Sign in"/>
						<img src="/assets/ajax-loader.gif" id="signup-processing" alt="processing..."/>
					</div>
				</form>
				<div class="notify push-1 span-8"></div>
				<hr/>
				<div class="span-13 quiet">
					<a href="/about" title="about">about</a>
					<span class="prepend-8">not a member ? <a href="/signup" class="" title="signup">signup</a></span>
				</div>	
				
			</div> <!--end:signin-->		
		</div>
	</body>
</html>

