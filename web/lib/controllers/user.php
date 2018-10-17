<?php
    function check_user_exists($username, $db){
		$escaped_username = mysqli_real_escape_string( $db, $username );
	    $query = "SELECT * FROM `users` WHERE username ='" . $escaped_username . "'";
	    $result  = mysqli_query($db, $query);
	    if(mysqli_num_rows($result) == 1){
			$row = mysqli_fetch_assoc($result);
		    return $row;
	    }else{
		    return false;
	    }
    }
	
	function add_user($user, $db){
	    $query = "INSERT INTO `users` (`username`, `email`,`password`,`upload`) VALUES (";
		$query .= "'" . $user['username'] . "', "; 
		$query .= "'" . $user['email'] . "', ";
		$query .= "'" . $user['password'] . "', ";
		$query .= "'" . $user['upload'] . "')";
	    $result  = mysqli_query($db, $query);
	    if($result){
		    return true;
	    }else{
		    return false;
	    }
    }
	
	function valid_user_password($password, $existing_password, $db){
		$escaped_password = mysqli_real_escape_string( $db, $password );
	    if($escaped_password == $existing_password){
		    return true;
	    }else{
		    return false;
	    }
    }
?>