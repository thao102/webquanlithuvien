<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trả sách</title>
    <link rel="stylesheet" href="http://localhost/quanlithuvien/Public/thanh.css">
    <link rel="stylesheet" href="http://localhost/quanlithuvien/Public/thanhtable.css">
    <style>
        input[type="text"], input[type="date"],input[type="number"] {
            border: none;
        }
        
    </style>
</head>
<body>
<?php
        // Lấy ngày hiện tại
        $ngayhientai = date('Y-m-d');
    ?>
<form method="post" action="">
    <div class="form-in1" style="max-width: 1000px">
        <!-- <div class="header_form">
            <h2>Danh sách mượn quá hạn</h2>
        </div> -->
        <br>
        <div>
            <div>
            <?php
            if(isset($data['dulieu'])&& mysqli_num_rows($data['dulieu'])>0){
                while($row=mysqli_fetch_array($data['dulieu'])){
                    
            ?>   
                <div style="padding-left: 145px">
                    <label  for="txtMaphieu">Mã quá hạn:</label> 
                    <input type="text"  name="txtMaphieu" value="<?php echo $row['MaPhieu'] ?> "  readonly>
                    <!--  -->
                    <label  for="txtMaSV">Mã Sinh Viên:</label> 
                    <input type="text" name="txtMaSV" value="<?php echo $row['MaSV'] ?>"  readonly>
                    <!--  -->
                    <br>
                    <label  for="txtTenSV">Tên Sinh Viên:</label> 
                    <input type="text" name="txtTenSV" value="<?php echo $row['TenSV'] ?>"  readonly>
                    <!--  -->
                    <label  for="txtLop">Lớp:</label> 
                    <input type="text" name="txtLop" value="<?php echo $row['MaLop'] ?>"  readonly>
                    <!--  -->
                    <br>
                    <label  for="txtNgaylap">Ngày mượn:</label> 
                    <input type="date" name="txtNgaylap" value="<?php echo $row['NgayLap'] ?>" readonly >
                    <!--  -->
                    <label  for="txtNgayhentra">Ngày hẹn trả:</label> 
                    <input type="date" name="txtNgayhentra" value="<?php echo $row['NgayHenTra'] ?>" readonly > 
                    <!--  -->
                    <label  for="txtNgayhentra">Mức phạt:</label> 
                    <input type="text" name="txtMucphat" value="50.000 VNĐ" readonly > 
                    
                    <!--  -->
                </div>
                <?php  
                }
            }
            ?>
                    <!--  -->
            </div>
            <label  for="txtNgayketthuc">Thực hiện:</label> 
                    <input type="date" name="txtNgayketthuc" value="<?php echo $ngayhientai ?>" readonly > 
            
            <br>
            <br>
            <br>
            <a class="link" href="http://localhost/quanlithuvien/trasach_ds_c">↩ Trở về</a>
        </div>
    </div>
</form>
</body>
</html>