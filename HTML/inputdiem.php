<?php
require_once('Model\dblop.php');
?>
<?php
$masv = $manhn = $chuyencan = $giuaky =$cuoiky = $chuyencan =$dtb= $XL = $ketqua="";
if (!empty($_POST)) {
  $_id = '';
  if (isset($_POST['msv']) && isset($_POST['mh']) && isset($_POST['cc']) && isset($_POST['gk']) && isset($_POST['ck']) ) {
    $masv = $_POST['msv'];
    $mamhn = $_POST['mh'];
    $chuyencan = $_POST['cc'];
    $giuaky = $_POST['gk'];
    $cuoiky = $_POST['ck'];
    echo $masv;
  }
  if (isset($_GET['id'])) {
    $_id = $_GET['id'];
  }
  // An toàn về mặt dữ liệu( lỗi sql incheck sion)
  $masv = str_replace('\'', '\\\'', $masv);
  $mamhn = str_replace('\'', '\\\'', $mamhn);
  $chuyencan = str_replace('\'', '\\\'', $chuyencan);
  $giuaky = str_replace('\'', '\\\'', $giuaky);
  $cuoiky = str_replace('\'', '\\\'', $cuoiky);
  if ($_id != '') {
    $dtb=(($chuyencan*(float)(10/100))+($giuaky*(float)(20/100))+($cuoiky*(float)(70/100)));
		if($dtb>=9){
			$XL="A+";
            $ketqua='dat.jpg' ;
		}else{
			if($dtb>=8){
				$XL="A";
                $ketqua='dat.jpg' ;
			}else{
				if($dtb>=7){
					$XL="B+";
                    $ketqua='dat.jpg' ;
				}else{
					if($dtb>=6){
						$XL="B";
                        $ketqua='dat.jpg' ;
					}else{
						if($dtb>=5){
							$XL="C";
                            $ketqua='dat.jpg' ;
						}else{
							if($dtb>=4){
								$XL="D";
                                $ketqua='dat.jpg' ;
							}else{
								$XL="F";
                                $ketqua='khongdat.png' ;
							}
						}
					}
				}
			}
		}
    $sql = " update diem set masv='" . $masv . "',mamhn='" . $mamhn . "',chuyencan='" . $chuyencan . "',giuaky='" . $giuaky . "',cuoiky='" . $cuoiky . "'
    ,dtb='" . $dtb . "',diemchu='" . $XL . "',ketqua='" . $ketqua . "' where id='".$_id."'";
} else {
    $dtb=(($chuyencan*(float)(10/100))+($giuaky*(float)(20/100))+($cuoiky*(float)(70/100)));
		if($dtb>=9){
			$XL="A+";
            $ketqua='dat.jpg' ;
		}else{
			if($dtb>=8){
				$XL="A";
                $ketqua='dat.jpg' ;
			}else{
				if($dtb>=7){
					$XL="B+";
                    $ketqua='dat.jpg' ;
				}else{
					if($dtb>=6){
						$XL="B";
                        $ketqua='dat.jpg' ;
					}else{
						if($dtb>=5){
							$XL="C";
                            $ketqua='dat.jpg' ;
						}else{
							if($dtb>=4){
								$XL="D";
                                $ketqua='dat.jpg' ;
							}else{
								$XL="F";
                                $ketqua='khongdat.png' ;
							}
						}
					}
				}
			}
		}
    $sql = "insert into diem(masv,mamhn,chuyencan,giuaky,cuoiky,dtb,diemchu,ketqua) values('".$masv."','".$mamhn."','".$chuyencan."','".$giuaky."','".$cuoiky."','".$dtb."','".$XL."','".$ketqua."')";
  }
 execute($sql);
  header('Location: diem.php');
  die();
}
$id = '';
if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $sql = "select * from diem where id='" . $id . "'";
  $classList = executeResult($sql);
  if ($classList != null && count($classList) > 0) {
    $cla = $classList[0];
    $masv = $cla['masv'];
    $mamhn = $cla['mamhn'];
    $chuyencan = $cla['chuyencan'];
    $giuaky = $cla['giuaky'];
    $cuoiky = $cla['cuoiky'];
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
            <label for="mch" class="col-sm-2 col-form-label"><b>Mã sinh viên:</b></label>
            <input type="text" class="form-control" name="msv" value="<?= $masv ?>" >
          </div>
          <div class="form-group">
            <label for="mlv" class="col-sm-2 col-form-label"><b>Môn học:</b></label>
            <?php
            $sql = "select *from monhocnganh";
            $list = executeResult($sql);
            echo "<select name='mh' class='form-select' required>";
            foreach ($list as $row) {
              if ($mamhn == $row['mamhn']) {
                echo "<option selected='selected' value= " . $row['mamhn'] . ">" . $row['tenmhn'] . "</option>";
              } else {
                echo "<option value= " . $row['mamhn'] . ">" . $row['tenmhn'] . "</option>";
              }
            }
            echo "</select>";
            ?>
          </div>
          <div class="form-group">
            <label for="mlv" class="col-sm-2 col-form-label"><b>Chuyên cần:</b></label>
            <input type="text" class="form-control" name="cc" value="<?= $chuyencan?>">
          </div>
          <div class="form-group">
            <label for="mlv" class="col-sm-2 col-form-label"><b>Giữa kỳ:</b></label>
            <input type="text" class="form-control" name="gk" value="<?= $giuaky ?>">
          </div>
          <div class="form-group">
            <label for="mlv" class="col-sm-2 col-form-label"><b>Cuối kỳ:</b></label>
            <input type="text" class="form-control" name="ck" value="<?= $cuoiky?>">
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