<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý tác giả</title>
    <link rel="stylesheet" href="http://localhost/quanlithuvien/Public/thanh.css">
    <link rel="stylesheet" href="http://localhost/quanlithuvien/Public/thanhtable.css">
    <style>
        .cung{
            display: flex;
            align-items: center;
            justify-content: flex-end;
        }
    </style>
</head>
<body>
<form method="post" action="http://localhost/quanlithuvien/tacgia_ds_c/thuchien" >
    <div class="form-in1" style="max-width: auto">
        <div class="header_form">
            <h2>Quản lý tác giả</h2>
        </div>
        <br>
        <div style="text-align: center" >
            <input type="text" name="txtTimkiem" placeholder="🔍 Tìm kiếm mã hoặc tên tác giả" value="<?php if(isset($data['MaTacGia'])) echo $data['MaTacGia'] ?>">
            <input type="submit" name="btnTimkiem" value="Tìm kiếm">
        </div>
        <br>
        <div>
            <a class="link" style="text-align:left" href="http://localhost/quanlithuvien/tacgia_them_c">➕ Thêm mới</a>
        </div>

        <div class="cung">
        <input type="file"  id="myFile2" name="txtfile">&nbsp;
        <button type="submit" name="btnNhap">📥</button>
        </div>

        <table>
            <tr style="background: #facc6afd">
                <th>STT</th>
                <th>Mã tác giả</th>
                <th>Tên tác giả</th>
                <th>Ngày sinh</th>
                <th>Giới tính</th>
                <th>Điện thoại</th>
                <th>Địa chỉ</th>
                <th>Tác vụ</th>
            </tr>
            <?php
            if(isset($data['dulieu']) && mysqli_num_rows($data['dulieu']) > 0) {
                $i = 1;
                while($row = mysqli_fetch_array($data['dulieu'])) {
                    if($i % 2 == 0) {
            ?>
                        <tr>
                            <td style="text-align: center"><?php echo ($i++) ?></td>
                            <td><?php echo $row['MaTacGia'] ?></td>
                            <td><?php echo $row['TenTacGia'] ?></td>
                            <td><?php echo $row['NgaySinh'] ?></td>
                            <td><?php echo $row['GioiTinh'] ?></td>
                            <td><?php echo $row['SDT'] ?></td>
                            <td><?php echo $row['DiaChi'] ?></td>
                            <td class="tacvu">
                                <a href="http://localhost/quanlithuvien/tacgia_ds_c/sua/<?php echo $row['MaTacGia'] ?>">📝 Sửa</a> &nbsp;&nbsp;&nbsp;&nbsp;
                                <a href="http://localhost/quanlithuvien/tacgia_ds_c/xoa/<?php echo $row['MaTacGia'] ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa?');">❌ Xóa</a>
                            </td>
                        </tr>
            <?php
                    } else {
            ?>
                        <tr style="background: rgb(255, 252, 248)">
                            <td style="text-align: center"><?php echo ($i++) ?></td>
                            <td><?php echo $row['MaTacGia'] ?></td>
                            <td><?php echo $row['TenTacGia'] ?></td>
                            <td><?php echo $row['NgaySinh'] ?></td>
                            <td><?php echo $row['GioiTinh'] ?></td>
                            <td><?php echo $row['SDT'] ?></td>
                            <td><?php echo $row['DiaChi'] ?></td>
                            <td class="tacvu">
                                <a href="http://localhost/quanlithuvien/tacgia_ds_c/sua/<?php echo $row['MaTacGia'] ?>">📝 Sửa</a> &nbsp;&nbsp;&nbsp;&nbsp;
                                <a href="http://localhost/quanlithuvien/tacgia_ds_c/xoa/<?php echo $row['MaTacGia'] ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa?');">❌ Xóa</a>
                            </td>
                        </tr>
            <?php
                    }
                }
            }
            ?>
        </table>
        <br>
        <button type="submit" name="btnXuat">📤 Xuất Excel</button>
    </div>
</form>
</body>
</html>
