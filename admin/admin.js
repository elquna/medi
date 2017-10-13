var rz = document.getElementById("actionarea");
var site = "/medi/";

if(window.XMLHttpRequest){
	var xml = new XMLHttpRequest();

}
else{
	var xml = new ActiveXObject("Microsoft.XMLHttp");

}



function addPatient()
{


	url =  site+ "admin/ajaxloadformforpatient.php";
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

function processaddpatient()
{
	var firstname = document.getElementById("f").value;
	var l = document.getElementById("l").value;
	var phone = document.getElementById("phone").value;
	var address = document.getElementById("address").value;
	var bloodg = document.getElementById("bloodg").value;
	var genotype = document.getElementById("genotype").value;
	var gender = document.getElementById("gender").value;
	var birthday = document.getElementById("birthday").value;
	var state = document.getElementById("state").value;
	var lga = document.getElementById("lga").value;
	var nation = document.getElementById("nation").value;
	var password1 = document.getElementById("password1").value;
	var height = document.getElementById("height").value;
	var password2 = document.getElementById("password2").value;

	if(firstname == "" || l == "" || phone == "" || address == "" || bloodg == "" || genotype == "" || gender == "" || birthday == "" || state == "" ||
	lga == "" || nation == "" || password1 == "" || password2 == "" || height == ""){
		document.getElementById('errorspot').innerHTML = 'Please Complete the form';
		setTimeout(function(){	document.getElementById('errorspot').innerHTML = "";}, 3000);
	 return;
	}

	if(isNaN(height)){
		document.getElementById('errorspot').innerHTML = "Height must be a number";
		 setTimeout(function(){	document.getElementById('errorspot').innerHTML = "";}, 3000);
		return;
	}

	if(isNaN(birthday)){
		document.getElementById('errorspot').innerHTML = "Age must be a number";
		 setTimeout(function(){	document.getElementById('errorspot').innerHTML = "";}, 3000);
		return;
	}

	if(password1 != password2){
		document.getElementById('errorspot').innerHTML = "Passwords do not Match";
		 setTimeout(function(){	document.getElementById('errorspot').innerHTML = "";}, 3000);
		return;
	}
	var jd = JSON.stringify({"firstname":firstname, "lastname":l, "phone":phone, "address":address, "bloodgroup":bloodg, "genotype":genotype,
	"gender":gender, "birthday":birthday, "state":state, "lga":lga, "nation":nation, "password1":password1, "height":height});

	url =  site+ "admin/ajaxprocesspatientadd.php";
	xml.open("POST", url, true)
	var meme  = new FormData();
	meme.append("data",jd);

	xml.onreadystatechange = function(){
		if(xml.readyState == 4 && xml.status == 200){
			if( xml.responseText == 504){
				window.location = site;
				return;
			}
			else{
				document.getElementById("actionarea").innerHTML = xml.responseText;
				console.log(jd);
			}

		}
	}
	xml.send(meme);
}



function addStaff()
{


	url =  site+ "admin/ajaxloadformforstaff.php";
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

function processaddstaff()
{
	var firstname = document.getElementById("f").value;
	var lastname = document.getElementById("l").value;
	var phone = document.getElementById("ph").value;
	var address = document.getElementById("ad").value;
	var stafftype = document.getElementById("stafftype").value;
	var username = document.getElementById("username").value;
	var password = document.getElementById("password").value;
	var password2 = document.getElementById("password2").value;

	if(firstname == "" || lastname == "" || phone == "" || address == "" || stafftype == "" || username == "" || password == "" || password2 == ""){
		document.getElementById('errorspot').innerHTML = 'Please Complete the form';
		setTimeout(function(){	document.getElementById('errorspot').innerHTML = "";}, 3000);
	 return;

	}
	if(password != password2){
		document.getElementById('errorspot').innerHTML = 'Passwords do not match';
		setTimeout(function(){	document.getElementById('errorspot').innerHTML = "";}, 3000);
	 return;
	}

	var js = JSON.stringify({"firstname":firstname, "lastname":lastname, "phone":phone, "address":address, "stafftype":stafftype, "username":username,
	"password":password});

	var meme = new FormData();
	meme.append("data",js);

	url =  site+ "admin/ajaxprocessaddstaff.php";
	xml.open("POST", url, true)


	xml.onreadystatechange = function(){
		if(xml.readyState == 4 && xml.status == 200){
			if( xml.responseText == 504){
			//	window.location = site;
			console.log(xml.responseText);
				return;
			}
		else{
			rz.innerHTML = xml.responseText;
		}

		}
	}
	xml.send(meme);

}
