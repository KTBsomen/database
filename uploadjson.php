<?php
include("config.php");
//upload.php

if(isset($_POST['jsondata'])&& isset($_POST["myUID"]))
{
$sql = "INSERT INTO files (user_id,json_data) VALUES ('".$_POST['myUID']."','".$_POST['jsondata']."')";

        if (mysqli_query($link, $sql)) {
            
                                                } 
        else {
            echo "Error: " . $sql . "<br>" . mysqli_error($link);
                }
}

	



?>
