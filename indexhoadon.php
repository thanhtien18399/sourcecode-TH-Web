<?php
$maHD=$_GET['maHD'];
include 'connect.php';
$sql1 ="select * from hoadon  where maHD='$maHD'";	
$stm= $o->query($sql1);	$data1 = $stm->fetchAll(PDO::FETCH_ASSOC);
//echo print_r($data1);
?>
<!-- cập nhật sản phẩm -->
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Thông Tin Đơn Đặt Hàng</title>
    <link href="bootstrap/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="bootstrap/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-dark ">
        <a class="navbar-brand text-danger font-weight-bolder" href="index.php">NTT SmallPhone</a>
        

        <div class="collapse navbar-collapse " id="navbarSupportedContent">
            
            <form class="form-inline  my-lg-0  " action="indextimkiem.php" method="POST">
                <input class="form-control mr-sm-0 ml-5 "size="50   "name=tukhoa type="search" placeholder=" Nhập tên điện thoại ,phụ kiện cần tìm" aria-label="Tìm sản phẩm" >
                <button class="btn btn-outline-success  my-sm-0 ml-3"name=timkiem type="submit">Tìm</button>
            </form>
            <ul class="navbar-nav ml-auto">
                    
                <li class="nav-item">
                    <a class="nav-link text-white" href="indexgiohang.php"> <img src="image/hinhanhmenu/icongiohang.jpg" class="rounded-circle" style="width:30px;"> Giỏ Hàng </a>
                </li>


            </ul>
        </div>
        
    
    </nav>

    <nav class="navbar navbar-expand-lg navbar-light bg-secondary">
        <div class="m-auto">
            <ul class="navbar-nav mr-5">
                
            <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Điện Thoại Di Động 
              </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item " href="indexiphone.php">IPhone</a>
                        <a class="dropdown-item " href="indexsamsum.html">SamSung</a>
                        <a class="dropdown-item " href="indexXi.html">Xiaomi</a>
                    </div>
                </li>
                <li class="nav-item mr-lg-5 ml-5">
                    <a class="nav-link text-white" href="indexipad.php">Ipad</a>
                </li>
                <li class="nav-item mr-lg-5 ml-5">
                    <a class="nav-link text-white" href="indextainghe.php">Tai Nghe</a>
                </li>
                <li class="nav-item mr-lg-5 ml-5">
                    <a class="nav-link text-white" href="indexphukien.php">Phụ Kiện </a>
                </li>
                <li class="nav-item mr-lg-5 ml-5">
                    <a class="nav-link text-white" href="indexkhuyenmai.php">Khuyến Mãi</a>
                </li>

            </ul>
        </div>
    </nav>
<div class="container mt-5 pt-3 pb-5 border">
<a href="index.php">Quay Lại Trang Chủ nha</a> 
    <h3 class="text-danger text-center border-bottom ml-5 mr-5 pb-3 mb-3">Thông Tin Đơn Đặt Hàng</h3>

    
    <?php
         foreach ($data1 as $value) {

    ?>
    <div class="ml-5 mr-5">
            <div class="form-group ">
            <label class="font-weight-bold ">Tên Khách Hàng:  </label>
            <label style="font-size:25px;" class="pl-3 text-uppercase">   <?php echo $value["tenKH"] ?></label>

            </div>

            <div class="form-row">
                <div class="form-group col-sm-6">
                    <label class="font-weight-bold">Email:</label>
                    <lable style="font-size:18px;" class="pl-3"> <?php echo $value["email"] ?></lable>

                </div>
                <div class="form-group col-sm-6">
                    <label class="font-weight-bold">Số Điện Thoại:</label>
                    <lable style="font-size:18px;" class="pl-3"> <?php echo $value["sodienthoai"] ?></lable>        
                </div>
            
            </div>
            <div class="form-row">
            <div class="form-group col-sm-12">
                <label class="font-weight-bold">Địa Chỉ:</label>
                <lable style="font-size:18px;" class="pl-3"> <?php echo $value["diachi"] ?></lable>
            </div>
            </div>
            <div class="form-row">
            <div class="form-group col-sm-6">
                <label class="font-weight-bold">Tổng Tiền:</label>
                <lable style="font-size:18px;" class="pl-3"> <?php echo $value["tongtien"] ?></lable>
            </div>
            <div class="form-group col-sm-6">
                <label class="font-weight-bold">Hình Thức Thanh Toán :</label>
                <lable style="font-size:18px;" class="pl-3"> <?php echo $value["ptThanhToan"] ?></lable>
            </div>
            </div>   
         </div>                            
    <?php
    }
    ?>
                                        
</div>



<script src="bootstrap/jquery-3.4.1.slim.min.js "></script>
    <script src="bootstrap/popper.min.js "></script>
    <script src="bootstrap/bootstrap.min.js "></script>
</body>
</html>
