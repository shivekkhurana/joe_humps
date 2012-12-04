<?php
	require_once 'limonade.php';
	include 'connection.php';
	include 'common.php';
	$pi = 22.0/7.0;
	
	# (.)
	dispatch('/error/:code', 'eHandler');
	function eHandler($code)
	{
		$suggestions = array('Actually we screwed up. You have reached a broken link.','You can return <a href="/">home</a> or <a href="/signup">sign up</a>.');
		return render('template-info.php', NULL, array('mainCause' => 'Damn! you have stumbled on our top secret webpage.', 'suggestions' => $suggestions));
	}
	
	dispatch_post('/increment/:sid','increment');
	function increment($sid)
	{
		$query = mysql_query("SELECT likes FROM main WHERE siteId= '$sid'");
		$backpass = mysql_fetch_array($query, MYSQL_NUM);
		$likes = $backpass[0]+1;
		mysql_query("UPDATE main SET likes = '$likes' WHERE siteId = '$sid'");
		return "ok";
	}
	
	dispatch_post('/decrement/:sid','decrement');
	function decrement($sid)
	{
		$query = mysql_query("SELECT dislikes FROM main WHERE siteId= '$sid'");
		$backpass = mysql_fetch_array($query, MYSQL_NUM);
		$dislikes = 1 + $backpass[0];
		mysql_query("UPDATE main SET dislikes = '$dislikes' WHERE siteId = '$sid'");
		return "ok";
	}
	# (/.)
	
	# (..)
	function makeSignup($email,$password)
	{
		$uid = uid(6);
		mysql_query("INSERT INTO auth(userId,email,password) VALUES('$uid','$email','$password')");
	}
	
	dispatch('/signup','signup');
	function signup()
	{
		if (auth()) rdr('/sites');
		return render('template-signup.php');
	}
	
	dispatch_post('/signup','processSignup');
	function processSignup()
	{
		$email    = $_POST['email'];
		$password = $_POST['password'];
		$p        = lengthCheck($password);
		$e        = emailCheck($email);
		$eo       = FALSE;
		if ($e == "ok") 
			$eo = TRUE;
		if ($p == TRUE && $eo == TRUE)
		{
			makeSignup($email,$password);
			makeSignin($email,$password);
			//return "account made";
		}
		
		if (!$p)
			return "you forgot to enter your password";
		if ($e != "ok")
			return $e; 
		if ($e = "ok")
			return $e;	
	}
	
	function makeSignin($email,$password)
	{
		$e = lengthCheck($email);
		$p = lengthCheck($password);
		if (!$p)
			return "you didn't enter your password.";
		if ($e)
		{
			$query    = mysql_query("SELECT password FROM auth WHERE email = '$email'");
			$backpass = mysql_fetch_array($query,MYSQL_NUM);
			if ($backpass[0] == $password)
			{
				$sid = uid(7);
				mysql_query("UPDATE auth SET sessionId = '$sid' WHERE email = '$email'");
				setcookie('_aok_', $sid, time() + 2*3600);
				return "ok";
				//redirect_to('/sites');
			} 
			else
				return "darn! invalid username, password combination.";
		}
		else
			return "you didn't enter your email.";
	}
	
	dispatch('/signin','signin');
	function signin()
	{
		if (auth()) rdr('/sites');
		else return render('template-signin.php');
	}
	
	dispatch_post('/authenticate','authenticate');
	function authenticate()
	{
		$email    = $_POST['email'];
		$password = $_POST['password'];	
		$a        = makeSignin($email,$password); 
		return $a;	
	}
		
	dispatch('/signout','signout');
	function signout()
	{	
		if (auth())
		{
			$userId = getUserId('sessionId',$_COOKIE['_aok_']);
			setcookie('_aok_','signedOut',time()-3600);
			mysql_query("UPDATE auth SET sessionId = NULL WHERE userId = '$userId'");
			rdr('/');
		}	
		else 
			rdr('/');
		
	}
	
	dispatch('/forgot_password', 'fp');
	function fp()
	{
		if (auth()) rdr('/sites');
		else
			return render('template-forgot.php');
	}
	
	dispatch_post('forgot_password', 'fpp');
	function fpp()
	{
		echo "good going..";
	}
	
	# (/..)
	
	# (...)
			
	//landing page
	dispatch('/','landing');
	function landing()
	{
		if (auth()) rdr('/sites');
		return html('template-landing.php');
	}
	
	//main page
	dispatch('/sites','sites');
	function sites()
	{
		if (auth())
		{
			//return main template
			return render('template-sites.php');
		}
		
		else
		{
			$suggestions = array("You can <a href=\"/signin\">signin</a> if you feel like.",'You can <a href="/signup">signup</a> if you dont have an account.','Or, you can return <a href="/">home</a> if you don\'t care.');
			return render('template-info.php', NULL, array('mainCause' => 'This page requires authentication, dear.', 'suggestions' => $suggestions));
		}
	}
	
	//add sites
	dispatch_post('/sites/add','addSite');
	function addSite()
	{
		global $pi;
		$userId   = getUserId('sessionId', $_COOKIE['_aok_']);
		$siteName = $_POST['siteName'];
		$siteUrl  = $_POST['siteUrl'];
		$siteId   = uid(7);
		$dislikes = 0;
		$likes    = 0;
		//$theme => background-col,message, indi-message
		$theme    = "#F7F7F7,did you like it ?,likes :";
		$success  = TRUE;
		$error    = NULL;
	
		if (!(isValidURL($siteUrl)) && $success == TRUE)
		{
			$success = FALSE;
			$error   = 'site url is not valid.';
		}
		
		if (!(lengthCheck($siteName, $a = 1, $b = 50)) && $success == TRUE)
		{
			$success = FALSE;
			$error   = 'sitename should be between 2-50 characters.';
		}
		
		if ($success)
		{
			mysql_query("INSERT INTO main(siteId, siteName, userId, siteUrl, likes, dislikes, theme) VALUES('$siteId','$siteName','$userId','$siteUrl','$likes', '$dislikes','$theme')");
			return "ok";
		}
		else return $error;
	}
	
	//individual site settings page
	dispatch('/sites/settings/:sid','siteSetting');
	function siteSetting($sid)
	{
		$query    = mysql_query("SELECT siteName, siteUrl ,likes, dislikes FROM main WHERE siteId = '$sid'");
		$backpass = mysql_fetch_array($query, MYSQL_NUM);
		$snm      = $backpass[0];
		$srl      = $backpass[1];
		$likes    = $backpass[2];
		$dislikes = $backpass[3];
		return render('template-site-settings.php', NULL, array('siteName' => $snm, 'siteUrl' => $srl,'siteId' => $sid, 'likes'=> $likes, 'dislikes'=> $dislikes));
	}
	
	dispatch_post('/sites/update/:sid', 'siteUpdate');
	function siteUpdate($sid)
	{
		global $pi;
		$siteName = $_POST['siteName'];
		$siteUrl  = $_POST['siteUrl'];
		$success  = TRUE;
		$error    = NULL;
		
		if (!(isValidURL($siteUrl)) && $success == TRUE)
		{
			$success = FALSE;
			$error   = 'site url is not valid.';
		}
		
		if (!(lengthCheck($siteName, $a = 2, $b = 50)) && $success == TRUE)
		{
			$success = FALSE;
			$error   = 'sitename should be between 2-50 characters.';
		}
		
		if ($success)
		{
			mysql_query("UPDATE main SET siteName = '$siteName', siteUrl = '$siteUrl' WHERE siteId = '$sid'");
			return "ok";
		}
		else return $error;
	}
	
	//update theme
	dispatch_post('/sites/update/theme/:sid', 'updateTheme');
	function updateTheme($sid)
	{
		$theme = $_POST['theme'];
		mysql_query("UPDATE main SET theme = '$theme' WHERE siteId = '$sid'");
		return "/sites/settings/$sid";
	}
	
	dispatch_post('/sites/delete/:sid', 'deleteSite');
	function deleteSite($sid)
	{
		mysql_query("DELETE FROM main WHERE siteId = '$sid'");
		return NULL;
	}
	
	//account page
	dispatch('/account','account');
	function account()
	{
		if (auth())
		{
			$userId = getUserId('sessionId', $_COOKIE['_aok_']);
			$query = mysql_query("SELECT email, realName FROM auth WHERE userId ='$userId'");
			$backpass = mysql_fetch_array($query, MYSQL_NUM);
			return render('template-account.php',NULL, array('email' => $backpass[0], 'realName' => $backpass[1]));
		}
		
		else
		{
			$suggestions = array("You can <a href=\"/signin\">signin</a> if you feel like.",'You can <a href="/signup">signup</a> if you dont have an account.','Or, you can return <a href="/">home</a> if you don\'t care.');
			return render('template-info.php', NULL, array('mainCause' => 'This page requires authentication, dear.', 'suggestions' => $suggestions));
		}
	}
	
	dispatch_post('/account/update','accUpdate');
	function accUpdate()
	{
		$userId   = getUserId('sessionId', $_COOKIE['_aok_']);
		$realName = $_POST['realName'];
		$email    = $_POST['email'];
		$r        = lengthCheck($realName);
		$e        = emailSynCheck($email);
		$eo       = FALSE;
		if ($e == "ok") 
			$eo = TRUE;
		if ($r == TRUE && $eo == TRUE)
		{
			mysql_query("UPDATE auth SET realName = '$realName', email = '$email' WHERE userId = '$userId'");
			return "ok";
			//send an email to above url telling email updated
		}
		if ($e != "ok")
			return $e; 
	}
	
	dispatch_post('/account/update/password','accUpdatePass');
	function accUpdatePass()
	{
		$userId   = getUserId('sessionId', $_COOKIE['_aok_']);
		$currPass  = $_POST['currPass'];
		$password = $_POST['password'];
		$query    = mysql_query("SELECT password FROM auth WHERE userId='$userId'");
		$backpass = mysql_fetch_array($query, MYSQL_NUM);
		if ($currPass == $backpass[0])
		{
			if (lengthCheck($password) == TRUE)
			{
				mysql_query("UPDATE auth SET password = '$password' WHERE userId ='$userId'");
				return "ok";
			}
			else
				return "you didn't enter new password.";
		}
		else
			return "you mistyped your current password.";
	}
	# (/...)
	
	# (....)	
	
	//dispatch meters in iframe
	dispatch('/handle/:sid','meter');
	function meter($sid)
	{
		$query    = mysql_query("SELECT likes, dislikes, theme FROM main WHERE siteId ='$sid'");
		$backpass = mysql_fetch_array($query,MYSQL_NUM);
		$likes    = $backpass[0];
		$dislikes = $backpass[1];
		$theme    = $backpass[2];
		return render('template-meter.php', NULL, array('likes' => $likes, 'dislikes' => $dislikes,'theme' =>$theme, 'siteId'=> $sid));	
	}
	
	//dispatch indicators in iframe
	dispatch('/indicator/:sid','indicator');
	function indicator($sid)
	{
		$query    = mysql_query("SELECT likes, dislikes, theme FROM main WHERE siteId ='$sid'");
		$backpass = mysql_fetch_array($query,MYSQL_NUM);
		$likes    = $backpass[0];
		$dislikes = $backpass[1];
		$theme    = $backpass[2];
		return render('template-indicator.php', NULL, array('likes' => $likes, 'dislikes' => $dislikes,'theme' =>$theme, 'siteId'=> $sid));	
	}
	
	//random tity tests
	dispatch('/tits','tits');
	function tits()
	{
			
		//mysql_query("ALTER TABLE main DROP COLUMN humpss");
		$result = mysql_query("SELECT * FROM auth");#mysql_query("SHOW COLUMNS FROM auth");
 		while ($row = mysql_fetch_assoc($result)) {
       	 
       	 	print_r($row);
       	 	echo "<br>";
       	 }
	}
	
	
	# (/....)
	
	#(.....)
	
	//check whether cookies and js are enabled
	#(/.....)
	run();
?>
