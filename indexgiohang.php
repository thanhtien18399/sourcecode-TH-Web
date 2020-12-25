<?php


if (!isset($_SESSION)) session_start();
$tam= isset($_SESSION['cart'])?$_SESSION['cart']:[];
$a = "'".implode("','",array_keys($tam))."'";
$sql1 = "SELECT * FROM sanpham WHERE maSP IN ($a) ";
include 'connect.php';
?>


<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Giỏ Hàng</title>
    <link href="bootstrap/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="bootstrap/font-awesome.min.css" rel="stylesheet" type="text/css">
<style>
 body {
     background-color: #f9f9fa
 }

 .flex {
     -webkit-box-flex: 1;
     -ms-flex: 1 1 auto;
     flex: 1 1 auto
 }

 @media (max-width:991.98px) {
     .padding {
         padding: 1.5rem
     }
 }

 @media (max-width:767.98px) {
     .padding {
         padding: 1rem
     }
 }

 .padding {
     padding: 5rem
 }

 .card {
     box-shadow: none;
     -webkit-box-shadow: none;
     -moz-box-shadow: none;
     -ms-box-shadow: none
 }

 .pl-3,
 .px-3 {
     padding-left: 1rem !important
 }

 .card {
     position: relative;
     display: flex;
     flex-direction: column;
     min-width: 0;
     word-wrap: break-word;
     background-color: #fff;
     background-clip: border-box;
     border: 1px solid #d2d2dc;
     border-radius: 0
 }

 .card .card-title {
     color: #000000;
     margin-bottom: 0.625rem;
     text-transform: capitalize;
     font-size: 0.875rem;
     font-weight: 500
 }

 .card .card-description {
     margin-bottom: .875rem;
     font-weight: 400;
     color: #76838f
 }

 p {
     font-size: 0.875rem;
     margin-bottom: .5rem;
     line-height: 1.5rem
 }

 .table-responsive {
     display: block;
     width: 100%;
     overflow-x: auto;
     -webkit-overflow-scrolling: touch;
     -ms-overflow-style: -ms-autohiding-scrollbar
 }

 .table,
 .jsgrid .jsgrid-table {
     width: 100%;
     max-width: 100%;
     margin-bottom: 1rem;
     background-color: transparent
 }

 .table thead th,
 .jsgrid .jsgrid-table thead th {
     border-top: 0;
     border-bottom-width: 1px;
     font-weight: 500;
     font-size: .875rem;
     text-transform: uppercase
 }

 .table td,
 .jsgrid .jsgrid-table td {
     font-size: 0.875rem;
     padding: .875rem 0.9375rem
 }

 .badge {
     border-radius: 0;
     font-size: 12px;
     line-height: 1;
     padding: .375rem .5625rem;
     font-weight: normal
 }
</style>
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
<div class="page-content page-container" id="page-content">
    <div class="padding">
        <div class="row container d-flex justify-content-center">
            <div class="col-lg-8 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title">Giỏ Hàng Của Bạn</h2>
                        <a href="index.php">Mua Thêm Sản Phẩm Khác</a> 
                        <div class="table-responsive mt-3">
                            <table class="table">
                                
                           
                                <?php
                                    $i=0;
                                    $tongtien=0;
                                        foreach ($tam as $key => $value) 
                                        {
                                            $sql= "select * from sanpham where maSP='{$key}'";
                                            $stm = $o->query($sql);
                                            $data = $stm->fetch();
                                            $i++;
                                           

                                 ?>
                                            <tr>
                                                <td><?php echo $i ?></td>
                                                <td> <a href="chitietSP.php?maSP=<?php echo $data['maSP'] ?>"><img src="image/anhpk&sp/<?php echo $data['hinhanh']?> " style="width:100px;height:100px;"></a></td>
                                                <td><?php echo $data['tenSP'] ?></td>
                                                <td><?php echo  $data['gia'] ?> Đ</td>
                                                <td> <?php echo $value?></td>
                                                <td><?php echo $value *$data['gia'] ?> Đ</td>
                                                <td>
                                                    <a href="XL_giohang.php?action=xoa&maSP=<?php echo $key ?>"><label class="badge badge-danger">xóa</label></a>
                                                </td>
                                    
                                            </tr>
                                           
                                            
                                        <?php
                                        $tongtien += $value * $data['gia'];
                                        }
	                                    ?>
                                        <tr>
                                                <td>Tổng Tiền</td>
                                                <td > </td>
                                                <td></td>
                                                <td></td>
                                                <td> </td>
                                                <td><?php echo $tongtien ?>Đ</td>
                                                <td></td>
                                    
                                        </tr>
                                        
                                        
                            </table>
                            <form  action="XL_donhang.php" method="post" enctype="multipart/form-data" >
                                    <h4 class="m-3"> Thông Tin Khách Hàng </h4>

                                    <h5 class="text-center text-danger">
                                        <?php
                                            if(isset($_SESSION["thongbao"])){
                                                echo $_SESSION["thongbao"];
                                                session_unset();
                                            }
                                        ?>
                                    </h5>
                                        <div class="form-group ">
                                            <label >Tên Khách Hàng</label>
                                            <input type="text" class="form-control" name="tenKH" >

                                        </div>

                                        <div class="form-row">
                                        <div class="form-group col-sm-6">
                                            <label >Email:</label>
                                            <input type="email" class="form-control" name=email >
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label for="pwd">Ngày Sinh </label>
                                            <input type="date" class="form-control" name=ngaysinhKH>
                                        </div>
                                        </div>
                                        <div class="form-row">
                                        <div class="form-group col-sm-6">
                                            <label for="pwd"> Giới Tính:  </label></br>
                                            <label class="ml-3"><input type="checkbox"   name=gioitinh value=nam> : nam</lable>
                                             <label><input type="checkbox"   name=gioitinh value=nữ> : nữ</lable>
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label for="text">Số Điện Thoại:</label>
                                            <input type="text" class="form-control"  name=sodienthoai>                
                                        </div>
                                        
                                        </div>
                                        <div class="form-row">
                                        <div class="form-group col-sm-12">
                                            <label for="text">Địa Chỉ:</label>
                                            <input type="text" class="form-control"  name=diachi>
                                        </div>
                                        </div>
                                        <div class="form-row">
                                        <div class="form-group col-sm-12">
                                            <label for="text">Tổng Tiền:</label>
                                            <input type="" class="form-control"  name=tongtien value=<?php echo $tongtien ?>>
                                        </div>
                                        </div>
                                        <div class="form-group ">
                                            <label for="pwd">Phương Thức Thanh Toán:</label></br>
                                            <label class="ml-3 "><input type="checkbox"   name=ptThanhToan value="Thanh Toán Khi Nhận Hàng"> : Thanh Toán Khi Nhận Hàng</lable>
                                             <label><input type="checkbox"   name=ptThanhToan value="Thanh Toán online"> : Thanh Toán online</lable>
                                        </div>
                                    <input type="submit" class="btn btn-primary mb-3">

	                            </form>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </div>
</div>

	
<script src="bootstrap/jquery-3.4.1.slim.min.js "></script>
    <script src="bootstrap/popper.min.js "></script>
    <script src="bootstrap/bootstrap.min.js "></script>
</body>
</html>