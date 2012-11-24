<?php

require_once('db.class.php');
class participacoes extends db
{
	function __construct()
	{
		$this->connect();
	}
	
	function addiciona($perfil,$nome,$email,$localidade,$data_nascimento,$resposa,$data_participacao,$ip,$votos,$vencedor,$publico,$id_facebook,$id_passatempo)
	{
		$query="INSERT INTO participacoes VALUES(0,'$perfil','$nome','$email','$localidade','$data_nascimento','$resposta','$data_participacao','$ip','$votos','$vencedor','$publico','$id_facebook','$id_passatempo'";
		echo $query;
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
$data_nascimento='18/10/87';
$data_participacao='data participaçao':
$resposta=$_POST['question'];
$id_passatempo=$_POST['id'];
$votos='votos';
$vencedor='vencedor';
$publico='sim';


//executa funcoes
$part->addiciona(0,$perfil,$name,$email,$location,$data_nascimento,$resposta,$data_participacao,$ip,$votos,$vencedor,$publico,$id_facebook,$id_passatempo);



/*$votos='sim';
$vencedor='nao';
$public='sim';

$id_passatempo='id';*/
print_r($_POST);
?>
