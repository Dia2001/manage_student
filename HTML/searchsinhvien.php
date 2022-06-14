<?php
    if(isset($_POST['nd']))
    {
        $b = $_POST['nd'];     
        $connect = mysqli_connect("localhost","root","","quanlysinhvien") or die ("Không kết nối được");
        mysqli_query($connect, "set names 'utf8'");
        $sql= "select *from sinhvien where masv like'%".$b."%'";
        //$results = $hihi;
        $list= [];
         $results= mysqli_query($connect, $sql) or die ("không thực hiện được");
         while($row=mysqli_fetch_array($results,1))
         {
            header('Content-type: application/json');
            $list[] = $row;
        }
        echo json_encode($list);
        
        // echo ($results);
        //$arr = array ('a'=>1,'b'=>2,'c'=>3,'d'=>4,'e'=>5);
          
        mysqli_close($connect);
    }
?>