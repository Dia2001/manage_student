<?php
    // insert update delete
    function execute($sql){
        $connect = mysqli_connect("localhost","root","","quanlysinhvien") or die ("Không kết nối được");
        mysqli_query($connect, "set names 'utf8'");
        mysqli_query($connect, $sql) or die ("Không thực hiện được");
         mysqli_close($connect);	
    };
    function tradong($sql){
        $connect = mysqli_connect("localhost","root","","quanlysinhvien") or die ("Không kết nối được");
        mysqli_query($connect, "set names 'utf8'");
         $kq=mysqli_query($connect, $sql) or die ("Không thực hiện được");
         $dong=mysqli_num_rows($kq);
         mysqli_close($connect);	
         return $dong;
    };
    // sử dụng để trả về kết quản select
    function executeResult($sql){
        $connect = mysqli_connect("localhost","root","","quanlysinhvien") or die ("Không kết nối được");
        mysqli_query($connect, "set names 'utf8'");
        $resultset=mysqli_query($connect, $sql);
        $list=[];
        while($rows = mysqli_fetch_array($resultset,1)){
            $list[]=$rows;
        }
        mysqli_close($connect);	
        return $list;
    };
?>
