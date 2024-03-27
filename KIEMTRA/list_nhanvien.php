<?php
require_once("config\db.class.php"); 

class Nhanvien {

    public static function list_nhanvien() {
        $db = new Db();
        $query = "SELECT * FROM NHANVIEN"; 
        $result = $db->select_to_array($query);
        return $result;
    }
}
?>

<?php include 'header.php'; ?>

<main>
    <h2>Danh sách Nhân viên</h2>
    <table class="nhanvien-table">
        <thead>
            <tr><th>
                    <a href="add_nhanvien.php">Thêm nhân viên</a>
                </th></tr>
            <tr>
                <th>mã nhân viên</th>
                <th>tên nhân viên</th>
                <th>giới tính</th>
                <th>nơi sinh</th>
                <th>mã phòng</th>
                <th>lương</th>
                <th>chưc năng</th>
                
            </tr>
        </thead>
        <tbody>
            <?php 
            $nhanvienList = NhanVien::list_nhanvien();

            // Phân trang
            $soNhanVienTrenTrang = 5;
            $soTrang = ceil(count($nhanvienList) / $soNhanVienTrenTrang);

            $trangHienTai = isset($_GET['page']) ? $_GET['page'] : 1;
            $offset = ($trangHienTai - 1) * $soNhanVienTrenTrang;

            $nhanvienList = array_slice($nhanvienList, $offset, $soNhanVienTrenTrang);

            foreach ($nhanvienList as $nhanvien): 
            ?>
                <tr class="nhanvien-item">
                    <td><?php echo $nhanvien["ma_nv"]; ?></td>
                    <td><?php echo $nhanvien["ten_nv"]; ?></td>
                    <td>
                        <?php if ($nhanvien["phai"] == "NU"): ?>
                            <img src="img/1.jpg" alt="Woman" width="30" height="30" class="gender-image">
                        <?php elseif ($nhanvien["phai"] == "NAM"): ?>
                            <img src="img/2.jpg" alt="Man" width="30" height="30" class="gender-image">
                        <?php endif; ?>
                    </td>
                    <td><?php echo $nhanvien["noi_sinh"]; ?></td>
                    <td><?php echo $nhanvien["ma_phong"]; ?></td>
                    <td><?php echo $nhanvien["luong"]; ?></td>
                    <td>
                    <a href="edit_nhanvien.php?Ma_NV=<?php echo $nhanvien['ma_nv']; ?>">Sửa</a>
                    <a href="delete_nhanvien.php?Ma_NV=<?php echo $nhanvien['ma_nv']; ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa nhân viên này không?');">Xóa</a>
                    </td>
                    
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <!-- Phân trang -->
    <div class="pagination">
        <?php for ($i = 1; $i <= $soTrang; $i++): ?>
            <a href="?page=<?php echo $i; ?>" <?php if ($i == $trangHienTai) echo 'class="active"'; ?>><?php echo $i; ?></a>
        <?php endfor; ?>
    </div>
</main>
<?php include 'footer.php'; ?>
