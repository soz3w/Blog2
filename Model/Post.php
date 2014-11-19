<?php
//require_once("Model.php");

class Model_Post {
	private $db;
	public function __construct()
	{
		$this->db = new Helper_database();
	}
	public function getPost(id)
	{
		return $this->db->queryOne(id);
	}
	public function getLatestPosts(nb)
	{
		return $this->db->query(id);
	}
}




