<!--


  /\ \   /\  __ \   /\  ___\   /\ \_\ \   /\ \/\ \   /\ "-./  \   /\  == \ /\  ___\   
 _\_\ \  \ \ \/\ \  \ \  __\   \ \  __ \  \ \ \_\ \  \ \ \-./\ \  \ \  _-/ \ \___  \  
/\_____\  \ \_____\  \ \_____\  \ \_\ \_\  \ \_____\  \ \_\ \ \_\  \ \_\    \/\_____\ 
\/_____/   \/_____/   \/_____/   \/_/\/_/   \/_____/   \/_/  \/_/   \/_/     \/_____/ 


-->
<?php include '../common.php'; include "../connection.php";?>
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
		<link rel="stylesheet" href="/css/facebox.css" type="text/css" media="screen, projection" /> 
		<!--js-->
		<script type="text/javascript" src="/js/head.js"></script>
		<script type="text/javascript">
       		head.js('/js/cookie.js','http://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js','/js/core.js', '/js/facebox.js',function(){});
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
			
			
			<div class="span-14 pull-1" id="sites"> 
				<ul>
					<?php
						$userId = getUserId('sessionId', $_COOKIE['_aok_']);
						$query  = mysql_query("SELECT siteName,siteId,likes,dislikes FROM main WHERE userId ='$userId'");
						if (mysql_num_rows($query) == 0 )
							echo "<li class=\"quiet\">You haven't added any site yet.</li>";
							
						else
						{
							echo 
							"<li class=\"quiet\">
								<div class=\"url span-4\"><h6 class=\"quiet\">name</div>
								<div class=\"no-of-users span-3\"><h6 class=\"quiet\">likes</h6></div>
								<div class=\"level span-3\"><h6 class=\"quiet\">dislikes</h6></div>
							</li>";
						}
						
						while ($backpass = mysql_fetch_array($query))
						{
							$sid  = $backpass['siteId'];
							$snm  = $backpass['siteName'];
							$liks = $backpass['likes'];
							$ds   = $backpass['dislikes'];
							echo "
							<li class=\"quiet hover-border\" id =\"$sid\" >
								<div class=\"name span-4\">$snm</div>
								<div class=\"span-3\">$liks</div>
								<div class=\"span-3\">$ds</div>
								<div class=\"span-1\"><a href=\"/sites/settings/$sid\">settings</a></div>
							</li>
							
							";
							
						}
					?>
					<li class=""><a href="#add-a-site" rel="facebox" id="add-a-site-link">add a site</a></li>  
					<div id="add-a-site" class="display-none span-9"> 
						<form method="post" action="/sites/add"> 
							<div class="span-10">
								<label for="siteName" class="quiet">Site name</label><br/> 
								<input id="siteName" class="text" name="siteName"/> 
							</div>
							
							<div class="span-10">
								<label for="siteUrl" class="quiet">Site url</label><br/> 
								<input id="siteUrl" class="text" name="siteUrl" value="http://"/> 
							</div>
																					
							<div class="span-10">	
								<input type="submit" class="clean-green" value="Save"/>
								<img src="/assets/ajax-loader.gif" id="signup-processing" alt="processing..."/>
							</div>
								
							<hr class="space"/>
							<div id="notify-add-a-site" class="display-none notify"></div>
						</form>
					</div> 
			</div> <!--end: sites--> 
			<hr class="span-15"/>
			<div class="span-12 quiet" id="footer">
				<?php realName();?>
				<a href="#" >help</a>
				<a href="#" >about</a>
			</div>
		</div>
	</body>
</html>
