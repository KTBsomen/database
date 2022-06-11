<?php

include("config.php");



$sql = "SELECT id, json_data FROM files WHERE user_id='".htmlspecialchars($_POST["myUID"], ENT_QUOTES, "UTF-8")."'";
$result = mysqli_query($link, $sql);
$js=array();
if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    if($row["json_data"]) {$js[$row["id"]]= $row["json_data"];}
  }
} else {
  echo "0 results";
}
echo json_encode($js);
mysqli_close($link);



?>