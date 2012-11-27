<?php
require_once('db.class.php');

//classes
class fbapp extends db
{
	function __construct()
	{
		$this->connect();
	}
	
	function lista($user)
	{
		$resultado=$this->get("SELECT * FROM passatempos WHERE username='$user'");
		return $resultado;
	}
	
	function votar($id_passatempo)
	{
		$resultado=$this->get("SELECT id,resposta FROM participacoes WHERE id_passatempo='$id_passatempo'");
		return $resultado;
	}
	
	function lista_um($id)
	{
		$resultado=$this->get("SELECT * FROM passatempos WHERE id='$id'");
		return $resultado;
	}
	
	function votar_id($id)
	{
		$query="UPDATE participacoes SET votos=votos+1 WHERE id='$id'";
		$resultado=$this->set($query);
		return $resultado;
	}
}
//Get and filter variables
foreach($_POST as $key=>$post)
{
	$var[$key]=htmlentities($post);
}
$user=$_GET['user'];
//activa as classes
$fbapp=new fbapp();

//controlo auxiliar de variaveis


//executa funçoes
switch($var['funcao'])
{
	case 'lista':
		$data=$fbapp->lista();
	break;
	
	case 'lista_um':
		$data=$fbapp->lista_um($var['id']);
	break;
}

//manda para o template
$fbPassatempos=$fbapp->lista($user);
//dispara o resultado das funcoes no formato adequado

switch($var['formato'])
{
	case 'xml':
		//todo list
		exit();
	break;
	case 'json':
		if($var['funcao']=='')
		{
			$listinha=$fbapp->lista_um($var['id']);
			echo json_encode($listinha);
			exit();
		}
		if($var['funcao']=='votar')
		{
			$listinha=$fbapp->votar($var['id']);
			echo json_encode($listinha);
			exit();
		}
		if($var['funcao']=='votar_id')
		{
			$fbapp->votar_id($var['id']);
			exit();
		}
	break;
	case 'json_votar':
		$listinha=$fbapp->votar($var['id']);
		echo json_encode($listinha);
		exit();
	break;
	
	case 'votar_um':
		
	break;
}

?>
