<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lý Mượn Sách Quá Hạn</title>
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
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .form-inline {
            margin-bottom: 20px;
            justify-content: space-between;
            flex-wrap: wrap;
            margin-bottom: 20px;
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
            color: #d8527a;
            font-size: 2.5em;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 2px;
            border-bottom: 2px solid #d8527a;
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
        <h2 class="header-title">Danh Sách Sinh Viên Mượn Sách Quá Hạn</h2>
        <form method="post" action="http://localhost/quanlithuvien/TKmuonquahan/timkiem">
                <div class="form-inline">
                <label for="txtMaSV">Mã Sinh Viên</label>
                <input type="text" class="form-control" id="txtMaSV" name="txtMaSV" value="<?php if(isset($data['MaSV'])) echo $data['MaSV'] ?>">
                <label for="txtTenSV">Tên Sinh Viên</label>
                <input type="text" class="form-control" id="txtTenSV" name="txtTenSV" value="<?php if(isset($data['TenSV'])) echo $data['TenSV'] ?>">
                <button type="submit" class="btn btn-success" name="btnTimkiem">🔍Tìm kiếm</button>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th style="width: 50px;">STT</th>
                            <th style="width: 200px;">Mã Sách</th>
                            <th style="width: 150px;">Tên Sách</th>
                            <th style="width: 150px;">Mã Sinh Viên</th>
                            <th style="width: 200px;">Tên Sinh Viên</th>
                            <th style="width: 100px;">Điện thoại</th>
                            <th style="width: 100px;">Số Lượng</th>
                            <th style="width: 150px;">Ngày hẹn trả</th>
                            <th style="width: 150px;">Ngày Kết Thúc</th>
                            <th style="width: 150px;">Trạng thái</th>
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
                                   <td><?php echo $row['MaSach'] ?></td>
                                   <td><?php echo $row['TenSach'] ?></td>
                                   <td><?php echo $row['MaSV'] ?></td>
                                   <td><?php echo $row['TenSV'] ?></td>
                                   <td><?php echo $row['SDT'] ?></td>
                                   <td><?php echo $row['SoLuong'] ?></td>
                                   <td><?php echo $row['NgayHenTra'] ?></td>
                                   <td><?php echo $row['NgayKetThuc'] ?></td>
                                   <td><?php echo $row['TrangThai'] ?></td>
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
