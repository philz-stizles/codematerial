<?php 
    session_start();
    if(isset($_POST["submit"])){
		require_once("lib/controllers/security.php");
	    require_once("db/connect.php");
		
		$status = "";
	    $status_message = "";
		
		$expected_fields = ["name", "email", "message"];
		$post_fields = expected_post_fields($expected_fields);
		
		if(empty($post_fields["name"]) || empty($post_fields["email"]) || empty($post_fields["message"])){
			$status = "alert-danger";
	        $status_message = "Please, fill in required fields";
		}else{
			$sanitized_fields = sanitize_fields($post_fields);
			$to_email = "philz.stizles@gmail.com"; // yourusername@yourhostingprovidermailing.com e.g support@codematerial.tech
			$subject = "Contact Form";
			$body = "<h4>" . $sanitized_fields["name"] . "</h4>";
			$body .= "<p>" . $sanitized_fields["message"] . "</p>";
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-Type: text/html;charset=utf-8" . "\r\n";
			$headers .= "From: " . $sanitized_fields["name"] . "<" . $sanitized_fields["email"] .">"."\r\n";
			if( mail($to_email, $subject, $body, $headers)){ // your project must either be deployed on a hosting server where you have access to a mail server,or you have to configure a mail server. use phpMailer
				$status = "alert-success";
	            $status_message = "Message was sent successfully";
			}else{
				$status = "alert-danger";
	            $status_message = "Message could not be sent";
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
                    <label for="username">Vistor or Username</label>
                    <input required class="form-control" id="name" name="name" aria-describedby="usernameHelp" placeholder="Enter your name or username" type="text">
                </div>
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input required class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email" type="email">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                    <label for="password">Message</label>
                    <textarea required class="form-control" id="message" name="message" placeholder="Send a message"></textarea>
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