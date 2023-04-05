<?php
include_once('header.php');
?>

<form name="formdn" method="post" action="log_in.php">
    <div class="box-login">
        <div class="container-box">
<?php
error_reporting(0);
session_start();

$Username = "";
$mk = "";
if (isset($_POST["btndangnhap"])) {
    session_start();
    include 'connect.php';
    $conn = MoKetNoi();
    if ($conn->connect_error) {
        echo "<p> khong ket noi duoc voi mysql </p>";
    }
    mysqli_select_db($conn, "Genga");
    $Username = $_POST['txttendn'];
    $mk = $_POST['txtmk'];
    $kt = 1;
    if (empty($Username) || empty($mk)) {
        echo "<p> ban chua nhap du thong tin</p>";
        $kt = 0;
    }
    $query = mysqli_query($conn, "SELECT TENDANGNHAP,MATKHAU,PHANLOAI FROM Accout
            WHERE TENDANGNHAP='$Username' ");
    if (mysqli_num_rows($query) == 0) {
        echo "<p> ten dang nhap khong ton tai </p>";
        $kt = 0;
    } else {
        $rows = mysqli_fetch_array($query);
        if ($mk != $rows['MATKHAU']) {
            echo "<p>TÊN ĐĂNG NHẬP HOẶC MẬT KHẨU CHƯA CHÍNH XÁC - VUI LÒNG NHẬP LẠI !</p>";
            $kt = 0;
        }
    }
    if ($kt == 1) {
        $_SESSION['TENDANGNHAP'] = $Username;
        $loai = $rows['PHANLOAI'];
        $_SESSION['loainguoidung'] = $loai;
        header('Location:index.php');
    }
}
?>
            <div class="top">
                <h2 class="top-heading">ĐĂNG NHẬP</h2>
                <p class="conten-box-top">hãy đăng nhập để nhận được những ưu đãi tốt nhất của chúng tôi !</p>
            </div>

            <div class="input-field">
                TÊN ĐĂNG NHẬP:
                <br>
                <br>
                <input type="text" class="input-box" placeholder="Tên đăng nhập ..." id="" name="txttendn" value="<?php echo $Username ?>">
            </div>
            <br>
            <div class="input-field">
                MẬT KHẨU:
                <br>
                <br>
                <input type="Password" class="input-box" placeholder="Mật khẩu ..." id="" name="txtmk" value="<?php echo $mk ?>">
            </div>
            <br>
            <div class="input-field">
                <input type="submit" class="submit-box" value="Đăng nhập" id="" name="btndangnhap">
            </div>

            <div class="two-col">
                <div class="two">
                    <label><a href="#">Forgot password?</a></label>
                    <label><a href="register.php">Đăng ký</a></label>
                </div>
                <br>
            </div>
        </div>
    </div>
</form>


<?php
include_once('contact.php');
?>

<?php
include_once('footer.php');
?>