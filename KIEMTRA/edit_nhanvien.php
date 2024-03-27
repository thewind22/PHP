<?php
require_once("nhanvien.class.php");

if(isset($_POST["btnsubmit"])) {
    $maNV = $_POST["txtMaNV"];
    $tenNV = $_POST["txtTenNV"];
    $phai = $_POST["txtPhai"];
    $noiSinh = $_POST["txtNoiSinh"];
    $maPhong = $_POST["txtMaPhong"];
    $luong = $_POST["txtLuong"];

    $result = Nhanvien::update_nhanvien($maNV, $tenNV, $phai, $noiSinh, $maPhong, $luong);

    if($result) {
        header("Location: list_nhanvien.php?updated");
    } else {
        header("Location: list_nhanvien.php?failure");
    }
}

$maNV = $_GET["Ma_NV"];
$nhanvien = NhanVien::get_nhanvien($maNV);
?>

<?php include_once("header.php"); ?>

<form method="post">
    <div class="row">
        <div class="lbltitle">
            <label for="txtMaNV">Mã nhân viên</label>
        </div>
        <div class="lblinput">
            <input type="text" name="txtMaNV" value="<?php echo $nhanvien["ma_nv"]; ?>" readonly>
        </div>
    </div>

    <div class="row">
        <div class="lbltitle">
            <label for="txtTenNV">Tên nhân viên</label>
        </div>
        <div class="lblinput">
            <input type="text" name="txtTenNV" value="<?php echo $nhanvien["ten_nv"]; ?>">
        </div>
    </div>

    <div class="row">
        <div class="lbltitle">
            <label for="txtPhai">Phái</label>
        </div>
        <div class="lblinput">
            <input type="text" name="txtPhai" value="<?php echo $nhanvien["phai"]; ?>">
        </div>
    </div>

    <div class="row">
        <div class="lbltitle">
            <label for="txtNoiSinh">Nơi sinh</label>
        </div>
        <div class="lblinput">
            <input type="text" name="txtNoiSinh" value="<?php echo $nhanvien["noi_sinh"]; ?>">
        </div>
    </div>

    <div class="row">
        <div class="lbltitle">
            <label for="txtMaPhong">Mã phòng</label>
        </div>
        <div class="lblinput">
            <input type="text" name="txtMaPhong" value="<?php echo $nhanvien["ma_phong"]; ?>">
        </div>
    </div>

    <div class="row">
        <div class="lbltitle">
            <label for="txtLuong">Lương</label>
        </div>
        <div class="lblinput">
            <input type="text" name="txtLuong" value="<?php echo $nhanvien["luong"]; ?>">
        </div>
    </div>

    <div class="submit">
        <input type="submit" name="btnsubmit" value="Cập nhật thông tin">
    </div>
    <li>
            <a href="list_nhanvien.php">quay lại</a>
    </li>
</form>