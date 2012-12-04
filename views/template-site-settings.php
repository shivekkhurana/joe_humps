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
			<div class="span-4" id="sidebar"><!--start:#sidebar--> 
				<ul> 
					<li><a href="/sites" title="sites" alt="sites">SITES</a></li> 
					<li><a href="/account" title="settings" alt="settings">ACCOUNT</a></li> 
					<li><a  href="/signout" title="signout" alt="signout">SIGNOUT</a></li> 
				</ul>
			</div>	<!--end:#sidebar--> 
			
			<div class="span-12 pull-1" id="sites"> <!--start:#sites-->
				<?php 
					echo '<div class="span-4 colborder"><h5 class="quiet">likes : '.$likes.'</h5></div>';
					echo '<div class="span-4 colborder"><h5 class="quiet">dislikes : '.$dislikes.'</h5></div>';
					echo "<div class=\"span-2 last\"><a href=\"/sites/delete/$siteId\" class=\"notify deleteSitePrompt\">delete</a></div>";					
				?>
				<hr/>
				<div class="span-12" id="tab-nav"><!--start:#tab-nav-->
					<ul> 
						<li><a href="#embed" title="embed code" alt="embed code">embed codes</a></li> 
						<li><a href="#basic" title="edi info" alt="edit info">edit info</a></li> 
					</ul> 
					<hr/>
				</div><!--end:#tab-nav-->
				<div class="tabs"><!--start:.tab-container-->
					<div class="span-12 tab" id="embed"><!--start:#embed-->
						<h3 class="quiet">embed codes</h3>
						<hr class="space"/>
						<div class="span-6 colborder">
							<h5 class="quiet">handle (with controls)</h5>
							<?php echo "<iframe src=\"http://humps.cz.cc/handle/$siteId\"></iframe>";?>
						</div>
					
						<div class="span-3 last">
							<h5 class="quiet">embed code:</h5>
							<div class="small span-4">
							<?php
								$value = "&#60;iframe src=\"http://humps.cz.cc/handle/$siteId\" height=\"90px\" style=\"border:0;\" width=\"225px\"&#62;&#60;/iframe&#62;";
								echo "<textarea class=\"quiet span-4\">".$value."</textarea>";
							?>
							</div>
						</div>
					
						<hr/>
						<div class="span-6 colborder">
							<h5 class="quiet">indicator (without controls)</h5>
							<?php echo "<iframe src=\"http://humps.cz.cc/indicator/$siteId\"></iframe>";?>
						</div>
					
						<div class="span-3 last">
							<h5 class="quiet">embed code:</h5> 
							<div class="small span-4">
							<?php
								$value = "&#60;iframe src=\"http://humps.cz.cc/indicator/$siteId\" height=\"90px\" style=\"border:0;\" width=\"225px\"&#62;&#60;/iframe&#62;";
								echo "<textarea class=\"quiet span-4\">".$value."</textarea>";
							?>
							</div>
						</div>
					
						<hr>
					</div><!--end:#embed-->
				
					<div class="span-12 tab" id="basic"><!--start:#basic-->
						<h3 class="quiet">edit info</h3>
						<hr class="space"/>
						<?php echo "<form id=\"opt\" action=\"/sites/update/$siteId\">";?>
							<div class="span-10">
								<label for="siteUrl" class="quiet">Url </label><br/>
								<input type="text" name="siteUrl" id="siteUrl" class="text quiet" <?php echo "value=\"".$siteUrl."\"";?>/>
							</div><hr class="space"/>
							<div class="span-10">
								<label for="siteName" class="quiet">Name </label><br/>
								<input type="text" name="siteName" id="siteName" class="text quiet" <?php echo "value=\"".$siteName."\"";?>/>
							</div><hr class="space"/>
							<div class="span-10">
								<input type="submit" class="clean-green" value="Save">
								<img src="/assets/ajax-loader.gif" id="signup-processing" alt="processing..."/>
								<div id="notify-add-a-site" class="display-none notify"></div>
							</div>
						</form>
						<hr class="space"/><hr/>
					</div><!--end:#basic-->
				</div><!--end:.tab-container-->	
				<div class="span-3 push-8"><a href="/sites" alt="sites" title="sites" class="">&larr; back home</a></div>
			</div> <!--end: sites--> 
			<hr class="space"/> 
			<hr class="span-18"/> 
			<div class="quiet span-12" id="footer"> 
				<?php realName();?>
				<a href="#" >help</a> 
				<a href="#" >about</a> 
			</div> 
		</div> 
	</body> 
	<?php echo "<script type=\"text/javascript\"> var sid = '$siteId';</script>";?>
</html> 
 
