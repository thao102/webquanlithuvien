<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
    background-color: #f8f9fa;
    background-image: url('homeback.jpg')!important;
    background-size: cover; /* Để ảnh nền bao phủ toàn bộ màn hình */
    background-repeat: no-repeat; /* Không lặp lại ảnh */
    background-position: center; /* Căn giữa ảnh nền */
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
            background-color: black;
            padding: 20px;
            border-radius: 10px;
            display: flex;
            margin-bottom: 5px;
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
                <h2>MƯỢN SÁCH 📖</h2>
            </div>
            <form action="http://localhost/quanlithuvien/themmuonsach_ctrl/them" method="post">
                <div class="form-group">
                <label for="myMaPhieu">Mã Phiếu:</label>
                <input type="text" class="form-control" id="myMaPhieu" placeholder="Nhập mã phiếu" name="txtMaPhieu" value="<?php if(isset($data['MaPhieu'])) echo $data['MaPhieu'] ?>" required>
                <label for="myMaNV">Người Lập Phiếu:</label>
                <input type="text" class="form-control" id="myMaNV" placeholder="Nhân Viên" name="txtMaNV" value="<?php echo $_SESSION['username']; ?>" readonly>
                <label for="myMaSV">Tên Sinh Viên:</label>
                <select name="cboMaSV" id="myMaSV" class="form-control" required>
                    <option value="">----Mời Bạn Chọn Sinh Viên ----</option>
                    <?php 
                        while($row = mysqli_fetch_array($data['sinhvien'])){
                            if(isset($data['MaSV'])){
                                if($row['MaSV'] == $data['MaSV']){
                                    echo "<option value=".$row['MaSV']." selected>".$row['TenSV']."</option>";
                                } else {
                                    echo "<option value=".$row['MaSV']." >".$row['TenSV']."</option>";
                                }
                            } else {
                                echo "<option value=".$row['MaSV']." >".$row['TenSV']."</option>";
                            }
                        }
                    ?>
                </select>
                <a href="http://localhost/quanlithuvien/themdocgia_ctrl">Thêm Sinh Viên</a>
                <br>
                <label for="myNgayLap">Ngày Lập:</label>
                <input type="date" class="form-control" id="myNgayLap" name="dateNgayLap" value="<?php if(isset($data['NgayLap'])) echo $data['NgayLap'] ?>" required>
                <label for="myNgayHenTra">Ngày Hẹn Trả:</label>
                <input type="date" class="form-control" id="myNgayHenTra" name="dateNgayHenTra" value="<?php if(isset($data['NgayHenTra'])) echo $data['NgayHenTra'] ?>" required>
                <label for="myMaSach">Mã Sách:</label>
                <select name="cboMaSach" id="myMaSach" class="form-control" required>
                    <option value="">----Mời Bạn Chọn Sách----</option>
                    <?php 
                        while($row = mysqli_fetch_array($data['sach'])){
                            if(isset($data['MaSach'])){
                                if($row['MaSach'] == $data['MaSach']){
                                    echo "<option value=".$row['MaSach']." data-quantity=".$row['SoLuong']." selected>".$row['TenSach']."</option>";
                                } else {
                                    echo "<option value=".$row['MaSach']." data-quantity=".$row['SoLuong'].">".$row['TenSach']."</option>";
                                }
                            } else {
                                echo "<option value=".$row['MaSach']." data-quantity=".$row['SoLuong'].">".$row['TenSach']."</option>";
                            }
                        }
                    ?>
                </select>
                <label for="mySoLuongConLai">Số Lượng Còn Lại:</label>
                <input type="text" class="form-control" id="mySoLuongConLai" placeholder="Số lượng còn lại" name="txtSoLuongConLai" readonly>
                <label for="soluong">Số Lượng:</label>
                <input type="text" class="form-control" id="soluong" placeholder="Nhập số lượng" name="txtSoLuong" value="<?php if(isset($data['SoLuong'])) echo $data['SoLuong'] ?>" required>
                <label for="ghichu">Ghi Chú:</label>
                <input type="text" class="form-control" id="ghichu" placeholder="Nhập ghi chú" name="txtGhiChu" value="<?php if(isset($data['GhiChu'])) echo $data['GhiChu'] ?>" required>
                <label for="tinhtrang">Tình Trạng:</label>
                <input type="text" class="form-control" id="tinhtrang" placeholder="Nhập tình trạng" name="txtTinhTrang" value="Tốt" readonly>
            </div>
            <button type="submit" class="btn btn-primary" name="btnLuu">📗 Lưu</button>
            <a href="http://localhost/quanlithuvien/muonsach_ctrl/timkiem1" class="btn btn-success">🔍 Tìm Kiếm</a>
            <a href="http://localhost/quanlithuvien/sach_ctrl/timkiem1" class="btn btn-danger">🔙 Quay Lại</a>
        </form>
        <script>
        $(document).ready(function(){
            $('#myMaSach').change(function(){
                var quantity = $(this).find(':selected').data('quantity');
                $('#mySoLuongConLai').val(quantity);
            });
        });
    </script>
            </form>
            
            </body>
            </html>
            