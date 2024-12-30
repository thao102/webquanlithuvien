<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý tác giả</title>
    <link rel="stylesheet" href="http://localhost/quanlithuvien/Public/thanh.css">
</head>
<body>
    <form method="post" action="http://localhost/quanlithuvien/tacgia_them_c/themmoi">
        <div class="form-in1" style="max-width: 600px">
            <div class="header_form">
                <h2>Quản lý tác giả</h2>
            </div>
            <br>
            <table class="center-form1">
                <tr>
                    <td>Mã tác giả</td>
                    <td>
                        <input type="text" name="txtMatacgia" value="<?php if(isset($data['MaTacGia'])) echo $data['MaTacGia'] ?>" placeholder="Nhập mã" required>
                    </td>
                </tr>
                <tr>
                    <td>Tên tác giả</td>
                    <td>
                        <input type="text" name="txtTentacgia" value="<?php if(isset($data['TenTacGia'])) echo $data['TenTacGia'] ?>" placeholder="Nhập tên" required>
                    </td>
                </tr>
                <tr>
                    <td>Ngày sinh</td>
                    <td>
                        <input type="date" name="txtNgaysinh" value="<?php if(isset($data['NgaySinh'])) echo $data['NgaySinh'] ?>" placeholder="Nhập ngày sinh" required>
                    </td>
                </tr>
                <tr>
                    <td>Giới tính</td>
                    <td>
                        <select name="txtGioitinh" required class ="select">
                            <option value=""></option>
                            <option value="Nam" <?php if (isset($data['GioiTinh'])) echo 'selected'; ?>>Nam</option>
                            <option value="Nữ" <?php if (isset($data['GioiTinh'])) echo 'selected'; ?>>Nữ</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Số điện thoại</td>
                    <td>
                        <input type="number" name="txtDienthoai" value="<?php if(isset($data['SDT'])) echo $data['SDT'] ?>" placeholder="Nhập số điện thoại" required>
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
                        <a class="link" href="http://localhost/quanlithuvien/tacgia_ds_c">↩ Trở về</a></button>
                    </td>
                </tr>
            </table>
        </div>
    </form>
</body>
</html>