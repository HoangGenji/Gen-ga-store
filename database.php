<?php
    include 'ketnoi_genga.php' ;
    $conn=MoKetNoi();
    if($conn->connect_error)
    {
        echo "<p>không kết nối được MySQL</p>";
    }
   
    $sql="CREATE DATABASE IF NOT EXISTS Genga";
    if(!mysqli_query($conn,$sql))
    {
            echo "<p>không tạo được database Genga</p>" .mysqli_error($conn);
    }
    mysqli_select_db($conn,"Genga");

    $User = "CREATE TABLE IF NOT EXISTS Accout (
        HOTEN varchar(200) NOT NULL,
        EMAIL varchar (200) default 'không được để trống',
        TENDANGNHAP varchar(200) NOT NULL,
        SDT int(10) default 0,
        MATKHAU varchar(200) NOT NULL,
        PHANLOAI varchar(20) default'user',
        PRIMARY KEY (TENDANGNHAP, SDT))";
        $results = mysqli_query($conn,$User)or die (mysqli_error($conn));
    
        $dataAccout="INSERT INTO Accout (HOTEN,EMAIL,TENDANGNHAP,SDT,MATKHAU,PHANLOAI)".
        "values('Genga','Genga@gmail.com','Genga','0999999999','12345','admin')";
        $results = mysqli_query($conn,$dataAccout)or die (mysqli_error($conn));
?>