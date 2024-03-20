<div class="container">
  <?php if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) : ?>
    <h2 class="text-center mb-4">THÔNG TIN GIỎ HÀNG</h2>
    <form action="index.php?action=giohang&act=update_gh" method="post">
      <table class="table table-striped table-hover">
        <thead>
          <tr>
            <th scope="col">Số TT</th>
            <th scope="col">Hình Ảnh Sản Phẩm</th>
            <th scope="col">Tên Sản Phẩm - Giá</th>
            <th scope="col">Số Lượng</th>
            <th scope="col">Thành Tiền</th>
            <th scope="col">Thao Tác</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($_SESSION['cart'] as $key => $item) : ?>
            <tr>
              <th scope="row">
                <p class="text-center">
                  <?php echo $key+1; ?>
                </p>
              </th>
              <td><img width="150px" height="100px" src="Content\imagetourdien\<?php echo $item['hinh']; ?>" alt="<?php echo $item['tenhh']; ?>"></td>
              <td><?php echo $item['tenhh']; ?> - <?php echo number_format(($item['giamgia'] != 0) ? $item['giamgia'] : $item['gia'], 0, ',', '.');?> VNĐ</td>
              <td>
                <input type="number" name="newqty[<?php echo $key ?>]" class="form-control" value="<?php echo $item['soluong']; ?>" min="1">
                <input type="hidden" name="slton[<?php echo $key ?>]" value="<?php echo $item['slton'] ?>">
              </td>
              <td><b><?php echo number_format($item['thanhtien']); ?> VNĐ</b></td>
              <td>
                <a href="index.php?action=giohang&act=giohang_xoa&id=<?php echo $key;?>" class="btn btn-danger btn-sm">Xóa</a>
                
              </td>
            </tr>
          <?php endforeach; ?>
          <tr>
            <td colspan="4" class="text-end fs-5 pt-3"><b>Tổng Tiền</b></td>
            <td colspan="1" class="text-center fs-5 pt-3"><b>
                <?php 
                  $gh = new giohang();
                  echo $gh->getSubTotal();
                ?>
              </b> VNĐ</td>
            <td>
            <button type="submit" class="btn btn-primary btn-sm" onclick="validateAndUpdate()">Sửa</button>
              <a href="index.php?action=thanhtoan" class="btn btn-success">>Thanh toán</a>
            </td>
          </tr>
        </tbody>
      </table>
    </form>
  <?php else : ?>
    <div class="alert alert-info text-center mt-3">Giỏ hàng chưa có sản phẩm nào.</div>
  <?php endif; ?>
</div>


<script>
    function validateAndUpdate() {
        var quantities = document.querySelectorAll('input[name^="newqty"]');
        var stockQuantities = document.querySelectorAll('input[name^="slton"]');
        var productNames = <?php echo json_encode(array_column($_SESSION['cart'], 'tenhh')); ?>;

        for (var i = 0; i < quantities.length; i++) {
            var quantity = parseInt(quantities[i].value);
            var stockQuantity = parseInt(stockQuantities[i].value);

            if (isNaN(quantity) || quantity < 1 || quantity > stockQuantity) {
                alert('Sản phẩm ' + productNames[i] + ' không đủ số lượng. Số lượng tồn hiện tại: ' + stockQuantity + '.');
                return;
            }
        }

        // If all quantities are valid, submit the form
        document.querySelector('form').submit();
    }
</script>


