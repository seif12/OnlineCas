<?php



	class BaseHelper
	{
		public $database_url ;

		public $database_user = "root" ;

		public $database_pass = "usbw123" ;

		public $database_name = "crypto_casino" ;

		public function executeQuery($query)
		{
			define('DB_NAME', 'crypto_casino');

			/** MySQL database username */
			define('DB_USER', 'root');

			/** MySQL database password */
			define('DB_PASSWORD', 'usbw');

			/** MySQL hostname */
			define('DB_HOST', 'localhost');

			define('DB_PORT', '3307');

			/** Database Charset to use in creating database tables. */
			define('DB_CHARSET', 'utf8');

			/** The Database Collate type. Don't change this if in doubt. */
			define('DB_COLLATE', '');
			
			$this->database_url =  DB_HOST.";port=".DB_PORT ;
			$this->database_user = DB_USER ;
			$this->database_pass = DB_PASSWORD ;
			$this->database_name = DB_NAME ;
			try
			{
				// Connect to mysql database
				$bdd = new PDO('mysql:host='.$this->database_url.';dbname='.$this->database_name.';charset=utf8', $this->database_user , $this->database_pass);
			}
			catch(Exception $e)
			{
				// in case of error print error message
					die('Erreur : '.$e->getMessage());
			}

			return $bdd->query($query);


		}

		public function getParam( $paramName )
		{
			define('DB_NAME', 'crypto_casino');

			/** MySQL database username */
			define('DB_USER', 'root');

			/** MySQL database password */
			define('DB_PASSWORD', 'usbw');

			/** MySQL hostname */
			define('DB_HOST', 'localhost');

			define('DB_PORT', '3307');

			/** Database Charset to use in creating database tables. */
			define('DB_CHARSET', 'utf8');

			/** The Database Collate type. Don't change this if in doubt. */
			define('DB_COLLATE', '');
			
			$this->database_url =  DB_HOST.";port=".DB_PORT ;
			$this->database_user = DB_USER ;
			$this->database_pass = DB_PASSWORD ;
			$this->database_name = DB_NAME ;
			try
			{
				// Connect to mysql database
				$bdd = new PDO('mysql:host='.$this->database_url.';dbname='.$this->database_name.';charset=utf8', $this->database_user , $this->database_pass/*,array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)*/);
//	echo "\n Connecting to DB \n";
			}
			catch(Exception $e)
			{
				// in case of error print error message
					die('Erreur : '.$e->getMessage());
			}
			// echo "====="."SELECT VALUE FROM `param_table` WHERE `key`= ? " .$paramName;

			 $req = $bdd->prepare( "SELECT value FROM `param_table` WHERE `key`= ? " );

//$req = $bdd->prepare( "SELECT value FROM `param_table` WHERE `key`=" );
			 $req->execute(array($paramName));

			 $datas = $req->fetch() ;

			 $req->closeCursor();

			 return $datas['value'] ;
//echo $datas['value'];

		}

		public function setParam( $paramName , $value )
		{
			define('DB_NAME', 'crypto_casino');

			/** MySQL database username */
			define('DB_USER', 'root');

			/** MySQL database password */
			define('DB_PASSWORD', 'usbw');

			/** MySQL hostname */
			define('DB_HOST', 'localhost');

			define('DB_PORT', '3307');

			/** Database Charset to use in creating database tables. */
			define('DB_CHARSET', 'utf8');

			/** The Database Collate type. Don't change this if in doubt. */
			define('DB_COLLATE', '');

			/** Database Charset to use in creating database tables. */
			define('DB_CHARSET', 'utf8');

			/** The Database Collate type. Don't change this if in doubt. */
			define('DB_COLLATE', '');
			
			$this->database_url =  DB_HOST.";port=".DB_PORT ;
			$this->database_user = DB_USER ;
			$this->database_pass = DB_PASSWORD ;
			$this->database_name = DB_NAME ;
			try
			{
				// Connect to mysql database
				$bdd = new PDO('mysql:host='.$this->database_url.';dbname='.$this->database_name.';charset=utf8', $this->database_user , $this->database_pass,array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
			}
			catch(Exception $e)
			{
				// in case of error print error message
					die('Erreur : '.$e->getMessage());
			}

			$req = $bdd->prepare('UPDATE `param_table` SET `value` = :nvalue WHERE `key` = :vkey');
			
			$req->execute(array(
								'nvalue' => $value,
								'vkey' => $paramName
								));

		}

		public function updateData($query , $dataArray )
		{
			define('DB_NAME', 'crypto_casino');

			/** MySQL database username */
			define('DB_USER', 'root');

			/** MySQL database password */
			define('DB_PASSWORD', 'usbw');

			/** MySQL hostname */
			define('DB_HOST', 'localhost');

			define('DB_PORT', '3307');

			/** Database Charset to use in creating database tables. */


			/** Database Charset to use in creating database tables. */
			define('DB_CHARSET', 'utf8');

			/** The Database Collate type. Don't change this if in doubt. */
			define('DB_COLLATE', '');
			
			$this->database_url =  DB_HOST.";port=".DB_PORT ;
			$this->database_user = DB_USER ;
			$this->database_pass = DB_PASSWORD ;
			$this->database_name = DB_NAME ;
						try
			{
				// Connect to mysql database
				$bdd = new PDO('mysql:host='.$this->database_url.';dbname='.$this->database_name.';charset=utf8', $this->database_user , $this->database_pass);
			}
			catch(Exception $e)
			{
				// in case of error print error message
					die('Erreur : '.$e->getMessage());
			}

			$req = $bdd->prepare($query);
			
			$req->execute( $dataArray );
		}
	}

?>
