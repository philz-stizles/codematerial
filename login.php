<?php 
    session_start();
    $page_title = "login"; 
	if(isset($_POST["submit"])){
		require_once("lib/controllers/security.php");
		require_once("lib/controllers/user.php");
	    require_once("db/connect.php");
		
		$status = "";
	    $status_message = "";
		
		$expected_fields = ["username", "password"];
		$post_fields = expected_post_fields($expected_fields);
		
		if(empty($post_fields["username"]) || empty($post_fields["password"])){
			$status = "alert-danger";
	        $status_message = "Please, fill in required fields";
		}else{
			$sanitized_fields = sanitize_fields($post_fields);
			$sanitized_username = $sanitized_fields["username"];
			$sanitized_password = $sanitized_fields["password"];
			
			$existing_user = check_user_exists($sanitized_username, $conn);
			if(!$existing_user){
				$status = "alert-warning";
	            $status_message = "Incorrect username or password";
			}else{
				if(!valid_user_password($sanitized_password, $existing_user["password"], $conn)){
				    $status = "alert-warning";
	                $status_message = "Invalid username or password";
			    }else{
					$_SESSION["userid"] = $existing_user["user_id"];
		            $_SESSION["username"] = $existing_user["username"];
			        $status = "alert-success";
	                $status_message = "You are now logged in";
					header("Location: dashboard.php");
			    }
			}
		}
	}
?>
<?php require_once("includes/header.php") ?>
    <body>
<?php require_once("includes/navbar.php") ?>
        <div class="container" style="margin-top: 7rem;">
	        <div class="row">
			    <div class="col-md-4"></div>
				<div class="col-md-4">
<?php  
    if(isset($_POST["submit"])){
		if($status_message ){
			echo "<div class='alert alert-dismissible $status'>$status_message</div>";
		}
	}
?>
				    <form method="post" action="<?php echo $_SERVER["PHP_SELF"] ?>">
  <fieldset>
    <legend class="text-center"></legend>
	<div class="form-group">
      <label for="username">Username</label>
      <input required class="form-control" id="username" name="username" aria-describedby="usernameHelp" placeholder="Enter username" type="text">
      <small id="usernameHelp" class="form-text text-muted"></small>
    </div>
    <div class="form-group">
      <label for="password">Password</label>
      <input required class="form-control" id="password" name="password" placeholder="Password" type="password">
    </div>
    <fieldset class="form-group">
      <div class="form-check">
        <label class="form-check-label">
          <input class="form-check-input" value="" type="checkbox">
          You can keep me signed in
        </label>
      </div>
    </fieldset>
    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
  </fieldset>
</form>
				</div>
				<div class="col-md-4"></div>
			</div>
		</div>
    </body>
</html>