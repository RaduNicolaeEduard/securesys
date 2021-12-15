<?php

session_start();

include 'inc/dbcon.php';

$errors = []; // for storing the error messages
$inputs = []; // for storing sanitized input values

$request_method = strtoupper($_SERVER['REQUEST_METHOD']);

if ($request_method === 'GET') {
	// generate a token
	$_SESSION['token'] = bin2hex(random_bytes(35));
	if(isset($_COOKIE['user'])){
		$cookie = $_COOKIE['user'];
	}
	else{
		$cookie = rand(5, 5000);
		mysqli_query($db, "INSERT INTO `csrfprotected`(`userid`, `balance`) VALUES ('$cookie','20000')");
		setcookie ("user",$cookie,time()+ 3600);
		echo "<meta http-equiv='refresh' content='0'>";
	}
	// show the form
	require __DIR__ .  '/inc/header.php';
	require __DIR__ . '/inc/get.php';
} elseif ($request_method === 'POST') {
	require __DIR__ .  '/inc/header.php';
	// handle the form submission
	require __DIR__ .  '/inc/post.php';
	// re-display the form if the form contains errors
	if ($errors) {
		require	__DIR__ .  '/inc/get.php';
	}
}
require __DIR__ . '/inc/footer.php';