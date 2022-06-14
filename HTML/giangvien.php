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
    <title>Giảng viên</title>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header" align="center">
                Quản lý giảng viên
            </div>
            <div class="card-body">
                <div class="wrapper">
                    <form class="mb-0" method="get">
                        <div class="d-flex align-items-center mb-0">
                            <div>
                                <input type="text" class="form-control mb-0 " name="s" id="inputPassword2" placeholder="Nhập tên giảng viên để tìm kiếm">
                            </div>
                            <div>
                                <button type="submit" class="btn btn-primary ms-3 btn-submit"><i class="bi bi-search"></i><span>Tìm kiếm<span></button>
                            </div>
                        </div>
                    </form>
                    <div>
                        <button class='btn btn-success' onclick="window.open('inputgiangvien.php','_self')"><i class="bi bi-plus-lg"></i>Thêm mới</button>
                    </div>
                </div>
                <?php
                $dong = 6;
                if (isset($_GET['page'])) {
                    $trang = $_GET['page'];
                } else {
                    $trang = 0;
                }
                if (isset($_GET['s']) && $_GET['s'] != '') {
                    $query = "select * from giangvien where hotengv like N'%" . $_GET['s'] . "%'";
                    $sodongdl = tradong($query);
                    $sotrangdl = $sodongdl / $dong;
                    $vtbd = $trang * $dong;
                    $lenhpt = "select * from giangvien where hotengv like N'%" . $_GET['s'] . "%' limit $vtbd, $dong";
                } else {
                    $query = "select * from giangvien";
                    $sodongdl = tradong($query);
                    $sotrangdl = $sodongdl / $dong;
                    $vtbd = $trang * $dong;
                    $lenhpt = "select * from giangvien limit $vtbd, $dong";
                }
                //  $index=1;
                // $sql="select *from lop";
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
                        <td><button class="btn btn-warning" onclick=\'window.open("inputgiangvien.php?id=' . $cla['magiangvien'] . '","_self")\'><i class="bi bi-brush"></i>Sửa</button></td>
                        <td><button class="btn btn-danger" onclick="deleteqs(\'' . $cla['magiangvien'] . '\')"><i class="bi bi-trash"></i>Xóa</button></a></td>
                    </tr>';
                }
                echo "</tbody>";
                echo "<table>";
                echo "<ul  class='list-group list-group-horizontal-xl list-page-number'>";
                for ($i = 0; $i <= $sotrangdl; $i++) {
                    $trangchon = $i + 1;
                    echo "<li class='list-group-item page-item'><a href='giangvien.php?page=$i'>$trangchon</a></li>";
                }
                echo "</ul>";
                ?>
                <script type="text/javascript">
                    function deleteqs(magiangvien) {
                        console.log(magiangvien)
                        a = confirm('Bạn có muốn xóa câu hỏi này?')
                        if (!a) {
                            return;
                        }
                        console.log(magiangvien)
                        $.post('deletegiangvien.php', {
                                'x': magiangvien
                            },
                            function(data) {
                                location.reload()
                            })
                    }
                </script>
                  <script type="text/javascript" src="./javascript/main.js"></script>
            </div>
        </div>
    </div>
</body>

</html>