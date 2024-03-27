<?php
require_once "nhanvien.class.php";

if(isset($_GET["Ma_NV"])) {
    $maNV = $_GET["Ma_NV"];
    
    $result = Nhanvien::delete_nhanvien($maNV);

    if($result) {
        header("Location: list_nhanvien.php?deleted");
    } else {
        header("Location: list_nhanvien.php?failure");
    }
}
?>
