
			<?php
			
				$gapi_key = "kr3KZ7db7Ejt5sRs";
				$gsecret_key = "o9fDYkkhCevFT55VAN4rkLXI0DlQ5pnG" ;
				
				function getBalance($api_key,$secret_key )
				{
						// Getting coinbase balance 
						
						
						$url = "https://api.coinbase.com/v2/accounts" ;
						
						$proxy ="127.0.0.1:8080";
						
						$stime = getCoinBaseTime() ;
						$data = $stime."GET"."/v2/accounts";
						 $sig=hash_hmac( "sha256" ,  $data , $secret_key );
						
						 $curl=curl_init();
						
						curl_setopt($curl, CURLOPT_HTTPHEADER, array(
																									'CB-ACCESS-SIGN:'.$sig,
																									'CB-ACCESS-TIMESTAMP:'.$stime,
																									'CB-ACCESS-KEY:'.$api_key,
																									'CB-VERSION:2015-07-22',
																									'Content-Type: application/json')
																									);
						
						curl_setopt($curl, CURLOPT_URL, $url);
						curl_setopt($curl, CURLOPT_PROXYUSERPWD, "intranet\khalfallahs:!!GTFONOW");
						curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
						curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
						curl_setopt($curl, CURLOPT_PROXY, $proxy);
						curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
						
						$return = curl_exec($curl);
						echo curl_error ( $curl );
						curl_close($curl);
						
						$accounts = json_decode($return,true)["data"];
						
						for(  $x = 0 ; $x < count($accounts) ;$x++ )
						{
							if($accounts[$x]["primary"] == true )
							{
								$balance = $accounts[$x]["balance"]; 
								
								return array("balance"=>$balance,"id"=>$accounts[$x]["id"]);
							}
						}
				}
				
				function getCoinbaseTime()
				{
						$tcurl = curl_init();
						$proxy ="127.0.0.1:8080";
						
						curl_setopt($tcurl, CURLOPT_URL, "https://api.coinbase.com/v2/time");
						curl_setopt($tcurl, CURLOPT_PROXYUSERPWD, "intranet\khalfallahs:!!GTFONOW");
						curl_setopt($tcurl, CURLOPT_SSL_VERIFYPEER, false);
						curl_setopt($tcurl, CURLOPT_RETURNTRANSFER, true);
						curl_setopt($tcurl, CURLOPT_PROXY, $proxy);
						curl_setopt($tcurl, CURLOPT_FOLLOWLOCATION, 1);
						
						$jsont = curl_exec($tcurl);
						
						curl_close($tcurl);
						$vstime = json_decode($jsont,true)["data"]["epoch"];
						return $vstime;
				}
				
				function getNewAdress($api_key,$secret_key )
				{
					echo $api_key."-".$secret_key;
					$principal_account = getBalance($api_key,$secret_key )["id"];

					$tcurl = curl_init();

					$url = "https://api.coinbase.com/v2/accounts/".$principal_account."/addresses";

					curl_setopt($tcurl, CURLOPT_URL, $url );
					
					$stime = getCoinBaseTime() ;
						
					$data = $stime."POST"."/v2/accounts".$principal_account."/addresses";
					
					 $sig=hash_hmac( "sha256" ,  $data , $secret_key );
						
					 $curl=curl_init();
						
					curl_setopt($curl, CURLOPT_HTTPHEADER, array(
																								'CB-ACCESS-SIGN:'.$sig,
																								'CB-ACCESS-TIMESTAMP:'.$stime,
																								'CB-ACCESS-KEY:'.$api_key,
																								'CB-VERSION:2015-07-22',
																								'Content-Type: application/json')
																								);
					curl_setopt($curl, CURLOPT_URL, $url);

					//curl_setopt($curl, CURLOPT_PROXYUSERPWD, "user:mdr");
					curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
					curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
					//curl_setopt($curl, CURLOPT_PROXY, $proxy);
					curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
					curl_setopt($curl, CURLOPT_POST, true);
					//curl_setopt($curl, CURLOPT_POSTFIELDS, $post_array);
					
					$return = curl_exec($curl);
					echo curl_error ( $curl );
					curl_close($curl);
					echo "return";
				}
				
				function doTransfer($to_adress,$amount,$id,$api_key,$secret_key)
				{
					
						$url = "https://api.coinbase.com/v2/accounts/".$id."/transactions" ;
						
						$proxy ="127.0.0.1:8080";
						
						
						$post_array=json_encode(
																array(
																									"type"=>"send",
																									"to"=>$to_adress,
																									"amount"=>$amount,
																									"currency"=>"BTC"
																		)
															);
						$stime = getCoinBaseTime() ;
						$data =$stime."POST"."/v2/accounts/".$id."/transactions".$post_array;
						$sig=hash_hmac( "sha256" ,  $data , $secret_key );
												 $curl=curl_init();
						curl_setopt($curl, CURLOPT_HTTPHEADER, array(
																									'CB-ACCESS-SIGN:'.$sig,
																									'CB-ACCESS-TIMESTAMP:'.$stime,
																									'CB-ACCESS-KEY:'.$api_key,
																									'CB-VERSION:2015-07-22',
																									'Content-Type: application/json')
																									);
						curl_setopt($curl, CURLOPT_URL, $url);
						//curl_setopt($curl, CURLOPT_PROXYUSERPWD, "user:mdr");
						curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
						curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
						//curl_setopt($curl, CURLOPT_PROXY, $proxy);
						curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
						curl_setopt($curl, CURLOPT_POST, true);
						curl_setopt($curl, CURLOPT_POSTFIELDS, $post_array);
						$return = curl_exec($curl);
						echo curl_error ( $curl );
						curl_close($curl);
						
						echo " Transfer -- <br/>".$return;
				}
				

			?>


		
