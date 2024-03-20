  <!-- quảng cáo -->
  <?php
    include "quangcao.php";
    ?>
  <!-- end quảng cáo -->
  <?php
    $ac = 1;
    $hh = new hanghoa();
    if (isset($_GET['action'])) {
        if (isset($_GET['act']) && $_GET['act'] == 'sanphamkhuyenmai') {
            $ac = 2;
            $count = $hh->getHangHoaAllSale()->rowCount();
        } else {
            $ac = 1;
            $count = $hh->getHangHoaAll()->rowCount();
        }
        if (isset($_GET['id']) && $_GET['id'] == '1') {
            $ac = 3;
        } else if (isset($_GET['id']) && $_GET['id'] == '2') {
            $ac = 4;
        } else if (isset($_GET['id']) && $_GET['id'] == '3') {
            $ac = 5;
        } else if (isset($_GET['id']) && $_GET['id'] == '4') {
            $ac = 6;
        } else if (isset($_GET['act']) && $_GET['act'] == 'timkiem') {
            $ac = 7;
        }
    }
    ?>

  <?php

    $limit = 4;
    $trang = new page();
    $page = $trang->findPage($count, $limit);
    $start = $trang->findStart($limit);
    ?>

  <!-- end số lượt xem san phẩm -->
  <!-- sản phẩm-->


  <!--Section: Examples-->
  <section id="examples" class="text-center">

      <!-- Heading -->
      <div class="row">
          <div class="col-lg-12 text-right">
              <?php
                if ($ac == 1) {
                    echo '<h2 class="mb-5 mt-5 font-weight-bold text-center" style="color: red;">TẤT CẢ SẢN PHẨM</h2>';
                }
                if ($ac == 2) {
                    echo '<h2 class="mb-5 mt-5 font-weight-bold text-center" style="color: red;">TẤT CẢ SẢN PHẨM KHUYẾN MÃI</h2>';
                }
                if ($ac == 3) {
                    echo '<h2 class="mb-5 mt-5 font-weight-bold text-center" style="color: red;">TẤT CẢ SẢN PHẨM TRÁI CÂY MÙA XUÂN</h2>';
                }
                if ($ac == 4) {
                    echo '<h2 class="mb-5 mt-5 font-weight-bold text-center" style="color: red;">TẤT CẢ SẢN PHẨM TRÁI CÂY MÙA HẠ</h2>';
                }
                if ($ac == 5) {
                    echo '<h2 class="mb-5 mt-5 font-weight-bold text-center" style="color: red;">TẤT CẢ SẢN PHẨM TRÁI CÂY MÙA THU</h2>';
                }
                if ($ac == 6) {
                    echo '<h2 class="mb-5 mt-5 font-weight-bold text-center" style="color: red;">TẤT CẢ SẢN PHẨM TRÁI CÂY MÙA ĐÔNG</h2>';
                }
                if ($ac == 7) {
                    echo '<h2 class="mb-5 mt-5 font-weight-bold text-center" style="color: red;">SẢN PHẨM TÌM KIẾM</h2>';
                }
                ?>
          </div>

      </div>
      <!--Grid row-->

      <!--Grid column-->
      <div class="row d-flex">

          <!--Grid column-->
          <?php
            $hh = new hanghoa();
            if ($ac == 1) {
                $result = $hh->getHangHoaAllPage($start, $limit);
            }
            if ($ac == 2) {
                $result = $hh->getHangHoaAllSalePage($start, $limit);
            }
            if ($ac == 3) {
                $result = $hh->getHangHoaAllXuan();
            }
            if ($ac == 4) {
                $result = $hh->getHangHoaAllHa();
            }
            if ($ac == 5) {
                $result = $hh->getHangHoaAllThu();
            }
            if ($ac == 6) {
                $result = $hh->getHangHoaAllDong();
            }
            if ($ac == 7) {
                if(isset($_POST['txtsearch']))
                {
                    $tk = $_POST['txtsearch'];
                    $result = $hh->selectTimKiem($tk,$start,$limit);
                }
            }
            while ($set = $result->fetch()) :
                if ($set['hienthi'] != 0) continue;
            ?>
              <div class="col-lg-3 col-md-3 mb-5 text-start align-items-stretch">

                  <div class="image-container">
                      <img src="Content\imagetourdien\<?php echo $set['hinh'] ?>" class="img-fluid" alt="">
                  </div>

                  <div class="row mt-1">
                      <div class="col-6">
                          <a class="text-success font-weight-bold d-block fs-4" href="/index.php?action=sanpham&act=sanphamchitiet&id=<?php echo $set['mahh'] ?>"><?php echo $set['tenhh'] ?></a>
                      </div>
                      <?php
                        if ($ac == 1) {
                            echo '<h5 class="mt-1 font-weight-bold col-6 text-end">
                                    <font color="red">' . number_format($set['gia']) . '<sup><u>đ</u></sup> / kg</font>
                                    </h5>';
                        }
                        if ($ac == 2) {
                            echo '<h5 class="mt-1 font-weight-bold col-6 text-end">
                                    <strike>' . number_format($set['gia']) . '</strike><sup><u>đ</u></sup>
                                    <font color="red">' . number_format($set['giamgia']) . '<sup><u>đ</u></sup> / kg</font>
                                    </h5>';
                        }
                        if ($ac == 3 || $ac == 4 || $ac == 5 || $ac == 6 || $ac == 7) {
                            if ($set['giamgia'] != 0) {
                                echo '<h5 class="mt-1 font-weight-bold col-6 text-end">
                                    <strike>' . number_format($set['gia']) . '</strike><sup><u>đ</u></sup>
                                    <font color="red">' . number_format($set['giamgia']) . '<sup><u>đ</u></sup> / kg</font>
                                    </h5>';
                            } else {
                                echo '<h5 class="mt-1 font-weight-bold col-6 text-end">
                                    <font color="red">' . number_format($set['gia']) . '<sup><u>đ</u></sup> / kg</font>
                                    </h5>';
                            }
                        }
                        ?>

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
                      <span><?php echo $set['mota']; ?></span></br>
                  </a>
              </div>
          <?php endwhile; ?>

      </div>


      <!--Grid row-->

  </section>


  <!-- end sản phẩm mới nhất -->

  <div class="col-md-12 col-md-offset-3">
      <ul class="pagination justify-content-center ">
          <?php
            $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
            if ($current_page > 1 && $page > 1) {
                if ($ac == 1) {
                    echo '<li class="page-item"><a class="page-link" href="/index.php?action=sanpham&page=' . ($current_page - 1) . '"><span aria-hidden="true">&laquo;</span></a></li>';
                } else if ($ac == 2) {
                    echo '<li class="page-item"><a class="page-link" href="/index.php?action=sanpham&act=sanphamkhuyenmai&page=' . ($current_page - 1) . '"><span aria-hidden="true">&laquo;</span></a></li>';
                }
            }
            for ($i = 1; $i <= $page; $i++) {
            ?>
              <?php
                if ($ac == 1) {
                    echo '<li class="page-item"><a class="page-link" href="/index.php?action=sanpham&page=' . $i . '">' . $i . '</a></li>';
                } else if ($ac == 2) {
                    echo '<li class="page-item"><a class="page-link" href="/index.php?action=sanpham&act=sanphamkhuyenmai&page=' . $i . '">' . $i . '</a></li>';
                }
                ?>
          <?php
            }
            if ($current_page < $page && $page > 1) {
                if ($ac == 1) {
                    echo '<li class="page-item"><a class="page-link" href="/index.php?action=sanpham&page=' . ($current_page + 1) . '"><span aria-hidden="true">&raquo;</span></a></li>';
                } else if ($ac == 2) {
                    echo '<li class="page-item"><a class="page-link" href="/index.php?action=sanpham&act=sanphamkhuyenmai&page=' . ($current_page + 1) . '"><span aria-hidden="true">&raquo;</span></a></li>';
                }
            }
            ?>
      </ul>
  </div>