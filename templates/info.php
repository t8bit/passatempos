<?php
include('header.php');
?>
<table>
	<tr>
		<td><b>Data</b></td>
		<td><b>Titulo</b></td>
		<td><b>Info</b></td>
	</tr>
	<tr>
		<td><?php echo $data[0]->data; ?></td>
		<td><?php echo utf8_encode($data[0]->assunto); ?></td>
		<td><?php echo utf8_encode($data[0]->texto); ?></td>
	</tr>
</table>
