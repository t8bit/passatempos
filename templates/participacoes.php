<?php
include('header.php');
?>
<div id='search' >
	<form action="?route=participacoes/<?php echo $funcao; ?>/&search=1" method="post">
		<img src='images/search.png' alt='search' style='margin-top:6px;'/>
		<input type='text' name='search_word' style='width:200px;border:1px solid grey;'/>
		<input type="submit" value="Go" />
	</form>
</div>
<table border='1'>
	<tr>
		<td>Perfil</td>
		<td>Nome</td>
		<td>E-mail</td>
		<td>Localidade</td>
		<td>Data de nascimento</td>
		<td>Resposta</td>
		<td>Data de participação</td>
		<td>Ip</td>
		<td>Votos</td>
		<td>Vencedor</td>
		<td>Publico</td>
	</tr>
	<?php foreach($data as $parti): ?>
	<tr>
		<td><?php echo $parti->perfil; ?></td>
		<td><?php echo $parti->nome; ?></td>
		<td><?php echo $parti->email; ?></td>
		<td><?php echo $parti->localidade; ?></td>
		<td><?php echo $parti->data_nascimento; ?></td>
		<td><?php echo $parti->resposta; ?></td>
		<td><?php echo $parti->data_participacao; ?></td>
		<td><?php echo $parti->ip; ?></td>
		<td><?php echo $parti->votos; ?></td>
		<td><?php echo $parti->vencedor; ?></td>
		<td><?php echo $parti->publico; ?></td>
	</tr>
	<?php endforeach; ?>
</table>
