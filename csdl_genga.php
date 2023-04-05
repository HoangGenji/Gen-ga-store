<?php
    include 'connect.php' ;
    $conn=MoKetNoi();
    if($conn->connect_error)
    {
        echo "<p>không kết nối được MySQL</p>";
    }

    $sql="CREATE DATABASE IF NOT EXISTS HHgenga";
    if(!mysqli_query($conn,$sql))
    {
            echo "<p>không tạo được database CBC</p>" .mysqli_error($conn);
    }
    mysqli_select_db($conn,"HHgenga");
   
    $LOAI = "CREATE TABLE IF NOT EXISTS LOAI (
        MATL varchar(20) primary key,
        TENTL nvarchar(200) not null)";
    $results = mysqli_query($conn,$LOAI)or die (mysqli_error($conn));
        

    $TACGIA = "CREATE TABLE IF NOT EXISTS TACGIA (
        MATG varchar(20) primary key,
        TENTG nvarchar(200) not null)";
    $results = mysqli_query($conn,$TACGIA)or die (mysqli_error($conn));

    $NXB = "CREATE TABLE IF NOT EXISTS NHAXUATBAN (
        MANXB varchar(20) primary key,
        TENNXB nvarchar(200) not null)";
    $results = mysqli_query($conn,$NXB)or die (mysqli_error($conn));

    $SACH = "CREATE TABLE IF NOT EXISTS SACH(
        MASACH varchar(20) primary key,
        TUASACH nvarchar(200) not null,
        NAMPHATHANH int default 0,
        HINH varchar(200) not null,
        MANXB varchar(20) not null,
        MATL varchar(20) not null,
        GIA varchar(20) not null, 
        MATG varchar(20) not null)";
    $results = mysqli_query($conn,$SACH)or die (mysqli_error($conn));

    $DataLOAI="INSERT INTO LOAI(MATL,TENTL)". 
    "VALUES ('HHG','Văn học'),".
    "('TTG','Kinh tế')";
    $results = mysqli_query($conn, $DataLOAI) or die (mysqli_error($conn));

    $DataNHAXUATBAN="INSERT INTO NHAXUATBAN (MANXB,TENNXB)". 
                "VALUES ('XB001','Nhà xuât bản văn học'),".
                "('XB002','Nhà xuât bản trẻ'),".
                "('XB003','Nhà xuất bản kinh tế'),".
                "('XB004','Nhà xuất bản giáo dục Việt Nam')";
    $results = mysqli_query($conn,$DataNHAXUATBAN) or die (mysqli_error($conn));

    $DataTACGIA="INSERT INTO TACGIA (MATG,TENTG)". 
                "VALUES ('TG01','Ernest Hemingway'),".
                "('TG02','Hector Malot'),".
                "('TG03','Antoine de Saint'),".
                "('TG04','Trần Thị Ngân Tuyến'),".
                "('TG05','Nguyễn Trọng Hoài'),".
                "('TG06','Nhiều tác giả')";
    $results = mysqli_query($conn,$DataTACGIA) or die (mysqli_error($conn));

    $DataSACH="INSERT INTO SACH (MASACH, TUASACH, NAMPHATHANH, HINH, MANXB, MATL, GIA, MATG)". 
    "VALUES ('VH01','ÁO THUN TAY CUỘN LINEN',2022,'images/ao/MOTF PREMIUM 100% LINEN ROLL-UP SLEEVE BLOUSE_2_11zon.jpg','XB001','HHG','100','TG01'),".
    
    
    "('VH02','ÁO MOTF COTTON LƯỚI PANEL',2022,'images/ao/MOTF PREMIUM COTTON MESH PANEL HOUNDSTOOTH BODYSUIT_3_11zon.jpg','XB001','HHG','100','TG02')";
    // "('A2','ÁO MOTF COTTON LƯỚI PANEL',2022,'images/ao/MOTF PREMIUM COTTON MESH PANEL HOUNDSTOOTH BODYSUIT_3_11zon.jpg','LU','Aa','200000','HA'),".
    // "('A3','ÁO VEST MOTF Ý',2022,'images/ao/MOTF PREMIUM DOUBLE BREASTED SEMI-FORMAL BLAZER_4_11zon.jpg','SHE','Aa','300000','HOANG GENJI'),".
    // "('A4','ÁO KHOÁC DÙ LINEN',2023,'images/ao/MOTF PREMIUM DRAWSTRING WAIST DOWN COAT_5_11zon.jpg','SHE','Aa','400000','HUONG GA'),".
    // "('A5','ÁO Blouse THẲNG LỤA LINEN',2023,'images/ao/MOTF PREMIUM MULBERRY BLEND SILK STRAIGHT BLOUSE_6_11zon.jpg','LU','Aa','500000','HOANG GENJI'),".
    // "('A6','ÁO LEN CAO CẤP MOTF PHA LÊ',2022,'images/ao/MOTF PREMIUM WOOL-MIX FINE KNIT BANDANA SWEATER_13_11zon.jpg','LU','Aa','600000','HUONG GA'),".
    // "('A7','ÁO SHEIN Lyocell',2022,'images/ao/SHEIN Lyocell Draped Top_17_11zon.jpG','SHE','Aa','700000','HOANG GENJI'),".
    // "('A8','ÁO VEST MOTF_9_11',2023,'images/ao/MOTF PREMIUM STRUCTURED CONTRAST COLLAR BLAZER_9_11zon.jpg','SHE','Aa','800000','HUONG GA'),".


$results = mysqli_query($conn, $Data_SANPHAM) or die (mysqli_error($conn));

    DongKetNoi($conn);
    ?>


