<?php
$participacoes=new participacoes();
$data=$participacoes->get_one($funcao);
if(isset($_GET['search']))
{
	$search_word=$_POST['search_word'];
	$passatempos=$passa->search($search_word);
}
?>
