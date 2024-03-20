<style>
    body {
        overflow-x: hidden;
    }

    nav {
        border-radius: 0 0 100px 100px !important;
    }
</style>

<header class="row no-gutters sticky-top">
    <nav class=" navbar navbar-expand-lg navbar-light bg-light d-flex flex-row justify-content-center ">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="ms-lg-5 mt-3 mt-lg-0 text-center">
                <a href="./index.php">
                    <img src="./Content/imagetourdien/logo.jpg" width="60px" height="60px" alt="">
                </a>
            </div>
            <div class="d-flex flex-row mx-auto px-auto justify-content-evenly">
                <form class="d-flex" action="index.php?action=sanpham&act=timkiem" method="post">
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-search"></i></span>
                        <input type="text" class="form-control my-0" placeholder="Tìm kiếm sản phẩm,..." name="txtsearch">
                        <button type="submit" class="btn btn-primary">Tìm Kiếm</button>
                    </div>
                </form>
            </div>
            <div class="d-flex flex-row align-items-center me-5 text-center justify-content-evenly">
                <ul class="navbar-nav align-items-center flex-row ">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Menu
                        </a>
                        <ul class="dropdown-menu position-absolute">
                            <?php
                            $hh = new hanghoa();
                            $result = $hh->getMenu();
                            while ($set = $result->fetch()) :
                            ?>
                                <li><a class="dropdown-item" href="index.php?action=sanpham&act=sanpham&id=<?php echo $set['maloai']; ?>"><?php echo $set['tenloai']; ?></a></li>
                            <?php endwhile; ?>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Mua sỉ SLL liên hệ hotline</a></li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="Content/imagetourdien/user.png" width="30px" height="30px" alt="">
                        </a>
                        <ul class="dropdown-menu position-absolute">
                            <?php
                            if (isset($_SESSION['makh'])) {
                                echo '<li>
                            <p style="color:red;margin-top:18px; margin-left:0px;">Xin chào! ' . $_SESSION['tenkh'] . '</p>
                            </li>
                            <li class="nav-item ps-3"><a href="/index.php?action=dangnhap&act=lichsu" class="nav-link">Lịch sử giao hàng</a></li>
                            <li>
                            <hr class="dropdown-divider">
                            </li>
                            <li class="nav-item ps-3"><a href="/index.php?action=dangnhap&act=doimk" class="nav-link">Đổi mật khẩu</a></li>
                            <li class="nav-item ps-3"><a href="/index.php?action=dangnhap&act=dangxuat" class="nav-link">Đăng Xuất</a></li>';
                            } else {
                                echo '
                        <li class="nav-item ps-3"><a href="/index.php?action=dangky" class="nav-link">Đăng Ký</a></li>
                        <li class="nav-item ps-3"><a href="/index.php?action=dangnhap" class="nav-link">Đăng Nhập</a></li>
                        ';
                            }
                            ?>

                        </ul>
                    </li>


                    <li class="nav-item"><a href="/index.php?action=giohang" class="nav-link"><img src="Content/imagetourdien/cartx2.png" width="30px" height="30px" alt=""></a></li>

                </ul>
            </div>
        </div>
    </nav>
</header>





<!-- <div class="row">
    <div class="col-12">
        <div id="carousel-example-1z" class="carousel slide carousel-fade carousel-fade" data-ride="carousel">
            <ol class="carousel-indicators">
                <li class="active"></li>
                <li></li>
                <li></li>
            </ol>
            <div class="carousel-inner z-depth-1-half" role="listbox">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="Content/imagetourdien/banner1.jpg" style="height: 400px;" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="Content/imagetourdien/banner2.png" style="height: 400px;" alt="Second slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="Content/imagetourdien/banner1.png" style="height: 400px;" alt="Third slide">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carousel-example-1z" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            </a>
            <a class="carousel-control-next" href="#carousel-example-1z" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
            </a>
        </div>
    </div>
</div> -->



<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active" data-bs-interval="4000">
            <img src="Content/imagetourdien/banner1.jpg" class="d-block w-100" style="height: 400px;" alt="Slide 1">
        </div>
        <div class="carousel-item" data-bs-interval="4000">
            <img src="Content/imagetourdien/banner2.png" class="d-block w-100" style="height: 400px;" alt="Slide 2">
        </div>
        <div class="carousel-item" data-bs-interval="4000">
            <img src="Content/imagetourdien/banner1.png" class="d-block w-100" style="height: 400px;" alt="Slide 3">
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>