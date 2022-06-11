function _(qq) {
		return document.getElementById(qq)
	}

var response=""	;
var json_data="";
var filenames="";
    //==============================================
//===========================================  
function delete_data(apikey,fileid){  
var xhttp = new XMLHttpRequest();

    xhttp.open("POST", "https://dcfb1ab0a8c8ce.lhrtunnel.link/api/delete.php", true);
    xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded; charset=UTF-8");
    xhttp.send("fileid="+fileid+"&myUID="+apikey);


}
//==============================================
//=========================================== 

    //==============================================
//===========================================  
function upload_json(apikey,jsondata){  
var xhttp = new XMLHttpRequest();
xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
       //document.getElementById("username").innerText=this.responseText;
    }
};
    xhttp.open("POST", "https://dcfb1ab0a8c8ce.lhrtunnel.link/api/uploadjson.php", true);
    xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded; charset=UTF-8");
    xhttp.send("myUID="+apikey+"&jsondata="+jsondata);

}
//==============================================
//===========================================  
    //==============================================
//===========================================  
function select_json(apikey){  
var xhttp = new XMLHttpRequest();

    xhttp.open("POST", "https://dcfb1ab0a8c8ce.lhrtunnel.link/api/selectjson.php", true);
    xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded; charset=UTF-8");
    xhttp.send("myUID="+apikey);
xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
       document.getElementById("uploaded_image").innerText= this.responseText;
       json_data= JSON.parse(this.responseText)
    }
};

}
//==============================================
//=========================================== 

function select_filename(apikey){  
var xhttp = new XMLHttpRequest();

    xhttp.open("POST", "https://dcfb1ab0a8c8ce.lhrtunnel.link/api/selectfilename.php", true);
    xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded; charset=UTF-8");
    xhttp.send("myUID="+apikey);
xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
       document.getElementById("uploaded_image").innerText= this.responseText;
       filenames= JSON.parse(this.responseText)
    }
};

}
//==============================================
//===========================================  

function upload_files(apikey,id){
 
//==============================================
  var form_data = new FormData();
    form_data.append('myUID', apikey);
    var image_number = 1;

    var error = '';

    for(var count = 0; count < _(id).files.length; count++)  
    {
        form_data.append("images[]", _(id).files[count]);
        image_number++;
    }

    if(error != '')
    {
        _('uploaded_image').innerHTML = error;

        _(id).value = '';
    }
    else
    {
       

        var ajax_request = new XMLHttpRequest();

        ajax_request.open("POST", "https://dcfb1ab0a8c8ce.lhrtunnel.link/api/upload.php");
        ajax_request.setRequestHeader( 'Access-Control-Allow-Origin', '*');
        ajax_request.upload.addEventListener('progress', function(event){

        var percent_completed = Math.round((event.loaded / event.total) * 100);

            _('progress_bar').value= percent_completed;
            _("progress").innerHTML=percent_completed+"%"
       
        });

        ajax_request.addEventListener('load', function(event){
            response=(this.responseText);
            _('uploaded_image').innerHTML =response ;

            _(id).value = '';



        });

        ajax_request.send(form_data);
    }

};

