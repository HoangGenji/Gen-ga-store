<?php include_once('header.php') ?>

<?php
$nd = "";
?>
<form name="formdn" method="post" action="search.php">
    <div class="box-search">
        <div class="container-box">
            <div class="top">
                <h2 class="top-heading">TÌM KIẾM SẢN PHẨM</h2>
            </div>
            <div class="input-field">
                    Tìm kiếm theo:
                    <select name="sltloai" class="select-loai">
                        <option value="TUASACH">Tên sản phẩm</option>
                            <option value="TENTL">Thể loại</option>
                            <option value="TENTG">Tên hãng</option>
                    </select>
            </div>
            <div class="input-field">
                Tìm kiếm:
                <br>
                <input type="text" class="input-box" placeholder="Nhập tên SP muốn tìn kiếm" id="" name="txtND" value="<?php echo $nd ?>">
            </div>
            <br>
            <div class="input-field">
                <input type="submit" class="submit-box" value="Tìm" id="" name="txtTraCuu">
            </div>
        </div>
    </div>
</form>
    <?php
    error_reporting(0);
    session_start();
    include 'connect.php';
    $conn = MoKetNoi();
    if ($conn->connect_error) {
        echo "<p> Không thể kết nối với MySQL </p>";
    }
    mysqli_select_db($conn, "hhhhh");
    if (isset($_POST['txtTraCuu'])) {
        $nd = $_POST['txtND'];
        $loai = $_POST['sltloai'];
        $truyvan = "SELECT TUASACH, TENTG, TENNXB, TENTL, HINH FROM LOAI, NHAXUATBAN, SACH, TACGIA WHERE SACH.MANXB = NHAXUATBAN.MANXB AND SACH.MATG = TACGIA.MATG AND $loai LIKE '%$nd%' AND SACH.MATL = LOAI.MATL";
        $ketqua = mysqli_query($conn, $truyvan) or die(mysqli_error($conn));
        $n = mysqli_num_rows($ketqua);
        echo "<div class='top-heading'> KẾT QUẢ TÌM KIẾM: </div>";
        if ($n != 0) {
            $sodong = $n / 4;
            $du = $n % 4;
            for ($i = 1; $i <= $sodong; $i++) {
                echo "<div class='row'>";
                for ($j = 1; $j <= 4; $j++) {
                    $noidung = mysqli_fetch_array($ketqua);
                    echo "<div class='card'><img class='list-img' src = '" . $noidung['HINH'] . "'><br><br>" . $noidung['TUASACH'] . "
                    <br>
                    <h4 class='card-heading-giam-gia'>Sale: <del>190.000đ</del></h4>
                    <h4 class='card-heading-gia'>Giá gốc: <del>590.000đ</h4>
                    <a href='' class='btn-card'>Mua</a></div>";
                }
                echo "</div>";
            }
            echo "<div class='row'>";
            for ($i = 1; $i <= $du; $i++) {
                $noidung = mysqli_fetch_array($ketqua);
                echo "<div class='card'><img class='list-img' src = '" . $noidung['HINH'] . "'><br><br>" . $noidung['TUASACH'] 
                 . "<br><h4 class='card-heading-gia'>Sale: 1.090.000đ</h4>
                 <h4 class='card-heading-giam-gia'>Giá gốc: <del>1.990.000đ</del></h4>
                 <a href='' class='btn-card'>Mua</a></div>";
            }
            echo "</div>";
        } else {
            echo "<p class='d6'>SẢN PHẨM KHÔNG TỒN TẠI TRONG GenGa STORE !</p>";
        }
    }
    ?>
</div>

<?php include_once('footer.php') ?>