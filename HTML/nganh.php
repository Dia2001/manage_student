<?php
require_once('Model\dblop.php');
?>
<html>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="./CSS/main.css"></link>
    <title>Ngành</title>
</head>

<body>
    <div class="container">
        <div class="card">
            <div class="card-header" align="center">
                Quản lý ngành sinh viên
            </div>
            <div class="card-body">
                <div class="wrapper">
                    <form class="mb-0" method="get">
                        <div class="d-flex align-items-center mb-0">
                            <div>
                                <input type="text" class="form-control mb-0" name="s" id="inputPassword2" placeholder="Nhập tên ngành để tìm">
                            </div>
                            <div>
                                <button type="submit" class="btn btn-primary ms-3 btn-submit"><span class='glyphicon glyphicon-search'><i class="bi bi-search"></i>Tìm kiếm</button>
                            </div>
                        </div>
                    </form>
                    <div>
                        <button class='btn btn-success' onclick="window.open('inputnganh.php','_self')"><i class="bi bi-plus-lg"></i>Thêm mới</button>
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
                    $query = "select * from nganh where tennganh like N'%" . $_GET['s'] . "%'";
                    $sodongdl = tradong($query);
                    $sotrangdl = $sodongdl / $dong;
                    $vtbd = $trang * $dong;
                    $lenhpt = "select * from nganh where tennganh  like N'%" . $_GET['s'] . "%' limit $vtbd, $dong";
                } else {
                    $query = "select * from nganh";
                    $sodongdl = tradong($query);
                    $sotrangdl = $sodongdl / $dong;
                    $vtbd = $trang * $dong;
                    $lenhpt = "select * from nganh limit $vtbd,$dong";
                }
                $list = executeResult($lenhpt);
                $index = 1;
                echo " <table class='table table-bordered  table-hover'>
                    <thead class='thead-dark'>
                        <tr>
                            <th>STT</th>
                            <th>Mã ngành</th>
                            <th>Mã khoa</th>
                            <th>Tên ngành</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>";
                foreach ($list as $cla) {
                    echo '<tr>
                        <td>' . ($index++) . '</td>
                        <td>' . $cla['manganh'] . '</td>
                        <td>' . $cla['makhoa'] . '</td>
                        <td>' . $cla['tennganh'] . '</td>
                        <td><button class="btn btn-warning" onclick=\'window.open("inputnganh.php?id=' . $cla['manganh'] . '","_self")\'><i class="bi bi-brush"></i>Sửa</button></td>
                        <td><button class="btn btn-danger" onclick="deleteqs(\'' . $cla['manganh'] . '\')"><i class="bi bi-trash"></i>Xóa</button></a></td>
                    </tr>';
                }
                echo "</tbody>";
                echo "<table>";
                echo "<ul  class='list-group list-group-horizontal-xl list-page-number'>";
                for ($i = 0; $i <= $sotrangdl; $i++) {
                    $trangchon = $i + 1;
                    echo "<li class='list-group-item page-item'><a  href='nganh.php?page=$i'>$trangchon</a></li>";
                }
                echo "</ul>";
                ?>
                <script type="text/javascript">
                    function deleteqs(manganh) {
                        console.log(manganh)
                        a = confirm('Bạn có muốn xóa ngành này?')
                        if (!a) {
                            return;
                        }
                        $.post('deletenganh.php', {
                                'x': manganh
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