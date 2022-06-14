<?php
session_start();
include_once('Classes/PHPExcel.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <link rel="stylesheet" href="../CSS/pagesinhviencss.css" type="text/css" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body>
        <?php
            $masv = $_SESSION['usr'];
            $sql = "select * from sinhvien where masv='".$masv."'";
            $connect = mysqli_connect("localhost", "root", "", "quanlysinhvien");
            mysqli_query($connect, "set names 'utf8'")or die ("Không thực hiện được");
            $result = mysqli_query($connect, $sql);
            $row=mysqli_fetch_array($result);       
            ?>
        <div class="container rounded bg-white mt-5 mb-5">
            <div class="row">
                <div class="col-md-3 border-right">
                    <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                    <?php
                            echo "<img src='IMG/". $row['hinhanh']."' alt='Admin' class='rounded-circle' width='150' height='150' >";
                           // <input type="file" name="file" class="btn btn-success choosefile"> 
                           ?>
                      
                        <?php
                        echo "<span class='font-weight-bold'>". $row['hodemsv']."". $row['tensv']."</span>"
                        ?>
                         <?php
                        echo "<span class='text-black-50'>". $row['malop']."</span><span> </span>"
                        ?>
                    </div>
                </div>
                <div class="col-md-5 border-right">
                    <div class="p-3 py-5">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="text-right">Thông tin sinh viên</h4>
                        </div>
                        <div class="row mt-2">
                            <?php
                            echo "<div class='col-md-6'>Tên sinh viên:". $row['hodemsv']."". $row['tensv']."</div>";
                            echo "<div class='col-md-6'>mã sinh viên: ". $row['masv']."</div>";
                            ?>
                        </div>
                        <div class="row mt-3">
                            <?php
                            echo "<div class='col-md-12 paddingrow'>Ngày sinh: ". $row['ngaysinh']."</div>";
                            echo "<div class='col-md-12 paddingrow'>Dân tộc: ". $row['dantoc']."</div>";
                            echo " <div class='col-md-12 paddingrow'>CMND: ". $row['cmnd']."</div>";
                            ?>
                        </div>
                        <div class="row mt-3">
                            <?php
                            echo"<div class='col-md-12 paddingrow'>Số điện thoại liên lạc:". $row['sdt']." </div>";
                            echo "<div class='col-md-12 paddingrow'>Địa chỉ Email:". $row['email']."</div>";
                            ?>
                        </div>
                        <form method="post">
                        <div class="mt-5 text-center"><button class="btn btn-primary profile-button" name="btn" type="submit">Xuất thông tin</button></div>
</form>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="row mt-3">
                        <br><br><br>
                        <h4 class="text-right">Thông tin học tập</h4>
                        <?php
                            $lop=$row['malop'];
                            $sql = "select * from lop where malop='".$lop."'";
                            $connect = mysqli_connect("localhost", "root", "", "quanlysinhvien");
                            mysqli_query($connect, "set names 'utf8'")or die ("Không thực hiện được");
                            $result = mysqli_query($connect, $sql);
                            $row1=mysqli_fetch_array($result);
                            echo "<div class='col-md-12 paddingrow'>Lớp: ". $row1['tenlop']."</div>"
                        ?>
                           <?php
                            $chucvu=$row['machucvu'];
                            $sql = "select * from chucvu where machucvu='".$chucvu."'";
                            $connect = mysqli_connect("localhost", "root", "", "quanlysinhvien");
                            mysqli_query($connect, "set names 'utf8'")or die ("Không thực hiện được");
                            $result = mysqli_query($connect, $sql);
                            $row2=mysqli_fetch_array($result);
                            echo "<div class='col-md-12 paddingrow'>Chức vụ: ". $row2['tenchucvu']."</div>"
                        ?>
                          <?php
                            $tinhtrang=$row['matinhtranghoc'];
                            $sql = "select * from tinhtranghoc where matinhtranghoc='".$tinhtrang."'";
                            $connect = mysqli_connect("localhost", "root", "", "quanlysinhvien");
                            mysqli_query($connect, "set names 'utf8'")or die ("Không thực hiện được");
                            $result = mysqli_query($connect, $sql);
                            $row3=mysqli_fetch_array($result);
                            echo "<div class='col-md-12 paddingrow'>Tình trạng: ". $row3['tentinhtranghoc']."</div>"
                        ?>
                        </div>
                </div>
                <?php
                if (isset($_POST['btn'])) {
                    $masv = $_SESSION['usr'];
                    $connect = mysqli_connect("localhost", "root", "", "quanlysinhvien");
                    mysqli_query($connect, "set names 'utf8'");
                    $objExcel = new PHPExcel;
                    $objExcel->setActiveSheetIndex(0);
                    $sheet = $objExcel->getActiveSheet()->setTitle('2007');
                    $rowCount = 1;
                    $sheet->setCellValue('A' . $rowCount, 'masv');
                    $sheet->setCellValue('B' . $rowCount, 'hodemsv');
                    $sheet->setCellValue('C' . $rowCount, 'tensv');
                    $sheet->setCellValue('D' . $rowCount, 'matkhau');
                    $sheet->setCellValue('E' . $rowCount, 'hinhanh');
                    $sheet->setCellValue('F' . $rowCount, 'ngaysinh');
                    $sheet->setCellValue('G' . $rowCount, 'gioitinh');
                    $sheet->setCellValue('H' . $rowCount, 'dantoc');
                    $sheet->setCellValue('I' . $rowCount, 'cmnd');
                    $sheet->setCellValue('J' . $rowCount, 'tongiao');
                    $sheet->setCellValue('K' . $rowCount, 'maquequan');
                    $sheet->setCellValue('L' . $rowCount, 'sdt');
                    $sheet->setCellValue('M' . $rowCount, 'email');
                    $sheet->setCellValue('N' . $rowCount, 'machucvu');
                    $sheet->setCellValue('O' . $rowCount, 'malop');
                    $sheet->setCellValue('P' . $rowCount, 'matinhtranghoc');
                    $sql = "SELECT * FROM sinhvien where masv=$masv";
                    $result = mysqli_query($connect, $sql);
                    while ($row = mysqli_fetch_array($result)) {
                        $rowCount++;
                        $sheet->setCellValue('A' . $rowCount, $row['masv']);
                        $sheet->setCellValue('B' . $rowCount, $row['hodemsv']);
                        $sheet->setCellValue('C' . $rowCount, $row['tensv']);
                        $sheet->setCellValue('D' . $rowCount, $row['matkhau']);
                        $sheet->setCellValue('E' . $rowCount, $row['hinhanh']);
                        $sheet->setCellValue('F' . $rowCount, $row['ngaysinh']);
                        $sheet->setCellValue('G' . $rowCount, $row['gioitinh']);
                        $sheet->setCellValue('H' . $rowCount, $row['dantoc']);
                        $sheet->setCellValue('I' . $rowCount, $row['cmnd']);
                        $sheet->setCellValue('J' . $rowCount, $row['tongiao']);
                        $sheet->setCellValue('K' . $rowCount, $row['maquequan']);
                        $sheet->setCellValue('L' . $rowCount, $row['sdt']);
                        $sheet->setCellValue('M' . $rowCount, $row['email']);
                        $sheet->setCellValue('N' . $rowCount, $row['machucvu']);
                        $sheet->setCellValue('O' . $rowCount, $row['malop']);
                        $sheet->setCellValue('P' . $rowCount, $row['matinhtranghoc']);
                    }
                    $objWriter = new PHPExcel_Writer_Excel2007($objExcel);
                    $filename = 'thongtinsinhvien.xlsx';
                    $objWriter->save($filename);
                    header('Content-Disposition: attachment; filename="' . $filename . '"');
                    header('Content-Type: application/vnd.openxmlformatsofficedocument.spreadsheetml.sheet');
                    header('Content-Length:' . filesize($filename));
                    header('Content-Transfer-Encoding: binary');
                    header('Cache-Control: must-revalidate');
                    header('Pragma:no-cache');
                    readfile($filename);
                    return;
                }
                ?>
            </div>
        </div>
        </div>
        </div>
    </body>
</html>