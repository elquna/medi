
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title> Electronic Medical Diagnosis</title>
<link href="css/one.css" type="text/css" rel="stylesheet" />
</head> 

<body  style="background-image:url('images/med.jpg');">
	<div id="wrapper">
    	<div id="int">
        	<p class="intro" style="color:white">Admin Login Panel</h1>
        </div>
        
        <div id="auth">
        	<input type="text"  placeholder="Username" id="username"/>
            
            <input type="password"  placeholder="Password" id="password"/>
            <input type="submit" onclick="login()" value="Login" />
            
            <div id="errorlog"></div>
            <div class="cl"></div>
            <p><a href="index.php" class="si">Back</a></p>
            
        </div>
        
       
        
        
	
	</div>
</body>
</html>
<script>
var xml = new XMLHttpRequest();
function dv(element)
{
	return document.getElementById(element).value;
}
function dd(element)
{
	return document.getElementById(element);
}


function login()
{
	
	var url = "admin/processadminlogin.php";
	xml.open("POST", url, true);
	var username = dv("username");
	var password = dv("password");
	if(username == "" || password == ""){
		document.getElementById("errorlog").style.color = "white";
		document.getElementById("errorlog").style.marginLeft = "11px";
		document.getElementById("errorlog").innerHTML = "Incomplete Details";
		setTimeout(function(){document.getElementById("errorlog").innerHTML = ""},3000)
		return;
		
	}
	var js = JSON.stringify({"username":username, "password":password});
	var fd = new FormData();
	fd.append("data",js);
	xml.onreadystatechange = function()
	{
		if(xml.readyState == 4 && xml.status == 200){
			if(xml.responseText == "true"){
				window.location = "admin";
			}
			else{
				document.getElementById("errorlog").style.color = "white";
				document.getElementById("errorlog").style.marginLeft = "11px";
				document.getElementById("errorlog").innerHTML = "Invalid Login details";
				setTimeout(function(){document.getElementById("errorlog").innerHTML = ""},3000)
				return;
			}
		}
	}
	xml.send(fd);
}

function dotime()
{
	setTimeout(timing,1000);
}

function timing()
{
	var dtime = new Date();
	var tt = dtime.getDate();
	document.getElementById("time").innerHTML = sd;
	setTimeout(dotime,1000);
}

</script>
