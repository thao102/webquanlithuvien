<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý tác giả</title>
    <link rel="stylesheet" href="http://localhost/quanlithuvien/Public/thanh.css">
    <link rel="stylesheet" href="http://localhost/quanlithuvien/Public/thanhtable.css">
</head>
<body>
<form method="post" action="http://localhost/quanlithuvien/quanlitinhtrang_ctrl/timkiem">
    <div class="form-in1" style="max-width: 1000px">
            <div class="header_form">
                <h2>Thống kê tình trạng sách</h2>
            </div>
            <br>
            <div style="text-align: center" class="form-in">
                <input type="text" name="txtTimkiem" placeholder="🔍 Tìm kiếm mã sách trong thư viện " value="<?php if(isset($data['MaSach'])) echo $data['MaSach'] ?>">
                <input type="submit" name="btnTimkiem" value="Tìm kiếm">
            </div>
            <br>
            <table>
                <tr style="background: #facc6afd">
                    <th>STT</th>
                    <th>Mã sách</th>
                    <th>Tên sách</th>
                    <th>Số lượng</th>
                    <th>Tình trạng</th>
                </tr>
                <?php 
                if(isset($data['dulieu']) && mysqli_num_rows($data['dulieu'])>0){
                    $i=0;
                    while($row=mysqli_fetch_assoc($data['dulieu'])){
                ?>
                <tr>
                    <td><?php echo (++$i) ?></td>
                    <td><?php echo $row['MaSach'] ?></td>
                    <td><?php echo $row['TenSach'] ?></td>
                    <td><?php echo $row['SoLuong'] ?></td>
                    <td><?php echo $row['TinhTrang'] ?></td>
                </tr>
                <?php
                        }
                    }
                ?>
            </table>
            <br>
            <a class="link" href="http://localhost/quanlithuvien/trasach_ds_c">↩ Trở về</a></button>   
    </div>
</form>
</body>
</html>