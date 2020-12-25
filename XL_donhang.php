<?php
if (!isset($_SESSION)) session_start();
$tam= isset($_SESSION['cart'])?$_SESSION['cart']:[];
//session_start();
include 'connect.php';
$bangChuSo = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
 
    function chuoiNgauNhien($input, $strength = 16) {
        $input_length = strlen($input);
        $random_string = '';
        for($i = 0; $i < $strength; $i++) {
            $random_character = $input[mt_rand(0, $input_length - 1)];
            $random_string .= $random_character;
        }
    
        return $random_string;
    }
$mdh=chuoiNgauNhien($bangChuSo,6);
$tkh=$_POST['tenKH'];
$e=$_POST['email'];
$ns=$_POST['ngaysinhKH'];
$gt=$_POST['gioitinh'];
$sdt=$_POST['sodienthoai'];
$dc=$_POST['diachi'];
$tt=$_POST['tongtien'];
$ptTT=$_POST['ptThanhToan'];
$a = "'".implode("','",array_keys($tam))."'";
if( $tkh != '' &&    $ns !='' &&  $gt != '' && $sdt !='' && $dc !=''&& $e !=''){

    if($sdt > 100000000000 ){
        $_SESSION['thongbao']='Nhập SĐT vượt quá 10 số ! vui lòng nhập lại!!!';
        header("location:indexgiohang.php"); exit;
    
    }else{

    //Hóa Đơn Khách Hàng

        $sql1="SELECT * FROM hoadon WHERE maHD='$mdh'";
        $stm1 = $o->query($sql1);
        $row = $stm1->rowCount();
        if($row > 0){
            header('location:XL_donhang.php');exit;
        }else{
            $sql= "INSERT INTO `hoadon` (`maHD`, `tenKH`, `diachi`, `sodienthoai`, `email`, `ngayDatHang`, `ngaygiaohang`, `tongtien`, `ptThanhToan`)
            VALUES ('$mdh','$tkh','$dc','$sdt','$e',' ',' ','$tt','$ptTT')";
            $stm = $o->query($sql);
            //echo print_r($sql);
            

    /// Khách Hàng

            $sql2= "INSERT INTO `khachhang` (`maKH`, `tenKH`, `email`, `ngaySinhKH`, `gioitinh`, `sodienthoai`, `diachi`) 
            VALUES (NULL,'$tkh','$e','$ns','$gt','$sdt','$dc')";
            $stm = $o->query($sql2);

     // CT ĐƠN Hàng
            
            $sql = "SELECT * FROM sanpham WHERE maSP IN ($a) ";
            foreach ($tam as $key => $value) 
             {
                $sql= "select * from sanpham where maSP='{$key}'";
                $stm = $o->query($sql);
                $data = $stm->fetch();
                $gia=$data['gia'];
                $tensp=$data['tenSP'];
                $sql1= "INSERT INTO `ctdonhang` (`maCTDH`, `maHD`, `tenSP`, `soluong`, `gia`, `ngayDatHang`, `ngaygiaohang`)
                 VALUES (NULL,'$mdh','$tensp','$value','$gia','','')";
                    $stm = $o->query($sql1);
                    //echo print_r($sql1);
                    $_SESSION['thongbao']=' Đặt Hàng Thành công';
                
             }
        }
       
    }
    
}
else{
    $_SESSION['thongbao']='vui lòng nhập cái ô còn trống! không đc để trống!';
    header('location:indexgiohang.php'); exit;
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Đơn Hàng</title>
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
                    <a class="nav-link text-white" href="indexdangky.html">Ipad</a>
                </li>
                <li class="nav-item mr-lg-5 ml-5">
                    <a class="nav-link text-white" href="indexdangnhap.html">Tai Nghe</a>
                </li>
                <li class="nav-item mr-lg-5 ml-5">
                    <a class="nav-link text-white" href="indexphukien.php">Phụ Kiện </a>
                </li>
                <li class="nav-item mr-lg-5 ml-5">
                    <a class="nav-link text-white" href="indexdangnhap.html">Khuyến Mãi</a>
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
                        <h3 class="text-danger text-center mb-3 pb-3  border-bottom">Đặt Hàng Thành Công </h3>
                        <h4 class="text-primary">
                            Thông Tin Khách Hàng:
                        </h4>
                        <table class="ml-4   ">
                            <tr>
                                <td>
                                   Tên :  <?php echo $tkh ?>
                               </td>
                               
                            </tr>
                            <tr>
                                <td>
                                    Số Điện Thoại :  <?php echo $sdt ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    email : <?php echo $e ?>
                               </td>
                            </tr>
                        
                        </table>
                        <div class="border-top mt-3 pt-4 text-center">
                                <a href="indexhoadon.php?maHD=<?php echo $mdh ?>">
                                <label class="btn btn-primary ">Xem Đơn Hàng</label></a>
                        </div>
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