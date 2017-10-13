var rz = document.getElementById("actionarea");
var site = "/medi/";

if(window.XMLHttpRequest){
	var xml = new XMLHttpRequest();

}
else{
	var xml = new ActiveXObject("Microsoft.XMLHttp");

}

function formfornewcase()
{
	url =  site+ "medic/ajaxloadformfornewcase.php";
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


function formforpendingcase()
{
	url =  site+ "medic/ajaxloadformforpendingcase.php";
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



function formforpatientdiag()
{
	url =  site+ "medic/ajaxloadformtocallinpatient.php";
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


function searchPatientfornewcase(str)
{
	url =  site+ "medic/ajaxseachpatientfornewcase.php";
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


function viewque()
{
	url =  site+ "medic/loadpending.php";
	xml.open("POST", url, true)
	var meme  = new FormData();
	//var json = JSON.stringify({"str":str});
	//meme.append("data", json);

	xml.onreadystatechange = function(){
		if(xml.readyState == 4 && xml.status == 200){
			if( xml.responseText == 504){
				window.location = site;
				return;
			}
			else{
			document.getElementById("actionarea").innerHTML = xml.responseText;
			}

		}
	}
	xml.send();
}


function popupSymtoms(caseId, hospitalNo)
{
	url =  site+ "medic/ajaxsicknessoptions.php";
	xml.open("POST", url, true)
	var meme  = new FormData();
	var json = JSON.stringify({"caseId":caseId, "hospitalNo":hospitalNo});
	meme.append("data", json);

	xml.onreadystatechange = function(){
		if(xml.readyState == 4 && xml.status == 200){
			if( xml.responseText == 504){
				window.location = site;
				return;
			}
			else{
			document.getElementById("rest").innerHTML = xml.responseText;
			}

		}
	}
	xml.send(meme);
}

function selectCaseToTreat(caseId, hospitalNo)
{
	url =  site+ "medic/ajaxloadsicknessoptions.php";
	xml.open("POST", url, true)
	var meme  = new FormData();
	var json = JSON.stringify({"caseId":caseId, "hospitalNo":hospitalNo});
	meme.append("data", json);

	xml.onreadystatechange = function(){
		if(xml.readyState == 4 && xml.status == 200){
			if( xml.responseText == 504){
				window.location = site;
				return;
			}
			else{
			document.getElementById("actionarea").innerHTML = xml.responseText;
			}

		}
	}
	xml.send(meme);
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

function closeTreatment(caseid)
{
	url =  site+ "medic/ajaxclosecase.php";
	xml.open("POST", url, true)
	var meme  = new FormData();
	var json = JSON.stringify({"caseid":caseid});
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


function openVitalSignsForm(hospitalno)
{
	url =  site+ "medic/ajaxformforvitalsigns.php";
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

function processVitalSign(hospitalno,age,height)
{
	var lbp = document.getElementById("lbp").value;
	var bbp = document.getElementById("bbp").value;
	var temp = document.getElementById("temp").value;
	var bp = bbp + "/" + lbp;
if(lbp == 0 || bbp == 0 ){
	errors("Please specify both top/bottom values for BP", "errorspot"); return;
}

if( isNaN(temp)  || temp == ""){
	errors("Please provide patient's temperature", "errorspot"); return;
}


	url =  site+ "medic/ajaxaddvitalsign.php";
	xml.open("POST", url, true)
	var meme  = new FormData();
	var json = JSON.stringify({"hospitalno":hospitalno, "bp":bp, "age":age, "temp":temp, "height":height});
	meme.append("data", json);
	console.log(json);

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

function openPending(caseId)
{
	url =  site+ "medic/ajaxloadonepending.php";
	xml.open("POST", url, true)
	var meme  = new FormData();
	var json = JSON.stringify({"caseId":caseId});
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


function errors(info, section)
{
	document.getElementById(section).innerHTML = info;
	setTimeout(function(){
			document.getElementById(section).innerHTML = "";
	}, 3000);
}
