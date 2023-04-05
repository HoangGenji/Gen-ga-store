<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="themify-icons/themify-icons.css">
    <link rel="stylesheet" href="fontawesome-free-6.3.0-web/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css" />
    <title>THỜI TRANG CÔNG SỞ Gen-Ga</title>

<body>
    <!-- STAR HEARDER -->
    <header>
        <a href="index.php" class="logo">GenGa <p class="abcd">Cửa hàng quần áo GenGa</p></a>
        <!-- <p>ban quan ao</p> -->
        <nav class="navbar">
            <ul>
                <li><a href="index.php">Trang chủ</a></li>
                <li><a href="sanpham.php">Store +</a>
                    <!-- <ul>
                        <li><a href="sanpham.php">Áo sơ mi</a></li>
                        <li><a href="sanpham.php"> Áo thun</a></li>
                        <li><a href="sanpham.php"> Váy</a></li>
                        <li><a href="sanpham.php"> Đầm</a></li>
                        <li><a href="sanpham.php">quần thun</a></li>
                        <li><a href="sanpham.php">Quần jean</a></li>
                    </ul> -->
                </li>
                <li><a href="about.php">Giới thiệu</a></li>
                <li><a href="contact_genga.php">Liên hệ</a></li>
                <li><a href='search.php'><i class='ti-search'></i></a></li>

                <?php
                session_start();
                error_reporting(0);
                if (isset($_SESSION['TENDANGNHAP']) && $_SESSION['TENDANGNHAP']) {
                    echo "<a href='Log_out.php'><input type='button' value='Đăng xuất' class='btn-login'></a>";
                    if (isset($_SESSION['loainguoidung']) && $_SESSION['loainguoidung'] == 'admin') {
                        echo "<li> <a href='index.php' ><i class='ti-user'></i> " . $_SESSION['TENDANGNHAP'] . " </a></li>";
                        echo "<li> <a href='header-admin.php' ><i class='ti-settings'></i> Admin</a></li> ";
                    }
                    if (isset($_SESSION['loainguoidung']) && $_SESSION['loainguoidung'] == 'user') {
                        echo "<li> <a href='index.php'><i class='ti-user'></i> " . $_SESSION['TENDANGNHAP'] . " </a></li> ";
                        echo "<li> <a href='cart_templace.php' ><i class='ti-shopping-cart'></i></a></li> ";
                    }
                } else {
                    echo "<a href='log_in.php'><input type='button' value='Đăng nhập' class='btn-login'></a>";
                    echo "<a href='register.php'><input type='button' value='Đăng ký' class='btn-login'></a>";
                }
                ?>
            </ul>
        </nav>
    </header>
    <!-- END HEARDER -->
</body>

</html>