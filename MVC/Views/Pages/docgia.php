<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Độc Giả</title>
    <link rel="stylesheet" href="http://localhost/quanlimuontra/Public/Css/bootstrap.min.css">
    <link rel="stylesheet" href="http://localhost/quanlimuontra/Public/Css/dinhdang7.css">
    <script src="http://localhost/quanlithuvien/Public/Js/jquery-3.3.1.slim.min.js"></script>
    <script src="http://localhost/quanlithuvien/Public/Js/popper.min.js"></script>
    <script src="http://localhost/quanlithuvien/Public/Js/bootstrap.min.js"></script>
</head>
<body>
    <form method="post" action="http://localhost/quanlithuvien/themdocgia_ctrl/them">
        <div class="form-group">
            <label for="myMaSV">Mã Sinh Viên</label>
            <input type="text" id="myMaSVien" class="form-control dd1" placeholder="Mã Sinh Viên" name="txtMaSV" value="<?php if(isset($data['MaSV'])) echo $data['MaSv']; ?>" required>
            
            <label for="myTenSV">Tên Sinh Viên</label>
            <input type="text" id="myTenSV" class="form-control dd1" placeholder="Tên Sinh Viên" name="txtTenSV" value="<?php if(isset($data['TenSV'])) echo $data['TenSV']; ?>" required>
            
            <label for="myMaLop">Mã Lớp</label>
            <select name="txtMaLop" class="form-control dd1">
                <?php
                // Lấy danh sách lớp học từ phương thức trong lớp docgia_m
                $docgiaModel = new docgia_m(); // Tạo đối tượng của lớp docgia_m
                $result = $docgiaModel->layDanhSachLopHoc();

                if($result && mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_array($result)) {
                        echo "<option value='{$row['MaLop']}'";
                        if(isset($data['MaLop']) && $data['MaLop'] == $row['MaLop']) echo " selected";
                        echo ">{$row['TenLop']}</option>";
                    }
                } else {
                    echo "<option value=''>Không có lớp học</option>";
                }
                ?>
            </select>
            
            <label for="myNgaySinh">Ngày Sinh</label>
            <input type="Date" id="myNgaySinh" class="form-control dd1" placeholder="Ngày Sinh" name="dNgaySinh" value="<?php if(isset($data['NgaySinh'])) echo $data['NgaySinh']; ?>" required>
            
            <label for="myGioiTinh">Giới Tính</label>
            <input type="text" id="myGioiTinh" class="form-control dd1" placeholder="Giới Tính" name="txtGioiTinh" value="<?php if(isset($data['GioiTinh'])) echo $data['GioiTinh']; ?>" required>
            

            <label for="myEmail">Email</label>
            <input type="text" id="myEmail" class="form-control dd1" placeholder="Email" name="txtEmail" value="<?php if(isset($data['Email'])) echo $data['Email']; ?>" required>
            

            <label for="mySoDienThoai">Số Điện Thoại</label>
            <input type="number" id="mySoDienThoai" class="form-control dd1" placeholder="Số Điện Thoại" name="txtSDT" value="<?php if(isset($data['SDT'])) echo $data['SDT']; ?>" required>
            
           
           
            
            <br>
            <button type="submit" class="btn btn-primary" name="btnluu">Lưu</button>
            <a href="http://localhost/quanlithuvien/docgia_ctrl/timkiem1" class="btn btn-primary" name="btnQuayLai">Quay Lại</a>
        </div>
    </form>
</body>
</html>
