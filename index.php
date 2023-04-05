<!-- STAR HEARDER -->
<?php
include_once('header.php');
?>
<!-- END HEARDER -->

<!-- STAR SLIDE -->
<?php include_once('slide.php'); ?>
<!-- END SLIDE -->

<div class="container-banner">
    <div class="rowbanner">
        <div class="cardbanner">
            <img src="images/banner/home_new_banner_1.jpg" alt="anh" class="list-img">
            <div class="card-heading-content">
                <a href="" class="card-heading-one">NEW COLLECTION</a>
                <a href="" class="card-heading-two">SHOP NOW</a>
            </div>
        </div>

        <div class="cardbanner">
            <img src="images/banner/home_new_banner_2.jpg" alt="anh" class="list-img">
            <div class="card-heading-content">
                <a href="" class="card-heading-one">MIX & MATCH</a>
                <a href="" class="card-heading-two">SHOP NOW</a>
            </div>
        </div>
    </div>
</div>
<section class="trending-product" id="trending">
    <div class="center-text">
        <h2>SẢN PHẨM <span>MỚI</span></h2>
    </div>

    <div class="products">
        <?php
        include_once "con_dbb.php";
        $req = mysqli_query($con, "SELECT * FROM products");
        while ($row = mysqli_fetch_assoc($req)) {
        ?>
            <div class="row2">
                <a class='' href="ajouter_panier.php?id=<?= $row['id'] ?>">
                    <img src="project_images/<?= $row['img'] ?>" alt="" />
                </a>
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
                    <h4><?= $row['name'] ?></h4>
                    <p><?= number_format($row['price']) ?>đ</p>
                </div>
            </div>
        <?php } ?>
    </div>
</section>
<!-- STAR CONTENT -->

<!-- <div class="container">
    <h2 class="container-heading">SẢN PHẨM MỚI</h2>
    <div class="row">
        <?php
        include_once "con_dbb.php";
        $req = mysqli_query($con, "SELECT * FROM products");
        while ($row = mysqli_fetch_assoc($req)) {
        ?>
            <div class="card">
                <img class="list-img" src="project_images/<?= $row['img'] ?>">
                <h4 class="card-heading"><?= $row['name'] ?></h4>
                <h4 class="card-heading-giam-gia">Sale: <?= number_format($row['price']) ?>đ</h4>
                <h4 class="card-heading-gia">Giá gốc: <del>590.000đ</del>đ</h4>
                <a class='btn-card' href="ajouter_panier.php?id=<?= $row['id'] ?>">Mua</a>
            </div>
        <?php } ?>
    </div> -->

<!-- END CONTENT -->
<!-- <div class="container">
<h2 class="container-heading">SẢN PHẨM BÁN CHẠY</h2>
    <div class="row">
        <?php
        include_once "con_dbb.php";
        $req = mysqli_query($con, "SELECT * FROM products");
        while ($row = mysqli_fetch_assoc($req)) {
        ?>
             <div class="card">
                <img class="list-img" src="project_images/<?= $row['img'] ?>">
                <h4 class="card-heading"><?= $row['name'] ?></h4>
                <h4 class="card-heading-giam-gia">Sale: <?= number_format($row['price']) ?>đ</h4>
                <h4 class="card-heading-gia">Giá gốc: <del>590.000đ</del>đ</h4>
                <a class='btn-card' href="ajouter_panier.php?id=<?= $row['id'] ?>">Mua</a>
            </div>
        <?php } ?>
    </div>
</div> -->

<div class="xemthem">
    <a href="page_xem.php">xem thêm sản phẩm <i class="ti-angle-double-down"></i></a>
</div>

<!-- STAR SLIDE BOTTOM -->
<div class="slide-bottom">
</div>
<!-- END SLIDE BOTTOM -->

<!-- STAR BLOG -->
<div class="container-Blog">
    <div class="container-h-c">
        <h2 class="container-heading-blog">GenGa'S BLOG</h2>
        <p class="conainer-content">
            ĐÓN ĐẦU XU HƯỚNG, ĐỊNH HÌNH PHONG CÁCH
        </p>
    </div>
    <div class="row-blog">
        <div class="card">
            <a href=""> <img src="images/item2/post-02-600x315.jpg" alt="anh" class="list-img"> </a>
            <p class="list-content">Trang phục đường phố thịnh hành hiện nay</p>
        </div>

        <div class="card">
            <a href=""> <img src="images/item2/thoi-trang11_1609301537.jpg" alt="anh" class="list-img"></a>
            <p class="list-content">Top trang phục cho mùa hè cho các quý cô</p>
        </div>

        <div class="card">
            <a href=""> <img src="images/item2/post-04-600x315.jpg" alt="anh" class="list-img"></a>
            <p class="list-content">GenGa mở thêm chi nhanh mới tại Cố Đô Huế </p>
        </div>
    </div>
</div>
<!-- END BLOG -->

<?php
include_once('contact.php');
?>
<!-- STAR FOOTER -->
<?php
include_once('footer.php');
?>
<!-- END FOOTER -->