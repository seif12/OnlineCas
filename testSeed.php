<?php

    $clientseed = "XFuTf5t550NodTT7LrshU2UXKBENAWxGBc3ND2kx" ;

    $sess_id = $_COOKIE ["coinCasino"];


		 
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    	
		$randstring = "";

    	for ( $i = 0; $i < 10; $i++) {
        	$randstring = $characters[rand(0, strlen($characters))];
    	}

		$server_seed = $sess_id.$randstring.date('YmdHis', time());

		$hash_server_seed = hash('sha256', $server_seed);

		$name = $clientseed.";".$sess_id.";".$randstring.";".date('YmdHis', time()).";".$hash_server_seed;
		//echo "<br/>".$name ;
		echo "<br/>".$hash_server_seed ;

        $hash_seed = hash('sha512', $clientseed.$server_seed);

         echo "<br/>".$hash_seed ;

		for(  $i = 0 ; $i <= strlen( $hash_seed )  ; $i=$i+2 )
		{
             //echo "<br/>".substr( $hash_seed , $i , 2 );
			 $fall = hexdec( substr( $hash_seed , $i , 2 ) ) ;
             //echo "<br/>".$fall;
			 if( ($fall <= 37) && ($fall >= 0) )
			 {
				 echo "The fall is ".$fall;
				 break;
			 }
			 


		}
		echo "\nThe fall is ".$fall;
?>