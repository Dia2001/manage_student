<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
	<link rel="stylesheet" href="../CSS/quequancss.css" type="text/css">
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<link href="../ICON/fontawesome-free-5.15.4-web/css/all.css" rel="stylesheet">
	<link rel="stylesheet" href="../CSS/SwitchPage.css" type="text/css">
</head>
<script>
        $(document).ready(function(){
           $(".rowinput").on({
               mouseenter: function(){
                   $(".col-submit").find("button").show(200);
               },
               mouseleave: function(){
                   $(".col-submit").find("button").hide(200);
               }
           });
        })
    </script>
<body>
<div class="container">
		<ul class="responsive-table">
		<li class="table-header">
			<div class="col col-1">STT</div>
			<div class="col col-2">Mã quê quán</div>
			<div class="col col-3">Tên quê quán</div>
		</li>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
		<li class="table-row rowinput">
			<div class="col col-1 "></div>
            <div class="col col-2 in"><input type="text" placeholder="Mã" name="maqq" /></div>
            <div class="col col-3 in"><input type="text" placeholder="Quê quán" name="tqq" /></div>
            <div class="col-submit"><button type="submit" name="btnsubmit" id="btnsubmit"  value="them" class="Add"><i class="fas fa-folder-plus"></i></button></div>
			<div class="col-submit"><button type="submit" name="btnsubmit" id="btnsubmit"  value="sua" class="Repair"><i class="fas fa-tools"></i></button></div>
		</li>
        </form>
	<?php
		if (isset($_POST['btnsubmit'])){ // Kiểm tra nút có giá trị dữ liệu
    if($_POST['btnsubmit'] == 'them') 
    {
        if (isset($_POST['maqq']) && ($_POST['tqq']))
{
		//lấy dữ liệu từ form gửi lên
		$maquequan=$_POST['maqq'];
		$tenquequan=$_POST['tqq'];
		 //1.Kết nối đến dữ liệu
		$connect = mysqli_connect("localhost","root","","quanlysinhvien") or die ("Không kết nối được");

		//2.Thiết lập bảng mã cho kết nối
		mysqli_query($connect, "set names 'utf8'");
		$tb="";
		$lenh= "insert into quequan(maquequan,tenquequan) values('".$maquequan."','".$tenquequan."')";
		$results=mysqli_query($connect, $lenh)or die ("không thực hiện được");
			if($results)
				{
					//$tb="Thêm thành công";
				}
				else
				{$tb="Lỗi";}

		mysqli_close($connect);
		echo "<b><i>".$tb."</i></b>";
    }
	}
    if($_POST['btnsubmit'] == 'sua') 
    {   
        if (isset($_POST['maqq']) && ($_POST['tqq']))
{
		//lấy dữ liệu từ form gửi lên
		$maquequan=$_POST['maqq'];
		$tenquequan=$_POST['tqq'];
		 //1.Kết nối đến dữ liệu
		$connect = mysqli_connect("localhost","root","","quanlysinhvien") or die ("Không kết nối được");

		//2.Thiết lập bảng mã cho kết nối
		mysqli_query($connect, "set names 'utf8'");
			$lenhdmk="update quequan set tenquequan='".$tenquequan."'where maquequan='".$maquequan."'";
			$kq1=mysqli_query($connect, $lenhdmk);
			if($kq1){
			//	echo "Sửa thành công";
			}else{
				"Sửa không thành công";
			}
			mysqli_close($connect);
		}
}
	if($_POST['btnsubmit'] == 'xoa') 
    {   
        if (isset($_POST['maqq'])){
			$maquequan=$_POST['maqq'];
		 //1.Kết nối đến dữ liệu
		$connect = mysqli_connect("localhost","root","","quanlysinhvien") or die ("Không kết nối được");
		//2.Thiết lập bảng mã cho kết nối
		mysqli_query($connect, "set names 'utf8'");
			$lenhdmk="DELETE FROM quequan WHERE  maquequan='".$maquequan."'";
			$kq1=mysqli_query($connect, $lenhdmk);
			if($kq1){
				//echo "Xóa thành công";
			}else{
				"Xóa không thành công";
			}
			mysqli_close($connect);
		}
    }
}
	?>
	<?php
	/*
		//1.Kết nối đến dữ liệu
			$connect = mysqli_connect("localhost:3303","root","","quanlysinhvienv2") or die ("Không kết nối được");
		//2.Thiết lập bảng mã cho kết nối
			mysqli_query($connect, "set names 'utf8'");
			$lenh=  "select * from quequan";
		//4. Thực hiện câu lệnh sql
			$results = mysqli_query($connect, $lenh)or die ("Không thực hiện được");
		//5. Lấy kết quả trả về
			$kq = mysqli_query($connect, $lenh);
		   echo"<table border='1' align='center'>";
		echo "<tr><td>Mã quê quán</td><td>Tên quê quán</td></tr>";
		//$row = mysqli_fetch_row($kqua);
		//$row = mysqli_fetch_assoc($kqua);
		while ($row= mysqli_fetch_array($kq))
		{
			// không dùng tên trường có thể sài số thứ tự của cột
		  echo "<tr><td>".$row['maquequan']."</td><td>".$row['tenquequan']."</td></tr>";
		}
		echo "</table>";
				//6. dọn dẹp tài nguyên
				mysqli_free_result($results);
			//7.đóng kết nối
			mysqli_close($connect);	
			*/
//1.xác định số trang 
$dong=10;
if(isset($_GET['page'])){
	$trang=$_GET['page'];}
else 
{
	$trang=0;
}	
//2.tính số trang của dữ liệu
$connect = mysqli_connect("localhost","root","","quanlysinhvien") or die ("Không kết nối được");
	mysqli_query($connect, "set names 'utf8'");
	$lenh=  "select * from quequan";
	$kq = mysqli_query($connect, $lenh);
	$sodongdl=mysqli_num_rows($kq);
	//tính số trang của dữ liệu
	$sotrangdl=$sodongdl/$dong;
	//vị trí đầu tiên của mỗi trang. 20 dòng 1 trang 
	$vtbd=$trang*$dong;
		//3. Đưa dữ liệu lên trang
		$lenhpt="select * from quequan limit $vtbd, $dong";
		$kqpt=mysqli_query($connect,$lenhpt);
		$stt=1;
		while($row=mysqli_fetch_array($kqpt))
		{
			//echo "<tr><td align='center'>".$stt."</td><td align='center'>".$row['maquequan']."</td><td align='center'>".$row['tenquequan']."</td></tr>";
			echo'<li class="table-row datarow">';
			echo "<div class='col col-1'>".$stt."</div>";
			echo "<div class='col col-2'>".$row['maquequan']."</div>";
			echo "<div class='col col-3'>".$row['tenquequan']."</div>";
			echo '<div class="col col-detele"><a href="deletequequan.php?id='.$row['maquequan'].'"><i class="fas fa-trash-alt"></i></a></div>';
			echo '</li>';
			$stt++;
		}
		echo "</ul>";
		echo "</div>";
		//4. tạo nút bấm
		echo "<p align='center'>";
		for ($i=0; $i<=$sotrangdl; $i++){
			$trangchon=$i+1;
			echo "<a class='switchPage' href='quequan.php?page=$i'>$trangchon</a>";
		if($trangchon%8==0){
			echo "</br>";
		}
}
echo "</p>";
?>
</body>
</html>