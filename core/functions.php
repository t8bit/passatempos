<?php
class data
{
	private $dia;
	private $mes;
	private $ano;
	
	function __construct($data)
	{
		$data_explode=explode('/',$data);
		$this->dia=$data_explode[1];
		$this->mes=$data_explode[0];
		$this->ano=$data_explode[2];
	}
	function get()
	{
		return $this->dia+(30*$this->mes)+(365*$this->ano);
	}
}

function calcula_dias($data_inicial,$data_final)
{
	$data_inicial_explode=explode('/',$data_inicial);
	$data_inicial_day=$data_inicial_explode[1];
	$data_inicial_month=$data_inicial_explode[0];
	$data_inicial_year=$data_inicial_explode[2];
	
	$data_final_explode=explode('/',$data_final);
	$data_final_day=$data_final_explode[1];
	$data_final_month=$data_final_explode[0];
	$data_final_year=$data_final_explode[2];
	
	$dias=($data_final_day-$data_inicial_day)+30*($data_final_month-$data_inicial_month)+365*($data_final_year-$data_inicial_year);
	return $dias;
}

function encontra_estado($data_inicial,$data_final,$activo)
{
	$today=date('n/j/Y');
	$today=new data($today);
	$data_inicial=new data($data_inicial);
	$data_final=new data($data_final);
	$dias=calcula_dias($today,$data_final);
	
	if($activo==0){return 'Inactivo';}
	if($data_inicial->get()<$today->get() && $data_final->get()>=$today->get()){return 'Em curso';}
	
	if($data_inicial->get()>$today->get()){return 'Por iniciar';}
	if($data_final->get()<$today->get()){return 'Terminado';}
	
	
}

function decode_route()
{
	$route=$_GET['route'];
	$partes=explode($route);
	return $partes;
}
?>
