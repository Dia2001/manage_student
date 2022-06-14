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
    <title>Lớp</title>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header" align="center">
                Quản lý lớp sinh viên
            </div>
            <div class="card-body">
                <div class="wrapper">
                    <form class="mb-0" method="get">
                        <div class="d-flex align-items-center mb-0">
                            <div>
                                <input type="text" class="form-control mb-0 " name="s" id="inputPassword2" placeholder="Nhập mã lớp để tìm kiếm">
                            </div>
                            <div>
                                <button type="submit" class="btn btn-primary ms-3 btn-submit"><i class="bi bi-search"></i><span>Tìm kiếm<span></button>
                            </div>
                        </div>
                    </form>
                    
                </div>
                <?php
                $dong = 6;
                if (isset($_GET['page'])) {
                    $trang = $_GET['page'];
                } else {
                    $trang = 0;
                }
                if (isset($_GET['s']) && $_GET['s'] != '') {
                    $query = "select * from lop where malop='" . $_GET['s'] . "'";
                    $sodongdl = tradong($query);
                    $sotrangdl = $sodongdl / $dong;
                    $vtbd = $trang * $dong;
                    $lenhpt = "select * from lop where malop='" . $_GET['s'] . "' limit $vtbd, $dong";
                } else {
                    $query = "select * from lop";
                    $sodongdl = tradong($query);
                    $sotrangdl = $sodongdl / $dong;
                    $vtbd = $trang * $dong;
                    $lenhpt = "select * from lop limit $vtbd, $dong";
                }
                //  $index=1;
                // $sql="select *from lop";
                $classlist = executeResult($lenhpt);
                $index = 1;
                echo " <table class='table table-bordered  table-hover'>
                    <thead class='thead-dark'>
                        <tr>
                            <th>STT</th>
                            <th>Mã lớp</th>
                            <th>Tên lớp</th>
                            <th>Mã ngành</th>
                            <th>Mã khóa học</th>
                            <th>Mã chương trình</th>
                        </tr>
                    </thead>
                    <tbody>";
                foreach ($classlist as $cla) {
                    echo '<tr>
                        <td>' . ($index++) . '</td>
                        <td>' . $cla['malop'] . '</td>
                        <td>' . $cla['tenlop'] . '</td>
                        <td>' . $cla['manganh'] . '</td>
                        <td>' . $cla['makhoahoc'] . '</td>
                        <td>' . $cla['machuongtrinh'] . '</td>
                       
                    </tr>';
                }
                echo "</tbody>";
                echo "<table>";
                echo "<ul  class='list-group list-group-horizontal-xl list-page-number'>";
                for ($i = 0; $i <= $sotrangdl; $i++) {
                    $trangchon = $i + 1;
                    echo "<li class='list-group-item page-item'><a href='Areagiangvien.lop.php?page=$i'>$trangchon</a></li>";
                }
                echo "</ul>";
                ?>
               
                  <script type="text/javascript" src="./javascript/main.js"></script>
            </div>
        </div>
    </div>
</body>

</html>