<?php
class info extends db
{
	function __construct()
	{
		$this->connect();
	}
	
	function get_all()
	{
		$query="SELECT data,assunto,texto FROM info ORDER BY id DESC";
		$data=$this->get($query);
		return $data;
	}
}
?>
