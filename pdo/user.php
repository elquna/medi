<?php
require_once '../includes.php';
Class User {
	
	private $userid;
	public $firstname; 
	public $lastname;
	public $phone;
	public $email;
	public $location;
	public $bankname;
	public $bankaccountname;
	public $bankaccountnumber;
	public $username;
	public $stateid;
	private $db;
	
	
	public function __construct($userid)
	{
		$this->db = new Database();
		$this->userid = $userid;
		$this->populate($this->userid);
	}
	
	private function populate($userid)
	{
		$userDetails = $this->db->getUserByUserId($userid);
		$this->firstname = ucfirst($userDetails["firstname"]);
		$this->lastname = ucfirst($userDetails["lastname"]);
		$this->phone = $userDetails["phone"];
		$this->email = $userDetails["email"];
		$this->username = $userDetails["username"];
		$this->bankname = $userDetails["bankname"];
		$this->bankaccountname = $userDetails["bankaccountname"];
		$this->bankaccountnumber = $userDetails["bankaccountnumber"];
		$this->stateid = $userDetails["stateid"];
		$this->location = $this->db->getlocationNameByLocationId($userDetails["stateid"]);
		
	}
	
	
	
	
	
}

