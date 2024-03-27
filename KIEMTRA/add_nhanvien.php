<?php
require_once("nhanvien.class.php");

if(isset($_POST["btnsubmit"])) {

    $ma_nv = $_POST["txtMaNV"];
    $ten_nv = $_POST["txtTenNV"];
    $phai = $_POST["txtPhai"];
    $noi_sinh = $_POST["txtNoiSinh"];
    $ma_phong = $_POST["txtMaPhong"];
    $luong = $_POST["txtLuong"];

    $newNhanVien = new NhanVien($ma_nv, $ten_nv, $phai, $noi_sinh, $ma_phong, $luong);
    $result = $newNhanVien->save();
    
    if ($result) {
        echo "Thêm nhân viên thành công!";
    } else {
        echo "Thêm nhân viên thất bại!";
    }
    
}
?>

<?php include_once("header.php"); ?>

<?php
if(isset($_GET["inserted"])) {
    echo "Thêm nhân viên thành công";
} elseif(isset($_GET["failure"])) {
    echo "Thêm nhân viên thất bại";
}
?>

<form method="post">

    <div class="row">
        <div class="lbltitle">
            <label for="txtMaNV">Mã nhân viên</label>
        </div>
        <div class="lblinput">
            <input type="text" name="txtMaNV" value="<?php echo isset($_POST["txtMaNV"]) ? $_POST["txtMaNV"] : ''; ?>">
        </div>
    </div>

    <div class="row">
        <div class="lbltitle">
            <label for="txtTenNV">Tên nhân viên</label>
        </div>
        <div class="lblinput">
            <input type="text" name="txtTenNV" value="<?php echo isset($_POST["txtTenNV"]) ? $_POST["txtTenNV"] : ''; ?>">
        </div>
    </div>

    <div class="row">
        <div class="lbltitle">
            <label for="txtPhai">Phái</label>
        </div>
        <div class="lblinput">
            <input type="text" name="txtPhai" value="<?php echo isset($_POST["txtPhai"]) ? $_POST["txtPhai"] : ''; ?>">
        </div>
    </div>

    <div class="row">
        <div class="lbltitle">
            <label for="txtNoiSinh">Nơi sinh</label>
        </div>
        <div class="lblinput">
            <input type="text" name="txtNoiSinh" value="<?php echo isset($_POST["txtNoiSinh"]) ? $_POST["txtNoiSinh"] : ''; ?>">
        </div>
    </div>

    <div class="row">
        <div class="lbltitle">
            <label for="txtMaPhong">Mã phòng</label>
        </div>
        <div class="lblinput">
            <input type="text" name="txtMaPhong" value="<?php echo isset($_POST["txtMaPhong"]) ? $_POST["txtMaPhong"] : ''; ?>">
        </div>
    </div>

    <div class="row">
        <div class="lbltitle">
            <label for="txtLuong">Lương</label>
        </div>
        <div class="lblinput">
            <input type="text" name="txtLuong" value="<?php echo isset($_POST["txtLuong"]) ? $_POST["txtLuong"] : ''; ?>">
        </div>
    </div>

    <div class="submit">
        <input type="submit" name="btnsubmit" value="Thêm nhân viên">
    </div>
    <li>
            <a href="list_nhanvien.php">quay lại</a>
    </li>
</form>
<?php include 'footer.php'; ?>