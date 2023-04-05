<?php
include_once('header.php');
?>

<form name="formdn" method="post" action="register.php">
    <div class="box-reginster">
        <div class="container-box">
<?php
error_reporting(0);
session_start();

$hoten = "";
$email = "";
$Username = "";
$sdt = "";
$pass = "";
$mkr = "";
include 'connect.php';
$conn = MoKetNoi();
if ($conn->connect_error) {
    echo "<p> không thể kết nối được MySQL</p>";
}
mysqli_select_db($conn, "Genga");
if (isset($_POST['txthoten'])) {
    $hoten = $_POST['txthoten'];
    $email = $_POST['txtemail'];
    $Username = $_POST['txttendn'];
    $sdt = $_POST['txtsdt'];
    $pass = $_POST['txtmk'];
    $mkr = $_POST['txtmkr'];
    $kt = 1;
    if ($pass != $mkr) {
        echo "<p>NHẬP LẠI MẬT KHẨU KHÔNG TRÙNG KHỚP - VUI LÒNG NHẬP LẠI !</p> ";
    }
    if (empty($Username) | empty($pass) | empty($mkr) | empty($sdt) | empty($hoten)) {
        echo "<p> BẠN VUI LÒNG NHẬP ĐẦY ĐỦ THÔNG TIN !</p> ";
    }
    if (mysqli_num_rows(mysqli_query($conn, "SELECT TENDANGNHAP FROM Accout WHERE TENDANGNHAP='$Username'")) > 0) {
        echo "<p>TRÙNG LẶP TÀI KHOẢN - VUI LÒNG ĐĂNG KÝ TÀI KHOẢN KHÁC !</p> ";
        $kt = 0;
    }
    if (mysqli_num_rows(mysqli_query($conn, "SELECT TENDANGNHAP FROM Accout WHERE SDT='$sdt'")) > 0) {
        echo "<p>Số điện thoại này đã có người dùng. Vui lòng chọn sdt đăng nhập khác.</p> ";
        $kt = 0;
    }
    if ($kt = 1) {
        $user = "INSERT INTO Accout(HOTEN,EMAIL,TENDANGNHAP,SDT,MATKHAU)
                VALUES('{$hoten}','{$email}','{$Username}','{$sdt}','{$pass}')";
        $results = mysqli_query($conn, $user) or die(mysqli_error($conn));
        echo "<p> ĐĂNG KÝ TÀI KHOẢN THÀNH CÔNG - HÃY ĐĂNG NHẬP !</p> ";
    }
}
?>
            <div class="top">
                <h2 class="top-heading">ĐĂNG KÝ</h2>
                <p class="conten-box-top">Hãy đăng ký ngay để nhận được những ưu đãi tốt nhất của chúng tôi !</p>
            </div>
            <div class="input-field">
                HỌ TÊN:
                <br>
                <br>
                <input type="text" class="input-box" placeholder="Họ tên ..." id="" name="txthoten" value="<?php echo $hoten ?>">
            </div>
            <br>
            <div class="input-field">
               EMAIL:
               <br>
                <br>
                <input type="email" class="input-box" placeholder="Email ..." id="" name="txtemail" value="<?php echo $email ?>">
            </div>
            <br>
            <div class="input-field">
                TÊN ĐĂNG NHẬP:
               <br>
               <br>
                <input type="text" class="input-box" placeholder="Tên đăng nhập ..." id="" name="txttendn" value="<?php echo $Username ?>">
            </div>
            <br>
            <div class="input-field">
                SỐ ĐIỆN THOẠI:
                <br>
                <br>
                <input type="text" class="input-box" placeholder="0987654321 ..." name="txtsdt" id="" value="<?php echo $sdt ?>">
            </div>
            <br>
            <div class="input-field">
                MẬT KHẨU:
                <br>
                <br>
                <input type="Password" class="input-box" placeholder="Mật khẩu ..." id="" name="txtmk" value="<?php echo $pass ?>">
            </div>
            <br>
            <div class="input-field">
                NHẬP LẠI MẬT KHẨU:
                <br>
                <br>
                <input type="Password" class="input-box" placeholder="Nhập lại mật khẩu ..." id="" name="txtmkr" value="<?php echo $mkr ?>">
            </div>
            <br>
            <div class="input-field">
                <input type="submit" class="submit-box" value="Đăng ký" id="" name="btndangky"> 
            </div>

            <div class="two-col">
                <div class="two">
                    <label><a href="#">Forgot password?</a></label>
                    <label><a href="log_in.php">Đăng nhập</a></label>
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