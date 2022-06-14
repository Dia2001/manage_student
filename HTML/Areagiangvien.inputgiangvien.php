<?php
require_once('Model\dblop.php');
?>
<?php
$magiangvien = $hotengv = $hinhanh = $gioitinh =$sdt = $matkhau = $trinhdo = $quoctich=$makhoa=$malop="";
if (!empty($_POST)) {
  $_id = '';
  if (isset($_POST['mgv']) && isset($_POST['ht']) && isset($_POST['ha']) && isset($_POST['gt']) && isset($_POST['sdt']) && isset($_POST['mkh']) && isset($_POST['td']) && isset($_POST['qt'])  && isset($_POST['mk']) && isset($_POST['ml'])) {
    $magiangvien = $_POST['mgv'];
    $hotengv = $_POST['ht'];
    $hinhanh = $_POST['ha'];
    $gioitinh = $_POST['gt'];
    $sdt = $_POST['sdt'];
    $matkhau= $_POST['mkh'];
    $trinhdo = $_POST['td'];
    $quoctich= $_POST['qt'];
    $makhoa = $_POST['mk'];
    $malop = $_POST['ml'];
  }
  if (isset($_GET['id'])) {
    $_id = $_GET['id'];
  }
  // An toàn về mặt dữ liệu( lỗi sql incheck sion)
  $magiangvien = str_replace('\'', '\\\'', $magiangvien);
  $hotengv = str_replace('\'', '\\\'', $hotengv);
  $hinhanh = str_replace('\'', '\\\'', $hinhanh);
  $gioitinh = str_replace('\'', '\\\'', $gioitinh);
  $sdt = str_replace('\'', '\\\'', $sdt);
  //$ngaysinh = str_replace('\'', '\\\'', $ngaysinh);
  $matkhau = str_replace('\'', '\\\'', $matkhau);
  $trinhdo = str_replace('\'', '\\\'', $trinhdo);
  $quoctich = str_replace('\'', '\\\'', $quoctich);
  $makhoa = str_replace('\'', '\\\'', $makhoa);
  $malop = str_replace('\'', '\\\'', $malop);
  $_id = str_replace('\'', '\\\'', $_id);
  if ($_id != '') {
    $sql = " update giangvien set hotengv='" . $hotengv . "',hinhanh='" . $hinhanh . "',gioitinh='" . $gioitinh . "',sdt='" . $sdt . "',matkhau='" . $matkhau . "'
    ,trinhdo='" . $trinhdo . "',quoctich='" . $quoctich . "',makhoa='" . $makhoa . "',malop='" . $malop . "' where magiangvien='" . $_id . "'";
} else {
    $sql =  "insert into giangvien(magiangvien,hotengv,hinhanh,gioitinh,sdt,matkhau,trinhdo,quoctich,makhoa,malop) values('" . $magiangvien . "','" . $hotengv . "','" . $hinhanh . "','" . $gioitinh . "'
    ,'" . $sdt . "','" . $matkhau . "','" . $trinhdo. "','" . $quoctich . "','" . $makhoa . "','" . $malop . "')";
  }
 execute($sql);
  header('Location: profile-Giangvien.php');
  die();
}
$id = '';
if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $sql = "select * from giangvien where magiangvien='" . $id . "'";
  $classList = executeResult($sql);
  if ($classList != null && count($classList) > 0) {
    $cla = $classList[0];
    $magiangvien = $cla['magiangvien'];
    $hotengv = $cla['hotengv'];
    $hinhanh = $cla['hinhanh'];
    $gioitinh = $cla['gioitinh'];
    $sdt = $cla['sdt'];
    $matkhau = $cla['matkhau'];
    $trinhdo = $cla['trinhdo'];
    $quoctich = $cla['quoctich'];
    $makhoa = $cla['makhoa'];
    $malop = $cla['malop'];
  } else {
    $id = '';
  }
}
?>
<!DOCTYPE html>
<html>

<head>
  <title>Giảng viên viên</title>
  <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">
  <style>
    * {
      font-family: sans-serif;
    }

    .kl {
      display: flex;
      align-items: center;
      justify-content: center;

    }

    .form-group {
      display: flex;
      margin: 14px;
      font-size: 20px;
    }

    .form-group input {

      font-size: 18px;
    }

    .text-center button {
      padding-left: 2rem;
      padding-right: 2rem;
      font-size: 20px;
    }

    .abc {
      margin-left: 10px;
    }
  </style>
</head>

<body>
  <div class="container">
    <div class="card">
      <div class="card-header">
        <h2 class="text-center">Giảng viên viên<h2>
      </div>
      <div class="card-body">
        <form method="POST">
          <div class="form-group">
            <label for="mch" class="col-sm-2 col-form-label"><b>Mã giảng viên:</b></label>
            <input type="text" class="form-control" name="mgv" value="<?= $magiangvien ?>">
          </div>
          <div class="form-group">
            <label for="mlv" class="col-sm-2 col-form-label"><b>Họ tên giảng viên:</b></label>
            <input type="text" class="form-control" name="ht" value="<?= $hotengv ?>">
          </div>
          <div class="form-group">
            <label for="mlv" class="col-sm-2 col-form-label"><b>Hình ảnh:</b></label>
            <input type="file" class="form-control" name="ha" value="<?= $hinhanh ?>">
          </div>
          <div class="form-group">
            <label for="mlv" class="col-sm-2 col-form-label"><b>Giới tính:</b></label>
            <input type="text" class="form-control" name="gt" value="<?= $gioitinh ?>">
          </div>
          <div class="form-group">
            <label for="mlv" class="col-sm-2 col-form-label"><b>Số điện thoại:</b></label>
            <input type="text" class="form-control" name="sdt" value="<?= $sdt ?>">
          </div>
          <div class="form-group">
            <label for="mlv" class="col-sm-2 col-form-label"><b>Mật khẩu:</b></label>
            <input type="text" class="form-control" name="mkh" value="<?= $matkhau ?>">
          </div>
          <div class="form-group">
            <label for="mlv" class="col-sm-2 col-form-label"><b>Trình độ</b></label>
            <input type="text" class="form-control" name="td" value="<?= $trinhdo ?>">
          </div>
          <div class="form-group">
            <label for="mlv" class="col-sm-2 col-form-label"><b>Quốc tịch:</b></label>
            <input type="text" class="form-control" name="qt" value="<?= $quoctich ?>">
          </div>
          <div class="form-group">
            <label for="mlv" class="col-sm-2 col-form-label"><b>mã khoa:</b></label>
            <?php
            $sql = "select *from khoa";
            $list = executeResult($sql);
            echo "<select name='mk' class='form-select' required>";
            foreach ($list as $row) {
              if ($makhoa == $row['makhoa']) {
                echo "<option selected='selected' value= " . $row['makhoa'] . ">" . $row['tenkhoa'] . "</option>";
              } else {
                echo "<option value= " . $row['makhoa'] . ">" . $row['tenkhoa'] . "</option>";
              }
            }
            echo "</select>";
            ?>
          </div>
          <div class="form-group">
            <label for="mlv" class="col-sm-2 col-form-label"><b>Mã lớp:</b></label>
            <?php
            $sql = "select *from lop";
            $list = executeResult($sql);
            echo "<select name='ml' class='form-select' required>";
            foreach ($list as $row) {
              if ($malop == $row['malop']) {
                echo "<option selected='selected' value= " . $row['malop'] . ">" . $row['tenlop'] . "</option>";
              } else {
                echo "<option value= " . $row['malop'] . ">" . $row['tenlop'] . "</option>";
              }
            }
            echo "</select>";
            ?>
          </div>
          <div class="text-center">
            <button class="btn btn-success btn-sub"><i class="bi bi-check-circle-fill"></i><span class="abc">Lưu</span></button>
          </div>
        </form>

      </div>

    </div>



  </div>

</body>

</html>