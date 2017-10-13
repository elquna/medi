var rz = document.getElementById("actionarea");
var site = "/medi/";

if(window.XMLHttpRequest){
	var xml = new XMLHttpRequest();

}
else{
	var xml = new ActiveXObject("Microsoft.XMLHttp");

}


function doss(symtom, answer)
{
	url =  site+ "cough/ajaxupdatecough.php";
	xml.open("POST", url, true)
	var meme  = new FormData();
	var json = JSON.stringify({"symtom":symtom, "answer":answer});
	meme.append("data", json);

	xml.onreadystatechange = function(){
		if(xml.readyState == 4 && xml.status == 200){
			if( xml.responseText == 504){
				window.location = site;
				return;
			}
			if(xml.responseText != 404){
				console.log(xml.responseText);
			document.getElementById(symtom).style.display = "none";
			}

		}
	}
	xml.send(meme);
}



function diagnoseC(caseId)
{

	url =  site+ "cough/ajaxdignose.php";
	xml.open("POST", url, true)
	var meme  = new FormData();
	var json = JSON.stringify({"caseId":caseId});
	meme.append("data", json);

	xml.onreadystatechange = function(){
		if(xml.readyState == 4 && xml.status == 200){
			console.log(xml.responseText);

			if( xml.responseText == 504){
				window.location = site;
				return;
			}
			if(xml.responseText == 111){
			document.getElementById("redd").innerHTML = "Please Answer All questionsss";
			//alert("Please Answer all questions");
				return;
			}

			if(xml.responseText == 120){
			setTimeout(callNoDanger(caseId), 2000)

			}

			if(xml.responseText == 220){
			setTimeout(callDanger(caseId), 2000)

			}
		}///ends first if
	}//ends xmlreadystatechan
	xml.send(meme);
}// ends function


function callNoDanger(caseId)
{
	url =  site+ "cough/ajaxnodanger.php";
	xml.open("POST", url, true)
	var meme  = new FormData();
	var json = JSON.stringify({"caseId":caseId});
	meme.append("data", json);

	xml.onreadystatechange = function(){
		if(xml.readyState == 4 && xml.status == 200){
			console.log(xml.responseText);

			if( xml.responseText == 504){
				window.location = site;
				return;
			}
			else{
				document.getElementById("actionarea").innerHTML = xml.responseText
			}
		}///ends first if
	}//ends xmlreadystatechan
	xml.send(meme);
}

function callDanger(caseId)
{
	url =  site+ "cough/ajaxdanger.php";
	xml.open("POST", url, true)
	var meme  = new FormData();
	var json = JSON.stringify({"caseId":caseId});
	meme.append("data", json);

	xml.onreadystatechange = function(){
		if(xml.readyState == 4 && xml.status == 200){
			console.log(xml.responseText);

			if( xml.responseText == 504){
				window.location = site;
				return;
			}
			else{
				document.getElementById("actionarea").innerHTML = xml.responseText
			}
		}///ends first if
	}//ends xmlreadystatechan
	xml.send(meme);
}


function sendToPending(caseId, level, info)
{
	url =  site+ "cough/ajaxsendtopending.php";
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


function lessthantwoweeks()
{
	url =  site+ "cough/ajaxlessthantwoweeks.php";
	xml.open("POST", url, true)
	var meme  = new FormData();

	xml.onreadystatechange = function(){
		if(xml.readyState == 4 && xml.status == 200){
			console.log(xml.responseText);

			if( xml.responseText == 504){
				window.location = site;
				return;
			}
			else{
				document.getElementById("solutions").innerHTML = xml.responseText;
			}
		}///ends first if
	}//ends xmlreadystatechan
	xml.send(meme);
}


function morethantwoweeks()
{
	url =  site+ "cough/ajaxmorethantwo.php";
	xml.open("POST", url, true)
	var meme  = new FormData();

	xml.onreadystatechange = function(){
		if(xml.readyState == 4 && xml.status == 200){
			console.log(xml.responseText);

			if( xml.responseText == 504){
				window.location = site;
				return;
			}
			else{
				document.getElementById("solutions").innerHTML = xml.responseText;
			}
		}///ends first if
	}//ends xmlreadystatechan
	xml.send(meme);
}


function yessix()
{
	url =  site+ "cough/ajaxyessix.php";
	xml.open("POST", url, true)
	var meme  = new FormData();

	xml.onreadystatechange = function(){
		if(xml.readyState == 4 && xml.status == 200){
			console.log(xml.responseText);

			if( xml.responseText == 504){
				window.location = site;
				return;
			}
			else{
				document.getElementById("mmm").innerHTML = xml.responseText;
			}
		}///ends first if
	}//ends xmlreadystatechan
	xml.send(meme);
}

function nosix()
{
	url =  site+ "cough/ajaxnosix.php";
	xml.open("POST", url, true)
	var meme  = new FormData();

	xml.onreadystatechange = function(){
		if(xml.readyState == 4 && xml.status == 200){
			console.log(xml.responseText);

			if( xml.responseText == 504){
				window.location = site;
				return;
			}
			else{
				document.getElementById("mmm").innerHTML = xml.responseText;
			}
		}///ends first if
	}//ends xmlreadystatechan
	xml.send(meme);
}

function yesloss()
{
	url =  site+ "cough/ajaxyesloss.php";
	xml.open("POST", url, true)


	xml.onreadystatechange = function(){
		if(xml.readyState == 4 && xml.status == 200){
			console.log(xml.responseText);

			if( xml.responseText == 504){
				window.location = site;
				return;
			}
			else{
				document.getElementById("mmm").innerHTML = xml.responseText;
			}
		}///ends first if
	}//ends xmlreadystatechan
	xml.send();
}


function noloss()
{
	url =  site+ "cough/ajaxnoloss.php";
	xml.open("POST", url, true)


	xml.onreadystatechange = function(){
		if(xml.readyState == 4 && xml.status == 200){
			console.log(xml.responseText);

			if( xml.responseText == 504){
				window.location = site;
				return;
			}
			else{
				document.getElementById("mmm").innerHTML = xml.responseText;
			}
		}///ends first if
	}//ends xmlreadystatechan
	xml.send();
}
