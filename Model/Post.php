<?php
//require_once("Model.php");

class Model_Post {
	private $db;
	public function __construct()
	{
		$this->db = new Helper_database();
	}
	public function getPost($id)
	{
		$sql =  " select title, content, categories.name, created,login ";
		$sql.=  " from posts inner join categories on posts.cat_id=categories.id ";
		$sql.= " inner join users on posts.user_id= users.id where posts.id = ? order by created desc";
		return $this->db->queryOne($sql, array($id));
	}
	public function getPosts($limit1=0, $limit2=100)
	{
		$sql =  " select posts.id,title, content, categories.name, created,login ";
		$sql.=  " from posts inner join categories on posts.cat_id=categories.id ";
		$sql.= " inner join users on posts.user_id= users.id order by created desc limit $limit1,$limit2";
		return $this->db->query($sql);
	}
	public function getRowsCount()
	{
		$sql =  "select count(*) as totalRows from posts";
		return $this->db->queryAll($sql);
	}

	public function save($data)
	{
		$this->db->save($data,"posts");
	}	
	public function delete($id)
	{
		$this->db->save($id,"posts");
	}	
}




