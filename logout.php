<?php 
    session_start(); 
	if(isset($_SESSION["userid"])){
		unset($_SESSION["userid"]);
		unset($_SESSION["username"]);
		session_destroy();
		header("Location: login.php");
    }else{
		header("Location: home.php");
	}
?>