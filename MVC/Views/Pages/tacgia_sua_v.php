<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý tác giả</title>
    <link rel="stylesheet" href="http://localhost/quanlithuvien/Public/thanh.css">
    
</head>
<body>
<form method="post" action="http://localhost/quanlithuvien/tacgia_ds_c/suadl">
    <div class="form-in1" style="max-width: 600px">
        <div class="header_form">
            <h2>Quản lý tác giả</h2>
        </div>
        <br>
        <div>
            <table class="center-form1">
            <?php
            if(isset($data['dulieu'])&& mysqli_num_rows($data['dulieu'])>0){
                while($row=mysqli_fetch_array($data['dulieu'])){
            ?>
                <tr>
                    <td>Mã tác giả</td>
                    <td>
                        <input type="text" name="txtMatacgia" value="<?php echo $row['MaTacGia'] ?>" placeholder="Nhập mã" readonly>
                    </td>
                </tr>
                <tr>
                    <td>Tên tác giả</td>
                    <td>
                        <input type="text" name="txtTentacgia" value="<?php echo $row['TenTacGia'] ?>" placeholder="Nhập tên" >
                    </td>
                </tr>
                <tr>
                    <td>Ngày sinh</td>
                    <td>
                        <input type="date" name="txtNgaysinh" value="<?php echo $row['NgaySinh'] ?>" placeholder="Nhập ngày sinh" >
                    </td>
                </tr>
                <tr>
                    <td>Giới tính</td>
                    <td>
                        <div>
                            <select name="txtGioitinh" id="" class ="select">
                                <option value="Nam" <?php if ($row['GioiTinh'] == 'Nam') echo 'selected'; ?>>Nam</option>
                                <option value="Nữ" <?php if ($row['GioiTinh'] == 'Nữ') echo 'selected'; ?>>Nữ</option>
                            </select>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Số điện thoại</td>
                    <td>
                        <input type="number" name="txtDienthoai" value="<?php echo $row['SDT'] ?>"  placeholder="Nhập số điện thoại">
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
                        <a class="link" href="http://localhost/quanlithuvien/tacgia_ds_c">↩ Trở về</a>
                    </td>
                </tr>
            </table>
        </div>

    </div>
</form>
</body>
</html>