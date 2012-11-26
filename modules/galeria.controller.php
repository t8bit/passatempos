<?php
$gal=new galeria();

$f=$_POST['funcao'];
$i=$_POST['id'];

if($f=='del')
{
	$gal->delete($i);
	
}

$target_path = "galeria/";

$target_path = $target_path . basename( $_FILES['uploadedfile']['name']); 

if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)) 
{
	//echo "The file ".  basename( $_FILES['uploadedfile']['name'])." has been uploaded";
	$gal->insert(basename( $_FILES['uploadedfile']['name']));
} 
else
{
	//echo "There was an error uploading the file, please try again!";
}
$data=$gal->get_all();
?>
