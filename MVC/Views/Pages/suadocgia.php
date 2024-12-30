<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="http://localhost/quanlithuvien/Public/css.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="http://localhost/quanlithuvien/Public/Js/jquery-3.3.1.slim.min.js"></script>
    <script src="http://localhost/quanlithuvien/Public/Js/popper.min.js"></script>
    <script src="http://localhost/quanlithuvien/Public/Js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
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
    <script>
        function confirmUpdate() {
            return confirm('Bạn có chắc chắn muốn sửa?');
        }
    </script>
</head>
<body>
    <div class="container center-form">
        <div class="form-container">
            <form method="post" action="http://localhost/quanlithuvien/docgia_ctrl/suadl">
                <div class="form-group">
                    <?php 
                        if(isset($data['dulieu']) && mysqli_num_rows($data['dulieu'])>0){
                            while($row=mysqli_fetch_array($data['dulieu'])){
                    ?>
                    <label for="myTheDG">Thẻ Độc Giả</label>
                    <input type="text" id="myTheDG" class="form-control dd1" placeholder="TheDG " name="txtTheDG" value="<?php echo $row['TheDG'] ?>" readonly>
                    <label for="myTenDG">Tên Độc Giả</label>
                    <input type="text" id="myTenDG" class="form-control dd1" placeholder="TenDG" name="txtTenDG" value="<?php echo $row['TenDG'] ?>" required>
                    <label for="myMaLop">Mã Lớp</label>
                    <input type="text" id="myMaLop" class="form-control dd1" placeholder="MaLop" name="txtMaLop" value="<?php echo $row['MaLop'] ?>" required>
                    <label for="myNgaySinh">Ngày Sinh</label>
                    <input type="date" id="myNgaySinh" class="form-control dd1" placeholder="NgaySinh" name="dNgaySinh" value="<?php echo $row['NgaySinh'] ?>" required>
                    <label for="myGioiTinh">Giới Tính</label>
                    <input type="text" id="myGioiTinh" class="form-control dd1" placeholder="GioiTinh" name="txtGioiTinh" value="<?php echo $row['GioiTinh'] ?>" required>
                    <label for="mySoDienThoai">Số Điện Thoại</label>
                    <input type="text" id="mySoDienThoai" class="form-control" placeholder="SoDienThoai" name="txtSoDienThoai" value="<?php echo $row['SoDienThoai'] ?>" required>
                    <label for="myDiaChi">Địa Chỉ</label>
                    <input type="text" id="myDiaChi" class="form-control dd1" placeholder="DiaChi" name="txtDiaChi" value="<?php echo $row['DiaChi'] ?>" required>
                    <label for="myNgayMuaThe">Ngày Mua Thẻ</label>
                    <input type="date" id="myNgayMuaThe" class="form-control dd1" placeholder="Ngay Mua The" name="dNgayMuaThe" value="<?php echo $row['NgayMuaThe'] ?>" required>
                    <label for="myNgayHetHan">Ngày Hết Hạn</label>
                    <input type="date" id="myNgayHetHan" class="form-control dd1" placeholder="Ngay Het Han" name="dNgayHetHan" value="<?php echo $row['NgayHetHan'] ?>" required>
                    <br>
                    <?php
                            }
                        }
                    ?>
                    <button type="submit" class="btn btn-primary" name="btnsua" onclick="return confirmUpdate()">Sửa</button>
                    <a href="http://localhost/quanlithuvien/docgia_ctrl/timkiem1" class="btn btn-primary">Quay Lại</a>
                </div>
            </form>
        </div>
    </div>
    <script>
    function myFunction() {
        confirm("Bạn có chắc chắn muốn sửa");
    }
    </script>
</body>
</html>
