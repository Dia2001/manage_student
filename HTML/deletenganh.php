<?php
	require_once('Model\dblop.php');
?>
<?php
if (isset($_POST['x'])) {
	$manganh = $_POST['x'];
	$sql = "delete from nganh where manganh ='".$manganh."'";
    execute($sql);
}
?>