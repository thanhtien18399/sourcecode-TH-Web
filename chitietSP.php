<?php
$ma=$_GET['maSP'];
include 'connect.php';
$sql1 ="select * from sanpham where maSP='$ma'";
$sql2="select * from danhmuc"; 	
$stm= $o->query($sql1);	$data1 = $stm->fetchAll(PDO::FETCH_ASSOC);
$stm= $o->query($sql2);	$data2 = $stm->fetchAll(PDO::FETCH_ASSOC);

//echo print_r($data1);
?>
<!-- chi tiết sản phẩm -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cập Nhật Sản Phẩm</title>
    <link href="bootstrap/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="bootstrap/font-awesome.min.css" rel="stylesheet" type="text/css">
 
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-dark ">
        <a class="navbar-brand text-danger font-weight-bolder" href="#">NTT SmallPhone</a>
        

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
                        <a class="dropdown-item " href="indexsamsung.php">SamSung</a>
                        <a class="dropdown-item " href="indexxiaomi.php">Xiaomi</a>
                        <div class="dropdown-divider"></div>

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
<div class="container mt-5 pb-5  border"style="width:50%;">

		<h3 class="m-3"> Chi Tiết Sản Phẩm </h3>
	<?php 
		foreach ($data1 as $value) {
		?>
                           <img src="image/anhpk&sp/<?php echo $value["hinhanh"]?>" class="card-img-top w-75 ml-5 pl-5  " alt="... ">
                            <div class="container ">
                               
                                <h6>Tên SP: <?php echo $value['tenSP'] ?></h6>
                                <p>Mã SP <?php echo $value['maSP'] ?></p>
                                <strong class="text-danger ">Giá: <?php echo $value['gia']?></strong>
                                <p>Màu: <?php echo $value['mauSP'] ?></p>
                                <p>Số lượng:<?php echo $value['soluong'] ?></p>
                            
                                <p>Chi tiết SP: <?php echo $value['chitietSP'] ?></p>
                                <p>Trạng thái: <?php echo $value['trangthaiSP'] ?></p>
                                 MÃ DM:<?php echo $value['maDM']?>
                           
                                 <a class="ml-5" href="XL_giohang.php?action=them&maSP=<?php echo $value['maSP']  ?>"><button type="button" class="btn btn-outline-primary mr-4">Mua</button></a>
                               
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
