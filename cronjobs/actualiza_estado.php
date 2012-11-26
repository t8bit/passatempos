<?php
//falta corrigir isto

include('../settings.php');
include('../core/core.php');
class actualiza_estado extends db
{
	function __construct()
	{
		$this->connect();
	}
	
	function find_estado($activo,$data_inicial,$data_final)
	{
		if($activo==0){return "Inactivo";}
		$data_inicial='11/01/2012';
		$data_final='11/30/2012';
		$data_inicial_explode=explode('/',$data_inicial);
		$data_final_explode=explode('/',$data_final);
		
		if($data_final_explode[2]>$data_inicial_explode[2]){return 'Em curso';}
		elseif($data_final_explode[1]>$data_inicial_explode[1]){return 'Em curso';}
		elseif($data_final_explode[0]>$data_inicial_explode[0]){return 'Em curso';}
		else{return 'Terminado';}
	}
	
	function actualiza()
	{
		$query="SELECT id,activo,data_inicial,data_final FROM passatempos";
		$data=$this->get($query);
		$return=$this->find_estado($data[0]->activo,$data[0]->data_inicial,$data[0]->data_final);
		$id=$data[0]->id;
		$query="UPDATE FROM passatempos SET estado='$return' WHERE id='$id'";
		$data=$this->set($query);
		return $data;
	}
}
$actualiza=new actualiza_estado();
$actualiza->actualiza();

?>
