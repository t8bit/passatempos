<?php
require_once('users.class.php');
require_once('galeria.class.php');

class passatempos extends db{
	
	private $id;
	
	function __construct()
	{
		$this->get_id();
		$this->connect();
	}
	
	private function get_id()
	{
		if(!$_SESSION['username']){header('Location:index.php');}
		$username=$_SESSION['username'];
		$users=new users();
		$id=$users->getId($username);
		$this->id=$id;
	}
	
	function get_all()
	{
		$this->get_id();
		$user=$this->id;
		$query="SELECT id,activo,titulo,link,estado,data_final,participacoes,imagem,data_inicial FROM passatempos WHERE username='$user' ORDER BY id DESC";
		$data=$this->get($query);
		return $data;	
	}
	
	function emcurso()
	{
		$this->get_id();
		$user=$this->id;
		$query="SELECT * FROM passatempos WHERE estado='Em curso' AND username='$user'";
		$data=$this->get($query);
		return $data;	
	}
	
	function get_all_filters($filter,$value)
	{
		$this->get_id();
		$user=$this->id;
		$query="SELECT id,activo,titulo,link,estado,data_final,participacoes,imagem,data_inicial FROM passatempos WHERE username='$user' AND $filter='$value' ORDER BY id DESC";
		$data=$this->get($query);
		return $data;
	}
	
	function get_one($id)
	{
		$this->get_id();
		$query="SELECT * FROM passatempos WHERE id='$id'";
		$data=$this->get($query);
		return $data;
	}
	
	function search($search_word)
	{
		$this->get_id();
		$query="SELECT * FROM `passatempos` WHERE titulo LIKE '%".$search_word."%' OR resumo LIKE '%".$search_word."%' OR descricao LIKE '%".$search_word."%'";
		$data=$this->get($query);
		return $data;
	}
	
	function insert($id,$activo,$titulo,$resumo,$data_inicial,$data_final,$param1,$param2,$param3,$param4,$mec,$descricao,$tipo,$desafio,$minimo,$max_participacoes,$regulamento,$agradecimentos,$vencedores,$inicio,$mostrar_imagem,$imagem,$participacoes,$estado,$link,$accoes,$r1,$r2,$r3,$r4,$r5,$r6,$viral,$fraseViral)
	{
		$this->get_id();
		$user=$this->id;
		$query="INSERT INTO passatempos VALUES('$id','$activo','$titulo','$resumo','$data_inicial','$data_final','$param1','$param2','$param3','$param4','$mec','$descricao','$tipo','$desafio','$minimo','$max_participacoes','$regulamento','$agradecimentos','$vencedores','$inicio','$mostrar_imagem','$imagem','$participacoes','$estado','$link','$accoes','$user','$r1','$r2','$r3','$r4','$r5','$r6','$viral','$fraseViral')";

		$data=$this->set($query);
		return $data;
	}
	
	function update($id,$activo,$titulo,$resumo,$data_inicial,$data_final,$param1,$param2,$param3,$param4,$mec,$descricao,$tipo,$desafio,$minimo,$max_participacoes,$regulamento,$agradecimentos,$vencedores,$inicio,$mostrar_imagem,$imagem,$participacoes,$estado,$link,$accoes,$r1,$r2,$r3,$r4,$r5,$r6,$viral,$fraseViral) 
	{
		$this->get_id();
		$query="UPDATE passatempos SET activo='$activo',titulo='$titulo',resumo='$resumo',data_inicial='$data_inicial',data_final='$data_final',param1='$param1',param2='$param2',mostrar_imagem='$mostrar_imagem',param3='$param3',param4='$param4',mec='$mec',descricao='$descricao',tipo='$tipo',desafio='$desafio',minimo='$minimo',max_participacoes='$max_participacoes',regulamento='$regulamento',agradecimentos='$agradecimentos',vencedores='$vencedores',inicio='$inicio',imagem='$imagem',participacoes='$participacoes',estado='$estado',link='$link',accoes='$accoes',viral='$viral',fraseViral='$fraseViral',r1='$r1',r2='$r2',r3='$r3',r4='$r4',r5='$r5',r6='$r6' WHERE id='$id'";
		$data=$this->set($query);
		return $data;
	}
	
}
?>
