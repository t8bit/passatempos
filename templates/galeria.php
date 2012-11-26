<?php
if(!isset($_GET['noheader'])){include('header.php');}
?>
<script>
$(document).ready(function() {
	$('.imagem_galeria').mouseover(function() {
		$(this).children('.del_imagem').show();	
	});
	$('.imagem_galeria').mouseout(function() {
		$(this).children('.del_imagem').hide();	
	});
	
	$('.del_imagem').click(function() {
		id=parseInt($(this).children().attr('alt'));
		$.post("index.php?route=galeria&noheader", { id: id,funcao:'del'},
		function(data) {});
		$(this).parent().hide();
	});
});
</script>
<div id='head3'>
	<div id='appname'>Galeria</div>
	<div id='insert'>
		<form enctype="multipart/form-data" action="index.php?route=galeria" method="POST">
			Choose a file to upload: <input name="uploadedfile" type="file" />
			<input type="submit" id='submitIMAGE' value="Upload File" />
		</form>
	</div>
</div>

<div id ='main'>
	<?php foreach($data as $img): ?>
	<div class='imagem_galeria'>
		<div class='del_imagem' style='display:none;'><img src='images/del.png' alt=<?php echo $img->id; ?>/></div>
		<img src='galeria/<?php echo $img->imagem; ?>' alt='imagem' width='150px' height='150px;'/>
	</div>
	<?php endforeach ?>
</div>

</body>
</html>
