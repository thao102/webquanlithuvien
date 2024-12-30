<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script>
        function confirmUpdate() {
            return confirm('Bạn có chắc chắn muốn sửa không?');
        }
    </script>
    <style>
        body {
            background-color: #f8f9fa;
        }
        .form-container {
            max-width: auto;
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
                <h2>Sửa Mượn Sách</h2>
            </div>
    <div class="container center-form">
        <div class="form-container">
            <form method="post" action="http://localhost/quanlithuvien/sach_ctrl/suadl">
                <div class="form-group">
                    <?php 
                        if(isset($data['dulieu']) && mysqli_num_rows($data['dulieu']) > 0){
                            while($row = mysqli_fetch_array($data['dulieu'])){
                    ?>
                    <label for="masach">Mã sách:</label>
                    <input type="text" class="form-control" style="margin-bottom: 10px;" id="masach" placeholder="Nhập mã sách" name="txtMaSach" value="<?php echo $row['MaSach'] ?>" required>
                    <label for="tensach">Tên sách:</label>
                    <input type="text" class="form-control" style="margin-bottom: 10px;" id="tensach" placeholder="Nhập tên sách" name="txtTenSach" value="<?php echo $row['TenSach'] ?>" required>
                    <label for="soluong">Số Lượng:</label>
                    <input type="text" class="form-control" style="margin-bottom: 10px;" id="soluong" placeholder="Nhập số lượng" name="txtSoLuong" value="<?php echo $row['SoLuong'] ?>" required>
                    <label for="noidung">Nội Dung:</label>
                    <input type="text" class="form-control" style="margin-bottom: 10px;" id="noidung" placeholder="Nhập nội dung" name="txtNoiDung" value="<?php echo $row['NoiDung'] ?>" required>
                    <label for="tinhtrang">Tình Trạng:</label>
                    <input type="text" class="form-control" style="margin-bottom: 10px;" id="tinhtrang" placeholder="Nhập tình trạng" name="txtTinhTrang" value="<?php echo $row['TinhTrang'] ?>" required>
                    <select name="cboTheLoai" id="myMaTheLoai" style="margin-bottom: 10px;" class="form-control" >
                        <option value="<?php echo $row['MaTheLoai'] ?>" style="margin-bottom: 10px;"><?php echo $row['MaTheLoai'] ?></option>
                        <?php 
                            if(isset($data['theloai'])){
                                while($theloaiRow = mysqli_fetch_array($data['theloai'])){
                                    $selected = (isset($data['TheLoai']) && $theloaiRow['MaTheLoai'] == $data['TheLoai']) ? 'selected' : '';
                                    echo "<option value='".$theloaiRow['MaTheLoai']."' ".$selected.">".$theloaiRow['TenTheLoai']."</option>";
                                }
                            }
                        ?>
                    </select>
                    <select name="cboMaTacGia" id="myMaTacGia" style="margin-bottom: 10px;" class="form-control" >
                        <option value="<?php echo $row['MaTG'] ?>" style="margin-bottom: 10px;"><?php echo $row['MaTG'] ?></option>
                        <?php 
                            if(isset($data['tacgia'])){
                                while($tacgiaRow = mysqli_fetch_array($data['tacgia'])){
                                    $selected = (isset($data['MaTG']) && $tacgiaRow['MaTG'] == $data['MaTG']) ? 'selected' : '';
                                    echo "<option value='".$tacgiaRow['MaTacGia']."' ".$selected.">".$tacgiaRow['TenTacGia']."</option>";
                                }
                            }
                        ?>
                    </select>
                    <select name="cboMaNhaXuatBan" id="myMaNXB" class="form-control" style="margin-bottom: 10px;">
                        <option value="<?php echo $row['MaNXB'] ?>" style="margin-bottom: 10px;"><?php echo $row['MaNXB'] ?></option>
                        <?php 
                            if(isset($data['nhaxuatban'])){
                                while($nxbRow = mysqli_fetch_array($data['nhaxuatban'])){
                                    $selected = (isset($data['MaNXB']) && $nxbRow['MaNXB'] == $data['MaNXB']) ? 'selected' : '';
                                    echo "<option value='".$nxbRow['MaNXB']."' ".$selected.">".$nxbRow['TenNXB']."</option>";
                                }
                            }
                        ?>      
                    </select>
                    <?php            
                            }
                        } else {
                            echo "No data available.";
                        }
                    ?>
                    <button type="submit" class="btn btn-primary" name="btnSua" onclick=" return confirmUpdate()">Sửa</button>
                    <a href="http://localhost/quanlithuvien/sach_ctrl/timkiem1" class="btn btn-danger">Quay Lại</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
