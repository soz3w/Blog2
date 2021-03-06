<?php
//require_once("Model.php");

class Model_User {
	private $db;
	public function __construct()
	{
		$this->db = new Helper_database();
	}
	public function authenf($login,$password)
	{
		$sql =  "select id,login, password";
		$sql.=  " from users ";
		$sql.= " where login = ? and password=?";
		return $this->db->queryOne($sql, array($login,$password));
	}
	public function getUsers($limit1=0, $limit2=100)
	{
		$sql =  " select id,login, password";
		$sql.=  " from users ";
		$sql.= " limit $limit1,$limit2";
		return $this->db->query($sql);
	}
	public function getRowsCount()
	{
		$sql =  "select count(*) as totalRows from users";
		return $this->db->queryAll($sql);
	}

	public function save($data)
	{
		$this->db->save($data,"users");
	}	
	public function delete($id)
	{
		$this->db->save($id,"users");
	}
	
}




