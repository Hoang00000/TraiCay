<div class="table-responsive">
  <?php
  if (isset($_SESSION['makh'])) {
    $mskh = $_SESSION['makh'];
    $hd = new hoadon();
    $dem = $hd->countLS($mskh);
    if ($dem == 0) {
      echo '<h3 class="my-4 text-center" style="color: red;">Không có lịch sử đặt hàng.</h3>';
    } else {
  ?>
      <form action="" method="post">
        <table class="table table-bordered" border="0">
          <tr>
            <td colspan="5">
              <h2 style="color: red;">HÓA ĐƠN</h2>
            </td>
          </tr>

          <tr>
            <td>Số hoá đơn</td>
            <td>Thông tin KH</td>
            <td>Sản phẩm mua</td>
            <td>Tổng tiền</td>
            <td>Ngày đặt</td>
            <td>Tình trạng đơn hàng</td>
          </tr>
          <?php
          $j = 0;
          $sp = $hd->selectThongTinKH($mskh);
          while ($set = $sp->fetch()) :
          ?>
            <tr>
              <td><?php echo $set['mahd'] ?></td>
              <td><?php echo $set['tenkh'] ?> - <?php echo $set['sdt'] ?> - <?php echo $set['diachi'] ?></td>
              <td>
                <?php
                $j = 0;
                $sp_products = $hd->selectThongTinHHID($set['mahd']);
                $product_info = "";
                while ($item = $sp_products->fetch()) :
                  $product_info .= $item['tenhh'] . " - " . $item['slmua'] . "kg<br>";
                endwhile;
                echo $product_info;
                ?>
              </td>
              <td><b><?php echo $set['tongtien'] ?><sup><u>đ</u></sup></b></td>
              <td><?php echo $set['ngaydat'] ?></td>

              <td>
                <?php
                $tinhtrang = $set['tinhtrang'];
                $tt= $hd->getTinhTrang($tinhtrang);
                echo $tt;
                ?>
              </td>
            </tr>
          <?php endwhile; ?>
        </table>
      </form>
  <?php
    }
  }
  ?>
</div>