<?php
    function sanitize_fields($raw_fields){
		$sanitized_fields = [];
	    foreach($raw_fields as $key => $value){
		    $sanitized_value = trim( $value );
			$sanitized_value = strip_tags( $sanitized_value );
			$sanitized_value = htmlentities( $sanitized_value );
	        $sanitized_fields[$key] = $sanitized_value;
        }
        return $sanitized_fields; 			
	}
		
	function expected_file_fields($expected_fields){
        $allowed_fields = [];
        foreach($expected_fields as $field){
            if(isset($_FILES[$field])){
	            $allowed_fields[$field] = $_GET[$field];
            }else{
		        $allowed_fields[$field] = NULL;
            }
        }
	    return $allowed_fields;
    }
			
    function expected_post_fields($expected_fields){
	    $allowed_fields = [];
	    foreach($expected_fields as $field){
	        if(isset($_POST[$field])){
			    $allowed_fields[$field] = $_POST[$field];
	        }else{
			    $allowed_fields[$field] = NULL;
	        }
        }
		return $allowed_fields;
    }
			
	function expected_get_fields($expected_fields){
	    $allowed_fields = [];
	    foreach($expected_fields as $field){
	        if(isset($_GET[$field])){
			    $allowed_fields[$field] = $_GET[$field];
	        }else{
			    $allowed_fields[$field] = NULL;
	        }
        }
        return $allowed_fields; 			
	}

    function sanitizeValue($value){
	
    }

    function sanitize(){
	
    }
?>