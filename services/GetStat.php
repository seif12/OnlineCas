<?php

// Include confi.php
include_once("classes/BaseHelper.php");

if($_SERVER['REQUEST_METHOD'] == "POST"){
	// Get data
	$name = isset($_POST['data']) ? mysql_real_escape_string($_POST['data']) : "";
	
	

	// Insert data into data base

	$myQuery = "insert into track values(:text);";
	
	/*$bh->updateData( $myQuery, array(
							 		 'text' => $name
									 
								   )				
				  );*/
	
	//if($qur){
		$json = array("status" => 1, "msg" => "Done User added!");
	//}else{
		$json = array("status" => 0, "msg" => "Error adding user!");
	//}
}else{
	$json = array("status" => 0, "msg" => "Request method not accepted");
}



/* Output header */
	header('Content-type: application/json');
	echo json_encode($json);

    ?>