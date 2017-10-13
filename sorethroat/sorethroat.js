var rz = document.getElementById("actionarea");
var site = "/medi/";

if(window.XMLHttpRequest){
	var xml = new XMLHttpRequest();

}
else{
	var xml = new ActiveXObject("Microsoft.XMLHttp");

}

localStorage.removeItem("one");
localStorage.removeItem("two");


function storeSoreThroat(div, answer)
{

	if(div == "one"){
	localStorage.setItem("one", answer)
  }

	if(div == "two"){
	localStorage.setItem("two", answer)
  }
	document.getElementById(div).style.display = "none";
}






function diagnoseSoreThroat()
{

		if((!localStorage.one)  || (!localStorage.two)){
			document.getElementById("redd").innerHTML = "Please Answer All questionsss";
				return;
		}
		if(((localStorage.one == "yes")  || (localStorage.two == "yes")))
		{
			doEmergency();
			return;
		}
		else{
		doNormal();
		return;
		}


}// ends function




function 	doEmergency()
{
	url =  site+ "sorethroat/ajaxdanger.php";
	xml.open("POST", url, true)


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
	xml.send();
}


function 	doNormal()
{
	url =  site+ "sorethroat/ajaxnodanger.php";
	xml.open("POST", url, true)


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
	xml.send();
}



function solutions(div)
{
	colorDiv(div);
	url =  site+ "sorethroat/first.php";
	xml.open("POST", url, true)


	xml.onreadystatechange = function(){
		if(xml.readyState == 4 && xml.status == 200){
			console.log(xml.responseText);

			if( xml.responseText == 504){
				window.location = site;
				return;
			}
			else{
				document.getElementById("solutions").innerHTML = xml.responseText
			}
		}///ends first if
	}//ends xmlreadystatechan
	xml.send();
}




function second(div)
{
	colorDiv(div);
	url =  site+ "sorethroat/second.php";
	xml.open("POST", url, true)


	xml.onreadystatechange = function(){
		if(xml.readyState == 4 && xml.status == 200){
			console.log(xml.responseText);

			if( xml.responseText == 504){
				window.location = site;
				return;
			}
			else{
				document.getElementById("solutions").innerHTML = xml.responseText
			}
		}///ends first if
	}//ends xmlreadystatechan
	xml.send();
}


function third(div)
{
	colorDiv(div);
	url =  site+ "sorethroat/third.php";
	xml.open("POST", url, true)


	xml.onreadystatechange = function(){
		if(xml.readyState == 4 && xml.status == 200){
			console.log(xml.responseText);

			if( xml.responseText == 504){
				window.location = site;
				return;
			}
			else{
				document.getElementById("solutions").innerHTML = xml.responseText
			}
		}///ends first if
	}//ends xmlreadystatechan
	xml.send();
}


function fourth(div)
{
	colorDiv(div);
	url =  site+ "sorethroat/fourth.php";
	xml.open("POST", url, true)


	xml.onreadystatechange = function(){
		if(xml.readyState == 4 && xml.status == 200){
			console.log(xml.responseText);

			if( xml.responseText == 504){
				window.location = site;
				return;
			}
			else{
				document.getElementById("solutions").innerHTML = xml.responseText
			}
		}///ends first if
	}//ends xmlreadystatechan
	xml.send();
}


function fifth(div)
{
	colorDiv(div);
	url =  site+ "sorethroat/fifth.php";
	xml.open("POST", url, true)


	xml.onreadystatechange = function(){
		if(xml.readyState == 4 && xml.status == 200){
			console.log(xml.responseText);

			if( xml.responseText == 504){
				window.location = site;
				return;
			}
			else{
				document.getElementById("solutions").innerHTML = xml.responseText
			}
		}///ends first if
	}//ends xmlreadystatechan
	xml.send();
}


function sixth(div)
{
	colorDiv(div);
	url =  site+ "sorethroat/sixth.php";
	xml.open("POST", url, true)


	xml.onreadystatechange = function(){
		if(xml.readyState == 4 && xml.status == 200){
			console.log(xml.responseText);

			if( xml.responseText == 504){
				window.location = site;
				return;
			}
			else{
				document.getElementById("solutions").innerHTML = xml.responseText
			}
		}///ends first if
	}//ends xmlreadystatechan
	xml.send();
}

function yeson(div)
{

	url =  site+ "sorethroat/yeson.php";
	xml.open("POST", url, true)


	xml.onreadystatechange = function(){
		if(xml.readyState == 4 && xml.status == 200){
			console.log(xml.responseText);

			if( xml.responseText == 504){
				window.location = site;
				return;
			}
			else{
				document.getElementById("get").innerHTML = xml.responseText
			}
		}///ends first if
	}//ends xmlreadystatechan
	xml.send();
}

function noon(div)
{

	url =  site+ "sorethroat/noon.php";
	xml.open("POST", url, true)


	xml.onreadystatechange = function(){
		if(xml.readyState == 4 && xml.status == 200){
			console.log(xml.responseText);

			if( xml.responseText == 504){
				window.location = site;
				return;
			}
			else{
				document.getElementById("get").innerHTML = xml.responseText
			}
		}///ends first if
	}//ends xmlreadystatechan
	xml.send();
}


function colorDiv(div)
{
	document.getElementById("first").style.backgroundColor = "white";
	document.getElementById("second").style.backgroundColor = "white";
	document.getElementById("third").style.backgroundColor = "white";
	document.getElementById("fourth").style.backgroundColor = "white";
	document.getElementById("fifth").style.backgroundColor = "white";
	document.getElementById("sixth").style.backgroundColor = "white";
	document.getElementById(div).style.backgroundColor = "pink";
}
