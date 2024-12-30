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
    <style>
    .table, th{
        color: white;
    }
    
    
    </style>
<form method="post" action="http://localhost/quanlithuvien/trasach_ds_c/timkiem">
    <div class="form-in1" style="max-width: 1100px">
            <!-- <div class="header_form">
                <h2>Quản lý tác giả</h2>
            </div> -->
            <br>
            <div style="text-align: center" class="form-in">
                <input type="text" name="txtTimkiem" placeholder="🔍 Tìm kiếm mã phiếu " value="<?php if(isset($data['MaPhieu'])) echo $data['MaPhieu'] ?>">
                <input type="submit" name="btnTimkiem" value="Tìm kiếm">
            </div>
            <br>
            <a class="link" style="text-align:left" href="http://localhost/quanlithuvien/trasach_datra_c">📋 Lịch sử trả</a>
            <table >
                    <tr style="background:rgba(44, 44, 44, 0.99)">
                        <th>STT</th>
                        <th>Mã phiếu</th>
                        <th>Mã Sinh Viên</th>
                        <th>Tên Sinh Viên</th>
                        <th>Mã lớp</th>
                        <th>Ngày lập</th>
                        <th>Ngày hẹn trả</th>
                        <th>Trạng thái</th>
                        <th>Tác vụ</th>
                    </tr>
                    <?php
                    if(isset($data['dulieu']) && mysqli_num_rows($data['dulieu'])>0){
                        $i=1;
                        while($row=mysqli_fetch_array($data['dulieu'])){
                            if($i%2==0){
                    ?>
                                <tr>
                                    <td style="text-align: center"><?php echo ($i++) ?></td>
                                    <td><?php echo $row['MaPhieu'] ?></td>
                                    <td><?php echo $row['MaSV'] ?></td>
                                    <td><?php echo $row['TenSV'] ?></td>
                                    <td><?php echo $row['MaLop'] ?></td>
                                    <td><?php echo $row['NgayLap'] ?></td>
                                    <td><?php echo $row['NgayHenTra'] ?></td>
                                    <td><?php echo $row['TrangThai'] ?></td>
                                    <td class="tacvu">
                                        <a href="http://localhost/quanlithuvien/trasach_ds_c/truyen/<?php echo $row['MaPhieu'] ?>" >📝 Trả sách</a> &nbsp;&nbsp;&nbsp;&nbsp;
                                        
                                    </td>
                                </tr>
                    <?php
                            }else{
                    ?>
                    <tr style="background: rgb(255, 252, 248)">
                        <td style="text-align: center"><?php echo ($i++) ?></td>
                        <td><?php echo $row['MaPhieu'] ?></td>
                        <td><?php echo $row['MaSV'] ?></td>
                        <td><?php echo $row['TenSV'] ?></td>
                        <td><?php echo $row['MaLop'] ?></td>
                        <td><?php echo $row['NgayLap'] ?></td>
                        <td><?php echo $row['NgayHenTra'] ?></td>
                        <td><?php echo $row['TrangThai'] ?></td>
                        <td class="tacvu">
                            <a href="http://localhost/quanlithuvien/trasach_ds_c/truyen/<?php echo $row['MaPhieu'] ?>">📝 Trả sách</a> &nbsp;&nbsp;&nbsp;&nbsp;
                            
                        </td>
                    </tr>
                    <?php
                            }
                        }
                    }
                    ?>
                </table>   
    </div>
</form>
</body>
</html>