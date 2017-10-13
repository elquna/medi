var rz = document.getElementById("actionarea");
var site = "/medi/";

if(window.XMLHttpRequest){
	var xml = new XMLHttpRequest();

}
else{
	var xml = new ActiveXObject("Microsoft.XMLHttp");

}


function notopain()
{
	url =  site+ "nose/ajaxnotopain.php";
	xml.open("POST", url, true)

	xml.onreadystatechange = function(){
		if(xml.readyState == 4 && xml.status == 200){
			if( xml.responseText == 504){
				window.location = site;
				return;
			}
			else{
				document.getElementById("read").innerHTML = xml.responseText;
			}

		}
	}
	xml.send();
}


function yestopain()
{
	url =  site+ "nose/yestopain.php";
	xml.open("POST", url, true)

	xml.onreadystatechange = function(){
		if(xml.readyState == 4 && xml.status == 200){
			if( xml.responseText == 504){
				window.location = site;
				return;
			}
			else{
				document.getElementById("read").innerHTML = xml.responseText;
			}

		}
	}
	xml.send();
}


function sendToPending(caseId, level, info)
{
	url =  site+ "nose/ajaxsendtopending.php";
	xml.open("POST", url, true)
	var meme  = new FormData();
	var json = JSON.stringify({"caseId":caseId, "level":level, "info":info});
	meme.append("data", json);

	xml.onreadystatechange = function(){
		if(xml.readyState == 4 && xml.status == 200){
			console.log(xml.responseText);

			if( xml.responseText == 504){
				window.location = site;
				return;
			}
			else{
				document.getElementById("infoo").style.color = "blue";
				document.getElementById("infoo").innerHTML = "treatment Transfered to higher cadre";
				setTimeout(function(){ document.getElementById("infoo").innerHTML = ""}, 6000);
			}
		}///ends first if
	}//ends xmlreadystatechan
	xml.send(meme);
}


function yesrisk()
{
	url =  site+ "nose/yesrisk.php";
	xml.open("POST", url, true)

	xml.onreadystatechange = function(){
		if(xml.readyState == 4 && xml.status == 200){
			if( xml.responseText == 504){
				window.location = site;
				return;
			}
			else{
				document.getElementById("risk").innerHTML = xml.responseText;
			}

		}
	}
	xml.send();
}


function norisk()
{
	url =  site+ "nose/norisk.php";
	xml.open("POST", url, true)

	xml.onreadystatechange = function(){
		if(xml.readyState == 4 && xml.status == 200){
			if( xml.responseText == 504){
				window.location = site;
				return;
			}
			else{
				document.getElementById("risk").innerHTML = xml.responseText;
			}

		}
	}
	xml.send();
}
