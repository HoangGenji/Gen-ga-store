<?php 
    $id = $_GET['id'];
    $sql = "DELETE FROM products  where prd_id = $id";
    $query = mysqli_query($connect, $sql);
    header('location: header-admin.php')
?>