<?php
    function MoKetNoi() 
    {
        $dbhost="localhost";
        $dbuser="root";
        $dbpass="";
        $conn=mysqli_connect($dbhost,$dbuser,$dbpass);
        return $conn;
    }
    function DongKetNoi($conn)
    {
        $conn->close();
    }
    // $conn = mysqli_connect("localhost", "root" , "", "csdl_genga")
?>