var rz = document.getElementById("actionarea");
var site = "/medi/";

if(window.XMLHttpRequest){
	var xml = new XMLHttpRequest();

}
else{
	var xml = new ActiveXObject("Microsoft.XMLHttp");

}


function doa(symtom, answer)
{
	url =  site+ "fevercase/ajaxupdatefevertests.php";
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


function ajaxloafirstquestion()
{
	url =  site+ "fevercase/ajaxloafirstquestion.php";
	xml.open("POST", url, true)
	var meme  = new FormData();

	xml.onreadystatechange = function(){
		if(xml.readyState == 4 && xml.status == 200){
			if( xml.responseText == 504){
				window.location = site;
				return;
			}
			else{
			rz.innerHTML = xml.responseText;
			}

		}
	}
	xml.send();
}


function searchPatient(str)
{
	url =  site+ "medic/ajaxseachpatient.php";
	xml.open("POST", url, true)
	var meme  = new FormData();
	var json = JSON.stringify({"str":str});
	meme.append("data", json);

	xml.onreadystatechange = function(){
		if(xml.readyState == 4 && xml.status == 200){
			if( xml.responseText == 504){
				window.location = site;
				return;
			}
			else{
			document.getElementById("res").innerHTML = xml.responseText;
			}

		}
	}
	xml.send(meme);
}

function openCase(hospitalno)
{
	url =  site+ "medic/loadailmentsfordiagnosis.php";
	xml.open("POST", url, true)
	var meme  = new FormData();
	var json = JSON.stringify({"hospitalno":hospitalno});
	meme.append("data", json);

	xml.onreadystatechange = function(){
		if(xml.readyState == 4 && xml.status == 200){
			if( xml.responseText == 504){
				window.location = site;
				return;
			}
			else{
			rz.innerHTML = xml.responseText;
			}

		}
	}
	xml.send(meme);

}

function diagnose(caseId)
{

	url =  site+ "fevercase/ajaxdignose.php";
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
	url =  site+ "fevercase/ajaxnodanger.php";
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
	url =  site+ "fevercase/ajaxdanger.php";
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
	url =  site+ "fevercase/ajaxsendtopending.php";
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


function donegative()
{
	url =  site+ "fevercase/ajaxdonegative.php";
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
				document.getElementById("negative").innerHTML = xml.responseText;

			}
		}///ends first if
	}//ends xmlreadystatechan
	xml.send(meme);
}

function dopositive()
{
	url =  site+ "fevercase/ajaxpositive.php";
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
				document.getElementById("negative").innerHTML = xml.responseText;

			}
		}///ends first if
	}//ends xmlreadystatechan
	xml.send(meme);
}

function dono()
{
	url =  site+ "fevercase/ajaxtreatmalaria.php";
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
				document.getElementById("nono").innerHTML = xml.responseText;


			}
		}///ends first if
	}//ends xmlreadystatechan
	xml.send(meme);
}

function doyes()
{
	url =  site+ "fevercase/ajaxparasiteslidemicroscopy.php";
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
				document.getElementById("nono").innerHTML = xml.responseText;


			}
		}///ends first if
	}//ends xmlreadystatechan
	xml.send(meme);
}

function slideNegative()
{
	url =  site+ "fevercase/ajaxnewnegative.php";
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
				document.getElementById("slides").innerHTML = xml.responseText;


			}
		}///ends first if
	}//ends xmlreadystatechan
	xml.send(meme);
}


function slidePositive()
{
	url =  site+ "fevercase/ajaxpositiveslide.php";
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
				document.getElementById("slides").innerHTML = xml.responseText;


			}
		}///ends first if
	}//ends xmlreadystatechan
	xml.send(meme);
}
