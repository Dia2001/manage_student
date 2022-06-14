<?php
require_once('Model\dblop.php');
?>
<?php
$idgk = $machuongtrinh = $makhoa = $mamonhoc = $namhoc = $hocky = $stlt = $stth = $stc = "";
if (!empty($_POST)) {
    $_id = '';
    if (isset($_POST['mcc']) && isset($_POST['mk']) && isset($_POST['mh']) && isset($_POST['nh']) && isset($_POST['hk']) && isset($_POST['stlt']) && isset($_POST['stth']) && isset($_POST['stc'])) {
        $machuongtrinh = $_POST['mcc'];
        $makhoa = $_POST['mk'];
        $mamonhoc = $_POST['mh'];
        $namhoc = $_POST['nh'];
        $hocky = $_POST['hk'];
        $stlt = $_POST['stlt'];
        $stth = $_POST['stth'];
        $stc = $_POST['stc'];
    }
    if (isset($_GET['id'])) {
        $_id = $_GET['id'];
    }
    // An toàn về mặt dữ liệu( lỗi sql incheck sion)
    $machuongtrinh = str_replace('\'', '\\\'', $machuongtrinh);
    $makhoa = str_replace('\'', '\\\'', $makhoa);
    $mamonhoc = str_replace('\'', '\\\'', $mamonhoc);
    $namhoc = str_replace('\'', '\\\'', $namhoc);
    $hocky = str_replace('\'', '\\\'', $hocky);
    $stlt = str_replace('\'', '\\\'', $stlt);
    $stth = str_replace('\'', '\\\'', $stth);
    $stc = str_replace('\'', '\\\'', $stc);
    if ($_id != '') {
        $sql = " update giangkhoa set machuongtrinh='" . $machuongtrinh . "',makhoa='" . $makhoa . "',mamhn='" . $mamonhoc . "',namhoc='" . $namhoc . "',hocky='" . $hocky . "'
    ,stlt='" . $stlt . "',stth='" . $stth . "',sotinchi='" . $stc . "' where id='" . $_id . "'";
    } else {
        $sql =  "insert into giangkhoa(machuongtrinh,makhoa,mamhn,namhoc,hocky,stlt,stth,sotinchi) values('" . $machuongtrinh . "','" . $makhoa . "','" . $mamonhoc . "','" . $namhoc . "'
    ,'" . $hocky . "','" . $stlt . "','" . $stth . "','" . $stc. "')";
    }
    execute($sql);
    header('Location: giangkhoa.php');
    die();
}
$id = '';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "select * from giangkhoa where id='" . $id . "'";
    $classList = executeResult($sql);
    if ($classList != null && count($classList) > 0) {
        $cla = $classList[0];
        $machuongtrinh = $cla['machuongtrinh'];
        $makhoa = $cla['makhoa'];
        $mamonhoc = $cla['mamhn'];
        $namhoc = $cla['namhoc'];
        $hocky = $cla['hocky'];
        $stlt = $cla['stlt'];
        $stth = $cla['stth'];
        $stc = $cla['sotinchi'];
    } else {
        $id = '';
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Giảng Khoa</title>
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">
    <style>
        * {
            font-family: sans-serif;
        }

        .kl {
            display: flex;
            align-items: center;
            justify-content: center;

        }

        .form-group {
            display: flex;
            margin: 14px;
            font-size: 20px;
        }

        .form-group input {

            font-size: 18px;
        }

        .text-center button {
            padding-left: 2rem;
            padding-right: 2rem;
            font-size: 20px;
        }

        .abc {
            margin-left: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h2 class="text-center">Giảng khoa<h2>
            </div>
            <div class="card-body">
                <form method="POST">
                    <div class="form-group">
                        <label for="mch" class="col-sm-2 col-form-label"><b>Mã chương trình:</b></label>
                        <?php
                        $sql = "select *from chuongtrinh";
                        $list = executeResult($sql);
                        echo "<select name='mcc' class='form-select' required>";
                        foreach ($list as $row) {
                            if ($machuongtrinh == $row['machuongtrinh']) {
                                echo "<option selected='selected' value= " . $row['machuongtrinh'] . ">" . $row['tenchuongtrinh'] . "</option>";
                            } else {
                                echo "<option value= " . $row['machuongtrinh'] . ">" . $row['tenchuongtrinh'] . "</option>";
                            }
                        }
                        echo "</select>";
                        ?>
                    </div>
                    <div class="form-group">
                        <label for="mlv" class="col-sm-2 col-form-label"><b>Mã khoa:</b></label>
                        <?php
                        $sql = "select *from khoa";
                        $list = executeResult($sql);
                        echo "<select name='mk' class='form-select' required>";
                        foreach ($list as $row) {
                            if ($makhoa == $row['makhoa']) {
                                echo "<option selected='selected' value= " . $row['makhoa'] . ">" . $row['tenkhoa'] . "</option>";
                            } else {
                                echo "<option value= " . $row['makhoa'] . ">" . $row['tenkhoa'] . "</option>";
                            }
                        }
                        echo "</select>";
                        ?>
                    </div>
                    <div class="form-group">
                        <label for="mlv" class="col-sm-2 col-form-label"><b>Mã môn học:</b></label>
                        <?php
                        $sql = "select *from monhocnganh";
                        $list = executeResult($sql);
                        echo "<select name='mh' class='form-select' required>";
                        foreach ($list as $row) {
                            if ($mamonhoc == $row['mamhn']) {
                                echo "<option selected='selected' value= " . $row['mamhn'] . ">" . $row['tenmhn'] . "</option>";
                            } else {
                                echo "<option value= " . $row['mamhn'] . ">" . $row['tenmhn'] . "</option>";
                            }
                        }
                        echo "</select>";
                        ?>
                    </div>
                    <div class="form-group">
                        <label for="mlv" class="col-sm-2 col-form-label"><b>Năm học:</b></label>
                        <input type="text" class="form-control" name="nh" value="<?= $namhoc ?>">
                    </div>
                    <div class="form-group">
                        <label for="mlv" class="col-sm-2 col-form-label"><b>Học kỳ:</b></label>
                        <input type="text" class="form-control" name="hk" value="<?= $hocky ?>">
                    </div>
                    <div class="form-group">
                        <label for="mlv" class="col-sm-2 col-form-label"><b>Số tiết lý thyết:</b></label>
                        <input type="text" class="form-control" name="stlt" value="<?= $stlt ?>">
                    </div>
                    <div class="form-group">
                        <label for="mlv" class="col-sm-2 col-form-label"><b>Số tiết thực hành:</b></label>
                        <input type="text" class="form-control" name="stth" value="<?= $stth ?>">
                    </div>
                    <div class="form-group">
                        <label for="mlv" class="col-sm-2 col-form-label"><b>Số tín chỉ</b></label>
                        <input type="text" class="form-control" name="stc" value="<?= $stc ?>">
                    </div>
                    <div class="text-center">
                        <button class="btn btn-success btn-sub"><i class="bi bi-check-circle-fill"></i><span class="abc">Lưu</span></button>
                    </div>
                </form>

            </div>

        </div>



    </div>

</body>

</html>