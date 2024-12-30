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
<form method="post" action="http://localhost/quanlithuvien/trasach_datra_c/timkiem">
    <div class="form-in1" style="max-width: 1100px">
            <div class="header_form" style="background-color: black;">
                <h2 style="color: white; padding: 10px; font-weight: bold;">LỊCH SỬ TRẢ SÁCH</h2>
            </div>
            <br>
            <div style="text-align: center" class="form-in">
                <input type="text" name="txtTimkiem" placeholder="🔍 Tìm kiếm mã sách " value="<?php if(isset($data['MaSach'])) echo $data['MaSach'] ?>">
                <input type="submit" name="btnTimkiem" value="Tìm kiếm">
            </div>
            <br>
            <table>
                <tr style="background: #facc6afd">
                    <th>STT</th>
                    <th>Mã sách</th>
                    <th>Tên sách</th>
                    <th>Mã Sinh Viên</th>
                    <th>Tên Sinh Viên</th>
                    <th>Số lượng</th>
                    <th>Mã phiếu</th>
                    <th>Ngày mượn</th>
                    <th>Ngày trả</th>
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
                    <td><?php echo $row['MaSV'] ?></td>
                    <td><?php echo $row['TenSV'] ?></td>
                    <td><?php echo $row['SoLuong'] ?></td>
                    <td><?php echo $row['MaPhieu'] ?></td>
                    <td><?php echo $row['NgayLap'] ?></td>
                    <td><?php echo $row['NgayKetThuc'] ?></td>
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