<?php
	require_once('Model\dblop.php');
?>
<?php
if (isset($_POST['x'])) {
	$id = $_POST['x'];
	$sql = "delete from giangkhoa where id = '".$id."'";
	execute($sql);
}
?>