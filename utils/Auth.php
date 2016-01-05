<?php

class Auth
{

	public static function attempt($username, $password)
	{
		// $log = new Log();
		$user = new User();
    	
    	if($user = $user->findUserByUsername($username)){
			if(password_verify($password, $user->password)){
				$_SESSION['LOGGED_IN_USER'] = $user->username;
				// $log->info("User {$username} logged in.");
				return true;
			}
			// $log->error("User {$username} failed to log in!");
			self::logout();
			return false;
    	} else {
    		self::logout();
    		return false;
    	}
	}

	public static function check()
	{
		return isset($_REQUEST['LOGGED_IN_USER']) ? true : false;
	}

	public static function user()
	{
		return isset($_SESSION['LOGGED_IN_USER']) ? $_SESSION['LOGGED_IN_USER'] : null;
	}

	public static function logout()
	{
		$_SESSION = array();

	    if (ini_get("session.use_cookies")) {
	        $params = session_get_cookie_params();
	        setcookie(session_name(), '', time() - 42000,
	            $params["path"], $params["domain"],
	            $params["secure"], $params["httponly"]
	        );
	    }

    	session_destroy();
	}
}
