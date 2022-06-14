<?php
session_start();
?>
<?php
require_once('Model\dblop.php');
?>
<html>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="./CSS/main.css">
    </link>
    <title>Điểm</title>
    <style>
        .rounded-circle {
            width: 30px;
            height: 30px;
            background: #7fee1d;
            -moz-border-radius: 60px;
            -webkit-border-radius: 60px;
            border-radius: 60px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header" align="center">
                Điểm
            </div>
            <div class="card-body">
                <?php
                $dong = 6;
                if (isset($_GET['page'])) {
                    $trang = $_GET['page'];
                } else {
                    $trang = 0;
                }
				$masv = $_SESSION['usr'];
                    $query = "select o.id,o.masv, c.hodemsv, c.tensv,b.tenmhn,o.chuyencan,o.giuaky,o.cuoiky,o.dtb,o.diemchu,o.ketqua FROM diem As o, sinhvien AS c, monhocnganh as b WHERE o.masv=c.masv and o.mamhn=b.mamhn and c.masv=$masv ";
                    $sodongdl = tradong($query);
                    $sotrangdl = $sodongdl / $dong;
                    $vtbd = $trang * $dong;
                    $lenhpt = "select o.id,o.masv, c.hodemsv, c.tensv,b.tenmhn,o.chuyencan,o.giuaky,o.cuoiky,o.dtb,o.diemchu,o.ketqua FROM diem As o, sinhvien AS c, monhocnganh as b WHERE o.masv=c.masv and o.mamhn=b.mamhn and c.masv=$masv limit $vtbd, $dong";
                
                //  $index=1;
                // $sql="select *from lop";
                $classlist = executeResult($lenhpt);
                $index = 1;
                echo " <table class='table table-bordered  table-hover'>
                    <thead class='thead-dark'>
                        <tr>
                            <th>STT</th>
                            <th>Mã sinh viên</th>
                            <th>Họ đệm </th>
                            <th>Tên</th>
                            <th>Tên môn học</th>
                            <th>Chuyên cần</th>
                            <th>Giữa kỳ</th>
                            <th>Cuối kỳ</th>
							<th>Điểm trung bình</th>
							<th>Điểm chữ</th>
							<th>Kết quả</th>
                        </tr>
                    </thead>
                    <tbody>";
                foreach ($classlist as $cla) {
                    echo '<tr>
                        <td>' . ($index++) . '</td>
                        <td>' . $cla['masv'] . '</td>
                        <td>' . $cla['hodemsv'] . '</td>
                        <td>' . $cla['tensv'] . '</td>
                        <td>' . $cla['tenmhn'] . '</td>
						<td>' . $cla['chuyencan'] . '</td>
						<td>' . $cla['giuaky'] . '</td>
						<td>' . $cla['cuoiky'] . '</td>
						<td>' . $cla['dtb'] . '</td>
						<td>' . $cla['diemchu'] . '</td>
						<td> <img class="rounded-circle" style="width: 30px;height: 30px;" src="IMG/' . $cla['ketqua'] . '"></td>
                    </tr>';
                }
                echo "</tbody>";
                echo "<table>";
                echo "<ul  class='list-group list-group-horizontal-xl list-page-number'>";
                for ($i = 0; $i <= $sotrangdl; $i++) {
                    $trangchon = $i + 1;
                    echo "<li class='list-group-item page-item'><a href='diem.php?page=$i'>$trangchon</a></li>";
                }
                echo "</ul>";
                ?>
                  <script type="text/javascript" src="./javascript/main.js"></script>
            </div>
        </div>
    </div>
</body>

</html>