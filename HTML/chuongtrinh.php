<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../CSS/chuongtrinhcss.css" type="text/css">
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<link href="../ICON/fontawesome-free-5.15.4-web/css/all.css" rel="stylesheet"> 
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
<!-- <div class="container">
		<ul class="responsive-table">
		<li class="table-header">
			<div class="col col-1">STT</div>
			<div class="col col-2">Mã sinh viên</div>
			<div class="col col-3">Mã môn học</div>
			<div class="col col-4">Chuyên cần</div>
			<div class="col col-5">Giữa kỳ</div>
			<div class="col col-6">Cuối kỳ</div>
			<div class="col col-7">Điểm trung bình</div>
			<div class="col col-8">Điểm chữ</div>
		</li>
        <form action=" method="POST">
		<li class="table-row rowinput">
			<div class="col col-1 in"></div> -->
    <div class="container">
		<ul class="responsive-table">
			<li class="table-header">
				<div class="col col-1">Mã chương trình</div>
				<div class="col col-2">Tên chương trình</div>
			</li>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
			<li class="table-row rowinput">
            <div class="col col-1 in"><input type="text" placeholder="Mã chương trình" name="mact" /></div>
            <div class="col col-2 in"><input type="text" placeholder="Tên chương trình" name="tct" /></div>
            <div class="col-submit"><button type="submit" name="btnsubmit" id="btnsubmit"  value="them" class="Add"><i class="fas fa-folder-plus"></i></button></div>
			<div class="col-submit"><button type="submit" name="btnsubmit" id="btnsubmit"  value="sua" class="Repair"><i class="fas fa-tools"></i></button></div>
			</li>
        </form>
	<?php
		if (isset($_POST['btnsubmit'])){ // Kiểm tra nút có giá trị dữ liệu
    if($_POST['btnsubmit'] == 'them') 
    {
        if (isset($_POST['mact']) && ($_POST['tct']))
{
		//lấy dữ liệu từ form gửi lên
		$machuongtrinh=$_POST['mact'];
		$tenchuongtrinh=$_POST['tct'];
		 //1.Kết nối đến dữ liệu
		$connect = mysqli_connect("localhost","root","","quanlysinhvien") or die ("Không kết nối được");

		//2.Thiết lập bảng mã cho kết nối
		mysqli_query($connect, "set names 'utf8'");
		$tb="";
		$lenh= "insert into chuongtrinh(machuongtrinh,tenchuongtrinh) values('".$machuongtrinh."','".$tenchuongtrinh."')";
		$results=mysqli_query($connect, $lenh);
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
        if (isset($_POST['mact']) && ($_POST['tct']))
{
		//lấy dữ liệu từ form gửi lên
		$machuongtrinh=$_POST['mact'];
		$tenchuongtrinh=$_POST['tct'];
		 //1.Kết nối đến dữ liệu
		$connect = mysqli_connect("localhost","root","","quanlysinhvien") or die ("Không kết nối được");
		//2.Thiết lập bảng mã cho kết nối
		mysqli_query($connect, "set names 'utf8'");
			$lenhdmk="update chuongtrinh set tenchuongtrinh='".$tenchuongtrinh."'where machuongtrinh='".$machuongtrinh."'";
			$kq1=mysqli_query($connect, $lenhdmk);
			if($kq1){
				//echo "Sửa thành công";
			}else{
				"Sửa không thành công";
			}
			mysqli_close($connect);
		}
}
	if($_POST['btnsubmit'] == 'xoa') 
    {   
        if (isset($_POST['mact'])){
			$machuongtrinh=$_POST['mact'];
		 //1.Kết nối đến dữ liệu
		$connect = mysqli_connect("localhost","root","","quanlysinhvien") or die ("Không kết nối được");
		//2.Thiết lập bảng mã cho kết nối
		mysqli_query($connect, "set names 'utf8'");
			$lenhdmk="DELETE FROM chuongtrinh WHERE  machuongtrinh='".$machuongtrinh."'";
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
		//1.Kết nối đến dữ liệu
			$connect = mysqli_connect("localhost","root","","quanlysinhvien") or die ("Không kết nối được");
		//2.Thiết lập bảng mã cho kết nối
			mysqli_query($connect, "set names 'utf8'");
			$lenh=  "select * from chuongtrinh";
		//4. Thực hiện câu lệnh sql
			$results = mysqli_query($connect, $lenh)or die ("Không thực hiện được");
		//5. Lấy kết quả trả về
			$kq = mysqli_query($connect, $lenh);
		//$row = mysqli_fetch_row($kqua);
		//$row = mysqli_fetch_assoc($kqua);
		while ($row= mysqli_fetch_array($kq))
		{
			// không dùng tên trường có thể sài số thứ tự của cột
		  //echo "<tr><td>".$row['machuongtrinh']."</td><td>".$row['tenchuongtrinh']."</td></tr>";
		  echo "<li class='table-row datarow'>";
		  echo "<div class='col col-1'>".$row['machuongtrinh']."</div>";
		  echo "<div class='col col-2'>".$row['tenchuongtrinh']."</div>";
		  echo '<div class="col col-detele"><a href="deletechuongtrinh.php?id='.$row['machuongtrinh'].'"><i class="fas fa-trash-alt"></i></a></div>';//dung id đễ lấy tt cần xóa
		  echo "</li>";
		}
				//6. dọn dẹp tài nguyên
				mysqli_free_result($results);
			//7.đóng kết nối
			mysqli_close($connect);	
		echo "</ul>";
		echo "</div>";
?>
</body>
</html>