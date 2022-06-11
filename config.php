<?php
header('Access-Control-Allow-Origin: *');

header('Access-Control-Allow-Methods: GET, POST,OPTION');

header("Access-Control-Allow-Headers: *");

/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'epiz_31928386_database');
 //heruku password=G8phMYLUeuNykZJ@
/* Attempt to connect to MySQL database */

$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

function updateVerificationStatusOf($value)
{$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
  // Prepare an insert statement
        $sql = "UPDATE `user_registration_details` SET `verified` = 1  WHERE `user_id`=? ";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s",$value);
            
            

            // Attempt to execute the prepared statement
            if($stmt -> execute()){
             echo "update sucessfull";
            } else{
             echo htmlspecialchars($stmt->error);
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
}

function isverified($user)
{$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
	 $sql = "SELECT verified FROM user_registration_details WHERE user_email = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = $user;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                  mysqli_stmt_bind_result($stmt, $verified);

                
                 while (mysqli_stmt_fetch($stmt)) {
                     if($verified=="1"){
                     	return true;
                     
                       }
                      else{ return false;}
                }
                }

                else{}
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }

	
}

function mr(){
  $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
  $result = '';
 for($i = 0; $i < 11; $i++){
        $result .= $characters[mt_rand(0, 61)];}
//   document.getElementById('ddd').innerHTML=result;
return $result;
}
function otpgen(){
  $characters = '0123456789';
  $result = '';
 for($i = 0; $i < 4; $i++){
        $result .= $characters[mt_rand(0,9)];}
//   document.getElementById('ddd').innerHTML=result;
return $result;
}


function idexsist($ids){
    $idstatus=false;
    $link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);


     $sql = "SELECT id FROM user_registration_details WHERE user_id = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = $ids;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $idstatus = true;
                } else{
                    $idstatus = false;
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
        return $idstatus;
    }



function bioexsist($ids){
    $biostatus=false;
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);


     $sql = "SELECT user_id FROM user_bio_details WHERE user_id = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = $ids;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $biostatus = true;
                } else{
                    $biostatus = false;
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
        return $biostatus;
    }




function showFollowings($myuserid){
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
$sql = "SELECT COUNT(jakefollowkorechetarID) FROM user_follow_data WHERE user_id = ? AND isBlocked=0";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = $myuserid;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) >= 1){
                  mysqli_stmt_bind_result($stmt, $jakefollowkorechetarID);

                
                 while (mysqli_stmt_fetch($stmt)) {
                    return $jakefollowkorechetarID;
                      
                }
                }

                else{}
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }


}
}


function showFollowers($myuserid){
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
$sql = "SELECT COUNT(user_id) FROM user_follow_data WHERE jakefollowkorechetarID = ? AND isBlocked=0";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = $myuserid;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) >= 1){
                  mysqli_stmt_bind_result($stmt, $user_id);

                
                 while (mysqli_stmt_fetch($stmt)) {
                    return $user_id;
                      
                }
                }

                else{}
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }


}
}



function showprofilepic($myuserid){
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
$sql = "SELECT profilepic FROM user_bio_details WHERE user_id = ? ";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = $myuserid;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) >= 1){
                  mysqli_stmt_bind_result($stmt, $jakefollowkorechetarID);

                
                 while (mysqli_stmt_fetch($stmt)) {
                    return $jakefollowkorechetarID;
                      
                }
                }

                else{}
            } else{
                echo "0";
            }


}
}




function showbiotext($myuserid){
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
$sql = "SELECT bio_text FROM user_bio_details WHERE user_id = ? ";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = $myuserid;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) >= 1){
                  mysqli_stmt_bind_result($stmt, $jakefollowkorechetarID);

                
                 while (mysqli_stmt_fetch($stmt)) {
                    return $jakefollowkorechetarID;
                      
                }
                }

                else{}
            } else{
                echo "0";
            }


}
}





?>