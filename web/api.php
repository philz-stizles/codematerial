<?php 
    session_start();
    $page_title = "dashboard"; 
?>
<?php require_once("includes/header.php") ?>
    <body>
<?php require_once("includes/navbar.php") ?>
        <div class="container mt-5">
		    <h5>API Fetch</h5>
	        <div class="row">
			    <div class="col-sm-4"></div>
				<div class="col-sm-4">
<?php
    $url = "https://jsonplaceholder.typicode.com/users";
	$response = file_get_contents($url);
	$users = json_decode($response);
	print_r($users);
	
	//$xml_file = "docs/xml/users.xml";
	// $xml = simplexml_load_file($xml_file);
	// print_r($xml);
	// print_r(json_decode($xml));
	// print_r($xml->user);
?>
				</div>
				<div class="col-sm-4"></div>
			</div>
		</div>
<?php require_once("includes/footer.php") ?>