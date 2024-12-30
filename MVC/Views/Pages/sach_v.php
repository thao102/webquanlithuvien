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
            max-width: 600px;
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
    </style>
</head>
    <link rel="stylesheet" href="http://localhost/quanlithuvien/Public/css.css">
    <script src="http://localhost/quanlithuvien/Public/Js/jquery-3.3.1.slim.min.js"></script>
    <script src="http://localhost/quanlithuvien/Public/Js/popper.min.js"></script>
    <script src="http://localhost/quanlithuvien/Public/Js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<style>
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
    
<body>
   <form action="http://localhost/quanlithuvien/themsach_ctrl/them" method = "post">
   <div class="form-container">
        <h2>Thêm Sách</h2>
        <div class="form-group">
            <label for="myMaSach">Mã sách:</label>
            <input type="text" class="form-control" id="masach" placeholder="Nhập mã sách" name="txtMaSach" value="<?php if(isset($data['MaSach'])) echo $data['MaSach'] ?>" required>
            <label for="tensach">Tên sách:</label>
            <input type="text" class="form-control" id="tensach" style="margin-bottom: 10px;" placeholder="Nhập tên sách" name="txtTenSach" value="<?php if(isset($data['TenSach'])) echo $data['TenSach'] ?>" required>
            <label for="myTheLoai">Thể loại:</label>
            <select name="cboTheLoai" id="myMaTheLoai" class="form-control" style="margin-bottom: 10px;" value="<?php if(isset($data['TheLoai'])) echo $data['TheLoai'] ?>" required>
                    <option value="">----Mời Bạn Chọn Thể Loại----</option>
                    <?php 
                            while($row = mysqli_fetch_array($data['theloai'])){
                                if(isset($data['TheLoai'])){
                                    if($row['MaTheLoai'] == $data['TheLoai']){
                                        echo "<option value=".$row['MaTheLoai']." selected>".$row['TenTheLoai']."</option>";
                                    }
                                    else{
                                        echo "<option value=".$row['MaTheLoai']." >".$row['TenTheLoai']."</option>";
                                    }
                                    
                                }
                                else{
                                    echo "<option value=".$row['MaTheLoai']." >".$row['TenTheLoai']."</option>";
                                }
                            }
                            ?>
            </select>
            <label for="masach">Tác giả:</label>
            <select name="cboMaTacGia" id="myMaTG" class="form-control" style="margin-bottom: 10px;" value="<?php if(isset($data['MaTacGia'])) echo $data['MaTacGia'] ?>" required>
                    <option value="">----Mời Bạn Chọn Tác Giả----</option>
                    <?php 
                            while($row = mysqli_fetch_array($data['tacgia'])){
                                if(isset($data['MaTacGia'])){
                                    if($row['MaTacGia'] == $data['MaTacGia']){
                                        echo "<option value=".$row['MaTacGia']." selected>".$row['TenTacGia']."</option>";
                                    }
                                    else{
                                        echo "<option value=".$row['MaTacGia']." >".$row['TenTacGia']."</option>";
                                    }
                                    
                                }
                                else{
                                    echo "<option value=".$row['MaTacGia']." >".$row['TenTacGia']."</option>";
                                }
                            }
                            ?>
            </select>
            <label for="masach">Nhà xuất bản:</label>
            <select name="cboMaNhaXuatBan" id="myMaNXB" class="form-control" style="margin-bottom: 10px;" value="<?php if(isset($data['MaNXB'])) echo $data['MaNXB'] ?>" required>
                    <option value="">----Mời Bạn Chọn Nhà Xuất Bản----</option>
                    <?php 
                            while($row = mysqli_fetch_array($data['nhaxuatban'])){
                                if(isset($data['MaNXB'])){
                                    if($row['MaNXB'] == $data['MaNXB']){
                                        echo "<option value=".$row['MaNXB']." selected>".$row['TenNXB']."</option>";
                                    }
                                    else{
                                        echo "<option value=".$row['MaNXB']." >".$row['TenNXB']."</option>";
                                    }
                                    
                                }
                                else{
                                    echo "<option value=".$row['MaNXB']." >".$row['TenNXB']."</option>";
                                }
                            }
                            ?>
            </select>
            <label for="soluong">Số Lượng:</label>
            <input type="text" class="form-control" id="soluong" placeholder="Nhập số lượng" name="txtSoLuong" value="<?php if(isset($data['SoLuong'])) echo $data['SoLuong'] ?>" required>
            <label for="noidung">Nội Dung:</label>
            <input type="text" class="form-control" id="noidung" placeholder="Nhập nội dung" name="txtNoiDung" value="<?php if(isset($data['NoiDung'])) echo $data['NoiDung'] ?>" required>
            <label for="tinhtrang">Tình Trạng:</label>
            <input type="text" class="form-control" id="tinhtrang" placeholder="Nhập tình trạng" name="txtTinhTrang" value="Tốt" readonly>

        </div>
        <button type="submit" class="btn btn-primary" name="btnLuu">Lưu</button>
        <a href="http://localhost/quanlithuvien/sach_ctrl/timkiem1" class="btn btn-danger">Quay Lại</a>
        <script>
            $(document).ready(function(){
            $('#myMaSach').change(function(){
                var quantity = $(this).find(':selected').data('quantity');
                $('#myTheLoai').val(quantity);
            });
        });

        </script>
    </div>
    
   </form>
</body>
</html>