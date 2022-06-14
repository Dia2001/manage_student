<?php
require_once('Model\dblop.php');
?>
<?php
$manganh = $makhoa = $tennganh = "";
if (!empty($_POST)) {
  $_id = '';
  if (isset($_POST['mn']) && isset($_POST['mk']) && isset($_POST['tn'])) {
    $manganh = $_POST['mn'];
    $makhoa = $_POST['mk'];
    $tennganh = $_POST['tn'];
  }
  if (isset($_GET['id'])) {
    $_id = $_GET['id'];
  }
  // An toàn về mặt dữ liệu( lỗi sql incheck sion)
  $manganh = str_replace('\'', '\\\'', $manganh);
  $makhoa = str_replace('\'', '\\\'', $makhoa);
  $tennganh = str_replace('\'', '\\\'', $tennganh);
  $_id = str_replace('\'', '\\\'', $_id);
  if ($_id != '') {
    $sql = "update nganh set makhoa='" . $makhoa . "',tennganh='" . $tennganh . "'where manganh='" . $_id . "'";
  } else {
    $sql = "insert into nganh(manganh,makhoa,tennganh) values('" . $manganh . "','" . $makhoa . "','" . $tennganh . "')";
  }
  execute($sql);
  header('Location: nganh.php');
  die();
}
$id = '';
if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $sql = "select * from nganh where manganh ='" . $id . "'";
  $classList = executeResult($sql);
  if ($classList != null && count($classList) > 0) {
    $cla = $classList[0];
    $manganh = $cla['manganh'];
    $makhoa = $cla['makhoa'];
    $tennganh = $cla['tennganh'];
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
        <h2 class="text-center">Ngành</h2>
      </div>
      <div class="panel-body">
        <form method="post">
          <div class="form-group">
            <label for="mlp">Mã ngành:</label>
            <input required="true" type="text" class="form-control" name="mn" value="<?= $manganh ?>">
          </div>
          <div class="form-group">
            <label for="mcth">Mã khoa:</label>
            <?php
            $sql = "select *from khoa";
            $khoalist = executeResult($sql);
            echo "<select name='mk' class='form-control' required>";
            foreach ($khoalist as $kh) {
              if ($makhoa == $kh['makhoa']) {
                echo "<option selected='selected' value=" . $kh['makhoa'] . ">" . $kh['tenkhoa'] . "</option>";
              } else {
                echo "<option value=" . $kh['makhoa'] . ">" . $kh['tenkhoa'] . "</option>";
              }
            }
            echo "</select>";
            ?>
          </div>
          <div class="form-group">
            <label for="mnh">Tên ngành:</label>
            <input type="text" class="form-control" name="tn" value="<?= $tennganh ?>">
          </div>
          <button class="btn btn-success">Lưu</button>
        </form>
      </div>
    </div>
  </div>
</body>

</html>