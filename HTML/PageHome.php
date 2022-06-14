<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../CSS/PageHomev2.css" type="text/css">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.6.2/chart.min.js"></script>
    </head>
    <body>
    <?php
    $connect = mysqli_connect("localhost","root","","quanlysinhvien") or die ("Không kết nối được");
    mysqli_query($connect, "set names 'utf8'");
    //dem Khoa
    $sqlkhoa = "select * from khoa";
    $resultkhoa = $connect->query($sqlkhoa);
    if($resultkhoa->num_rows>0){
        $sokhoa=$resultkhoa->num_rows;
    }
    $sqlnganh="select * from nganh";
    $resultnganh=$connect->query($sqlnganh);
    if($resultnganh->num_rows>0){
        $songanh=$resultnganh->num_rows;
    }
    $sqlgiangvien="select * from giangvien";
    $resultgiangvien=$connect->query($sqlgiangvien);
    if($resultgiangvien->num_rows>0){
        $sogiangvien=$resultgiangvien->num_rows;
    }
    $sqllop="select * from lop";
    $resultlop=$connect->query($sqllop);
    if($resultlop->num_rows>0){
        $solop=$resultlop->num_rows;
    }
    $sqlsv="select * from sinhvien";
    $resultsv=$connect->query($sqlsv);
    if($resultsv->num_rows>0){
        $sosv=$resultsv->num_rows;
    }
    $sqlmonhoc="select * from monhocnganh";
    $resultmonhoc=$connect->query($sqlmonhoc);
    if($resultmonhoc->num_rows>0){
        $somonhoc=$resultmonhoc->num_rows;
    }
    $connect->close();
    ?>
        <div class="Header">
            <h1>Chương trình quản lý sinh viên</h1>
            <p>Hệ thống quản lý thông tin và công việc của phòng đào tạo trường Đại Học Quy Nhơn</p>
        </div>
        <form method="post">
        <div class="info">
            <button class="button-33" type="submit" name="ep" role="button">Lưu trữ dữ liệu</button>
            <a target="blank" href="https://www.facebook.com/Ph%C3%B2ng-C%C3%B4ng-t%C3%A1c-ch%C3%ADnh-tr%E1%BB%8B-sinh-vi%C3%AAn-Tr%C6%B0%E1%BB%9Dng-%C4%90%E1%BA%A1i-h%E1%BB%8Dc-Quy-Nh%C6%A1n-810259772662168" class="buble-box button-29">
               <img id="img-bubble-box" src="../IMG/logo.jpg">
            </a>
            <div class="flex">
                <div class="option">
                    <div class="info-data">
                        <div class="data-number"> Có <?php echo $sokhoa;?></div>
                        Khoa
                    </div>
                </div>
                <div class="option">
                    <div class="info-data">
                        <div class="data-number">Có <?php echo $songanh;?></div>
                        Ngành học
                    </div>
                </div>
                <div class="option">
                    <div class="info-data">
                        <div class="data-number">Có <?php echo $somonhoc;?></div>
                        Môn học
                    </div>
                </div>
                <div class="option"><div class="info-data">
                    <div class="data-number">Có <?php echo $sogiangvien ?></div>
                    Giảng viên
                </div></div>
                <div class="option">
                    <div class="info-data">
                        <div class="data-number">Có <?php echo $solop ?></div>
                        Số lớp hiện tại
                    </div>
                </div>
                <div class="option">
                    <div class="info-data">
                        <div class="data-number">Có <?php echo $sosv ?></div>
                        Số sinh viên
                    </div>
                </div>
            </div>
</form>
            <?php
    $connect = mysqli_connect("localhost","root","","quanlysinhvien") or die ("Không kết nối được");
    mysqli_query($connect, "set names 'utf8'");
    $sqldiemA="select * from diem where diemchu ='A' ";
    $resultdiemA=$connect->query($sqldiemA);
    if($resultdiemA->num_rows>0)
        $sodiemA=$resultdiemA->num_rows;
    else
        $sodiemA=0;
    $sqldiemAplus="select * from diem where diemchu = 'A+' ";
    $resultdiemAplus=$connect->query($sqldiemAplus);
    if($resultdiemAplus->num_rows>0)
    $sodiemAplus=$resultdiemAplus->num_rows;
else
    $sodiemAplus=0;
    $sqldiemB="select * from diem where diemchu ='B' ";
    $resultdiemB=$connect->query($sqldiemB);
    if($resultdiemB->num_rows>0)
        $sodiemB=$resultdiemB->num_rows;
    else
        $sodiemB=0;
    $sqldiemBplus="select * from diem where diemchu ='B+' ";
    $resultdiemBplus=$connect->query($sqldiemBplus);
    if($resultdiemBplus->num_rows>0)
        $sodiemBplus=$resultdiemBplus->num_rows;
    else
        $sodiemBplus=0;
    $sqldiemC="select * from diem where diemchu = 'C' ";
    $resultdiemC=$connect->query($sqldiemC);
    if($resultdiemC->num_rows>0)
        $sodiemC=$resultdiemC->num_rows;
    else
        $sodiemC=0;
    $sqldiemCplus="select * from diem where diemchu = 'C+' ";
    $resultdiemCplus=$connect->query($sqldiemCplus);
    if($resultdiemCplus->num_rows>0)
        $sodiemCplus=$resultdiemCplus->num_rows;
    else
        $sodiemCplus=0;
    $sqldiemD="select * from diem where diemchu = 'D' ";
    $resultdiemD=$connect->query($sqldiemD);
    if($resultdiemD->num_rows>0)
        $sodiemD=$resultdiemD->num_rows;
    else
        $sodiemD=0;
    $sqldiemF="select * from diem where diemchu = 'F' ";
    $resultdiemF=$connect->query($sqldiemF);
    if($resultdiemF->num_rows>0)
        $sodiemF=$resultdiemF->num_rows;
    else
        $sodiemF=0;
    $connect->close();
    ?>
            <div class="graph">
                <canvas id="canvasloaisinhvien" class="chart" width="400" height="400">
                </canvas>
    <?php
    $gioi=0;
    $kha=0;
    $trungbinh=0;
    $yeu=0;
        $connect = mysqli_connect("localhost","root","","quanlysinhvien") or die ("Không kết nối được");
		
			mysqli_query($connect, "set names 'utf8'");
			$lenh=  'select masv,round(AVG(dtb),2) as "dtb" from diem group by masv';
		
			$results = mysqli_query($connect, $lenh)or die ("Không thực hiện được");
		
			$kq = mysqli_query($connect, $lenh);
		
		while ($row= mysqli_fetch_array($kq))
        {
            if($row['dtb']>=8)
                $gioi++; 
            else if($row['dtb']>=6.5)
                $kha++;
            else if($row['dtb']>=4.5)
                $trungbinh++;
            else
                $yeu++;
        }
        mysqli_free_result($results);
        //7.đóng kết nối
        mysqli_close($connect);	
    ?>
    
                <canvas id="canvasxeploai" class="chart" width="400" height="400">
                </canvas>
            </div>
           <?php if(isset($_POST['ep'])){
            function backupDatabaseAllTables($dbhost,$dbusername,$dbpassword,$dbname,$tables = '*'){
                $db = new mysqli($dbhost, $dbusername, $dbpassword, $dbname); 
                $db->set_charset("utf8");
                if($tables == '*') { 
                    $tables = array();
                    $result = $db->query("SHOW TABLES");
                    while($row = $result->fetch_row()) { 
                        $tables[] = $row[0];
                    }
                } else { 
                    $tables = is_array($tables)?$tables:explode(',',$tables);
                }
            
                $return = '';
            
                foreach($tables as $table){
                    $result = $db->query("SELECT * FROM $table");
                    $numColumns = $result->field_count;
            
                    /* $return .= "DROP TABLE $table;"; */
                    $result2 = $db->query("SHOW CREATE TABLE $table");
                    $row2 = $result2->fetch_row();
            
                    $return .= "\n\n".$row2[1].";\n\n";
            
                    for($i = 0; $i < $numColumns; $i++) { 
                        while($row = $result->fetch_row()) { 
                            $return .= "INSERT INTO $table VALUES(";
                            for($j=0; $j < $numColumns; $j++) { 
                                $row[$j] = addslashes($row[$j]);
                                $row[$j] = $row[$j];
                                if (isset($row[$j])) { 
                                    $return .= '"'.$row[$j].'"' ;
                                } else { 
                                    $return .= '""';
                                }
                                if ($j < ($numColumns-1)) {
                                    $return.= ',';
                                }
                            }
                            $return .= ");\n";
                        }
                    }
            
                    $return .= "\n\n\n";
                }
            
                $handle = fopen('quanlysinhvien'.'_Export_'.'.sql','w+');
                fwrite($handle,$return);
                fclose($handle);
                echo "Database Export Successfully!";
            }
            
            backupDatabaseAllTables('localhost','root','','quanlysinhvien');
        }
    ?>
        <script type="text/javascript" class="điemsinhvien" >
            //var jsvar = '</?=$var?>';
            var datadiem=['<?=$sodiemAplus?>','<?=$sodiemA?>','<?=$sodiemBplus?>','<?=$sodiemB?>','<?=$sodiemCplus?>','<?=$sodiemC?>','<?=$sodiemD?>','<?=$sodiemF?>'];
            var labeldiem=['Điểm A+','Điểm A','Điểm B+','Điểm B','Điểm C+','Điểm C','Điểm D','Điểm F'];
            var ctx = document.getElementById('canvasloaisinhvien');
            var myChart = new Chart(ctx, {
                            type: 'pie',
                            data: {
                                    labels: labeldiem,
                                     datasets: [{
                                        label: 'Thống kê điểm chữ',
                                        data: datadiem,
                                        backgroundColor: [
                                                    "rgba(255,0,0,0.2)",
                                                    "rgba(255, 99, 132, 0.2)",
                                                    "rgba(0,206,209,0.2)",
                                                    "rgba(54, 162, 235, 0.2)",
                                                    "rgba244,164,96,0.2)",
                                                    "rgba(255, 206, 86, 0.2)",
                                                    "rgba(192,192,192,0.2)",
                                                    "rgba(112,128,144,0.2)"
                                                ]
                                                }],

                                  },
                                  options: {
                                        maintainAspectRatio: false,//để điều chỉnh kích thước theo ý mình
                                        responsive: false,
                                        plugins: {
                                                title: {
                                                    display: true,
                                                    text: 'Thống kê điểm chữ toàn tín chỉ'
                                                        },
                                                    fontSize: 16
                                                }
                                    }
                        
                        });
                        //diem trung binh sinh vien
                        var datadtb=['<?=$gioi?>','<?=$kha?>','<?=$trungbinh?>','<?=$yeu?>'];
            var labeldtb=["Sinh viên giỏi","Sinh viên khá","Sinh viên trung bình","Sinh viên yếu"];
            var ctxdtb = document.getElementById('canvasxeploai');
            var myChartdtb = new Chart(ctxdtb, {
                            type: 'pie',
                            data: {
                                    labels: labeldtb,
                                     datasets: [{
                                        label: 'Thống kê điểm chữ',
                                        data: datadtb,
                                        backgroundColor: [
                                                    "rgba(255,0,0,0.2)",
                                                    "rgba(255, 99, 132, 0.2)",
                                                    "rgba(0,206,209,0.2)",
                                                    "rgba244,164,96,0.2)",
                                                    
                                                ]
                                                }],

                                  },
                                  options: {
                                        maintainAspectRatio: false,//để điều chỉnh kích thước theo ý mình
                                        responsive: false,
                                        plugins: {
                                                title: {
                                                    display: true,
                                                    text: 'Học lực của sinh viên'
                                                        },
                                                    fontSize: 16
                                                }
                                    }
                        
                        });

        </script>
    </body>
   
</html>