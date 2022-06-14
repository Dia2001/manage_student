<?php
	require_once('Model\dblop.php');
?>
<?php
if (isset($_POST['x'])) {
	$masinhvien= $_POST['x'];
	$sql = "delete from sinhvien where masv='".$masinhvien."'";
    execute($sql);
}
?>