<?php
class Helper_database
{
	private $db;
	public function __construct()
	{
		$config= new Helper_config();
		$config->loadFile("config.ini");
		$user = $config->get("dbuser","database");
		$password = $config->get("dbpassword","database");
		$dns = $config->get("dbdns","database");
		$this->db = new PDO($dns,$user,$password);
		$this->db->exec("SET NAMES UTF8");

	}
	public function query($queryString,$cond)
	{
		$req=$this->db->prepare($queryString);

		if (!$req->execute($cond))
		    	print_r($db->errorInfo());	
	
		$result = $req->fetchAll(PDO::FETCH_ASSOC);
		return $result;
	}
	public function queryAll($queryString)
	{
		$req=$this->db->prepare($queryString);

		if (!$req->execute())
		    	print_r($db->errorInfo());	
	
		$result = $req->fetchAll(PDO::FETCH_ASSOC);
		return $result;
	}
	public function queryOne($queryString,$cond)
	{
		$req=$this->db->prepare($queryString);

		if (!$req->execute($cond))
		    	print_r($db->errorInfo());	
	
		$result = $req->fetch(PDO::FETCH_ASSOC);
		return $result;
	}
	public function execute($queryString,$cond)
	{
		$req=$this->db->prepare($queryString);

		if (!$req->execute($cond))
		    	print_r($db->errorInfo());	

		   return $this->db->lastInsertId();
	}
	
}