<?php
//modulos
$passatempos=new module('passatempos','get_all','get_one');
$fbapp=new module('fbapp','get_all','get_one');
$users=new module('users','get_all','get_one');
$participacoes=new module('participacoes','get_all','get_one');
$metricas=new module('metricas','get_all','get_one');
$info=new module('info','get_all','get_one');
$galeria=new module('galeria','get_all','get_one');

$modules_fbapp=array($fbapp);
$modules_passatempos=array($passatempos);
$modules_users=array($users);
$modules_participacoes=array($participacoes);
$modules_metricas=array($metricas);
$modules_info=array($info);
$modules_galeria=array($galeria);

//rotas
$r0=new route('participacoes',$modules_participacoes,'templates/participacoes.php','templates/participacoes.php');
$r1=new route('passatempos',$modules_passatempos,'templates/main.php','templates/edit.php','templates/preview.php');
$r2=new route('',$modules_users,'templates/login.php');
$r3=new route('logout',$modules_users,'templates/login.php');
$r4=new route('metricas',$modules_metricas,'templates/met.php');
$r5=new route('info',$modules_info,'templates/info.php');
$r6=new route('galeria',$modules_galeria,'templates/galeria.php','templates/galeria-add.php');
$r7=new route('fbapp',$modules_fbapp,'templates/fbapp.php');

$routes=array($r0,$r1,$r2,$r3,$r4,$r5,$r6,$r7);

$entrou=false;
if(isset($rotate))
{
	$Groutes=$_GET['route'];
	$partes=explode('/',$Groutes);
	$modulo=$partes[0];
	$funcao=$partes[1];
	$funcao2=$partes[2];

	foreach($routes as $route)
	{
		$result=$route->getRoute($modulo,$funcao,$funcao2);
		foreach ($result as $res) 
		{
			$entrou=true;
			//echo $res."<br>";			
			require_once($res);
		}
	}
	if($entrou==false)
	{
		route_not_found();
	}	
}

?>
