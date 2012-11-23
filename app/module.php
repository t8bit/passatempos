<?php	

//get variable from fb;
$perfil=$_SESSION['user_profile']['link'];
$name=$_SESSION['user_profile']['name'];
$email=$_SESSION['user_profile']['email'];
$location=$_SESSION['user_profile']['location']['name'];
$ip=$_SERVER['REMOTE_ADDR'];
$votos='sim';
$vencedor='nao';
$public='sim';
$id_user=$_SESSION['user_profile']['id'];
$id_passatempo='id';
//classes
class fbapp extends db
{
	function __construct()
	{
		$this->connect();
	}
	
	function lista()
	{
		$resultado=$this->get("SELECT * FROM passatempos");
		return $resultado;
	}
	
	function lista_um($id)
	{
		$resultado=$this->get("SELECT * FROM passatempos WHERE id='$id'");
		return $resultado;
	}
}
//Get and filter variables
foreach($_POST as $key=>$post)
{
	$var[$key]=htmlentities($post);
}
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
$fbPassatempos=$fbapp->lista();
//dispara o resultado das funcoes no formato adequado

switch($var['formato'])
{
	case 'xml':
		//todo list
		exit();
	break;
	case 'json':
		$listinha=$fbapp->lista_um($var['id']);
		echo json_encode($listinha);
		exit();
	break;
}

?>
