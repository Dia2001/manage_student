<?php
require_once('Model\dblop.php');
?>
<?php
$masinhvien = $hodem = $ten = $matkhau = $hinhanh = $ngaysinh = $gioitinh = $dantoc = $cmnd = $tongiao = $maquequan = $sdt = $email = $machucvu = $malop = $matinhtranghoc = "";
if (!empty($_POST)) {
  $_id = '';
  if (
    isset($_POST['msv']) && isset($_POST['hd']) && isset($_POST['ten']) && isset($_POST['matk']) && isset($_POST['image']) && isset($_POST['ns']) && isset($_POST['gt']) && isset($_POST['dt']) && isset($_POST['cmnd'])
    && isset($_POST['tg']) && isset($_POST['mqq']) && isset($_POST['sdt']) && isset($_POST['email']) && isset($_POST['mcv']) && isset($_POST['ml']) && isset($_POST['mtth'])
  ) {
    $masinhvien = $_POST['msv'];
    $hodem = $_POST['hd'];
    $ten = $_POST['ten'];
    $matkhau = $_POST['matk'];
    $hinhanh = $_POST['image'];
    $ngaysinh = $_POST['ns'];
    $gioitinh = $_POST['gt'];
    $dantoc = $_POST['dt'];
    $cmnd = $_POST['cmnd'];
    $tongiao = $_POST['tg'];
    $maquequan = $_POST['mqq'];
    $sdt = $_POST['sdt'];
    $email = $_POST['email'];
    $machucvu = $_POST['mcv'];
    $malop = $_POST['ml'];
    $matinhtranghoc = $_POST['mtth'];
  }
  if (isset($_GET['id'])) {
    $_id = $_GET['id'];
  }
  // An toàn về mặt dữ liệu( lỗi sql incheck sion)
  $masinhvien = str_replace('\'', '\\\'', $masinhvien);
  $hodem = str_replace('\'', '\\\'', $hodem);
  $ten = str_replace('\'', '\\\'', $ten);
  $matkhau = str_replace('\'', '\\\'', $matkhau);
  $hinhanh = str_replace('\'', '\\\'', $hinhanh);
  //$ngaysinh = str_replace('\'', '\\\'', $ngaysinh);
  $gioitinh = str_replace('\'', '\\\'', $gioitinh);
  $dantoc = str_replace('\'', '\\\'', $dantoc);
  $cmnd = str_replace('\'', '\\\'', $cmnd);
  $tongiao = str_replace('\'', '\\\'', $tongiao);
  $maquequan = str_replace('\'', '\\\'', $maquequan);
  $sdt = str_replace('\'', '\\\'', $sdt);
  $email = str_replace('\'', '\\\'', $email);
  $machucvu = str_replace('\'', '\\\'', $machucvu);
  $malop = str_replace('\'', '\\\'', $malop);
  $matinhtranghoc = str_replace('\'', '\\\'', $matinhtranghoc);
  $_id = str_replace('\'', '\\\'', $_id);
  if ($_id != '') {
    $sql = " update sinhvien set hodemsv='" . $hodem . "',tensv='" . $ten . "',matkhau='" . $matkhau . "',hinhanh='" . $hinhanh . "',ngaysinh='" . $ngaysinh . "',gioitinh='" . $gioitinh . "'
    ,dantoc='" . $dantoc . "',cmnd='" . $cmnd . "',tongiao='" . $tongiao . "',maquequan='" . $maquequan . "',sdt='" . $sdt . "'
    ,email='" . $email . "',machucvu='" . $machucvu . "',malop='" . $malop . "',matinhtranghoc='" . $matinhtranghoc . "' where masv='" . $_id . "'";
  } else {
    $sql =  "insert into sinhvien(masv,hodemsv,tensv,matkhau,hinhanh,ngaysinh,gioitinh,dantoc,cmnd,tongiao,maquequan,sdt,
    email,machucvu,malop,matinhtranghoc) values('" . $masinhvien . "','" . $hodem . "','" . $ten . "','" . $matkhau . "'
    ,'" . $hinhanh . "','" . $ngaysinh . "','" . $gioitinh . "','" . $dantoc . "','" . $cmnd . "','" . $tongiao . "','" . $maquequan . "','" . $sdt . "'
    ,'" . $email . "','" . $machucvu . "','" . $malop . "','" . $matinhtranghoc . "')";
  }
  execute($sql);
  header('Location: Areagiangvien.sinhvien.php');
  die();
}
$id = '';
if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $sql = "select * from sinhvien where masv='" . $id . "'";
  $classList = executeResult($sql);
  if ($classList != null && count($classList) > 0) {
    $cla = $classList[0];
    $masinhvien = $cla['masv'];
    $hodem = $cla['hodemsv'];
    $matkhau = $cla['matkhau'];
    $ten = $cla['tensv'];
    $hinhanh = $cla['hinhanh'];
    $ngaysinh = $cla['ngaysinh'];
    $gioitinh = $cla['gioitinh'];
    $dantoc = $cla['dantoc'];
    $cmnd = $cla['cmnd'];
    $tongiao = $cla['tongiao'];
    $maquequan = $cla['maquequan'];
    $sdt = $cla['sdt'];
    $email = $cla['email'];
    $machucvu = $cla['machucvu'];
    $malop = $cla['malop'];
    $matinhtranghoc = $cla['matinhtranghoc'];
  } else {
    $id = '';
  }
}
?>
<!DOCTYPE html>
<html>

<head>
  <title>Sinh viên</title>
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
        <h2 class="text-center">Sinh viên<h2>
      </div>
      <div class="card-body">
        <form method="POST">
          <div class="form-group">
            <label for="mch" class="col-sm-2 col-form-label"><b>Mã sinh viên:</b></label>
            <input type="text" class="form-control" name="msv" value="<?= $masinhvien ?>">
          </div>
          <div class="form-group">
            <label for="mlv" class="col-sm-2 col-form-label"><b>Họ đệm:</b></label>
            <input type="text" class="form-control" name="hd" value="<?= $hodem ?>">
          </div>
          <div class="form-group">
            <label for="mlv" class="col-sm-2 col-form-label"><b>Tên:</b></label>
            <input type="text" class="form-control" name="ten" value="<?= $ten ?>">
          </div>
          <div class="form-group">
            <label for="mlv" class="col-sm-2 col-form-label"><b>Mật khẩu:</b></label>
            <input type="text" class="form-control" name="matk" value="<?= $matkhau ?>">
          </div>
          <div class="form-group">
            <label for="mlv" class="col-sm-2 col-form-label"><b>Hình ảnh:</b></label>
            <input type="file" class="form-control" name="image" values="<?= $hinhanh ?>">
          </div>
          <div class="form-group">
            <label for="mlv" class="col-sm-2 col-form-label"><b>Ngày sinh:</b></label>
            <input type="date" class="form-control" name="ns" value="<?= $ngaysinh ?>">
          </div>
          <div class="form-group">
            <label for="mlv" class="col-sm-2 col-form-label"><b>Giới tính</b></label>
            <input type="text" class="form-control" name="gt" value="<?= $gioitinh ?>">
          </div>
          <div class="form-group">
            <label for="mlv" class="col-sm-2 col-form-label"><b>Dân tộc:</b></label>
            <input type="text" class="form-control" name="dt" value="<?= $dantoc ?>">
          </div>
          <div class="form-group">
            <label for="mlv" class="col-sm-2 col-form-label"><b>Cmnd:</b></label>
            <input type="text" class="form-control" name="cmnd" value="<?= $cmnd ?>">
          </div>
          <div class="form-group">
            <label for="mlv" class="col-sm-2 col-form-label"><b>Tôn giáo:</b></label>
            <input type="text" class="form-control" name="tg" value="<?= $tongiao ?>">
          </div>
          <div class="form-group">
            <label for="mlv" class="col-sm-2 col-form-label"><b>Quê quán:</b></label>
            <?php
            $sql = "select *from quequan";
            $list = executeResult($sql);
            echo "<select name='mqq' class='form-select' required>";
            foreach ($list as $row) {
              if ($maquequan == $row['maquequan']) {
                echo "<option selected='selected' value= " . $row['maquequan'] . ">" . $row['tenquequan'] . "</option>";
              } else {
                echo "<option value= " . $row['maquequan'] . ">" . $row['tenquequan'] . "</option>";
              }
            }
            echo "</select>";
            ?>
          </div>
          <div class="form-group">
            <label for="mlv" class="col-sm-2 col-form-label"><b>Số điện thoại:</b></label>
            <input type="text" class="form-control" name="sdt" value="<?= $sdt ?>">
          </div>
          <div class="form-group">
            <label for="mlv" class="col-sm-2 col-form-label"><b>Email:</b></label>
            <input type="text" class="form-control" name="email" value="<?= $email ?>">
          </div>
          <div class="form-group">
            <label for="mlv" class="col-sm-2 col-form-label"><b>Chức vụ:</b></label>
            <?php
            $sql = "select *from chucvu";
            $list = executeResult($sql);
            echo "<select name='mcv' class='form-select' required>";
            foreach ($list as $row) {
              if ($machucvu == $row['machucvu']) {
                echo "<option selected='selected' value= " . $row['machucvu'] . ">" . $row['tenchucvu'] . "</option>";
              } else {
                echo "<option value= " . $row['machucvu'] . ">" . $row['tenchucvu'] . "</option>";
              }
            }
            echo "</select>";
            ?>
          </div>
          <div class="form-group">
            <label for="mlv" class="col-sm-2 col-form-label"><b>Lớp:</b></label>
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
          <div class="form-group">
            <label for="mlv" class="col-sm-2 col-form-label"><b>Tình trạng học:</b></label>
            <?php
            $sql = "select *from tinhtranghoc";
            $list = executeResult($sql);
            echo "<select name='mtth' class='form-select' required>";
            foreach ($list as $row) {
              if ($matinhtranghoc == $row['matinhtranghoc']) {
                echo "<option selected='selected' value= " . $row['matinhtranghoc'] . ">" . $row['tentinhtranghoc'] . "</option>";
              } else {
                echo "<option value= " . $row['matinhtranghoc'] . ">" . $row['tentinhtranghoc'] . "</option>";
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