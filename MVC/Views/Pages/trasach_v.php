<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin sách</title>
    <link rel="stylesheet" href="http://localhost/quanlithuvien/Public/thanh.css">
</head>
<body>
    <form method="post" action="">
        <label for="txtMaPhieu">Mã phiếu:</label>
        <select id="txtMaPhieu" name="txtMaPhieu" onchange="this.form.submit()">
            <option value="">---Chọn mã---</option>
            <?php
            if (isset($data['ma']) && mysqli_num_rows($data['ma']) > 0) {
                while ($r1 = mysqli_fetch_assoc($data['ma'])) {
                    echo '<option value="' . $r1["MaPhieu"] . '"';
                    if (isset($_POST['txtMaPhieu']) && $_POST['txtMaPhieu'] == $r1["MaPhieu"]) {
                        echo ' selected';
                    }
                    echo '>' . $r1["MaPhieu"] . '</option>';
                }
            }
            ?>
        </select>
        <br><br>
        <label for="txtMaSV">Mã Sinh Viên:</label>
        <input type="text" id="txtMaSV" name="txtMaSV" value="<?php echo isset($data['phieuInfo']['MaSV']) ? $data['phieuInfo']['MaSV'] : ''; ?>" readonly>
        <br><br>
        <label for="txtMaNV">Mã Nhân Viên:</label>
        <input type="text" id="txtMaNV" name="txtMaNV" value="<?php echo isset($data['phieuInfo']['MaNV']) ? $data['phieuInfo']['MaNV'] : ''; ?>" readonly>
        <br><br>
        <label for="txtNgayLap">Ngày lập:</label>
        <input type="date" id="txtNgayLap" name="txtNgayLap" value="<?php echo isset($data['phieuInfo']['NgayLap']) ? $data['phieuInfo']['NgayLap'] : ''; ?>" readonly>
        <br><br>
        <label for="txtNgayHenTra">Ngày hẹn trả:</label>
        <input type="date" id="txtNgayHenTra" name="txtNgayHenTra" value="<?php echo isset($data['phieuInfo']['NgayHenTra']) ? $data['phieuInfo']['NgayHenTra'] : ''; ?>" readonly>
        <br><br>
        <label for="txtNgayKetThuc">Ngày kết thúc:</label>
        <input type="date" id="txtNgayKetThuc" name="txtNgayKetThuc" value="<?php echo isset($data['phieuInfo']['NgayKetThuc']) ? $data['phieuInfo']['NgayKetThuc'] : ''; ?>" readonly>
        <br><br>
        <label for="txtTrangThai">Trạng thái:</label>
        <select id="txtTrangThai" name="txtTrangThai">
            <option value="">Chọn trạng thái</option>
            <option value="Chưa trả" <?php echo isset($data['phieuInfo']['TrangThai']) && $data['phieuInfo']['TrangThai'] == 'Chưa trả' ? 'selected' : ''; ?>>Chưa trả</option>
            <option value="Đã trả" <?php echo isset($data['phieuInfo']['TrangThai']) && $data['phieuInfo']['TrangThai'] == 'Đã trả' ? 'selected' : ''; ?>>Đã trả</option>
        </select>
        <br><br>
    </form>
</body>
</html>
