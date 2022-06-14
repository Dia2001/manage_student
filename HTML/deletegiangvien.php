<?php
	require_once('Model\dblop.php');
?>
<?php
if (isset($_POST['x'])) {
	$magiangvien = $_POST['x'];
	$sql = "delete from giangvien where magiangvien = '".$magiangvien."'";
	execute($sql);
}
?>