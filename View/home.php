<!-- Sản phẩm mới nhất -->
<section id="examples" class="text-center">

    <!-- Heading -->
    <div class="row d-flex">
        <div class="col-md-12 text-end">
            <h2 class="mb-5 mt-5 font-weight-bold text-center" style="color: red;">SẢN PHẨM MỚI NHẤT</h2>
        </div>
        <div class="col-lg-12 text-end mt-4 mb-2">
            <a href="index.php?action=sanpham&act=sanpham">
                <span style="color: gray;" class="fs-5">Xem chi tiết</span>
            </a>
        </div>
    </div>

    <!-- Grid row -->
    <div class="row d-flex">

        <?php
        $hh = new hanghoa();
        $result = $hh->getHangHoaNew();
        while ($set = $result->fetch()) :
            if ($set['hienthi'] != 0) continue;
        ?>
            <!-- Grid column -->
            <div class="col-lg-3 col-md-4 mb-5 text-start align-items-stretch">

                <div class="image-container">
                    <img src="Content\imagetourdien\<?php echo $set['hinh'] ?>" class="img-fluid" alt="">
                </div>

                <div class="row mt-2">
                    <div class="col-6">
                        <a class="text-success font-weight-bold d-block fs-4" href="/index.php?action=sanpham&act=sanphamchitiet&id=<?php echo $set['mahh'] ?>"><?php echo $set['tenhh'] ?></a>
                    </div>
                    <h5 class="mt-1 font-weight-bold col-6 text-end">
                        <font color="red"><?php echo number_format($set['gia']); ?><sup><u>đ</u></sup> / kg</font>
                    </h5>
                </div>

                <div class="row mb-2">
                    <div class="col-6">
                    <a href="/index.php?action=sanpham&act=sanphamchitiet&id=<?php echo $set['mahh'] ?>">
                            <button class="btn btn-danger btn-sm" id="may4" value="lap 4">Xem chi tiết</button>
                        </a>
                    </div>
                    <div class="col-6 text-end">
                        <h6>Số lượt xem:<?php echo $set['luotxem']; ?></h6>
                    </div>
                </div>

                <a href="/index.php?action=sanpham&act=sanphamchitiet&id=<?php echo $set['mahh'] ?>">
                    <span><?php echo $set['mota']; ?></span><br>
                </a>
            </div>
        <?php endwhile; ?>
    </div>

    <!-- Grid row -->
</section>
<!-- End sản phẩm mới nhất -->

<!-- Sản phẩm khuyến mãi -->
<section id="examples" class="text-center">

    <!-- Heading -->
    <div class="row d-flex">
        <div class="col-md-12 text-end">
            <h2 class="mb-5 mt-5 font-weight-bold text-center" style="color: red;">SẢN PHẨM KHUYẾN MÃI</h2>
        </div>
        <div class="col-lg-12 text-end mt-4 mb-2">
            <a href="index.php?action=sanpham&act=sanphamkhuyenmai">
                <span class="fs-5" style="color: gray;">Xem chi tiết</span>
            </a>
        </div>
    </div>

    <div class="row d-flex">

        <?php
        $result = $hh->getHangHoaSale();
        while ($set = $result->fetch()) :
        ?>

            <!-- Grid column -->
            <div class="col-lg-4 col-md-4 mb-5 text-start align-items-stretch">

                <div class="image-container">
                    <img src="Content\imagetourdien\<?php echo $set['hinh'] ?>" class="img-fluid" alt="">
                </div>

                <div class="row mt-2">
                    <div class="col-6">
                        <a class="text-success font-weight-bold d-block fs-4" href="/index.php?action=sanpham&act=sanphamchitiet&id=<?php echo $set['mahh'] ?>"><?php echo $set['tenhh'] ?></a>
                    </div>
                    <h5 class="mt-1 font-weight-bold col-6 text-end">
                        <strike><?php echo number_format($set['gia']); ?></strike><sup><u>đ</u></sup>
                        <font color="red"><?php echo number_format($set['giamgia']); ?><sup><u>đ</u></sup> / kg</font>
                    </h5>
                </div>

                <div class="row mb-2">
                    <div class="col-6">
                        <a href="/index.php?action=sanpham&act=sanphamchitiet&id=<?php echo $set['mahh'] ?>">
                            <button class="btn btn-danger btn-sm" id="may4" value="lap 4">Xem chi tiết</button>
                        </a>
                    </div>
                    <div class="col-6 text-end">
                        <h6>Số lượt xem:<?php echo $set['luotxem']; ?></h6>
                    </div>
                </div>

                <a href="/index.php?action=sanpham&act=sanphamchitiet&id=<?php echo $set['mahh'] ?>">
                    <span><?php echo $set['mota']; ?></span><br>
                </a>

            </div>
        <?php endwhile; ?>
    </div>

    <!-- Grid row -->
</section>
<!-- End sản phẩm khuyến mãi -->