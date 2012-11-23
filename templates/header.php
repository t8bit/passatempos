
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<title>Backoffice</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta name="generator" content="Geany 1.22" />
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.min.js"></script>
	<link rel=stylesheet href="css/style.css" type="text/css" media=screen>
	<script type="text/javascript" src="js/tiny_mce/tiny_mce.js"></script>
	<script type="text/javascript" src="js/gears.js"></script>
	<script>
		$(function() {
			$( ".datepicker" ).datepicker();
		});
		tinyMCE.init({
			mode : "textareas"
		});
    </script>
</head>

<body>
<div id='head1'>
	<div id='sitename'><b>Backoffice</b></div>
	<div id='useroptions'><b>Bem Vindo <?php echo $_SESSION['username']; ?>. / <a href='index.php?route=logout'>Logout</b></a></div>
</div>

<div id='cssmenu'>
	<ul>
		<li class='active '><a href='index.php?route=passatempos'><span>Passatempos</span></a></li>
		<li><a href='index.php?route=metricas'><span>Métricas</span></a></li>
		<li><a href='index.php?route=galeria'><span>Galeria</span></a></li>
		<li><a href='index.php?route=info'><span>Info</span></a></li>
	</ul>
</div>

<div id='head2'><a href=''>Home</a> > <?php echo $modulo; ?> > <?php echo $funcao; ?> > <?php echo $função2; ?></div>

	
