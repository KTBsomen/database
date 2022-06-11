<?php
include("config.php");
//upload.php

if(isset($_POST['fileid'])&& isset($_POST["myUID"]))
{
$sql = "DELETE FROM files WHERE user_id='".htmlspecialchars($_POST["myUID"], ENT_QUOTES, "UTF-8")."' AND id='".htmlspecialchars($_POST["fileid"], ENT_QUOTES, "UTF-8")."'";
        if (mysqli_query($link, $sql)) {
            
                                                } 
        else {
            echo "Error: " . $sql . "<br>" . mysqli_error($link);
                }
}

	



?>
