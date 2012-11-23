<?php

include('users.class.php');
class galeria extends db
{
	private $id;
	function __construct()
	{
		$username=$_SESSION['username'];
		$this->connect();
		$users=new users();
		$this->id=$users->getId($username);
	}
	
	function get_all()
	{
		$id=$this->id;
		$query="SELECT * FROM galeria WHERE id_user='$id'";
		$data=$this->get($query);
		return $data;
	}
	
	function insert($imagem)
	{
		$id=$this->id;
		$query="INSERT INTO galeria VALUES(0,'$imagem','$id')";
		$this->set($query);
	}
	
	function delete($id)
	{
		$query="DELETE FROM galeria WHERE id = '$id'";
		$this->set($query);
	}
}



?>
