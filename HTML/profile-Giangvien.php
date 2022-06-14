<?php
require_once('Model\dblop.php');
session_start();
ob_start();
?>
<html>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="./CSS/main.css">
    </link>
    <title>Giảng viên</title>
</head>

<body>
    <div class="container">
        <div class="card">
            <div class="card-header" align="center">
                Thông tin giảng viên
            </div>
            <div class="card-body">
                <?php
                $magv = $_SESSION['usr'];
                echo $magv;
                
                $lenhpt = "select *from giangvien where magiangvien='$magv'";
                 $index=1;
                $classlist = executeResult($lenhpt);
                $index = 1;
                echo " <table class='table table-bordered  table-hover'>
                    <thead class='thead-dark'>
                        <tr>
                            <th>STT</th>
                            <th>Mã giảng viên</th>
                            <th>Họ tên giảng viên</th>
                            <th>Hình ảnh</th>
                            <th>Giới tính</th>
                            <th>SĐT</th>
                            <th>Mật khẩu</th>
                            <th>Trình độ</th>
							<th>Quốc tịch</th>
							<th>Mã khoa</th>
							<th>Mã lớp</th>
                        </tr>
                    </thead>
                    <tbody>";
                foreach ($classlist as $cla) {
                    echo '<tr>
                        <td>' . ($index++) . '</td>
                        <td>' . $cla['magiangvien'] . '</td>
                        <td>' . $cla['hotengv'] . '</td>
						<td> <img style="width: 100px;height: 100px;" src="IMG/' . $cla['hinhanh'] . '"></td>
                        <td>' . $cla['gioitinh'] . '</td>
                        <td>' . $cla['sdt'] . '</td>
                        <td>' . $cla['matkhau'] . '</td>
						<td>' . $cla['trinhdo'] . '</td>
						<td>' . $cla['quoctich'] . '</td>
						<td>' . $cla['makhoa'] . '</td>
						<td>' . $cla['malop'] . '</td>
                        <td><button class="btn btn-warning" onclick=\'window.open("Areagiangvien.inputgiangvien.php?id=' . $cla['magiangvien'] . '","_self")\'><i class="bi bi-brush"></i>Sửa</button></td>
                    </tr>';
                }
                echo "</tbody>";
                echo "<table>";
                ?>
            </div>
        </div>
        <script type="text/javascript" src="./javascript/main.js"></script>
    </div>
</body>

</html>