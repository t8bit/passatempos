<?php

require 'facebook/facebook.php';
require 'config/fbconfig.php';
require 'config/functions.php';

$facebook = new Facebook(array('appId' => APP_ID,'secret' => APP_SECRET));
$user = $facebook->getUser();
$login_url = $facebook->getLoginUrl(array( 'scope' => 'email,publish_stream,user_likes,friends_likes'));
header("Location: " . $login_url);
print_r($user);

if ($user) 
{
	try 
	{
		// Proceed knowing you have a logged in user who's authenticated.
		$user_profile = $facebook->api('/me');
	//	$ret_obj = $facebook->api('/me/feed', 'POST', array('link' => 'www.painatal.com','message' => 'Tou a usar a app de passatempos que fixe, participa tu tambem' ));


		


			






		
		
	} 
	catch (FacebookApiException $e) 
	{
		error_log($e);
		$user = null;
	}
	
    if (!empty($user_profile )) 
    {
		$username = $user_profile['name'];
		$uid = $user_profile['id'];
		$email = $user_profile['email'];
		$user = new User();
		$_SESSION['user_profile']=$user_profile; 
		$userdata = $user->checkUser($uid, 'facebook', $username,$email,$twitter_otoken,$twitter_otoken_secret);
		if(!empty($userdata))
		{
			session_start();
			$_SESSION['id'] = $userdata['id'];
			$_SESSION['oauth_id'] = $uid;
			
			
			
			$_SESSION['username'] = $userdata['username'];
			$_SESSION['email'] = $email;
			$_SESSION['oauth_provider'] = $userdata['oauth_provider'];
			header("Location: index.php");
		}
    } 
    else 
    {
        # For testing purposes, if there was an error, let's kill the script
		die("There was an error.");
    }
} 
else 
{
    # There's no active session, let's generate one
	$login_url = $facebook->getLoginUrl(array( 'scope' => 'email,publish_stream,user_likes,friends_likes'));
    header("Location: " . $login_url);
}
?>

