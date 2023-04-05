<?php include_once('header.php') ?>

<?php
include 'connect.php';
$conn = MoKetNoi();
if ($conn->connect_error) {
    echo "khong ket noi dc MYSQL";
}
mysqli_select_db($conn, "hhhhh");
?>

<div class="container">
    <h2 class="container-heading">SẢN PHẨM MỚI NHẤT</h2>
    <a href="home.php" class="quaylai"><i class="ti-angle-double-left"></i>Quay lại trang chủ</a>
    <br>
    <br>
    <?php
    $truyvan = "select * from SACH AS S, LOAI AS L WHERE S.MATL = L.MATL AND TENTL = 'van hoc'";
    $ketqua = mysqli_query($conn, $truyvan) or die(mysqli_errno($conn));
    $sl = mysqli_num_rows($ketqua);
    $sodong = $sl / 3;
    $du = $sl % 3;
    for ($i = 1; $i <= $sodong; $i++) {
        echo "<div class='row'>";
        for ($j = 1; $j <= 3; $j++) {
            $noidung = mysqli_fetch_array($ketqua);
            echo "<div class='card'><img class='list-img' src='" . $noidung['HINH'] . "'>
            <br><br>" . $noidung['TUASACH'] . "
            <BR><h4 class='card-heading-gia'>Sale: 1.090.000đ</h4>
            <h4 class='card-heading-giam-gia'>Giá gốc: <del>1.990.000đ</del></h4>
            <a href='' class='btn-card'>Mua</a>
            </div>";
        }
        echo"</div>";
    }
    echo "<div class='row'>";
    for ($i = 1; $i <= $du; $i++) {
        $noidung = mysqli_fetch_array($ketqua);
        echo "<div class='card'><img class='list-img' src='" . $noidung['HINH'] . "'>
        <BR><BR>" . $noidung['TUASACH'] . "
        <BR><h4 class='card-heading-gia'>Sale: 1.090.000đ</h4>
        <h4 class='card-heading-giam-gia'>Giá gốc: <del>1.990.000đ</del></h4>
        <a href='' class='btn-card'>Mua</a>
        </div>";
    }
    echo"</div>";
    ?>
</div>

<?php include_once('footer.php') ?>