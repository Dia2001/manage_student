<?php
require_once('Model\dblop.php');
?>
<?php
$makhoahoc =$nambatdau= $namketthuc= "";
if (!empty($_POST)) {
  $_id = '';
  if (isset($_POST['makh']) && isset($_POST['nbd']) && isset($_POST['nkt'])) {
    $makhoahoc=$_POST['makh'];
		$nambatdau=$_POST['nbd'];
		$namketthuc=$_POST['nkt'];
  }
  if (isset($_GET['id'])) {
    $_id = $_GET['id'];
  }
  // An toàn về mặt dữ liệu( lỗi sql incheck sion)
  $makhoahoc = str_replace('\'', '\\\'', $makhoahoc);
  $nambatdau = str_replace('\'', '\\\'', $nambatdau);
  $namketthuc= str_replace('\'', '\\\'', $namketthuc);
  $_id = str_replace('\'', '\\\'', $_id);
  if ($_id != '') {
    $sql ="update khoahoc set nambatdau='".$nambatdau."', namketthuc='".$namketthuc."'where makhoahoc='".$_id."'";
  } else {
    $sql = "insert into khoahoc(makhoahoc,nambatdau,namketthuc) values('".$makhoahoc."','".$nambatdau."','".$namketthuc."')";
  }
  execute($sql);
  header('Location: khoahoc.php');
  die();
}
$id = '';
if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $sql = "select * from khoahoc where makhoahoc ='" . $id . "'";
  $classList = executeResult($sql);
  if ($classList != null && count($classList) > 0) {
    $cla = $classList[0];
    $makhoahoc = $cla['makhoahoc'];
    $nambatdau = $cla['nambatdau'];
    $namketthuc= $cla['namketthuc'];
  } else {
    $id = '';
  }
}
?>
<!DOCTYPE html>
<html>

<head>
  <title>Khóa học</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>

<body>
  <div class="container">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <h2 class="text-center">Khóa học</h2>
      </div>
      <div class="panel-body">
        <form method="post">
          <div class="form-group">
            <label for="mlp">Mã khóa học:</label>
            <input required="true" type="text" class="form-control" name="makh" value="<?= $makhoahoc ?>">
          </div>
          <div class="form-group">
            <label for="mcth">Năm bắt đầu:</label>
            <input required="true" type="text" class="form-control" name="nbd" value="<?= $nambatdau?>">
          </div>
          <div class="form-group">
            <label for="mnh">Năm kết thúc:</label>
            <input type="text" class="form-control" name="nkt" value="<?= $namketthuc?>">
          </div>
          <button class="btn btn-success">Lưu</button>
        </form>
      </div>
    </div>
  </div>
</body>
</html>