<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý nhà xuất bản</title>
    <link rel="stylesheet" href="http://localhost/quanlithuvien/Public/thanh.css">
</head>
<body>
    <form method="post" action="http://localhost/quanlithuvien/nxb_them_c/themmoi">
        <div class="form-in1" style="max-width: 600px">
            <div class="header_form">
                <h2>Quản lý nhà xuất bản</h2>
            </div>
            <br>
            <table class="center-form1">
                <tr>
                    <td>Mã nhà xuất bản</td>
                    <td>
                        <input type="text" name="txtManxb" value="<?php if(isset($data['MaNXB'])) echo $data['MaNXB'] ?>" placeholder="Nhập mã" required>
                    </td>
                </tr>
                <tr>
                    <td>Tên nhà xuất bản</td>
                    <td>
                        <input type="text" name="txtTennxb" value="<?php if(isset($data['TenNXB'])) echo $data['TenNXB'] ?>" placeholder="Nhập tên" required>
                    </td>
                </tr>
                <tr>
                    <td>Số điện thoại</td>
                    <td>
                        <input type="number" name="txtDienthoai" value="<?php if(isset($data['SDT'])) echo $data['SDT'] ?>" placeholder="Nhập số điện thoại" required>
                    </td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>
                        <input type="email" name="txtEmail" value="<?php if(isset($data['Email'])) echo $data['Email'] ?>" placeholder="Nhập email" required>
                    </td>
                </tr>
                <tr>
                    <td>Địa chỉ</td>
                    <td>
                        <textarea name="txtDiachi" placeholder="Nhập địa chỉ" required><?php if(isset($data['DiaChi'])) echo $data['DiaChi'] ?></textarea>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td style="text-align: left;">
                        <input type="submit" name="btnLuu" value="💾 Lưu">
                        <a class="link" href="http://localhost/quanlithuvien/nxb_ds_c">↩ Trở về</a></button>
                    </td>
                </tr>
            </table>
        </div>
    </form>
</body>
</html>