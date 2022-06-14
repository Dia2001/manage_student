<?php
	require_once('Model\dblop.php');
?>
<?php
if (isset($_POST['x'])) {
	$malop = $_POST['x'];
	$sql = "delete from lop where malop = '".$malop."'";
	execute($sql);
}
?>