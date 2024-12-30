<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chỉnh Sửa Nhân Viên</title>
    <link rel="stylesheet" href="http://localhost/quanlithuvien/Public/css.css">
    <script src="http://localhost/quanlithuvien/Public/Js/jquery-3.3.1.slim.min.js"></script>
    <script src="http://localhost/quanlithuvien/Public/Js/popper.min.js"></script>
    <script src="http://localhost/quanlithuvien/Public/Js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
        }
        .form-container {
            max-width: 600px;
            margin: 0 auto;
            padding: 30px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
        }
        .form-group label {
            font-weight: bold;
            margin-top: 10px;
        }
        .form-group input, .form-group select {
            margin-bottom: 10px;
        }
        .btn-primary, .btn-danger {
            width: 100px;
        }
        .btn-container {
            display: flex;
            justify-content: space-between;
        }
        .header-title {
            text-align: center;
            margin-bottom: 20px;
            color: #d8527a;
            font-size: 2.5em;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 2px;
            border-bottom: 2px solid #d8527a;
            padding-bottom: 10px;
        }
    </style>
    <script>
        function confirmUpdate() {
            return confirm('Bạn có chắc chắn muốn sửa?');
        }
    </script>
</head>
<body>
    <div class="container">
        <div class="form-container">
            <h2 class="header-title">Chỉnh Sửa Nhân Viên</h2>
            <form method="post" action="http://localhost/quanlithuvien/Danhsachnhanvien/suadl">
                <div class="form-group">
                    <?php 
                        if(isset($data['dulieu']) && mysqli_num_rows($data['dulieu'])>0){
                            while($row=mysqli_fetch_array($data['dulieu'])){
                    ?>
                    <label for="manv">Mã nhân viên:</label>
                    <input type="text" class="form-control" id="manv" placeholder="Nhập mã nhân viên" name="txtMaNV" value="<?php echo $row['MaNV'] ?>" readonly>
                    
                    <label for="tennv">Tên nhân viên:</label>
                    <input type="text" class="form-control" id="tennv" placeholder="Nhập tên nhân viên" name="txtTenNV" value="<?php echo $row['TenNV'] ?>" required>
                    
                    <label for="taikhoan">Tài khoản:</label>
                    <input type="text" class="form-control" id="taikhoan" placeholder="Nhập tài khoản" name="txtTaiKhoan" value="<?php echo $row['Username'] ?>" required>
                    
                    <label for="matkhau">Mật khẩu:</label>
                    <input type="password" class="form-control" id="matkhau" placeholder="Nhập mật khẩu" name="txtMatKhau" value="<?php echo $row['Password'] ?>" required>
                    
                    <label for="ngaysinh">Ngày sinh:</label>
                    <input type="date" id="ngaysinh" class="form-control" placeholder="Ngày sinh" name="txtNgaySinh" value="<?php echo $row['NgaySinh'] ?>" required>
                    
                    <label for="gioitinh">Giới tính:</label>
                    <select id="gioitinh" class="form-control" name="ddlGioiTinh">
                        <option value="">---Chọn giới tính---</option>
                        <option value="Nam" <?php if($row['GioiTinh']=='Nam') echo 'selected'; ?>>Nam</option>
                        <option value="Nữ" <?php if($row['GioiTinh']=='Nữ') echo 'selected'; ?>>Nữ</option>
                        <option value="Khác" <?php if($row['GioiTinh']=='Khác') echo 'selected'; ?>>Khác</option>
                    </select>
                    
                    <label for="diachi">Địa chỉ:</label>
                    <input type="text" class="form-control" id="diachi" placeholder="Nhập địa chỉ" name="txtDiaChi" value="<?php echo $row['DiaChi'] ?>" required> 
                    
                    <label for="sdt">Điện thoại:</label>
                    <input type="tel" id="dienthoai" class="form-control" placeholder="Nhập điện thoại" name="txtSDT" value="<?php echo $row['SDT'] ?>" required>
                    
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" placeholder="Nhập email" name="txtEmail" value="<?php echo $row['Email'] ?>" required>
                    
                   
                    <?php            
                            }
                        }
                    ?>
                </div>
                <div class="btn-container">
                    <button type="submit" class="btn btn-primary" name="btnSua" onclick="return confirmUpdate()">Sửa</button>
                    <a href="http://localhost/quanlithuvien/Danhsachnhanvien/timkiem1" class="btn btn-danger">Quay Lại</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
