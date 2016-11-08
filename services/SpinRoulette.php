<?php

// Include confi.php
include_once("../classes/BaseHelper.php");
date_default_timezone_set("UTC");
if($_SERVER['REQUEST_METHOD'] == "POST"){
	// Get data
	//$name = isset($_POST['clientseed']) ? mysql_real_escape_string($_POST['clientseed']) : "";
	
	
	$name = "" ;
	
	$request_body = file_get_contents('php://input');
	$data = json_decode($request_body, true);
	
	 $clientseed = $data['clientseed'] ;
	 //$amount = $data['amount'] ;
	 $currency = $data['idc'] ;

	// Insert data into data base

	$myQuery = "insert into track(`text`) values(:TX1);";
	
    $bh = new BaseHelper();



		$sess_id = $_COOKIE ["coinCasino"];


		 
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    	
		$randstring = '';

    	for ($i = 0; $i < 10; $i++) {
        	$randstring = $characters[rand(0, strlen($characters))];
    	}

		$server_seed = $sess_id.$randstring.date('YmdHis');

		$hash_server_seed = hash('sha256', $server_seed);

		$name = $clientseed.";".$sess_id.";".$randstring.";".date('YmdHis', time()).";".$hash_server_seed;
		//echo "<br/>".$name ;
		$hash_seed = hash('sha512', $clientseed.$server_seed);
       

		for(  $i = 0 ; $i <= strlen( $hash_seed )  ; $i=$i+2 )
		{
             //echo "<br/>".substr( $hash_seed , $i , 2 );
			 $fall = hexdec( substr( $hash_seed , $i , 2 ) ) ;
             //echo "<br/>".$fall;
			 if( ($fall <= 37) && ($fall >= 0) )
			 {
				 
				 break;
			 }
			 


		}
		
		$bh->updateData( $myQuery, array(
							 		 'TX1' => $name
									 
								   )				
				  );

					  
	
	//if($qur){
		//$json = array("status" => 1, "msg" => "Done User added!");
	//}else{
		$json = array("number" => $fall, "error" => "");


	//}
}else{
	$json = array("status" => 0, "msg" => "Request method not accepted");
}



/* Output header */
	header('Content-type: application/json');
	echo json_encode(array("d"=>json_encode($json)));
	

    ?>