<?php
require_once('../core/db.class.php');
require_once('../modules/galeria.class.php');
$target_path = "galeria/";
print_r($_FILES);
$target_path = $target_path . basename( $_FILES['uploadedfile']['name']); 
echo "<br>";
print_r(move_uploaded_file($_FILES['uploadedfile']['name'],$target_path.'/'.$_FILES['name']));
echo "<br>";
if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path.'/'.$_FILES['name'])) 
{
	echo "The file ".  basename( $_FILES['uploadedfile']['name'])." has been uploaded";
	$gal->insert(basename( $_FILES['uploadedfile']['name']));
} 
else
{
	echo "There was an error uploading the file, please try again!";
}
?>
<form enctype="multipart/form-data" action="" method="POST">
	Choose a file to upload: <input name="uploadedfile" type="file" />
	<input type="submit" value="Upload File" />
</form>
