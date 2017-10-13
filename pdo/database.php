<?php
Class Database {

	private $_password = "linuxguy";
	private $_dsn = "mysql:dbname=pact;host=localhost";
	private $_user = "root";
	private $_dbh;


	public function __construct()
	{
		$this->_dbh = new PDO($this->_dsn, $this->_user, $this->_password);
	}

	public function getCon()
	{
		return $this->_dbh;
	}

	public function loginAdmin($username, $password)
	{
		$sql = $this->_dbh->prepare("select count(*) as count from admin where Username =:username and Password =:password");
		$sql->bindValue(":username", $username, PDO::PARAM_STR);
		$sql->bindValue(":password", $password, PDO::PARAM_STR);
		$sql->execute();
		$sql->bindColumn("count", $count);
		$row = $sql->fetch();

		return $count;
	}



	public function addPatient($firstname, $lastname, $phone, $address,$bloodgroup, $genotype, $gender, $birthday, $state, $lga, $nation,
	 $password1, $height)
	{
		$sql = $this->_dbh->prepare("INSERT INTO patients (FirstName, LastName, Phone, Address, BloodGroup, Genotype, Gender, BirthDate,
		StateOfOrigin, Lga, Nationality, Password, height) VALUES (:FirstName, :LastName, :Phone, :Address, :BloodGroup, :Genotype, :Gender, :BirthDate,
		:StateOfOrigin, :Lga, :Nationality, :Password, :height)");
		$sql->bindValue(":FirstName", $firstname, PDO::PARAM_STR);
		$sql->bindValue(":LastName", $lastname, PDO::PARAM_STR);
		$sql->bindValue(":Phone", $phone, PDO::PARAM_STR);
		$sql->bindValue(":Address", $address, PDO::PARAM_STR);
		$sql->bindValue(":BloodGroup", $bloodgroup, PDO::PARAM_STR);
		$sql->bindValue(":Genotype", $genotype, PDO::PARAM_STR);
		$sql->bindValue(":Gender", $gender, PDO::PARAM_STR);
		$sql->bindValue(":BirthDate", $birthday, PDO::PARAM_STR);
		$sql->bindValue(":StateOfOrigin", $state, PDO::PARAM_STR);
		$sql->bindValue(":Lga", $lga, PDO::PARAM_STR);
		$sql->bindValue(":Nationality", $nation, PDO::PARAM_STR);
		$sql->bindValue(":Password", $password1, PDO::PARAM_STR);
		$sql->bindValue(":height", $height, PDO::PARAM_STR);
		if($sql->execute()){
		$array = array($this->_dbh->lastInsertId());
		return $array; }
		else{ return 999999999;}
	}



	public function checkEmail($email)
	{
		$check = $this->_dbh->prepare("select * from users where email =:email ");
		$check->bindValue(":email", $email,  PDO::PARAM_STR);
		$check->execute();
		$count = $check->rowCount();
		return $count;
	}


	public function generateHospitalNumber($lastInsertId)
	{
		$hospitalNumber = "HMS";
		if(strlen($lastInsertId) == 1){
			$append = "0".$lastInsertId;
		}
		else{
			$append = $lastInsertId;
		}
		$hospitalNumber = $hospitalNumber.$append;
		return $hospitalNumber;
	}

	public function UpdateHospitalNo($patientId, $hospitalNo)
	{
		$sql = $this->_dbh->prepare("UPDATE patients SET HospitalNo =:hs WHERE PatientId =:id");
		$sql->bindValue(":hs", $hospitalNo, PDO::PARAM_STR);
		$sql->bindValue(":id", $patientId, PDO::PARAM_INT);
		if($sql->execute()){ return 2000;} else{ return 404;}
	}

	public function authenticateStaff($username, $password)
	{
		$sql = $this->_dbh->prepare("SELECT count(*) as count from staff where (Username =:username) and (Password =:password)");
		$sql->bindValue(":username", $username);
		$sql->bindValue(":password", $password);
		$sql->execute();
		$sql->bindColumn("count", $count);
		$sql->fetch();
		return $count;

	}


public function addStaff($firstname, $lastname, $phone, $address, $stafftype, $username, $password, $level)
{
	$sql = $this->_dbh->prepare("INSERT INTO staff (FirstName, LastName, Username, Password, StaffType, Phone, Address, Level) VALUES
		(:FirstName, :LastName, :Username, :Password, :StaffType, :Phone, :Address, :Level)");
		$sql->bindValue(":FirstName", $firstname, PDO::PARAM_STR);
		$sql->bindValue(":LastName", $lastname, PDO::PARAM_STR);
		$sql->bindValue(":Username", $username, PDO::PARAM_STR);
		$sql->bindValue(":Password", $password, PDO::PARAM_STR);
		$sql->bindValue(":StaffType", $stafftype, PDO::PARAM_STR);
		$sql->bindValue(":Phone", $phone, PDO::PARAM_STR);
		$sql->bindValue(":Address", $address, PDO::PARAM_STR);
		$sql->bindValue(":Level", $level, PDO::PARAM_INT);
		if($sql->execute()){
		return true;
	}else{  return false;}

	}


	public function getStaffDetails($username)
	{
		$sql = $this->_dbh->prepare("SELECT * from staff Where Username =:username");
		$sql->bindValue(":username", $username);
		$sql->execute();
		$row = $sql->fetch(PDO::FETCH_ASSOC);
		return $row;
	}


	public function getPatientByHospitalNo($hosno)
	{
		$sql = $this->_dbh->prepare("SELECT * from patients Where HospitalNo =:hos");
		$sql->bindValue(":hos", $hosno);
		$sql->execute();
		$row = $sql->fetch(PDO::FETCH_ASSOC);
		return $row;
	}


	public function getStaffDetailsbyStaffId($staffId)
	{
		$sql = $this->_dbh->prepare("SELECT * from Staff Where StaffId =:staffId");
		$sql->bindValue(":staffId", $staffId);
		$sql->execute();
		$row = $sql->fetch(PDO::FETCH_ASSOC);
		return $row;
	}

	public function searchPatientByHMS($str)
	{
		$sql = $this->_dbh->prepare("SELECT * from patients Where HospitalNo like :hn");
		$sql->bindValue(":hn", "%$str%");
		$sql->execute();
		$row = $sql->fetchAll(PDO::FETCH_ASSOC);
		return $row;
	}

	public function searchPatientForNewcase($str)
	{
		$sql = $this->_dbh->prepare("SELECT * from cases Where ((HospitalNo like :hn) or (caseId like :hn)) and (PendingStatus = 0) ");
		$sql->bindValue(":hn", "%$str%");
		$sql->execute();
		$row = $sql->fetchAll(PDO::FETCH_ASSOC);
		return $row;
	}

	public function searchCaseByCaseId($caseId)
	{
		$sql = $this->_dbh->prepare("SELECT * from cases Where caseId =:caseId ");
		$sql->bindValue(":caseId", $caseId);
		$sql->execute();
		$row = $sql->fetch(PDO::FETCH_ASSOC);
		return $row;
	}


	public function addVitalSign($data)
	{
		$sql = $this->_dbh->prepare("INSERT INTO cases (date, HospitalNo, temperature, height, age, bp) VALUES
		 (:date, :HospitalNo, :temperature, :height, :age, :bp)");
		$sql->bindValue(":date", date("d-m-Y"));
		$sql->bindValue(":HospitalNo", $data->hospitalno);
		$sql->bindValue(":temperature", $data->temp);
		$sql->bindValue(":age", $data->age);
		$sql->bindValue(":bp", $data->bp);
		$sql->bindValue(":height", $data->height);
		if($sql->execute()){
			return $this->_dbh->lastInsertId();
		}
		else{
			return false;
		}

	}

	public function getPatientsByHMS($hms)
	{
		$sql = $this->_dbh->prepare("SELECT * from patients Where HospitalNo  =:hn");
		$sql->bindValue(":hn", $hms);
		$sql->execute();
		$row = $sql->fetch(PDO::FETCH_ASSOC);
		return $row;
	}

public function existCase($caseId)
{
	$sql = $this->_dbh->prepare("SELECT count(*) as count from fevertests where caseid =:caseId");
	$sql->bindValue(":caseId", $caseId);
	$sql->execute();
	$sql->bindColumn("count", $count);
	$sql->fetch();
	if($count > 0){ return true;} else{ return false; }
}

public function InsertIntoFevertest($caseId,$hospitalNo, $temperature, $bp)
{
	$sql = $this->_dbh->prepare("INSERT INTO fevertests (caseid, hospitalno, temperature, bp) VALUES
	 (:caseid, :HospitalNo, :temperature, :bp)");
	$sql->bindValue(":HospitalNo", $hospitalNo);
	$sql->bindValue(":temperature", $temperature);
	$sql->bindValue(":bp", $bp);
	$sql->bindValue(":caseid", $caseId);
	$sql->execute();
}

public function updateFeverTest($caseId, $symtom, $answer)
{
	$sql = $this->_dbh->prepare("UPDATE  fevertests set  $symtom =:answer where caseid =:caseId");
	$sql->bindValue(":caseId", $caseId);
	$sql->bindValue(":answer", $answer);
	if($sql->execute()){ return true; }else{ return false;}
}

public function getFeverCaseDetails($caseId)
{
	$sql = $this->_dbh->prepare("SELECT * from fevertests Where caseid  =:caseid");
	$sql->bindValue(":caseid", $caseId);
	$sql->execute();
	$row = $sql->fetch(PDO::FETCH_ASSOC);
	return $row;
}

public function  getCoughCaseDetails($caseId)
{
	$sql = $this->_dbh->prepare("SELECT * from cough Where caseid  =:caseid");
	$sql->bindValue(":caseid", $caseId);
	$sql->execute();
	$row = $sql->fetch(PDO::FETCH_ASSOC);
	return $row;
}


public function sendToPending($data)
{
	$sql = $this->_dbh->prepare("INSERT INTO pendingcases (caseid, treatment, level, status, ailment) VALUES
	(:caseid, :treatment, :level, :status, :ailment)");
	$sql->bindValue(":caseid", $data->caseId);
	$sql->bindValue(":treatment", $data->info);
	$sql->bindValue(":level", $data->level);
	$sql->bindValue(":status", 0);
	$sql->bindValue(":ailment", $data->ailment);
	$sql->execute();
}

public function existCaseCough($caseId)
{
	$sql = $this->_dbh->prepare("SELECT count(*) as count from cough where caseid =:caseId");
	$sql->bindValue(":caseId", $caseId);
	$sql->execute();
	$sql->bindColumn("count", $count);
	$sql->fetch();
	if($count > 0){ return true;} else{ return false; }
}

public function InsertIntoCough($caseId, $bp)
{
	$sql = $this->_dbh->prepare("INSERT INTO cough (caseId,  bp)  VALUES (:caseid, :bp)");
	$sql->bindValue(":bp", $bp);
	$sql->bindValue(":caseid", $caseId);
	$sql->execute();
}



public function updateCough($caseId, $symtom, $answer)
{
	$sql = $this->_dbh->prepare("UPDATE  cough set  $symtom =:answer where caseid =:caseId");
	$sql->bindValue(":caseId", $caseId);
	$sql->bindValue(":answer", $answer);
	if($sql->execute()){ return true; }else{ return false;}
}


public function fetchPendingCase($staffLevel)
{
	$sql = $this->_dbh->prepare("SELECT distinct caseid  from pendingcases where
		 (level <:staffLevel or level =:staffLevel)  and status = 0");
	$sql->bindValue(":staffLevel", $staffLevel);
	$sql->execute();
	return $sql->fetchAll(PDO::FETCH_ASSOC);

}


public function  fetchOnePending($caseId)
{
	$sql = $this->_dbh->prepare("SELECT *  from pendingcases where caseid =:caseid");
	$sql->bindValue(":caseid", $caseId);
	$sql->execute();
	return $sql->fetch(PDO::FETCH_ASSOC);
}

public function fetchTreatsmentsForPending($caseId)
{
	$sql = $this->_dbh->prepare("SELECT *  from pendingcases where caseid =:caseid");
	$sql->bindValue(":caseid", $caseId);
	$sql->execute();
	return $sql->fetchAll(PDO::FETCH_ASSOC);
}

public function loadPatientDetailsCaseId($caseId)
{
	$sql = $this->_dbh->prepare("SELECT *  from patients  where  HospitalNo in (SELECT HospitalNo from cases where caseId =:caseid)");
	$sql->bindValue(":caseid", $caseId);
	$sql->execute();
	return $sql->fetch(PDO::FETCH_ASSOC);
}


public function closeCase($caseid)
{
	$sql = $this->_dbh->prepare("UPDATE  pendingcases set  status = 1 where caseid =:caseId");
	$sql->bindValue(":caseId", $caseid);
	if($sql->execute()){ return true; }else{ return false;}
}


public function offFromCases($caseId)
{
	$sql = $this->_dbh->prepare("UPDATE  cases set  PendingStatus = 1 where caseId =:caseId");
	$sql->bindValue(":caseId", $caseId);
	if($sql->execute()){ return true; }else{ return false;}
}
}
