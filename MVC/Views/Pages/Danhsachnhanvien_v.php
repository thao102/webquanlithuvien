<!DOCTYPE html>
<html lang="en">
<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Kiểm tra xem người dùng có phải là admin không
if($_SESSION['username'] == 'admin'){
    $isAdmin = isset($_SESSION['username']) && $_SESSION['username'];
}else {
    $isAdmin = '';
}

// Sau đó, sử dụng điều kiện để hiển thị hoặc ẩn liên kết trên navbar
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lý Nhân Viên</title>
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
        .center-form {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            margin: 0 auto;
            background: #fff;

            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .form-inline {
            margin-bottom: 20px;
            justify-content: space-between;
            flex-wrap: wrap;
            margin-bottom: 20px;
            text-align: center;
        }
        .form-inline .form-group {
            display: flex;
            align-items: center;
            margin: 10px 0;
        }
        .form-inline .form-control {
            margin: 10px;
        }
        .form-inline .btn {
            margin: 10px;
        }
        .table-responsive {
            margin-top: 20px;
        }
        table th, table td {
            text-align: center;
            vertical-align: middle;
        }
        .table th {
            background: #343a40;
            color: #fff;
        }
        .btn-primary, .btn-danger {
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .btn-primary i, .btn-danger i {
            margin-right: 5px;
        }
        .btn-success i {
            margin-right: 5px;
        }
        .header-title {
            text-align: center;
            margin-bottom: 20px;
            color:rgb(0, 0, 0);
            font-size: 2.5em;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 2px;
           
            padding-bottom: 10px;
        }
        @media (max-width: 768px) {
            .form-inline {
                flex-direction: column;
            }
            .form-inline .form-group {
                width: 100%;
                justify-content: space-between;
            }
            .form-inline .btn {
                width: 100%;
                margin-top: 10px;
            }
        }
    </style>
    <script>
        function confirmDelete() {
            return confirm('Bạn có chắc chắn muốn xóa?');
        }
    </script>
</head>
<body>
<div class="center-form">
        <h2 class="header-title">Danh Sách Nhân Viên</h2>
        <form method="post" action="http://localhost/quanlithuvien/Danhsachnhanvien/timkiem">
                <div class="form-inline">
                <label for="txtMaNV">Mã nhân viên</label>
                <input type="text" class="form-control" id="txtMaNV" name="txtMaNV" value="<?php if(isset($data['MaNV'])) echo $data['MaNV'] ?>">
                <label for="txtTenNV">Tên nhân viên</label>
                <input type="text" class="form-control" id="txtTenNV" name="txtTenNV" value="<?php if(isset($data['TenNV'])) echo $data['TenNV'] ?>">
                <button type="submit" class="btn btn-success" name="btnTimkiem">🔍Tìm kiếm</button>
                <?php if ($isAdmin): ?>
                <a href="http://localhost/quanlithuvien/Nhanvien" class="btn btn-success">➕Thêm nhân viên</a>
                <?php endif; ?>
                <button type="submit" class="btn btn-success" name="btnXuatExcel">↗️Xuất Excel</button>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th style="width: 50px;">STT</th>
                            <th style="width: 200px;">Mã nhân viên</th>
                            <th style="width: 150px;">Tên nhân viên</th>
                            <?php if ($isAdmin): ?>
                            <th style="width: 200px;">Tài khoản</th>
                            <?php endif; ?>
                            <?php if ($isAdmin): ?>
                            <th style="width: 150px;">Mật khẩu</th>
                            <?php endif; ?>
                            <th style="width: 200px;">Ngày sinh</th>
                            <th style="width: 150px;">Giới tính</th>
                            <th style="width: 200px;">Địa chỉ</th>
                            <th style="width: 100px;">Điện thoại</th>
                            <th style="width: 150px;">Email</th>
                            
                            <?php if ($isAdmin): ?>
                            <th style="width: 150px;">Thao Tác</th>
                            <?php endif; ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            if(isset($data['dulieu']) && mysqli_num_rows($data['dulieu'])>0){
                                $i=0;
                                while($row=mysqli_fetch_assoc($data['dulieu'])){
                        ?>
                                <tr>
                                   <td><?php echo (++$i) ?></td>
                                   <td><?php echo $row['MaNV'] ?></td>
                                   <td><?php echo $row['TenNV'] ?></td>
                                   <?php if ($isAdmin): ?>
                                   <td><?php echo $row['Username'] ?></td>
                                   <?php endif; ?>
                                   <?php if ($isAdmin): ?>
                                   <td><?php echo $row['Password'] ?></td>
                                   <?php endif; ?>
                                   <td><?php echo $row['NgaySinh'] ?></td>
                                   <td><?php echo $row['GioiTinh'] ?></td>
                                   <td><?php echo $row['DiaChi'] ?></td>
                                   <td><?php echo $row['SDT'] ?></td>
                                   <td><?php echo $row['Email'] ?></td>
                                   
                                   <td>
                                   <?php if ($isAdmin): ?>
                                        <a href="http://localhost/quanlithuvien/Danhsachnhanvien/sua/<?php echo $row['MaNV'] ?>" class="btn btn-primary"><i class="fa fa-pencil"></i> Sửa</a>
                                        <a href="http://localhost/quanlithuvien/Danhsachnhanvien/xoa/<?php echo $row['MaNV'] ?>" onclick="return confirmDelete()" class="btn btn-danger"><i class="fa fa-trash"></i> Xóa</a>
                                    <?php endif; ?>
                                   </td>
                                </tr>
                        <?php
                                }
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </form>
    </div>
</body>
</html>
