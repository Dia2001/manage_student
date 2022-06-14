<?php
	require_once('Model\dblop.php');
?>
<?php
if (isset($_POST['x'])){
	$mamhn = $_POST['x'];
	$sql = "delete from monhocnganh where mamhn='".$mamhn."'";
    execute($sql);
}
?>