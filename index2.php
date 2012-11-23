<?php
session_start();
if (!isset($_SESSION['id'])){
	 //Load on start
	header("Location: login-facebook.php");
}
if (array_key_exists("login", $_GET)) {
    $oauth_provider = $_GET['oauth_provider'];
    if ($oauth_provider == 'facebook') {
        header("Location: login-facebook.php");
    }
}
?>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js" type="text/javascript"></script>


<title>Facebook Login</title>













	









<pre>

<?php
	if(isset($_SESSION['user_profile']))
	{
		print_r($_SESSION);

		echo "<a href='logout.php?logout'>Logout</a>";
	}
 ?>
</pre>
