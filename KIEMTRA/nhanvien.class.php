<?php
require_once "config\db.class.php"; 

class NhanVien {
    public $Ma_NV;
    public $Ten_NV;
    public $Phai;
    public $Noi_Sinh;
    public $Ma_Phong;
    public $Luong;

    public function __construct($ma_NV, $ten_NV, $phai, $noi_sinh, $ma_phong, $luong) {
        $this->Ma_NV = $ma_NV;
        $this->Ten_NV = $ten_NV;
        $this->Phai = $phai;
        $this->Noi_Sinh = $noi_sinh;
        $this->Ma_Phong = $ma_phong;
        $this->Luong = $luong;
    }

    public function save() {
        $db = new Db();
        $ma_NV = $db->escape_string($this->Ma_NV);
        $ten_NV = $db->escape_string($this->Ten_NV);
        $phai = $db->escape_string($this->Phai);
        $noiSinh = $db->escape_string($this->Noi_Sinh);
        $maPhong = $db->escape_string($this->Ma_Phong);
        $luong = $db->escape_string($this->Luong);

        $sql = "INSERT INTO NHANVIEN (Ma_NV, Ten_NV, Phai, Noi_Sinh, Ma_Phong, Luong) VALUES ('$ma_NV','$ten_NV', '$phai', '$noiSinh', '$maPhong', '$luong')";
        try {
            $result = $db->query_execute($sql);
            return $result;
        } catch (Exception $e) {
            echo $e->getMessage();
            exit;
        }
    }

    public static function delete_nhanvien($ma_nv) {
        $db = new Db();
        $query = "DELETE FROM NHANVIEN WHERE Ma_NV = '$ma_nv'";
        $result = $db->query_execute($query);
        return $result;
    }

    public static function get_nhanvien($ma_nv) {
        $db = new Db();
        $query = "SELECT * FROM NHANVIEN WHERE Ma_NV = '$ma_nv'";
        $result = $db->select_to_array($query);
        
        if ($result && isset($result[0])) {
            return $result[0];
        } else {
            return null;
        }
    }

    public static function update_nhanvien($ma_nv, $ten_nv, $phai, $noi_sinh, $ma_phong, $luong) {
        $db = new Db();
        $query = "UPDATE NHANVIEN SET Ten_NV = '$ten_nv', Phai = '$phai', Noi_Sinh = '$noi_sinh', Ma_Phong = '$ma_phong', Luong = '$luong' WHERE Ma_NV = '$ma_nv'";
        $result = $db->query_execute($query);
        return $result;
    }

    public static function list_nhanvien() {
        $db = new Db();
        $sql = "SELECT * FROM NHANVIEN";
        $result = $db->select_to_array($sql);
        return $result;
    }
}
