<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../CSS/chucvucss.css" type="text/css">
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<link href="../ICON/fontawesome-free-5.15.4-web/css/all.css" rel="stylesheet">
    <title>Document</title>
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
			<div class="col col-1">Mã chức vụ</div>
			<div class="col col-2">Tên chức vụ</div>
		</li>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
		<li class="table-row rowinput">
            <div class="col col-1 in"><input type="text" placeholder="Mã chức vụ" name="macv" /></div>
            <div class="col col-2 in"><input type="text" placeholder="Tên chức vụ" name="tcv" /></div>
            <div class="col-submit"><button type="submit" name="btnsubmit" id="btnsubmit"  value="them" class="Add"><i class="fas fa-folder-plus"></i></button></div>
			<div class="col-submit"><button type="submit" name="btnsubmit" id="btnsubmit"  value="sua" class="Repair"><i class="fas fa-tools"></i></button></div>
		</li>
        </form>
	<?php
		if (isset($_POST['btnsubmit'])){ // Kiểm tra nút có giá trị dữ liệu
    if($_POST['btnsubmit'] == 'them') 
    {
        if (isset($_POST['macv']) && ($_POST['tcv']))
{
		//lấy dữ liệu từ form gửi lên
		$machucvu=$_POST['macv'];
		$tenchucvu=$_POST['tcv'];
		 //1.Kết nối đến dữ liệu
		$connect = mysqli_connect("localhost","root","","quanlysinhvien") or die ("Không kết nối được");

		//2.Thiết lập bảng mã cho kết nối
		mysqli_query($connect, "set names 'utf8'");
		$tb="";
		$lenh= "insert into chucvu(machucvu,tenchucvu) values('".$machucvu."','".$tenchucvu."')";
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
        if (isset($_POST['macv']) && ($_POST['tcv']) )
{
		//lấy dữ liệu từ form gửi lên
		$machucvu=$_POST['macv'];
		$tenchucvu=$_POST['tcv'];
		 ///1.Kết nối đến dữ liệu
		$connect = mysqli_connect("localhost","root","","quanlysinhvien") or die ("Không kết nối được");

		//2.Thiết lập bảng mã cho kết nối
		mysqli_query($connect, "set names 'utf8'");
			$lenhdmk="update chucvu set tenchucvu='".$tenchucvu."'where machucvu='".$machucvu."'";
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
        if (isset($_POST['macv']) ){
			$machucvu=$_POST['macv'];
		 //1.Kết nối đến dữ liệu
		$connect = mysqli_connect("localhost","root","","quanlysinhvien") or die ("Không kết nối được");
		//2.Thiết lập bảng mã cho kết nối
		mysqli_query($connect, "set names 'utf8'");
			$lenhdmk="DELETE FROM chucvu WHERE  machucvu='".$machucvu."'";
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
			$lenh=  "select * from chucvu";
		//4. Thực hiện câu lệnh sql
			$results = mysqli_query($connect, $lenh)or die ("Không thực hiện được");
		//5. Lấy kết quả trả về
			$kq = mysqli_query($connect, $lenh);
		//$row = mysqli_fetch_row($kqua);
		//$row = mysqli_fetch_assoc($kqua);
		while ($row= mysqli_fetch_array($kq))
		{
			echo '<li class="table-row datarow">';
			// không dùng tên trường có thể sài số thứ tự của cột
		  echo "<div class='col col-1'>".$row['machucvu']."</div>";
		  echo "<div class='col col-2'>".$row['tenchucvu']."</div>";
		  echo '<div class="col col-detele"><a href="deletechucvu.php?id='.$row['machucvu'].'"><i class="fas fa-trash-alt"></i></a></div>';
		  echo "</li>";
		}
		echo "</table>";
				//6. dọn dẹp tài nguyên
				mysqli_free_result($results);
			//7.đóng kết nối
			mysqli_close($connect);	
			echo "</ul>";
			echo "</div>";
?>
</body>
</html>