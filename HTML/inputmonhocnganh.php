<?php
require_once('Model\dblop.php');
?>
<?php
$mamonhocnganh = $tenmonhocnganh = $manganh = "";
if (!empty($_POST)) {
  $_id = '';
  if (isset($_POST['mamhn']) && isset($_POST['tmhn']) && isset($_POST['ng'])) {
    $mamonhocnganh = $_POST['mamhn'];
    $tenmonhocnganh = $_POST['tmhn'];
    $manganh = $_POST['ng'];
  }
  if (isset($_GET['id'])) {
    $_id = $_GET['id'];
  }
  // An toàn về mặt dữ liệu( lỗi sql incheck sion)
  $mamonhocnganh = str_replace('\'', '\\\'', $mamonhocnganh);
  $tenmonhocnganh = str_replace('\'', '\\\'', $tenmonhocnganh);
  $manganh = str_replace('\'', '\\\'', $manganh);
  $_id = str_replace('\'', '\\\'', $_id);
  if ($_id != '') {
    $sql = " update monhocnganh set tenmhn='" . $tenmonhocnganh . "',manganh='" . $manganh . "' where mamhn='" . $_id . "'";
  } else {
    $sql =  "insert into monhocnganh(mamhn,tenmhn,manganh) values('" . $mamonhocnganh . "','" . $tenmonhocnganh . "','" . $manganh . "')";
  }
  execute($sql);
  header('Location: monhocnganh.php');
  die();
}
$id = '';
if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $sql = "select * from monhocnganh where mamhn='" . $id . "'";
  $classList = executeResult($sql);
  if ($classList != null && count($classList) > 0) {
    $cla = $classList[0];
    $mamonhocnganh = $cla['mamhn'];
    $tenmonhocnganh = $cla['tenmhn'];
    $manganh = $cla['manganh'];
  } else {
    $id = '';
  }
}
?>
<!DOCTYPE html>
<html>

<head>
  <title>Ngành học</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>

<body>
  <div class="container">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <h2 class="text-center">Môn học</h2>
      </div>
      <div class="panel-body">
        <form method="post">
          <div class="form-group">
            <label for="mlp">Mã môn học ngành:</label>
            <input required="true" type="text" class="form-control" name="mamhn" value="<?= $mamonhocnganh ?>">
          </div>
          <div class="form-group">
            <label for="mcth">Tên môn học ngành:</label>
            <input type="text" class="form-control" name="tmhn" value="<?= $tenmonhocnganh ?>">
          </div>
          <div class="form-group">
            <label for="mnh">Mã ngành:</label>
            <?php
            $sql = "select *from nganh";
            $mhnlist = executeResult($sql);
            echo "<select name='ng' class='form-control' required>";
            foreach ($mhnlist as $mh) {
              if ($manganh == $mh['manganh']) {
                echo "<option selected='selected' value=" . $mh['manganh'] . ">" . $mh['tennganh'] . "</option>";
              } else {
                echo "<option  value=" . $mh['manganh'] . ">" . $mh['tennganh'] . "</option>";
              }
            }
            echo "</select>";
            ?>
          </div>
          <button class="btn btn-success">Lưu</button>
        </form>
      </div>
    </div>
  </div>
</body>

</html>