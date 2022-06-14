<?php
require_once('Model\dblop.php');
include_once('Classes/PHPExcel.php');
session_start();
ob_start();
?>
<html>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="./CSS/main.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </link>
    <title>Sinh viên</title>
    <style>
        html,
        body {
            height: 100%;
            margin: 0px;
            padding: 0px;
            background-color: #f8f9fd
        }

        .table-container {
            display: block;
            width: 95%;
            margin-left: auto;
            margin-right: auto;
        }

        .Headertable {
            font-size: 72px;
            font-weight: bold;
            height: 180px;
            text-align: center;
            padding: 12px;
            background-color: #e0e2df;
            border-radius: 6px;
            margin: 12px 0px;
        }

        .Tablesinhvien {
            width: 100%;
        }

        #dulieusinhvien {
            width: 100%;
            border-collapse: collapse;
            border-radius: 3px;
            box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
            transition: box-shadow 0.2s ease-in-out;
        }

        .dulieusinhvien:hover {
            box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;
        }

        .dulieusinhvien tr {
            background-color: #ffffff;
            padding: 12px 18px;
            height: 90px;
            text-align: center;
            font-size: 18px;
            cursor: pointer;
        }

        .dulieusinhvien tr img {
            width: 81px;
            height: 81px;
            border-radius: 50%;
            margin: 12px;
        }

        .dulieusinhvien td {
            padding-bottom: 12px;
        }

        .dulieusinhvien tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .dulieusinhvien tr:hover {
            background-color: #ddd;
        }

        .thaotacsinhvien {
            height: 90px;
            background-color: #ffffff;
            margin-bottom: 27px;
            overflow: auto;
            position: relative;
        }

        .thaotacsinhvien .searchsinhvien input {
            padding: 12px;
            margin-left: 72px;
            width: 120px;
            margin-right: 21px;
            width: 240px;
        }

        /*button search*/
        /* CSS */
        .button-6 {
            align-items: center;
            background-color: #FFFFFF;
            border: 1px solid rgba(0, 0, 0, 0.1);
            border-radius: .25rem;
            box-shadow: rgba(0, 0, 0, 0.02) 0 1px 3px 0;
            box-sizing: border-box;
            color: rgba(0, 0, 0, 0.85);
            cursor: pointer;
            display: inline-flex;
            font-family: system-ui, -apple-system, system-ui, "Helvetica Neue", Helvetica, Arial, sans-serif;
            font-size: 16px;
            font-weight: 600;
            justify-content: center;
            line-height: 1.25;
            margin-right: 21px;
            min-height: 3rem;
            padding: calc(.875rem - 1px) calc(1.5rem - 1px);
            position: relative;
            text-decoration: none;
            transition: all 250ms;
            user-select: none;
            -webkit-user-select: none;
            touch-action: manipulation;
            vertical-align: baseline;
            width: auto;
        }

        .button-6:hover,
        .button-6:focus {
            border-color: rgba(0, 0, 0, 0.15);
            box-shadow: rgba(0, 0, 0, 0.1) 0 4px 12px;
            color: rgba(0, 0, 0, 0.65);
        }

        .button-6:hover {
            transform: translateY(-1px);
        }

        .button-6:active {
            background-color: #F0F0F1;
            border-color: rgba(0, 0, 0, 0.15);
            box-shadow: rgba(0, 0, 0, 0.06) 0 2px 4px;
            color: rgba(0, 0, 0, 0.65);
            transform: translateY(0);
        }

        .choosefile {
            margin-left: 27px;
        }

        .import {
            margin-left: 54px;
            width: 120px;
        }

        /*end search*/
        /*button xuat*/
        /* CSS */
        .button-3 {
            appearance: none;
            background-color: #2ea44f;
            border: 1px solid rgba(27, 31, 35, .15);
            border-radius: 6px;
            box-shadow: rgba(27, 31, 35, .1) 0 1px 0;
            box-sizing: border-box;
            color: #fff;
            cursor: pointer;
            display: inline-block;
            font-family: -apple-system, system-ui, "Segoe UI", Helvetica, Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji";
            font-size: 14px;
            font-weight: 600;
            line-height: 20px;
            padding: 14px 16px;
            position: relative;
            text-align: center;
            text-decoration: none;
            user-select: none;
            -webkit-user-select: none;
            touch-action: manipulation;
            vertical-align: middle;
            white-space: nowrap;
        }

        .button-3:focus:not(:focus-visible):not(.focus-visible) {
            box-shadow: none;
            outline: none;
        }

        .button-3:hover {
            background-color: #2c974b;
        }

        .button-3:focus {
            box-shadow: rgba(46, 164, 79, .4) 0 0 0 3px;
            outline: none;
        }

        .button-3:disabled {
            background-color: #94d3a2;
            border-color: rgba(27, 31, 35, .1);
            color: rgba(255, 255, 255, .8);
            cursor: default;
        }

        .button-3:active {
            background-color: #298e46;
            box-shadow: rgba(20, 70, 32, .2) 0 1px 0 inset;
        }

        /*end xuat*/
        /*button them*/

        /* CSS */
        .button-9 {
            appearance: button;
            backface-visibility: hidden;
            background-color: #405cf5;
            border-radius: 6px;
            border-width: 0;
            box-shadow: rgba(50, 50, 93, .1) 0 0 0 1px inset, rgba(50, 50, 93, .1) 0 2px 5px 0, rgba(0, 0, 0, .07) 0 1px 1px 0;
            box-sizing: border-box;
            color: #fff;
            cursor: pointer;
            font-family: -apple-system, system-ui, "Segoe UI", Roboto, "Helvetica Neue", Ubuntu, sans-serif;
            font-size: 21px;
            height: 44px;
            line-height: 1.15;
            margin: 12px 0 0;
            outline: none;
            overflow: hidden;
            padding: 0 25px;
            position: absolute;
            right: 45px;
            top: 195px;
            text-align: center;
            text-transform: none;
            transform: translateZ(0);
            transition: all .2s, box-shadow .08s ease-in;
            user-select: none;
            -webkit-user-select: none;
            touch-action: manipulation;

        }

        .button-9:disabled {
            cursor: default;
        }

        .button-9:focus {
            box-shadow: rgba(50, 50, 93, .1) 0 0 0 1px inset, rgba(50, 50, 93, .2) 0 6px 15px 0, rgba(0, 0, 0, .1) 0 2px 2px 0, rgba(50, 151, 211, .3) 0 0 0 4px;
        }

        /*end them*/
        /*button edit and remove*/

        /* CSS */
        .button-24 {
            border-radius: 50%;
            background: #FF4742;
            border: 1px solid #FF4742;

            box-shadow: rgba(0, 0, 0, 0.1) 1px 2px 4px;
            box-sizing: border-box;
            color: #FFFFFF;
            cursor: pointer;
            display: inline-block;
            font-family: nunito, roboto, proxima-nova, "proxima nova", sans-serif;
            font-size: 18px;
            font-weight: 800;
            line-height: 16px;
            min-height: 40px;
            outline: 0;
            padding: 18px 18px;
            text-align: center;
            text-rendering: geometricprecision;
            text-transform: none;
            user-select: none;
            -webkit-user-select: none;
            touch-action: manipulation;
            vertical-align: middle;
        }

        .button-24:hover,
        .button-24:active {
            background-color: initial;
            background-position: 0 0;
            color: #FF4742;
        }

        .button-24:active {
            opacity: .5;
        }

        .styled-select {
            border: 1px solid;
            overflow: hidden;
            width: 250px;
            font-size: 18px;
            height: 45px;
        }

        input#input-control {
            width: 30%;
            margin: 12px;
        }

        #tong {
            display: flex;
            align-items: center;
        }
        
        /*end edit and remove*/
    </style>

<body>
    <div class="table-container">
        <div class="Headertable">Thông tin sinh viên</div>
        <div class="thaotacsinhvien">

        </div>
        <?php
        $masv = $_SESSION['usr'];
       $lenhpt="select *from sinhvien where masv=$masv";
            $list = executeResult($lenhpt);
            echo "<div class='TableSinhVien'>";
            echo " <table  class='dulieusinhvien' id ='result'>
                        <tr>
                            <th>Mã sinh viên</th>
                            <th >Họ đệm</th>
                            <th >Tên</th>
                            <th >Hình ảnh</th>
                            <th >Ngày sinh</th>
                            <th >Giới tính</th>
                            <th >Dân tộc</th>
                            <th >CMND</th>
                            <th >Tôn giáo</th>
                            <th>Mã quê quán</th>
                            <th>SĐT</th>
                            <th >Email</th>
                            <th>Mã chức vụ</th>
                            <th>Mã lớp</th>
                            <th>Mã tình trạng học</th>
                            <th></th>
                            <th></th>
                        </tr>
                        <tbody class='get-elements'>";
            foreach ($list as $cla) {
                echo '<tr>
                        <td>' . $cla['masv'] . '</td>
                        <td>' . $cla['hodemsv'] . '</td>
                        <td>' . $cla['tensv'] . '</td>
                        <td> <img style="width: 100px;height: 100px;" src="IMG/' . $cla['hinhanh'] . '"></td>
                        <td>' . $cla['ngaysinh'] . '</td>
                        <td>' . $cla['gioitinh'] . '</td>
                        <td>' . $cla['dantoc'] . '</td>
                        <td>' . $cla['cmnd'] . '</td>
                        <td>' . $cla['tongiao'] . '</td>
                        <td>' . $cla['maquequan'] . '</td>
                        <td>' . $cla['sdt'] . '</td>
                        <td>' . $cla['email'] . '</td>
                        <td>' . $cla['machucvu'] . '</td>
                        <td>' . $cla['malop'] . '</td>
                        <td>' . $cla['matinhtranghoc'] . '</td>
                        <td><button class="button-24" onclick=\'window.open("Areasinhvien.inputsinhvien.php?id=' . $cla['masv'] . '","_self")\'><i class="bi bi-pencil-square"></i></button></td>
                    </tr>';
            }
            echo "</tbody>";
            echo "</table>";       
        
        ?>

    </div>
    <script type="text/javascript" src="./javascript/main.js"></script>
</body>

</html>