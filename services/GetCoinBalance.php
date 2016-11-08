<?php
            include_once("../classes/BaseHelper.php");
            date_default_timezone_set("UTC");

            if (! isset ( $_COOKIE ["coinCasino"] )) 
            {
                if($_SERVER['REQUEST_METHOD'] == "POST")
                {
                    $sess_id = $_COOKIE ["coinCasino"];

                    $bh = new BaseHelper();
                    
                    $bh->executeQuery("select * from cc_session where 'cc_ide_session'='".$sess_id."';");
                }

            }
            else
            {

            }
?>