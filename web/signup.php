<?php
    session_start(); 
    $page_title = "signup"; 
	if(isset($_POST["submit"])){
		require_once("lib/controllers/security.php");
		require_once("lib/controllers/user.php");
	    require_once("db/connect.php");
		
		$status = "";
	    $status_message = "";
		
		$expected_fields = ["username", "email", "password", "cpassword"];
		$post_fields = expected_post_fields($expected_fields);
		
		if(empty($post_fields["username"]) || empty($post_fields["email"]) || empty($post_fields["password"]) || empty($post_fields["cpassword"])){
			$status = "alert-danger";
	        $status_message = "Please, fill in required fields";
		}else{
			$sanitized_fields = sanitize_fields($post_fields);
			if($sanitized_fields["password"] != $sanitized_fields["cpassword"]){
				$status = "alert-danger";
	            $status_message = "Passwords do not match";
			}else{
			    if(user_exists($sanitized_fields["username"], $conn)){
				    $status = "alert-warning";
	                $status_message = "User already exists";
			    }else{
				    if(!add_user($sanitized_fields, $conn)){
				        $status = "alert-warning";
	                    $status_message = "User could not be added, please try again";
			        }else{
			            $status = "alert-success";
	                    $status_message = "Congratulations, User registration successful";
				    }
				}
			}
		}
	}
?>
<?php require_once("includes/header.php") ?>
    <body>
<?php require_once("includes/navbar.php") ?>
        <div class="container mt-5">
	        <div class="row">
			    <div class="col-sm-4"></div>
				<div class="col-sm-4">
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
    </div>
    <div class="form-group">
      <label for="email">Email address</label>
      <input required class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email" type="email">
      <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    <div class="form-group">
      <label for="password">Password</label>
      <input required class="form-control" id="password" name="password" placeholder="Password" type="password">
    </div>
	<div class="form-group">
      <label for="cpassword">Confirm Password</label>
      <input required class="form-control" id="cpassword" name="cpassword" placeholder="Confirm password" type="password">
    </div>
    <div class="form-group">
      <label for="upload"  id="fileHelp">Upload an image so people know who you are.</label>
      <input class="form-control-file" id="upload" name="upload" aria-describedby="fileHelp" type="file">
    </div>
    <fieldset class="form-group">
      <div class="form-check">
        <label class="form-check-label">
          <input id="agreement" name="agreement" class="form-check-input" value="" type="checkbox">
          I agree to the terms & conditions of use
        </label>
      </div>
    </fieldset>
    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
  </fieldset>
</form>
				</div>
				<div class="col-sm-4"></div>
			</div>
		</div>
<?php require_once("includes/footer.php") ?>