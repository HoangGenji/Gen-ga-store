<?php require_once 'config/db.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.slim.min.js"></script>
    <!-- Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GenGa-Admin</title>
</head>

<body>
    <?php
    if (isset($_GET['page_layout'])) {
        switch ($_GET['page_layout']) {
            case 'danhsach';
                require_once 'sanpham/danhsach.php';
                break;

            case 'them';
                require_once 'sanpham/them.php';
                break;

            case 'sua';
                require_once 'sanpham/sua.php';
                break;

            case 'xoa';
                require_once 'sanpham/xoa.php';
                break;

            default:
                require_once 'sanpham/danhsach.php';
                break;
        }
    } else {
        require_once 'sanpham/danhsach.php';
    }
    ?>
</body>

</html>