<?php
include("config.php");
//upload.php
$links=[];
if(isset($_FILES['images'])&& isset($_POST["myUID"]))
{
	for($count = 0; $count < count($_FILES['images']['name']); $count++)
	{
		$extension = pathinfo($_FILES['images']['name'][$count], PATHINFO_EXTENSION);

		$new_name = mr() . '.' . $extension;

		move_uploaded_file($_FILES['images']['tmp_name'][$count], 'images/' . $new_name);
$sql = "INSERT INTO files (user_id,filename) VALUES ('".$_POST['myUID']."','".$new_name."')";

        if (mysqli_query($link, $sql)) {
            array_push($links,"https:\\45722b3d3c31f5.lhrtunnel.link\\api\\images\\".$new_name);
                                                } 
        else {
            echo "Error: " . $sql . "<br>" . mysqli_error($link);
                }
	}

	echo json_encode($links);
}


?>
