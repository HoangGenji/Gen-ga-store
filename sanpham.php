<?php include_once('header.php') ?>

<section class="trending-product" id="trending">
    <div class="center-text">
        <h2>SẢN PHẨM <span>MỚI</span></h2>
    </div>

    <div class="products">
         <?php
        include_once "condd.php";
        $req = mysqli_query($con, "SELECT * FROM products");
        while ($row = mysqli_fetch_assoc($req)) {
        ?>
        <a class='btn-acard' href="ajouter_panier.php?id=<?= $row['id'] ?>">
        <div class="row2">
            <img src="project_images/<?= $row['image'] ?>" alt="" />
            <div class="product-text">
                <h5>Sale</h5>
            </div>
            <div class="heart-icon">
                <i class="bx bx-heart"></i>
            </div>
            <div class="ratting">
                <i class="bx bx-star"></i>
                <i class="bx bx-star"></i>
                <i class="bx bx-star"></i>
                <i class="bx bx-star"></i>
                <i class="bx bxs-star-half"></i>
            </div>
             <div class="price">
                <h4><?= $row['prd_name'] ?></h4>
                <p><?= number_format($row['price']) ?>đ</p>
            </div>
        </div>
        </a>
        <?php } ?>
    </div>
</section>
<!-- <div class="container">
    <h2 class="container-heading">TẤT CẢ SẢN PHẨM TẠI GENGA</h2>
    <a href="home.php" class="quaylai"><i class="ti-angle-double-left"></i>Quay lại trang chủ</a>
    <br>
    <br>
    <?php
    include 'connect_CBC.php';
    $conn = MoKetNoi();

    if ($conn->connect_error) {
        echo "khong ket noi dc MYSQL";
    }
    mysqli_select_db($conn, "php1fpt");
    ?>
    <?php
    $truyvan = "select * from products";
    $ketqua = mysqli_query($conn, $truyvan) or die(mysqli_errno($conn));
    $tongdong = mysqli_num_rows($ketqua);
    $tranghientai = isset($_GET['trang']) ? $_GET['trang'] : 1;
    $soluong = 3;
    $tongsotrang = ceil($tongdong / $soluong);
    if ($tranghientai > $tongsotrang) {
        $tranghientai =  $tongsotrang;
    } else if ($tranghientai < 1) {
        $current_page = 1;
    }
    $batdau = ($tranghientai - 1) * $soluong;
    $truyvan = "select * from products LIMIT $batdau, $soluong";
    $ketqua = mysqli_query($conn, $truyvan) or die(mysqli_errno($conn));
    echo "<div class='row'>";
    for ($i = 1; $i <= 3; $i++) {
        $dong = mysqli_fetch_array($ketqua);
        echo "<div class='card'><img class='list-img' src='project_images/" . $dong['img'] . "'><br><br>" . $dong['name'] . " <br>
        <h4 class='card-heading-giam-gia'>Sale: <del>590.000đ</del></h4>
        <h4 class='card-heading-gia'>Giá gốc: <del>190.000đ</del></h4>
                    <a href='' class='btn-card'>Mua</a></div>";
    }
    echo "</div>";
    echo "<div class='row'>";
    for ($i = 1; $i <= 3; $i++) {
        $dong = mysqli_fetch_array($ketqua);
    }
    echo "</div>";
    ?>

    <div class="row">
        <div class="card">
            <img src="img/q1.jpg" alt="anh" class="list-img">
            <h4 class="card-heading">Áo Cardigan và váy jean</h4>
            <h4 class="card-heading-giam-gia">SaleL: 199.000đ</h4>
            <h4 class="card-heading-gia">Giá gốc: <del>5990.000đ</del></h4>
            <a href="" class="btn-card">Mua</a>
        </div>

        <div class="card">
            <img src="img/v2.jpg" alt="anh" class="list-img">
            <h4 class="card-heading">Áo Cardigan và váy jean</h4>
            <h4 class="card-heading-giam-gia">SaleL: 199.000đ</h4>
            <h4 class="card-heading-gia">Giá gốc: <del>5990.000đ</del></h4>
            <a href="" class="btn-card">Mua</a>
        </div>

        <div class="card">
            <img src="img/v3.jpg" alt="anh" class="list-img">
            <h4 class="card-heading">Áo Cardigan và váy jean</h4>
            <h4 class="card-heading-giam-gia">SaleL: 199.000đ</h4>
            <h4 class="card-heading-gia">Giá gốc: <del>5990.000đ</del></h4>
            <a href="" class="btn-card">Mua</a>
        </div>
    </div>
    <div class="row">
        <div class="card">
            <img src="img/v1.jpg" alt="anh" class="list-img">
            <h4 class="card-heading">Áo Cardigan và váy jean</h4>
            <h4 class="card-heading-giam-gia">SaleL: 199.000đ</h4>
            <h4 class="card-heading-gia">Giá gốc: <del>5990.000đ</del></h4>
            <a href="" class="btn-card">Mua</a>
        </div>

        <div class="card">
            <img src="img/a2.jpg" alt="anh" class="list-img">
            <h4 class="card-heading">Áo Cardigan và váy jean</h4>
            <h4 class="card-heading-giam-gia">SaleL: 199.000đ</h4>
            <h4 class="card-heading-gia">Giá gốc: <del>5990.000đ</del></h4>
            <a href="" class="btn-card">Mua</a>
        </div>

        <div class="card">
            <img src="img/a1.jpg" alt="anh" class="list-img">
            <h4 class="card-heading">Áo Cardigan và váy jean</h4>
            <h4 class="card-heading-giam-gia">SaleL: 199.000đ</h4>
            <h4 class="card-heading-gia">Giá gốc: <del>5990.000đ</del></h4>
            <a href="" class="btn-card">Mua</a>
        </div>
    </div>
    <div class="row">
        <div class="card">
            <img src="img/q1.jpg" alt="anh" class="list-img">
            <h4 class="card-heading">Áo Cardigan và váy jean</h4>
            <h4 class="card-heading-giam-gia">SaleL: 199.000đ</h4>
            <h4 class="card-heading-gia">Giá gốc: <del>5990.000đ</del></h4>
            <a href="" class="btn-card">Mua</a>
        </div>

        <div class="card">
            <img src="img/q3.jpg" alt="anh" class="list-img">
            <h4 class="card-heading">Áo Cardigan và váy jean</h4>
            <h4 class="card-heading-giam-gia">SaleL: 199.000đ</h4>
            <h4 class="card-heading-gia">Giá gốc: <del>5990.000đ</del></h4>
            <a href="" class="btn-card">Mua</a>
        </div>

        <div class="card">
            <img src="img/q2.jpg" alt="anh" class="list-img">
            <h4 class="card-heading">Áo Cardigan và váy jean</h4>
            <h4 class="card-heading-giam-gia">SaleL: 199.000đ</h4>
            <h4 class="card-heading-gia">Giá gốc: <del>5990.000đ</del></h4>
            <a href="" class="btn-card">Mua</a>
        </div>
    </div>
       


    <div class="page">
        <div class="page-trang">
            <?php
            if ($tranghientai > 1 && $tongsotrang > 1) {
                echo '<a href="sanpham.php?trang=' . ($tranghientai - 1) . '"><i class="ti-arrow-left"></i> BACK</a>';
            }
            for ($i = 1; $i <= $tongsotrang; $i++) {
                if ($i == $tongsotrang) {
                    echo '<span>' . $i . '</span><i class="ti-shift-left-alt"></i>';
                } else {
                    echo '<a href = "sanpham.php?trang=' . $i . '">' . $i . '</a></span><i class="ti-shift-right-alt"></i>';
                }
            }
            if ($tranghientai < $tongsotrang && $tongsotrang > 1) {
                echo '<a href = "sanpham.php?trang=' . ($tranghientai + 1) . '">NEXT <i class="ti-arrow-right"></i></a>';
            }
            ?>
        </div>
    </div> -->
    <?php include_once('footer.php') ?>