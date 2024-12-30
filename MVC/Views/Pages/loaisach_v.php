<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            background-color: #f8f9fa;
        }
        .form-container {
            max-width: 500px;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .form-container h2 {
            margin-bottom: 20px;
            color: #343a40;
        }
        .header_form {
            background-color: orange;
            padding: 20px;
            border-radius: 10px 10px 0 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .header_form h2 {
            margin: 0;
            color: #fff;
        }
        .center-form {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }
        .form-inline {
            text-align: center;
        }
        .form-inline .form-control {
            margin: 10px;
        }
        .form-inline .btn {
            margin: 10px;
        }
        table {
            margin-top: 20px;
        }
        table th, table td {
            text-align: center;
            vertical-align: middle;
        }
    </style>
    <link rel="stylesheet" href="http://localhost/quanlithuvien/Public/css.css">
    <script src="http://localhost/quanlithuvien/Public/Js/jquery-3.3.1.slim.min.js"></script>
    <script src="http://localhost/quanlithuvien/Public/Js/popper.min.js"></script>
    <script src="http://localhost/quanlithuvien/Public/Js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<body>
<div class="form-container">
    <div class="header_form">
                <h2> Thêm Thể Loại</h2>
            </div>
            <form action="http://localhost/quanlithuvien/themloaisach_ctrl/them" method="post">
                <div class="form-group">
            <label for="matheloai">Mã thể loại:</label>
            <input type="text" style="width: 300px;" class="form-control" id="matheloai" placeholder="Nhập mã thể loại" name="txtMaTheLoai" value="<?php if(isset($data['MaTheLoai'])) echo $data['MaTheLoai'] ?>" required>
            <label for="tentheloai">Tên thể loại:</label>
            <input type="text" style="width: 300px;" class="form-control" id="tentheloai" placeholder="Nhập tên thể loại" name="txtTenTheLoai" value="<?php if(isset($data['TenTheLoai'])) echo $data['TenTheLoai'] ?>" required>
        </div>
        <button type="submit" class="btn btn-primary" name="btnLuu"> ➕ Lưu</button>
        <a href="http://localhost/quanlithuvien/loaisach_ctrl/timkiem1" class="btn btn-danger">🔙 Quay Lại</a>
            </form>
        
    </div>
   </form>
</body>
</html>