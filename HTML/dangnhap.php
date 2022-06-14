<?php
    session_start();
    ob_start();
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../CSS/slideimg.css" text="text/css">
    <link rel="stylesheet" href="../CSS/loadingpage.css" type="text/css">
    <link rel="stylesheet" href="../CSS/dangnhap2.css" type="text/css">
    <meta charset="UTF-8" />
    <title>Cổng sinh viên Đại Học Quy Nhơn</title>
</head>

<body onload="myFunction()" style="margin: 0;">
    <div id="loader"></div>
    <div style="display:none;" id="myDiv" class="animate-bottom">
        <div class="Header">
            <a href="#"><img src="../IMG/logo.jpg"></a>
            <a href="#">Đại Học Quy Nhơn</a>
            <a href="#" style="padding-top: 25px;margin-left: auto;margin-right: 35px;font-size: 21px;">trợ giúp</a>
            <!--chỉnh về bên phải-->
        </div>
        <div class="row">
            <div class="col1">
                <div class="slider">
                    <div class="slides">
                        <!--radio buttons start-->
                        <input type="radio" name="radio-btn" id="radio1">
                        <input type="radio" name="radio-btn" id="radio2">
                        <input type="radio" name="radio-btn" id="radio3">
                        <input type="radio" name="radio-btn" id="radio4">
                        <!--radio buttons end-->
                        <!--slide images start-->
                        <div class="slide first">
                            <img src="../IMG/dai-hoc-quy-nhon.jpg" alt="">
                        </div>
                        <div class="slide">
                            <img src="../IMG/dh-quy-nhon.jpg" alt="">
                        </div>
                        <div class="slide">
                            <img src="../IMG/dai-hoc-quy-nhon-2.jpg" alt="">
                        </div>
                        <div class="slide">
                            <img src="../IMG/chuong-trinh-gan-ket-pnj-va-sinh-vien-ve-voi-truong-dai-hoc-quy-nhon-01.jpg" alt="">
                        </div>
                        <!--slide images end-->
                        <!--automatic navigation start-->
                        <div class="navigation-auto">
                            <div class="auto-btn1"></div>
                            <div class="auto-btn2"></div>
                            <div class="auto-btn3"></div>
                            <div class="auto-btn4"></div>
                        </div>
                        <!--automatic navigation end-->
                    </div>
                    <!--manual navigation start-->
                    <div class="navigation-manual">
                        <label for="radio1" class="manual-btn"></label>
                        <label for="radio2" class="manual-btn"></label>
                        <label for="radio3" class="manual-btn"></label>
                        <label for="radio4" class="manual-btn"></label>
                    </div>
                    <!--manual navigation end-->
                </div>
            </div>
            <div class="col2">
                <form class="formlogin" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                    <img src="../IMG/logo.jpg" style="width: 81px;height: 81px;">
                    <h3 style="margin-top: 45px;margin-bottom: 25px;">Cổng thông tin sinh viên</h3>
                    <p><input type="text" value="<?php if(isset($_COOKIE['user'])) echo $_COOKIE['user'] ?>" class="username" placeholder="Tên đăng nhập" name="tdn"></p>
                    <p><input type="password" value="<?php if(isset($_COOKIE['pass'])) echo $_COOKIE['pass'] ?>" class="password" placeholder="Mật khẩu" name="mk"></p>
                    <input type="checkbox" name="name" value="<?php if(isset($_COOKIE['user'])) echo 'checked' ?>" style="width: 20px;height:20px;"><label>Nhớ nhật khẩu</label>
                    <input type="submit"  style="margin-top: 25px;" class="submit" value="Đăng nhập"><br>
                    <!--<input type="submit"  class="submitbyGmail" value="Đăng nhập bằng Gmail">-->
                </form>
            </div>
        </div>
    </div>
    <?php
    if (isset($_POST['tdn']) && isset($_POST['mk'])) {
        $ten = $_POST["tdn"];
        $matkhaudn = $_POST['mk'];
        $connect = mysqli_connect("localhost", "root", "", "quanlysinhvien") or die("Không kết nối được");
        mysqli_query($connect, "set names 'utf8'");
        $sql1 = "select * from sinhvien where masv='" .  $ten . "'";
        $sql2 = "select * from nguoidung where tendangnhap='" .   $ten . "' ";
        $sql3 = "select * from giangvien where magiangvien='" .   $ten . "' ";
        $kq1 = mysqli_query($connect, $sql1);
        $kq2 = mysqli_query($connect, $sql2);
        $kq3 = mysqli_query($connect, $sql3);
        $kq4 = mysqli_query($connect, $sql1);
        if (!($row1 = mysqli_fetch_array($kq1)) && !($row2 = mysqli_fetch_array($kq2))) {
            if ($row3 = mysqli_fetch_array($kq3)) {
                if ($row3['matkhau'] == $matkhaudn) {
                    $_SESSION['usr'] = $ten;
                    if (isset($_POST['name'])){
                        setcookie('user',$ten,time()+3600,'/','',0);
                        setcookie('pass',$matkhaudn,time()+3600,'/','',0);
                    }
                    // trang giảng viên
                    header("Location: Areagiangvien.quanlysinhvien.php");
                } else {
                    echo "Tên đăng nhập hoặc mật khẩu không đúng";
                }
            } else {
                echo "Tên đăng nhập hoặc mật khẩu không đúng";
            }
        } else {
            if (!($row1 = mysqli_fetch_array($kq4)) && !($row3 = mysqli_fetch_array($kq3))) {
                if ($matkhaudn != $row2['matkhau']) {
                    echo "Tên đăng nhập hoặc mật khẩu không đúng ";
                } else {
                    $_SESSION['usr'] = $ten;
                    if (isset($_POST['name'])){
                        setcookie('user',$ten,time()+3600,'/','',0);
                        setcookie('pass',$matkhaudn,time()+3600,'/','',0);
                    }
                    // trang Admin
                    header("Location: trangchu.php");
                }
            } else {
                if ($matkhaudn != $row1['matkhau']) {
                    echo "Tên đăng nhập hoặc mật khẩu không đúng";
                } else {
                    if (isset($_POST['name'])){
                        setcookie('user',$ten,time()+3600,'/','',0);
                        setcookie('pass',$matkhaudn,time()+3600,'/','',0);
                    }
                    $_SESSION['usr'] = $ten;
                    // trang sinh viên
                    header("Location:Areasinhvien.Congsinhvien.php");
                }
            }
        }
        mysqli_close($connect);
    }
    ?>
    <script>
        var myVar;

        function myFunction() {
            myVar = setTimeout(showPage, 1500);
        }

        function showPage() {
            document.getElementById("loader").style.display = "none";
            document.getElementById("myDiv").style.display = "block";
        }
        //CHỉnh slide img
        var counter = 1;
        setInterval(function() {
            document.getElementById('radio' + counter).checked = true;
            counter++;
            if (counter > 4) {
                counter = 1;
            }
        }, 5000);
    </script>
</body>
</html>