<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý nhà xuất bản</title>
    <link rel="stylesheet" href="http://localhost/quanlithuvien/Public/thanh.css">
    
</head>
<body>
<form method="post" action="http://localhost/quanlithuvien/nxb_ds_c/suadl">
    <div class="form-in1" style="max-width: 600px">
        <div class="header_form">
            <h2>Quản lý nhà xuất bản</h2>
        </div>
        <br>
        <div>
            <table class="center-form1">
            <?php
            if(isset($data['dulieu'])&& mysqli_num_rows($data['dulieu'])>0){
                while($row=mysqli_fetch_array($data['dulieu'])){
            ?>
                <tr>
                    <td>Mã nhà xuất bản</td>
                    <td>
                        <input type="text" name="txtManxb" value="<?php echo $row['MaNXB'] ?>" placeholder="Nhập mã" readonly>
                    </td>
                </tr>
                <tr>
                    <td>Tên nhà xuất bản</td>
                    <td>
                        <input type="text" name="txtTennxb" value="<?php echo $row['TenNXB'] ?>" placeholder="Nhập tên" >
                    </td>
                </tr>
                <tr>
                    <td>Số điện thoại</td>
                    <td>
                        <input type="number" name="txtDienthoai" value="<?php echo $row['SDT'] ?>"  placeholder="Nhập số điện thoại">
                    </td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>
                        <input type="email" name="txtEmail" value="<?php echo $row['Email'] ?>"  placeholder="Nhập email">
                    </td>
                </tr>
                <tr>
                    <td>Địa chỉ</td>
                    <td>
                        <textarea name="txtDiachi" id="" ><?php echo $row['DiaChi'] ?></textarea>
                    </td>
                </tr>
            <?php  
                }
            }
            ?>
                <tr>
                    <td></td>
                    <td style="text-align: left;">
                        <input type="submit" name="btnLuu" value="💾 Lưu">
                        <a class="link" href="http://localhost/quanlithuvien/nxb_ds_c">↩ Trở về</a>
                    </td>
                </tr>
            </table>
        </div>

    </div>
</form>
</body>
</html>