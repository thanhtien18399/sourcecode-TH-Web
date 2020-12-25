<?php
include 'connect.php'; 			
$sql1 ="select * from sanpham";
$sql2="select * from danhmuc"; 	
$sql3="select * from tintuc";


$stm= $o->query($sql1);	$data1 = $stm->fetchAll(PDO::FETCH_ASSOC);
$stm= $o->query($sql2);	$data2 = $stm->fetchAll(PDO::FETCH_ASSOC);
$stm= $o->query($sql3);	$data3 = $stm->fetchAll(PDO::FETCH_ASSOC);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>xiaomi</title>
    <link href="bootstrap/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="bootstrap/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light bg-dark ">
        <a class="navbar-brand text-danger font-weight-bolder" href="index.php" >NTT SmallPhone</a>
        

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
    <div  >
        <h3 class="text-center  mt-4 text-dark border-bottom pb-4 " style="font-weight: lighter;"> Sản Phẩm  Xiaomi </h3>
    </div>
    
    <div class="container  ">
        <div class="row ">
            <?php
                foreach ($data1 as $key => $value) 
                {
                ?>
                    <?php
            for ($i=$value['maSP']; $i <= $value['maSP'] ; $i++) 
            {?> 
            <?php
                if( $value['maDM']==3){
            ?>
                <div class="col-sm-3 mt-4">
                    <div class="card " style="width: 16.5rem; ">
                        <img src="image/anhpk&sp/<?php echo $value["hinhanh"]?>" class="card-img-top " alt="... ">
                        <div class="card-body ">
                            <h6><?php echo $value['tenSP'] ?></h6>
                            <strong class="text-danger ">Giá: <?php echo $value['gia']?></strong>
                            <p>màu: <?php echo $value['mauSP'] ?></p>
                        </div>
                        
                        <div class="text-center  ">
                        <a href="XL_giohang.php?action=them&maSP=<?php echo $value['maSP'] ?>"><button type="button" class="btn btn-outline-primary mr-4">Mua</button></a>
                        <a href="chitietSP.php?maSP=<?php echo $value['maSP'] ?>">  <button type="button" class="btn btn btn-outline-secondary">Chi Tiết SP</button></a>
                        </div>
                    </div>
                </div>

            <?php            
                }
            ?>
                
            <?php
            }
            ?>
                <?php
                }
                ?>
        </div>
       
        
            
    </div>

    <!-- Footer -->
    <footer class="bg-light py-5">
        <div class="container">
            <div class="small text-center text-muted">© 2019. Công ty cổ phần NTT SmallPhone. do sở KH &amp; ĐT TP.HCM cấp ngày 02/01/2007. Địa chỉ: 342 Lí Thường Kiệt, P. 14, Q.10, TP.Hồ Chí Minh. Điện thoại: 18001060. Email: nguyenthanhtien.com. Chịu trách nhiệm nội dung: Nguyễn Thành Tiến.
            </div>
        </div>
    </footer>


    <script src="bootstrap/jquery-3.4.1.slim.min.js "></script>
    <script src="bootstrap/popper.min.js "></script>
    <script src="bootstrap/bootstrap.min.js "></script>
</body>

</html>