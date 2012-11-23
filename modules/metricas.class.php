<?php
class metricas extends db
{
	function __construct()
	{
		$this->connect();
	}
	function get_all()
	{
		$query="SELECT id,titulo,participacoes,data_inicial,data_final FROM passatempos ORDER BY ID DESC";
		$data=$this->get($query);
		return $data;
	}
}
?>
