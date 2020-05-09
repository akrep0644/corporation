<?php 
include "db.php";
if($_POST){
	
	$error = true;
	if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) &&strcasecmp($_SERVER['HTTP_X_REQUESTED_WITH'], 'xmlhttprequest') == 0 && $_POST){
		$error = false;
	}

	$required = array('name', 'email', 'subject', 'message','status');
	foreach($required as $field) {
	  if (empty($_POST[$field]) or is_array($_POST[$field])) {
		$error = true;
	  }
	}
	
	
	
	if ($error) {
	  echo "Error";
	} else {
	  $insert = DB::insert(
		"insert into msg set name = ?, email = ?, subject = ?, message = ?, status = ?",
			[
				$_POST["name"],
				$_POST["email"],
				$_POST["subject"],
				$_POST["message"],
				$_POST["status"],
			]);
			
		if($insert){
			echo "OK";
		}
	}
	
}