<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<?php
	$passatempos=$fbPassatempos;
	?>
	<title>untitled</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta name="generator" content="Geany 1.22" />
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js" type="text/javascript"></script>
	<script src="js/fbapp.js" type="text/javascript"></script>
	<link rel=stylesheet href="css/fbapp.css" type="text/css" media=screen>
	<style>
	@font-face {
    font-family: 'vagrounded_btregular';
    src: url('fonts/vag_rounded_bt-webfont.eot');
    src: url('fonts/vag_rounded_bt-webfont.eot?#iefix') format('embedded-opentype'),
         url('fonts/vag_rounded_bt-webfont.woff') format('woff'),
         url('fonts/vag_rounded_bt-webfont.ttf') format('truetype'),
         url('fonts/vag_rounded_bt-webfont.svg#vagrounded_btregular') format('svg');
    font-weight: normal;
    font-style: normal;
	}
	</style>
</head>
<body style="background-image:url('images/fundo.jpg');background-repeat:no-repeat;font-family:'vagrounded_btregular';">
<pre>
<?php
	if(isset($_SESSION['user_profile']))
	{
		print_r($_SESSION);
		echo "<a href='logout.php?logout'>Logout</a>";
	}
 ?>
</pre>
<div id='all' style='width:810px;height:600px;'>
	<?php //print_r($passatempos); ?>	
	<div id='left_passatempos' style='width:50%;float:left;'>
		<h1><center>Passatempos em curso</center></h1>
		<?php foreach($passatempos as $passa): ?>
		<?php if($passa->estado=='Em curso'): ?>
		<?php $i++; ?>
		<div style='border:1px dotted blue;margin:10px;padding-left:10px;'>
			<span style='font-weight:bold;'><?php echo $passa->titulo; ?></span>
			<span><?php echo $passa->resumo; ?></span>
			<div style='float:right'>
				<form action="" method="post">
					<?php if($passa->param3==1): ?><input class='votar' type='submit' alt=<?php echo $passa->id; ?> value='Votar' style='position:relative;top:-30px;left:-10px;'/><?php endif; ?>
					<input class='submit' type="submit" alt2='begin' alt=<?php echo $passa->id; ?>  value="Participar" style='position:relative;top:-30px;left:-10px;'/>
				</form>
			</div>
		</div>
		<?php endif; ?>
		<?php if($i>5){break;} ?>
		<?php endforeach; ?>
	</div>
	
	<div id='right_passatempos' style='width:50%;float:right;'>
		<h1><center>Passatempos terminados</center></h1>
		<?php foreach($passatempos as $passa): ?>
		<?php if($passa->estado=='terminado'): ?>
		<?php $z++; ?>
		<div style='border:1px dotted blue;margin:10px;padding-left:10px;'>
			<span style='font-weight:bold;'><?php echo $passa->titulo; ?></span>
			<span><?php echo $passa->resumo; ?></span>
			<div style='float:right'>
				<form action="" method="post">
					<input class='submit' alt2='end' type="submit" alt=<?php echo $passa->id; ?> value="Ver vencedores" style='position:relative;top:-30px;left:-10px;'/>
				</form>
			</div>
		</div>
		<?php endif; ?>
		<?php if($z>5){break;} ?>
		<?php endforeach; ?>
	</div>
</div>	
</body>
</html>
