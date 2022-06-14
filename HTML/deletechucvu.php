<?php
    $connect=mysqli_connect("localhost","root","","quanlysinhvien");
    if(!$connect)
    {
        die("Connection failed: ".mysqli_connect_error());
    }
    else
    {
        $id=$_GET['id'];
        $del=mysqli_query($connect,"DELETE FROM chucvu WHERE machucvu='$id'");
        if($del)
        {
            mysqli_close($connect);
           header("Location:chucvu.php");
            exit;
        }
        else
        {
            echo "Error deleting record";
        }
    }
?>