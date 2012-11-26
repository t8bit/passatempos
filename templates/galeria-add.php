
<div id ='main'>
	<?php foreach($data as $img): ?>
	<div class='imagem_galeria'>
		<img src='galeria/<?php echo $img->imagem; ?>' alt='imagem' class='imagem' width='150px' height='150px;'/>
	</div>
	<?php endforeach ?>
</div>

</body>
</html>
