<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        Quản lý quê quán
    </div>
    <div>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <input type="text" placeholder="Mã tình trạng học" name="matth" /><br/><br/><br/>
            <input type="text" placeholder="Tên tình trạng học" name="ttth" /><br><br/><br/>
            <input type="submit" name="btnsubmit" id="btnsubmit" text="Thêm" value="them" /><br><br/><br/>
			<input type="submit" name="btnsubmit" id="btnsubmit"  text="Sửa" value="sua"/><br><br/><br/>
			<input type="submit" name="btnsubmit" id="btnsubmit"  text="Xóa" value="xoa"/><br><br/><br/>
        </form>
    </div>
	<?php
		if (isset($_POST['btnsubmit'])){ // Kiểm tra nút có giá trị dữ liệu
    if($_POST['btnsubmit'] == 'them') 
    {
        if (isset($_POST['matth']) && ($_POST['ttth']))
{
		//lấy dữ liệu từ form gửi lên
		$matinhtranghoc=$_POST['matth'];
		$tentinhtranghoc=$_POST['ttth'];
		 //1.Kết nối đến dữ liệu
		$connect = mysqli_connect("localhost:3303","root","","quanlysinhvienv2") or die ("Không kết nối được");

		//2.Thiết lập bảng mã cho kết nối
		mysqli_query($connect, "set names 'utf8'");
		$tb="";
		$lenh= "insert into tinhtranghoc(matinhtranghoc,tentinhtranghoc) values('".$matinhtranghoc."','".$tentinhtranghoc."')";
		$results=mysqli_query($connect, $lenh)or die ("không thực hiện được");
			if($results)
				{$tb="Thêm thành công";}
				else
				{$tb="Lỗi";}

		mysqli_close($connect);
		echo "<b><i>".$tb."</i></b>";
    }
	}
    if($_POST['btnsubmit'] == 'sua') 
    {   
        if (isset($_POST['matth']) && ($_POST['ttth']))
{
		//lấy dữ liệu từ form gửi lên
		$matinhtranghoc=$_POST['matth'];
		$tentinhtranghoc=$_POST['ttth'];
		 //1.Kết nối đến dữ liệu
		$connect = mysqli_connect("localhost:3303","root","","quanlysinhvienv2") or die ("Không kết nối được");

		//2.Thiết lập bảng mã cho kết nối
		mysqli_query($connect, "set names 'utf8'");
			$lenhdmk="update tinhtranghoc set tentinhtranghoc='".$tentinhtranghoc."'where matinhtranghoc='".$matinhtranghoc."'";
			$kq1=mysqli_query($connect, $lenhdmk);
			if($kq1){
				echo "Sửa thành công";
			}else{
				"Sửa không thành công";
			}
			mysqli_close($connect);
		}
}
	if($_POST['btnsubmit'] == 'xoa') 
    {   
        if (isset($_POST['matth'])){
			$matinhtranghoc=$_POST['matth'];
		 //1.Kết nối đến dữ liệu
		$connect = mysqli_connect("localhost:3303","root","","quanlysinhvienv2") or die ("Không kết nối được");
		//2.Thiết lập bảng mã cho kết nối
		mysqli_query($connect, "set names 'utf8'");
			$lenhdmk="DELETE FROM tinhtranghoc WHERE  matinhtranghoc='".$matinhtranghoc."'";
			$kq1=mysqli_query($connect, $lenhdmk);
			if($kq1){
				echo "Xóa thành công";
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
			$connect = mysqli_connect("localhost:3303","root","","quanlysinhvienv2") or die ("Không kết nối được");
		//2.Thiết lập bảng mã cho kết nối
			mysqli_query($connect, "set names 'utf8'");
			$lenh=  "select * from tinhtranghoc";
		//4. Thực hiện câu lệnh sql
			$results = mysqli_query($connect, $lenh)or die ("Không thực hiện được");
		//5. Lấy kết quả trả về
			$kq = mysqli_query($connect, $lenh);
		   echo"<table border='1' align='center'>";
		echo "<tr><td>Mã tình trạng học</td><td>Tên tình trạng học</td></tr>";
		//$row = mysqli_fetch_row($kqua);
		//$row = mysqli_fetch_assoc($kqua);
		while ($row= mysqli_fetch_array($kq))
		{
			// không dùng tên trường có thể sài số thứ tự của cột
		  echo "<tr><td>".$row['matinhtranghoc']."</td><td>".$row['tentinhtranghoc']."</td></tr>";
		}
		echo "</table>";
				//6. dọn dẹp tài nguyên
				mysqli_free_result($results);
			//7.đóng kết nối
			mysqli_close($connect);	
?>
</body>
</html>