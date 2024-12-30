<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý tác giả</title>
    <link rel="stylesheet" href="http://localhost/quanlithuvien/Public/thanh.css">
    
</head>
<body>
<form method="post" action="http://localhost/quanlithuvien/trasach_ds_c/suadl">
    <div class="form-in1" style="max-width: 600px">
        <div class="header_form">
            <h2>Sửa Tình Trạng</h2>
        </div>
        <br>
        <div>
            <table class="center-form1">
            <?php
            if(isset($data['dulieu'])&& mysqli_num_rows($data['dulieu'])>0){
                while($row=mysqli_fetch_array($data['dulieu'])){
            ?>
                <tr>
                    <td>Mã sách</td>
                    <td>
                        <input type="text" name="txtMaSach" value="<?php echo $row['MaSach'] ?>" placeholder="" readonly>
                    </td>
                </tr>
                <tr>
                    <td>Tên sách</td>
                    <td>
                        <input type="text" name="txtTenSach" value="<?php echo $row['TenSach'] ?>" placeholder="" readonly>
                    </td>
                </tr>
                <tr>
                    <td>Ngày hẹn trả</td>
                    <td>
                        <input type="date" name="txtNgayHenTra" value="<?php echo $row['NgayHenTra'] ?>" placeholder="" readonly>
                    </td>
                </tr>
                <tr>
                    <td>Số lượng</td>
                    <td>
                        <input type="text" name="txtSoLuong" value="<?php echo $row['SoLuong'] ?>"  placeholder="" readonly>
                    </td>
                </tr>
                <tr class="hidden">
                    <td>Mã Chi Tiết Phiếu</td>
                    <td>
                        <input type="text" name="txtMaChiTietPhieu" value="<?php echo $row['MaCTPhieu'] ?>"  placeholder="" readonly>
                    </td>
                </tr>
                <tr>
                    <td>Tình Trạng</td>
                    <td>
                <div>
                    <select name="txtTinhTrang" id="txtTinhTrang" class="select">
                        <option value="Tốt" <?php if ($row['TinhTrang'] == 'Tốt') echo 'selected'; ?>>Tốt</option>
                        <option value="Hỏng" <?php if ($row['TinhTrang'] == 'Hỏng') echo 'selected'; ?>>Hỏng</option>
                    </select>
                </div>
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
                        <a class="link" href="http://localhost/quanlithuvien/trasach_ds_c">↩ Trở về</a>
                    </td>
                </tr>
            </table>
        </div>

    </div>
</form>
</body>
</html>