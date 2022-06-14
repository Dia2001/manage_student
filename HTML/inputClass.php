<?php
  require_once('Model\dblop.php');
?>
<?php
    $malop=$tenlop=$manganh=$makhoahoc=$machuongtrinh="";
    if(!empty($_POST)){
      $_id='';
        if(isset($_POST['malop'])&& isset($_POST['tenlop']) && isset($_POST['ng'])&& isset($_POST['kh'])&& isset($_POST['ct'])){
            $malop=$_POST['malop'];
            $tenlop=$_POST['tenlop'];
            $manganh=$_POST['ng'];
            $makhoahoc=$_POST['kh'];
            $machuongtrinh=$_POST['ct'];
        }
        if(isset($_GET['id'])){
          $_id=$_GET['id'];
        }
        // An toàn về mặt dữ liệu( lỗi sql incheck sion)
        $malop= str_replace('\'', '\\\'', $malop);
        $tenlop= str_replace('\'', '\\\'', $tenlop);
        $manganh = str_replace('\'', '\\\'', $manganh);
        $makhoahoc = str_replace('\'', '\\\'', $makhoahoc);
        $machuongtrinh = str_replace('\'', '\\\'',$machuongtrinh);
        $_id=str_replace('\'', '\\\'',$_id);
        if($_id!=''){
          $sql="update lop set tenlop='".$tenlop."',manganh='".$manganh."',makhoahoc='".$makhoahoc."',machuongtrinh='".$machuongtrinh."'where malop='".$_id."'";
        }else{
          $sql= "insert into lop(malop,tenlop,manganh,makhoahoc,machuongtrinh) values('".$malop."','".$tenlop."','".$manganh."','".$makhoahoc."','".$machuongtrinh."')";
        }
        execute($sql);
        header('Location: lop.php');
        die();
    }
    $id = '';
    if (isset($_GET['id'])) {
      $id = $_GET['id'];
      $sql= "select * from lop where malop ='".$id."'";
      $classList = executeResult($sql);
      if ($classList != null && count($classList) > 0) {
        $cla= $classList[0];
        $malop = $cla['malop'];
        $tenlop = $cla['tenlop'];
        $manganh = $cla['manganh'];
        $makhoahoc= $cla['makhoahoc'];
        $machuongtrinh = $cla['machuongtrinh'];
      } else {
        $id = '';
      }
    }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Lớp</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h2 class="text-center">Lớp</h2>
			</div>
			<div class="panel-body">
				<form method="post">
					<div class="form-group">
					  <label for="mlp">Mã lớp:</label>
					  <input required="true" type="text" class="form-control" id="ml" name="malop" value="<?=$malop?>">
					</div>
					<div class="form-group">
					  <label for="tlp">Tên lớp:</label>
					  <input type="text" class="form-control" id="tl" name="tenlop" value="<?=$tenlop?>">
					</div>
					<div class="form-group">
					  <label for="mnh">Mã ngành:</label>
                      <?php
                        $sql="select *from nganh";
                        $nganhlist =executeResult($sql);
                        echo "<select name='ng' class='form-control' required>";
                        foreach($nganhlist as $mh){
                          if ($manganh == $mh['manganh']) {
                            echo "<option selected='selected' value=" . $mh['manganh'] . ">" . $mh['tennganh'] . "</option>";
                          } else {
                            echo "<option  value=" . $mh['manganh'] . ">" . $mh['tennganh'] . "</option>";
                          }
                          }
                        echo "</select>";	
				        ?>
                        </div>
                        <div class="form-group">
					    <label for="mkc">Mã khóa học:</label>
                         <?php
                         $k="K";
                        $sql="select *from khoahoc";
                        $khoahoclist =executeResult($sql);
                        echo "<select name='kh' class='form-control' required>";
                        foreach($khoahoclist as $khoahoc){
                          if($makhoahoc==$khoahoc['makhoahoc']){
                            echo "<option selected='selected' value=".$khoahoc['makhoahoc'].">".$k.$khoahoc['makhoahoc']."</option>";
                          }else{
                            echo "<option  value=".$khoahoc['makhoahoc'].">".$k.$khoahoc['makhoahoc']."</option>";
                          }
                        }
                        echo "</select>";	
				        ?>
                         </div>
                         <div class="form-group">
					    <label for="mcth">Mã chương trình:</label>
                         <?php
                        $sql="select *from chuongtrinh";
                        $chuongtrinhlist =executeResult($sql);
                        echo "<select name='ct' class='form-control' required>";
                        foreach($chuongtrinhlist as $ct){
                          if($machuongtrinh==$ct['machuongtrinh']){
                            echo "<option selected='selected' value=".$ct['machuongtrinh'].">".$ct['tenchuongtrinh']."</option>";
                          }else{
                            echo "<option value=".$ct['machuongtrinh'].">".$ct['tenchuongtrinh']."</option>";
                          }
                        }
                        echo "</select>";	
				        ?>
					</div>
					<button class="btn btn-success"><i class="bi bi-file-earmark-diff-fill"></i>Lưu</button>
				</form>
			</div>
		</div>
	</div>
</body>
</html>