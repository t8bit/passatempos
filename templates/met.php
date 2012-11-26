<?php 
include('header.php');
?>

<table>
	<tr>
		<td>ID</td>
		<td>Titulo</td>
		<td>Dias decorridos</td>
		<td>Total de participações</td>
		<td>Média de participações por dia</td>
	</tr>
	<?php foreach($data as $d): ?>
	<tr>
		<td><?php echo $d->id; ?></td>
		<td><a href='<?php echo "?route=passatempos/".$d->id; ?>'><?php echo $d->titulo; ?></a></td>
		<td><?php echo calcula_dias($d->data_inicial,$d->data_final); ?>dias</td>
		<td><a href='?route=participacoes/<?php echo $d->id; ?>'><?php echo $d->participacoes; ?></a></td>
		<td><?php echo ($d->participações)/calcula_dias($d->data_inicial,$d->data_final); ?></td>
	</tr>
	<?php endforeach; ?>
</table>
