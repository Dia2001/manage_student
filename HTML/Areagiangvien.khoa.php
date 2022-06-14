<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý Khoa</title>
	<link rel="stylesheet" href="../CSS/khoacss.css" type="text/css">
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
    <div class="container">
		<ul class="responsive-table">
		<li class="table-header">
			<div class="col col-1">Mã khoa</div>
			<div class="col col-2">Tên khoa</div>
			<div class="col col-3">Năm thành lập</div>
			<div class="col col-4">Số điện thoại</div>
		</li>
	
	
	<?php
		//1.Kết nối đến dữ liệu
		$connect = mysqli_connect("localhost","root","","quanlysinhvien") or die ("Không kết nối được");
		//2.Thiết lập bảng mã cho kết nối
			mysqli_query($connect, "set names 'utf8'");
			$lenh=  "select * from khoa";
		//4. Thực hiện câu lệnh sql
			$results = mysqli_query($connect, $lenh)or die ("Không thực hiện được");
		//5. Lấy kết quả trả về
			$kq = mysqli_query($connect, $lenh);
		//echo"<table border='1' align='center'>";
		//echo "<tr><td>Mã khoa</td><td>Tên khoa</td><td>Năm thành lập</td><td>Số điện thoại</td></tr>";
		//$row = mysqli_fetch_row($kqua);
		//$row = mysqli_fetch_assoc($kqua);
		while ($row= mysqli_fetch_array($kq))
		{
			// không dùng tên trường có thể sài số thứ tự của cột
		echo'<li class="table-row datarow">';
		//echo "<tr><td>".$row['makhoa']."</td><td>".$row['tenkhoa']."</td><td>".$row['namthanhlap']."</td><td>".$row['sdt']."</td></tr>";
		echo '<div class="col col-1">'.$row['makhoa'].'</div>';
		echo '<div class="col col-2">'.$row['tenkhoa'].'</div>';
		echo '<div class="col col-3">'.$row['namthanhlap'].'</div>';
		echo '<div class="col col-4">'.$row['sdt'].'</div>';
		// <div class="col-submit"><button type="submit" name="btnsubmit" id="btnsubmit"  value="them" class="Add"><i class="fas fa-user-plus"></i></button></div>
		
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