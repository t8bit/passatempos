<?php
$que_funcao=$funcao;

$passa=new passatempos();
if(!isset($_GET['filter']))
{
	$funcao=filter_var($funcao,FILTER_SANITIZE_NUMBER_INT);
	$passatempos=$passa->$opt($funcao);
}
else
{
	$filtro=$_GET['filter'];
	$valor=$_GET['value'];
	$passatempos=$passa->get_all_filters($filtro,$valor);
}

if($modulo=='fbapp')
{
	$passatempos=$passa->emcurso();
}

if(isset($_GET['search']))
{
	$search_word=$_POST['search_word'];
	$passatempos=$passa->search($search_word);
}

//please sanitize this stuff
$activo=$_POST['activo'];
$titulo=$_POST['titulo'];
$resumo=$_POST['resumo'];
$data_inicial=$_POST['data_inicial'];
$data_final=$_POST['data_final'];
$param1=$_POST['param1'];
$param2=$_POST['param2'];
$param3=$_POST['param3'];
$param4=$_POST['param4'];
$mec_votacao=$_POST['mec_votacao'];
$descricao=$_POST['descricao'];
$tipo=$_POST['tipo'];
$desafio=$_POST['desafio'];
$minimo=$_POST['minimo'];
$max_participacoes=$_POST['max_participacoes'];
$regulamento=$_POST['regulamento'];
$agradecimento=$_POST['agradecimento'];
$vencedores=$_POST['vencedores'];
$inicio=$_POST['inicio'];

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
$estado=find_estado($data_inicial,$data_final,$activo);
$imagem=$_POST['imagem'];
$r1=$_POST['resposta1'];
$r2=$_POST['resposta2'];
$r3=$_POST['resposta3'];
$r4=$_POST['resposta4'];
$r5=$_POST['resposta5'];
$r6=$_POST['resposta6'];
$mec=$_POST['mec'];
if($titulo!='')
{

	if($que_funcao=='edit')
	{

		$sucess=$passa->insert(0,$activo,$titulo,$resumo,$data_inicial,$data_final,$param1,$param2,$param3,$param4,$mec,$descricao,$tipo,$desafio,$minimo,$max_participacoes,$regulamento,$agradecimento,$vencedores,$inicio,$imagem,'0',$estado,'0','0',$r1,$r2,$r3,$r4,$r5,$r6);
		print_r($passa);
	}
	else
	{
		$id=$que_funcao;
		$sucess=$passa->update($id,$activo,$titulo,$resumo,$data_inicial,$data_final,$param1,$param2,$param3,$param4,$mec,$descricao,$tipo,$desafio,$minimo,$max_participacoes,$regulamento,$agradecimento,$vencedores,$inicio,$imagem,'0',$estado,'0','0',$r1,$r2,$r3,$r4,$r5,$r6);
	}
	if($sucess)
	{
		header("Location:index.php?route=passatempos/");
	}
	else
	{
		cannot_insert_into_db();
	}
}

?>
