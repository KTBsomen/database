
<!doctype html>
<html>
<head>

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<style>

* {
  box-sizing: border-box;
  margin: 0;
  padding: 0;
}

body {
  background-color: #eee;
  font-family: 'helvetica neue', helvetica, arial, sans-serif;
  color: #222;
}

#form {
  max-width: 700px;
  padding: 2rem;
  box-sizing: border-box;
}

.form-field {
  display: flex;
  margin: 0 0 1rem 0;
}
label, input {
  width: 70%;
  padding: 0.5rem;
  box-sizing: border-box;
  justify-content: space-between;
  font-size: 1.1rem;
}
label {
  text-align: right;
  width: 30%;
}
input {
  border: 2px solid #aaa;
  border-radius: 2px;
}
xmp{
    margin:3px;
    padding:8px;
    background:white;
    overflow:scroll;
    font-size:20px;
}

</style>
</head>
<body>

<center><h2>Enter Email to get API key</h2>
<form method="post" action="#" id="form" class="validate">
  
  <div class="form-field">
    <label for="email-input">Email</label>
    <input type="email" name="email" id="email-input" placeholder="example@domain.com" required />
  </div>

  <div class="form-field">
    <label for=""></label>
    <input type="submit" value="Get API key" />
  </div>

  </form>
  <?php
include("config.php");
if(isset($_POST["email"]) && filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
$data=mr();  
$sql = "INSERT INTO user_registration_details (email, user_id) VALUES ('".$_POST['email']."','".$data."')";

if (mysqli_query($link, $sql)) {
  echo '<h1>Your API key:'. $data.'</h1><br/>';
} 
else {
  echo "Error: " . $sql . "<br>" . mysqli_error($link);
}

mysqli_close($link);

}


?>
<center><h3>Copy this code: and paste it in your html page</h3></center> <br/>
<xmp><script src='https://dcfb1ab0a8c8ce.lhrtunnel.link/api/database.js'></script></xmp>
  </center>

  <center><h3>how to use</h3><a href="http://database.rf.gd/upload.html">here is a demo</a></center> <br/><br/>
 <center> <h4> first copy the API key and the script tag then paste them into your html. <strong>You Need this API key to access the API.</strong><br/>There are 5 APIs <center>
  <ul>
  <br/><br/>
  <li>upload_files(api_key,inputElementId)</li>
  <xmp>upload_files(api_key,inputElementId)</xmp>
  <p>you just specify the id of the input element and we will do the rest,and this returns none. but after calling this function a response variable will be genereted which have the public url of the uploaded files.</p><xmp>response //this is the variable of public urls</xmp>
<br/><br/>
    <li>upload_json(api_key,json_data)</li>
  <xmp>upload_json(api_key,json_data)</xmp>
  <p>you just specify the json data which you want to store and we will do the rest,and this returns none. not just json you can store any string or numbers with this method</p>
  <br/><br/>
   <li>select_json(api_key)</li>
  <xmp>select_json(api_key)</xmp>
  <p>you just specify the apiKey and we will do the rest,and this returns None. but after calling this function a variable named json_data will be genereted which have the all of your the uploaded JSON data or others data. note this only work after calling select_json method</p><xmp>json_data //this is the variable of JSON data</xmp>
  <br/><br/>
     <li>select_filename(api_key)</li>
  <xmp>select_filename(api_key)</xmp>
  <p>you just specify the apiKey and we will do the rest,and this returns None. but after calling this function a variable named filenames will be genereted which have the name of all of your the uploaded files . note this only work after calling select_filename method</p><xmp>filenames //this is the variable of filenames as JSON data</xmp>
  <br/><br/>
  <li>delete_data(api_key,fileid)</li>
  <xmp>delete_data(api_key,fileid)</xmp>
  <p>you just specify the apiKey and and file id. we will do the rest,and this returns None.to get the file id use <xmp>select_filename() or select_json()</xmp> 
  </ul></center></h4> 

  <script>

    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>

</body>
</html>