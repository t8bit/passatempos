<?php
session_start();
require_once('db.class.php');
class participacoes extends db
{
	function __construct()
	{
		$this->connect();
	}
	
	function addiciona($perfil,$nome,$email,$localidade,$data_nascimento,$resposta,$data_participacao,$ip,$votos,$vencedor,$publico,$id_facebook,$id_passatempo)
	{
		$query="INSERT INTO participacoes VALUES(0,'$perfil','$nome','$email','$localidade','$data_nascimento','$resposta','$data_participacao','$ip','$votos','$vencedor','$publico','$id_facebook','$id_passatempo','$telefone');";
		$resultado=$this->set($query);
		$query="UPDATE passatempos SET participacoes = participacoes + 1 WHERE id='$id_passatempo'";
		$resultado=$this->set($query);
	}
	
	
}
//chama classes
$part=new participacoes();

//get variables
$perfil=$_SESSION['user_profile']['link'];
$name=$_SESSION['user_profile']['name'];
$email=$_SESSION['user_profile']['email'];
$location=$_SESSION['user_profile']['location']['name'];
$ip=$_SERVER['REMOTE_ADDR'];
$id_facebook=$_SESSION['user_profile']['id'];
$data_nascimento=$_SESSION['user_profile']['birthday'];
$data_participacao=mktime();


$telefone=$_POST['telefone'];
$resposta=$_POST['question'];
$id_passatempo=$_POST['id'];
$votos=0;
$vencedor='vencedor';
$publico='publico';

print_r($_POST);

//executa funcoes
$part->addiciona($perfil,$name,$email,$location,$data_nascimento,$resposta,$data_participacao,$ip,$votos,$vencedor,$publico,$id_facebook,$id_passatempo,$telefone);
?>
