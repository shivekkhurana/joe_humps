<?php

	//redirect
	function rdr($url)
	{
		header("Location: $url");
	}
		
	/*username validate, returns true if validated, else returns error message
	function usernameCheck($username)
	{
		$a = true;
		if (strlen($username) > 1)
		{
			$query    = mysql_query("SELECT username FROM auth WHERE username = '$username'");
			$backpass = mysql_fetch_array($query,MYSQL_NUM);
			if ($backpass[0])
			{
				$a = "my dear, this username is already in use.";
			}
		}
		
		else
			$a = "username must be between 1 & 36 characters";		
		return $a;
	}*/
	
	//len vaidate
	function lengthCheck($string, $a=0, $b=37)
	{
		if (strlen($string) > $a && strlen($string) < $b)
			return true;		
		else
			return false;
	}
	
	//email validate
	function emailCheck($email)
	{
		$a = null;
		if(eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $email))
		{
			$query    = mysql_query("SELECT email FROM auth WHERE email = '$email'");
			$backpass = mysql_fetch_array($query,MYSQL_NUM);
			if ($backpass[0])
			{
				$a = "my dear, this email is already in use.";
			}
			else
				$a = "ok";
		}
		else
			$a = "email must be valid.";
			
		return $a;
	}
	
	function emailSynCheck($email)
	{
		if(eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $email))
		{return true;}
		else return false;
	}
	
	//validate url
	function isValidURL($url)
	{
		return preg_match('|^http(s)?://[a-z0-9-]+(.[a-z0-9-]+)*(:[0-9]+)?(/.*)?$|i', $url);
	}
	
	//unique id generator
	function uid($length)
	{
    	$string = md5(time());
    	$highest_startpoint = 32-$length;
    	$randomString = substr($string,rand(0,$highest_startpoint),$length);
    	return $randomString;
	}
	
	//get userId with respect to a reference
	function getUserId($reference,$value)
	{
		$query    = mysql_query("SELECT userId FROM auth WHERE $reference = '$value'");
		$backpass = mysql_fetch_array($query);
		return $backpass['userId'];
	}
	
	//to check whether user is logged in or not
	function auth()
	{
		$_aok_ = $_COOKIE['_aok_'];
		if (isset($_aok_))
		{
			$query = mysql_query("SELECT sessionId FROM auth WHERE sessionId = '$_aok_'");
			if (mysql_num_rows($query) > 0)
				return true;
			else
				return false;
		}
		else
		{
			return false;
		}
	}
	
	//return realname
	function realName()
	{
		$userId = getUserId('sessionId',$_COOKIE['_aok_']);
		$query = mysql_query("SELECT realName FROM auth WHERE userId = '$userId'");
		$backpass = mysql_fetch_array($query, MYSQL_NUM);
		if (strlen($backpass[0]) > 0 )
			echo $backpass[0];
		else
			echo "shivekkhurana";
	}

	//check whether cookies and js are enabled
	function jsCookieSupport()
	{
		if ($_COOKIE['_jok_'])
		{
			#_jok_ = js ok
			setcookie('_cen_','****');
			if($_COOKIE['_cen_'])
			{
				#_cen_ = cookies enabled
				return "noerror";
			}
			else
				return "cerror";
		}
		else
			return "jerror";
	}
?>
