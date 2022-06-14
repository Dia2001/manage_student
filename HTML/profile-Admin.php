<?php
session_start();
 ob_start();
 ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <link rel="stylesheet" href="../CSS/edit-profile.css" type="text/css" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body>
      <form method="post">
        <div class="container">
            <div class="main-body">
            
                  <!-- Breadcrumb -->
                  <!-- <nav aria-label="breadcrumb" class="main-breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                      <li class="breadcrumb-item"><a href="javascript:void(0)">User</a></li>
                      <li class="breadcrumb-item active" aria-current="page">User Profile</li>
                    </ol>
                  </nav> -->
                  <!-- /Breadcrumb -->
                  <?php
            $tendangnhap= $_SESSION['usr'] ;
            $sql = "select * from nguoidung where tendangnhap='".$tendangnhap."'";
            $connect = mysqli_connect("localhost", "root", "", "quanlysinhvien");
            mysqli_query($connect, "set names 'utf8'")or die ("Không thực hiện được");
            $result = mysqli_query($connect, $sql);
            $row=mysqli_fetch_array($result);       
            ?>
                  <div class="row gutters-sm">
                    <div class="col-md-4 mb-3">
                      <div class="card">
                        <div class="card-body">
                          <div class="d-flex flex-column align-items-center text-center">
                          <?php
                            echo "<img src='IMG/". $row['hinhanh']."' alt='Admin' class='rounded-circle'  height='150' width='150' >";
                            ?>
                            <div class="mt-3">
                              <h4><?php echo "". $row['tendangnhap']." "?></h4>
                              <p class="text-secondary mb-1">Người quản trị hệ thống</p>
                              <p class="text-muted font-size-sm"> Đến từ <?php echo "". $row['diachi']." "?></p>
                              <input type="file" name="file" class="btn btn-success choosefile">
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- <div class="card mt-3">
                        <ul class="list-group list-group-flush">
                          <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-globe mr-2 icon-inline"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg>Website</h6>
                            <span class="text-secondary">https://bootdey.com</span>
                          </li>
                          <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-github mr-2 icon-inline"><path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"></path></svg>Github</h6>
                            <span class="text-secondary">bootdey</span>
                          </li>
                          <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-twitter mr-2 icon-inline text-info"><path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path></svg>Twitter</h6>
                            <span class="text-secondary">@bootdey</span>
                          </li>
                          <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-instagram mr-2 icon-inline text-danger"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>Instagram</h6>
                            <span class="text-secondary">bootdey</span>
                          </li>
                          <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook mr-2 icon-inline text-primary"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg>Facebook</h6>
                            <span class="text-secondary">bootdey</span>
                          </li>
                        </ul>
                      </div> -->
                    </div>
                    <div class="col-md-8">
                      <div class="card mb-3">
                        <div class="card-body">
                          <div class="row">
                            <div class="col-sm-3">
                              <h6 class="mb-0">Full Name</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                              <input class="form-control" name="ht" type="text" placeholder="Full name" value="<?php echo "". $row['hoten']." "?>">
                            </div>
                          </div>
                          <hr>
                          <div class="row">
                            <div class="col-sm-3">
                              <h6 class="mb-0">Email</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
          
                              <input class="form-control" name="email" type="text" placeholder="Email..." value="<?php echo "". $row['email']." "?>">
                            </div>
                          </div>
                          <hr>
                          <div class="row">
                            <div class="col-sm-3">
                              <h6 class="mb-0">Phone</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                
                              <input class="form-control" name="sdt" type="text" placeholder="Phone..." value="<?php echo "". $row['sodienthoai']." "?>">
                            </div>
                          </div>
                          <hr>
                          <div class="row">
                            <div class="col-sm-3">
                              <h6 class="mb-0">Address</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                             
                              <input class="form-control" name="diachi" type="text" placeholder="Address..." value="<?php echo "". $row['diachi']." "?>">
                            </div>
                          </div>
                          <hr>
                          <div class="row">
                            <div class="col-sm-12">
                            <button type="submit" class="btn btn-outline-info" style="float:right"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle" viewBox="0 0 16 16">
                                  <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                  <path d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z"/>
                                </svg>Save</button>
                              </form>
                              <a class="btn btn-info " target="__blank" href="http://localhost/webquanlysinhvien/html/trangchu.php">
                                Back profile
                              </a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
        
                </div>
            </div>
            <?php  mysqli_close($connect);	?>
            <?php
            $a="Admin";
            if (isset($_POST['file']) && isset($_POST['ht']) && isset($_POST['email'])&& isset($_POST['sdt'])&& isset($_POST['diachi']) )
            {
            //lấy dữ liệu từ form gửi lên
            $hinhanh=$_POST['file'];
            $hoten=$_POST['ht'];
            $email=$_POST['email'];
            $sdt=$_POST['sdt'];
            $diachi=$_POST['diachi'];
            //1.Kết nối đến dữ liệu
            $connect = mysqli_connect("localhost","root","","quanlysinhvien") or die ("Không kết nối được");
            
            //2.Thiết lập bảng mã cho kết nối
            mysqli_query($connect, "set names 'utf8'");
            //5. Lấy kết quả trả về
            $sql="update nguoidung set hoten='".$hoten."',email='".$email."',sodienthoai='".$sdt."',diachi='".$diachi."',hinhanh='".$hinhanh."'where tendangnhap='".$a."' ";
			$kq1=mysqli_query($connect, $sql);
			if($kq1)
			{
        header('location: profile-Admin.php');
      
            }else{
              echo "câu lệnh sai";
            }
            mysqli_close($connect);
          }
            ?>
    </body>
</html>