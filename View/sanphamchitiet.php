<script type="text/javascript">
    function chonsize(a) {
        document.getElementById("size").value = a;

    }
</script>
<section>
    <div class="row">
        <div class="col-lg-12 text-center">
            <h3 class="mb-5 font-weight-bold mt-3">CHI TIẾT SẢN PHẨM</h3>
        </div>

    </div>
    <article class="col-12">
        <!-- <div class="card"> -->
        <div class="container-fliud">
            <form action="index.php?action=giohang&act=giohang_action" method="post">
                <div class="wrapper row mb-5">
                    <!-- <input type="hidden" name="action" value="giohang&add_cart"/> -->

                    <div class="preview col-md-5">
                        <div class="tab-content">
                            <?php
                            if (isset($_GET['id'])) {
                                $id = $_GET['id'];
                                $hh = new hanghoa();
                                $sp = $hh->getHangHoaId($id);
                                $tenhh = $sp['tenhh'];
                                $mota = $sp['mota'];
                                $gia = $sp['gia'];
                                $giamgia = $sp['giamgia'];
                                $hinh = $sp['hinh'];
                                $luotxem = $sp['luotxem'];
                                $upluotxem = $luotxem + 1;
                                $hh -> updateLuotXem($upluotxem, $id);
                                $danhmuc = $sp['tenloai'];
                                $maloai = $sp['maloai'];
                                $slton = $sp['slton'];
                            }
                            ?>
                            <div class="tab-pane active " id="">
                                <img src="Content\imagetourdien\<?php echo $hinh ?>" alt="" width="200px" height="350px">
                            </div>

                        </div>
                        <ul class="preview-thumbnail nav nav-tabs">

                        </ul>
                    </div>
                    <div class="details col-md-7">
                        <input type="hidden" name="mahh" value="<?php echo $id ?>" />
                        <h3 class="product-title">
                            <?php echo $tenhh ?>
                        </h3>
                        <!-- <div class="rating">
                            <div class="ptar" data-pid="<?= $id ?>">
                                Your rating:
                                <?php
                                for ($i = 1; $i <= 5; $i++) {
                                    $img = $i <= $rating ? "star" : "star-blank";
                                    echo "<img src='Content/imagetourdien/$img.png' style='width:20px;cursor:pointer;' data-set='$i'>";
                                }
                                ?>



                            </div>
                        </div> -->
                        <div class="list">
                            <H4>Danh mục:
                                <a href="index.php?action=sanpham&act=sanpham&id=<?php echo $maloai ?>">
                                    <?php echo $danhmuc ?>
                                </a>
                            </H4>
                        </div>
                        <p class="product-description text-start fs-5">
                            <?php echo $mota ?>
                        </p>
                        <!-- <h4 class="price">Giá bán:đ / Kg</h4> -->
                        <?php
                        if ($giamgia != 0) {
                            echo "<h4 class='price'>Giá bán : <strike>" . $gia . "</strike> " . $giamgia . "đ / Kg</h4>";
                        } else {
                            echo "<h4 class='price'>Giá bán : " . $gia . "đ / Kg</h4>";
                        }
                        ?>

                        <h5 class="colors">
                            <!-- Màu:
                            <select name="mymausac" class="form-control" style="width:150px;">

                            </select><br> -->
                            Số lượng tồn: <?php echo ($slton <= 0) ? 'Hết hàng' : $slton; ?> <br> <br>

                            <!-- <input type="hidden" name="size" id="size" value="0" />
                            Kích Thước: -->

                            Số Lượng:

                            <input type="number" id="soluong" name="soluong" min="1" max="100" value="1" size="10" />
                            Kg <br> <br>
                            Luợt xem:
                            <?php echo $luotxem ?>

                        </h5>

                        <div class="action">
                            <a href="index.php?action=giohang">
                                <button class="add-to-cart btn btn-default" type="submit" data-toggle="modal" data-target="#myModal">MUA NGAY
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <!-- </div> -->
    </article>
    <!-- <form id="ninForm_2" method="post" target="_self">
        <input type="hidden" name="pid" id="ninPdt">
        <input type="hidden" name="stars" id="ninStar">
    </form> -->
</section>

<!-- hidden để hiển thị star -->

<?php
if (isset($_SESSION['makh'])) :
?>

    <p class="float-left"><b>BÌnh luận </b></p>
    <hr>
    <form action="index.php?action=binhluan" method="post">

        <input type="hidden" name="txtmahh" value="<?php echo $id ?>" />
        <div class="row">
            <div class="col-lg-12 d-flex">
                <img src="Content/imagetourdien/people.png" width="50px" height="50px" ; />

                <textarea class="input-field" type="text" name="comment" rows="2" cols="70" id="comment" placeholder="Thêm bình luận">  </textarea>
                <input type="submit" class="btn btn-primary" id="submitButton" style="float: right;" value="Bình Luận" />
            </div>
        </div>


    </form>
    <div class="row">
        <p class="float-left"><b>Các bình luận</b></p>
        <?php
        $bl = new binhluan();
        $noidung = $bl->selectBinhLuan($id);
        while ($set = $noidung->fetch()) :
        ?>
            <div class="row">
                <div class="col-12">
                    <div class="d-flex align-items-center">
                        <img class="object-fit-contain" src="Content/imagetourdien/people.png" alt="" width="30px" height="30px">
                        <p class="ml-2">
                            <?php echo '<b>' . $set['user'] . '</b>:' . $set['content']; ?>
                        </p>
                    </div>
                </div>
            </div>
        <?php
        endwhile
        ?>
        <hr>
    </div>

    <div class="row">
        <br />
    </div>

    </div>
<?php
endif;
?>


<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Lấy giá trị số lượng tồn từ PHP và chuyển đổi nó thành số nguyên
        var soLuongTon = <?php echo $slton; ?>;

        // Gán sự kiện click cho nút "MUA NGAY"
        document.querySelector('.add-to-cart').addEventListener('click', function () {
            // Lấy giá trị số lượng người dùng nhập
            var soLuongNhap = parseInt(document.getElementById('soluong').value);

            // Kiểm tra nếu số lượng nhập lớn hơn số lượng tồn
            if (soLuongNhap > soLuongTon) {
                // Nếu vượt quá, hiển thị thông báo và ngăn chặn sự kiện mua hàng
                alert('Số lượng nhập vượt quá số lượng tồn.');
                event.preventDefault(); // Ngăn chặn sự kiện mặc định (chẳng hạn, chuyển đến trang mua hàng)
            }
        });
    });
</script>
