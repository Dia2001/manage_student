<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <!--Thư viên jquery-->
        <meta charset="utf-8">
        <!--icon is installed in the local file-->
        <link href="../ICON/fontawesome-free-5.15.4-web/css/all.css" rel="stylesheet"> 
        <title>Hệ thống đào tạo ĐH Quy Nhơn</title>
        <!-- add icon link -->
        <link rel = "icon" href = "../IMG/logo.jpg" 
        type = "image/x-icon">
        <link href="../CSS/loadingpagetrangchu.css" type="text/css" rel="stylesheet">
        <link href="../CSS/menuicon.css" type="text/css" rel="stylesheet">
        <link href="../CSS/Areasinhvien.Congsinhviencss.css" type="text/css" rel="stylesheet">
        <script>
            //code animation vertical menu of class leftheader
            $(document).ready(function(){
                $(".container").click(function(){
                    $(".leftheader").toggleClass("showLeftHeader");
                    //change menu animation
                    $(".Navigation").toggleClass("showMenu");
                    //change main form
                    $(".mainform").toggleClass("marginleftform");
                });
            });
        </script>
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
    <body onload="myFunction()">
        <div class="header">
            <div class="leftheader">
            <a href="#" class="titlequanly"><i class="fas fa-user-graduate"></i>Cổng sinh viên</a>
            <div class="container" onclick="toggleMenu(this)">
                <div class="bar1"></div>
                <div class="bar2"></div>
                <div class="bar3"></div>
              </div>
            </div>
            <?php
        $masv = $_SESSION['usr'];
        $sql = "select * from sinhvien where masv='" . $masv. "'";
        $connect = mysqli_connect("localhost", "root", "", "quanlysinhvien");
        mysqli_query($connect, "set names 'utf8'") or die("Không thực hiện được");
        $result = mysqli_query($connect, $sql);
        $row = mysqli_fetch_array($result);
        echo "<a href='#' id = 'hovericon' onclick='togglelogindropdown()' ><img src='IMG/" . $row['hinhanh'] . "' alt='User Avatar'class='rounded-circle'  height='50' width='50'></a>";
        // echo "<img src='IMG/". $row['hinhanh']."' alt='User Avatar'class='rounded-circle'  height='50' width='50'>";
        mysqli_close($connect);
        //<a href="#" id = "hovericon" onclick="togglelogindropdown()" ><i class="fas fa-chevron-circle-down"></i>đăng xuất</a>
        ?>
           <!--Ý tưởng là tạo 1 cái downlist ở đây vầ tên hiển thị là tên của admin thay vì người dùng-->
        </div>

        <form action="<?php echo $_SERVER['PHP_SELF']; ?>"  method="post" >
        <div class="section">
            <div class="Logindropdown" id="dropdown1">
                <?php
                $masv = $_SESSION['usr'];
                $sql = "select * from sinhvien where masv='" . $masv . "'";
                $connect = mysqli_connect("localhost", "root", "", "quanlysinhvien");
                mysqli_query($connect, "set names 'utf8'") or die("Không thực hiện được");
                $result = mysqli_query($connect, $sql);
                $row = mysqli_fetch_array($result);
                echo "<a href='#'><img src='IMG/" . $row['hinhanh'] . "' alt='User Avatar'class='rounded-circle'  height='70' width='70'></a>";
                echo "<a href='#'> " . $row['hodemsv'] . "" . $row['tensv'] . "</a>";
                echo "<a href='#'> " . $row['email'] . "</a>";
                mysqli_close($connect);
                ?>
                <a href="http://localhost/webquanlysinhvien/html/profile-SinhVien.php"><i class="fas fa-info"></i>Thông tin</a>
                <a href="#"><i class="fas fa-cog"></i>Cài đặt</a>
                <a href="#"><i class="fas fa-exchange-alt"></i>Chuyển khoản</a>
                <button type="submit" name="btn"><i class="fas fa-sign-out-alt"></i>Đăng xuất</button>
            </div>
            </form>
    <?php
    if(isset($_POST['btn'])){
    session_destroy();
    header('Location:dangnhap.php');
    }
    ?>
            <div class="Navigation">
                <div class="submenu">
                   
                    <a class="listmenu" onclick="opensinhvien(this)"><i class="fas fa-plus"></i><i class="fas fa-minus"></i>Quản trị sinh viên</a>
                        <div class="sublistmenu" id="sub0">
                            <a class="button-28" onclick="opensv()"><i class="fas fa-user-graduate"></i>Sinh viên</a>
                            <a class="button-28" onclick="opendiem()"><i class="fas fa-user-edit"></i>Điểm số</a>
                            <!-- <a class="button-28" onclick="openchucvu()"><i class="fas fa-user-md"></i>Chức vụ</a> -->
                            <!-- <a class="button-28" onclick="openquequan()"><i class="fas fa-home"></i>quê quán</a> -->
                            <a class="button-28" onclick="openlop()"><i class="fas fa-user-friends"></i>Lớp</a>
                            <!--<a class="listmenu" onclick="opentinhtrang()"><i class="fas fa-exclamation-triangle"></i>tình trạng học</a>-->
                        </div>
                    <a class="listmenu" onclick="opendaotao(this)"><i class="fas fa-plus"></i><i class="fas fa-minus"></i>Phòng đào tạo</a>
                    <div class="sublistmenu" id="sub1">
                        <a class="button-28" onclick="openKhoa()"><i class="fas fa-box"></i>Khoa</a>
                        <!-- <a class="button-28" onclick="openchuongtrinh()"><i class="fas fa-tv"></i>Chương trình</a>
                        <a class="button-28" onclick="openkhoahoc()"><i class="fas fa-archive"></i>Khóa học</a> -->
                        <a class="button-28" onclick="opennganhhoc()"><i class="fas fa-book"></i>Môn ngành học</a>
                        <a class="button-28" onclick="opennganh()"><i class="fas fa-folder-open"></i>Ngành</a>
                    </div>
                    <!-- <a class="listmenu" onclick="openthanhvien(this)"><i class="fas fa-plus"></i><i class="fas fa-minus"></i>Quản trị thành viên</a>
                    <div class="sublistmenu" id="sub2">
                        <a class="button-28" onclick="opentv()"><i class="fas fa-users"></i>Thành viên quản trị</a>
                        <a class="button-28" onclick="opengiangvien()"><i class="fas fa-user"></i>Giảng viên</a>
                        <a class="button-28" onclick="opengiangkhoa()"><i class="far fa-user"></i>Giảng khoa</a>
                    </div> -->
                </div>
                
            </div><div id="loader"></div>
            <div style="display:none;" id="myDiv" class="animate-bottom">
                <div class="mainform">
                    <div class="contentQuery" id="contentPageCurrent"> <object type="text/html" data="http://localhost/webquanlysinhvien/HTML/Areasinhvien.PageHome.php" width=100% height=100%></object></div>
                </div>
            </div>
        </div>
        <script>
            function toggleMenu(x) {
              x.classList.toggle("change");
            }
            var myVar;
            
            function myFunction() {
                alert("Đăng nhập thành công!");
                myVar = setTimeout(showPage, 1500);
            }
            
            function showPage() {
              document.getElementById("loader").style.display = "none";
              document.getElementById("myDiv").style.display = "block";
            }
            //event content menu change
            function opensv(){//sự kiện load trang khoa
                document.getElementById("contentPageCurrent").innerHTML='<object type="text/html" data="http://localhost/webquanlysinhvien/HTML/Areasinhvien.PageHome.php" width=100% height=100%></object>';
           }
           function opendiem(){//sự kiện load trang khoa
            document.getElementById("contentPageCurrent").innerHTML='<object type="text/html" data="http://localhost/webquanlysinhvien/HTML/Areasinhvien.diem.php" width=100% height=100%></object>';
         }
            function openKhoa(){//sự kiện load trang khoa
                 document.getElementById("contentPageCurrent").innerHTML='<object type="text/html" data="http://localhost/webquanlysinhvien/HTML/Areasinhvien.khoa.php" width=100% height=100%></object>';
            }
            function openlop(){//sự kiện load trang lớp
                 document.getElementById("contentPageCurrent").innerHTML='<object type="text/html" data="http://localhost/webquanlysinhvien/HTML/Areasinhvien.lop.php" width=100% height=100%></object>';
            }
            function opennganhhoc(){//load
							
                document.getElementById("contentPageCurrent").innerHTML='<object type="text/html" data="http://localhost/webquanlysinhvien/HTML/Areasinhvien.monhocnganh.php" width=100% height=100%></object>';
           }
           function opennganh(){//load
							
            document.getElementById("contentPageCurrent").innerHTML='<object type="text/html" data="http://localhost/webquanlysinhvien/HTML/Areasinhvien.nganh.php" width=100% height=100%></object>';
           }
        
           
            //chỉnh xổ sub list menu
            function opensinhvien(x){
                document.getElementById("sub0").classList.toggle("changesublistmenu");
                x.childNodes[0].classList.toggle("changeplus");
                x.childNodes[1].classList.toggle("changeminus");
            }
            function opendaotao(x){
                document.getElementById("sub1").classList.toggle("changesublistmenu");
                x.childNodes[0].classList.toggle("changeplus");
                x.childNodes[1].classList.toggle("changeminus");
            }
            function openthanhvien(x){
                document.getElementById("sub2").classList.toggle("changesublistmenu");
                x.childNodes[0].classList.toggle("changeplus");
                x.childNodes[1].classList.toggle("changeminus");
            }
            function togglelogindropdown(){
                //ẩn và hiện
                document.getElementById("dropdown1").classList.toggle("changdropdown");
            }
            </script>
    </body>
</html>