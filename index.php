<?php
    include 'connect.php';
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
    <title>Trang Chủ</title>
    <link href="bootstrap/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="bootstrap/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>

<body >
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
    <div  >
        <div id="carouselExampleIndicators" class="carousel slide pr-2 mb-5 " style="float:left; width:60%"  data-ride="carousel">
            <ol class="carousel-indicators" >
                <li data-target="#carouselExampleIndicators"  data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="5"></li>
            </ol>
            <div class="carousel-inner " style=" height:300px; ">
                      
                        <div class="carousel-item active">
                            <img src=" image/hinhanhmenu/galaxy-note-10-1_800x450menu.jpg" class="d-block " alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="image/hinhanhmenu/iphone11promax.jpg" class="d-block " alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="image/hinhanhmenu/note10.jpg" class="d-block" alt="...">
                        </div> 

            </div>
            
        </div>

          
         <div style="width:40%;height:300px; float:right; " class="mb-5">
            <div class="mb-2">
                <img src=" image/hinhanhmenu/s20_590x160.png" class=" w-100"style="width:541px;height:180px;" alt="...">
            </div>
            <div>
            <img src=" image/hinhanhmenu/note20utra.png" class=" w-100"style="width:541px;height:112px; " alt="...">
            </div>
         </div>

    </div>
    
    <div class="container mt-5 ">

<!-- sản phẩm iphone -->
        <div  >
            <h3 class="text-center  mt-4 text-dark border-bottom pb-4 " style="font-weight: lighter;"> Sản Phẩm  IPHONE </h3>
        </div>

        <div class="row ">
                <?php
                    foreach ($data1 as $key => $value) 
                    {
                    ?>
                        <?php
                for ($i=$value['maSP']; $i <= $value['maSP'] ; $i++) 
                {?> 
                <?php
                    if( $value['maDM']==1){
                ?>
                    <div class="col-sm-3 mt-4">
                        <div class="card " style="width: 16.5rem; ">
                            <img src="image/anhIphone/<?php echo $value["hinhanh"]?>" class="card-img-top " alt="... ">
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


<!-- sản phẩm SamSung -->



            <div  >
                <h3 class="text-center  mt-4 text-dark border-bottom pb-4 " style="font-weight: lighter;"> Sản Phẩm  SamSung</h3>
             </div>
        
        <div class="row ">
                <?php
                    foreach ($data1 as $key => $value) 
                    {
                    ?>
                        <?php
                for ($i=$value['maSP']; $i <= $value['maSP'] ; $i++) 
                {?> 
                <?php
                    if( $value['maDM']==2){
                ?>
                    <div class="col-sm-3 mt-4">
                        <div class="card " style="width: 16.5rem; ">
                            <img src="image/anhIphone/<?php echo $value["hinhanh"]?>" class="card-img-top " alt="... ">
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


     <!-- sản phẩm xiaomi -->


            <div  >
                <h3 class="text-center  mt-4 text-dark border-bottom pb-4 " style="font-weight: lighter;"> Sản Phẩm  Xiaomi </h3>
            </div>

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
                        <img src="image/anhIphone/<?php echo $value["hinhanh"]?>" class="card-img-top " alt="... ">
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

    <!-- Contact Section -->
    <!-- Contact Section -->
    <section class="page-section mt-5" id="contact">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <h2 class="mt-0">Hãy Gữi Liên lạc Với Chúng Tôi!</h2>
                    <hr class="divider my-4">
                    <p class="text-muted mb-5">Sẵn sàng để bắt đầu cái SmallPhone tiếp theo của bạn với chúng tôi? Gọi cho chúng tôi hoặc gửi email cho chúng tôi và chúng tôi sẽ liên lạc lại với bạn sớm nhất có thể!</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 ml-auto text-center mb-5 mb-lg-0">
                    <img src="image/hinhanhmenu/phone-512.png" class="card-img-top w-50 h-50 mb-3"></img>
                    <div>+1 (202) 555-0149</div>
                </div>
                <div class="col-lg-4 mr-auto text-center">
                    <img src="image/hinhanhmenu/icongmail.png" class="card-img-top w-50 h-50 mb-3"></i>
                    <!-- Make sure to change the email address in anchor text AND the link below! -->
                    <a class="d-block" href="mailto:contact@yourwebsite.com">nguyenthanhtien@gmail.com</a>
                </div>
            </div>
        </div>
    </section>
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