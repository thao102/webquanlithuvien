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
        .hidden {
            display: none;
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
            return confirm('Bạn có chắc chắn muốn gia hạn?');
        }
    </script>
</head>
<body>
    <div class="container center-form">
        <div class="form-container">
            <form method="post" action="http://localhost/quanlithuvien/giahanmuon_ctrl/suadl">
                <div class="form-group">
                    <?php 
                        if(isset($data['dulieu']) && mysqli_num_rows($data['dulieu'])>0){
                            while($row=mysqli_fetch_array($data['dulieu'])){
                    ?>
                    <label for="myMaPhieu">Mã Phiếu</label>
                    <input type="text" id="myMaPhieu" class="form-control dd1" placeholder="Mã Phiếu" name="txtmaPhieu" value="<?php echo $row['MaPhieu'] ?>" readonly>         
                    <label for="myCanBo">Người Lập phiếu</label>
                    <input type="text" id="myCanBo" class="form-control dd1" placeholder="Mã Cán Bộ" name="txtMaCanBo" value="<?php echo $row['MaNV'] ?>" readonly>
                    <label for="myTheDG">Thẻ Độc Giả</label>
                    <input type="text" id="myTheDG" class="form-control dd1" placeholder="Thẻ Độc Giả" name="txtTheDG" value="<?php echo $row['MaSV'] ?>" readonly>
                    <label for="myNgayLap">Ngày Lập</label>
                    <input type="date" id="myNgaylap" class="form-control dd1" placeholder="Ngày Lập" name="dateNgayLap" value="<?php echo $row['NgayLap'] ?>" readonly>
                    <label for="myNgayHenTra">Gia Hạn</label>
                    <input type="date" id="myNgayHenTra" class="form-control dd1" placeholder="Ngày Hẹn Trả" name="dateNgayHenTra" value="<?php echo $row['NgayHenTra'] ?>" required>
                    <label for="myMaSach">Mã Sách</label>
                    <input type="text" id="myMaSach" class="form-control dd1" placeholder="Mã Sách" name="txtMaSach" value="<?php echo $row['MaSach'] ?>" readonly>
                    <label for="myTenSach">Tên Sách</label>
                    <input type="text" id="myTenSach" class="form-control dd1" placeholder="Tên Sách" name="txtTenSach" value="<?php echo $row['TenSach'] ?>" readonly>
                    <label for="mySoLuong">Số Lượng</label>
                    <input type="text" id="mySoLuong" class="form-control" placeholder="Số Lượng" name="txtSoLuong" value="<?php echo $row['SoLuong'] ?>" readonly>
                    <input type="text" id="mySoLuong" class="form-control hidden" placeholder="" name="txtMaChiTietPhieu" value=" <?php echo $row['MaCTPhieu'] ?>" readonly>
                    <br>
                    <?php
                            }
                        }
                    ?>
                    <button type="submit" class="btn btn-primary" name="btnsua" onclick="return confirmUpdate()">Gia Hạn</button>
                    <a href="http://localhost/quanlithuvien/giahanmuon_ctrl/timkiem1" class="btn btn-primary">Quay Lại</a>
                </div>
            </form>
        </div>
    </div>
    <script>
    function myFunction() {
        confirm("Bạn có chắc chắn muốn gia hạn");
    }
    </script>
</body>
</html>
