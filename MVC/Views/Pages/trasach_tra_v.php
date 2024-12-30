<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trả sách</title>
    <link rel="stylesheet" href="http://localhost/quanlithuvien/Public/thanh.css">
    <link rel="stylesheet" href="http://localhost/quanlithuvien/Public/thanhtable.css">
    <style>
        input[type="text"], input[type="date"] {
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
    <div class="form-in1" style="max-width: 1100px">
        <!-- <div class="header_form">
            <h2>Quản lý tác giả</h2>
        </div> -->
        <br>
        <div>
            <div>
            <?php
            if(isset($data['dulieu'])&& mysqli_num_rows($data['dulieu'])>0){
                while($row=mysqli_fetch_array($data['dulieu'])){
                    
            ?>
            <div style="text-align: right">
                <a class="link" href="http://localhost/quanlithuvien/trasach_ds_c/tra_all/<?php echo $row['MaPhieu'] ?> "onclick="return confirm('Bạn có chắc chắn trả tất cả không?');">✔ Hoàn tất trả</a>
            </div>
            <br>
            
                <div style="padding-left: 190px">
                    <label  for="txtMaphieu">Mã phiếu:</label> 
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
                    <label  for="txtNgaylap">Ngày lập:</label> 
                    <input type="date" name="txtNgaylap" value="<?php echo $row['NgayLap'] ?>" readonly >
                    <!--  -->
                    <label  for="txtNgayhentra">Ngày hẹn trả:</label> 
                    <input type="date" name="txtNgayhentra" value="<?php echo $row['NgayHenTra'] ?>" readonly >
                    <!--  -->
                    
                    <!--  -->
                </div>
                <?php  
                }
            }
            ?>
                <br>    
                <label  for="txtNgayketthuc">Ngày Trả Sách:</label> 
                <input type="date" name="txtNgayketthuc" value="<?php echo $ngayhientai ?>" readonly >    
                    <!--  -->
                <br>
                <label  for="label">Xem Danh Sách Phiếu Phạt:</label> 
                <a href="http://localhost/quanlithuvien/trasach_muon_c">📚 Danh Sách Phiếu Phạt</a>

            
            </div>
            <table>
                <tr style="background: #facc6afd">
                    <th>STT</th>
                    <th>Mã sách</th>
                    <th>Tên sách</th>
                    <th>Ngày hẹn trả</th>
                    <th>Số lượng</th>
                    <th>Tình trạng</th>
                    <th>Tác vụ</th>
                </tr>
                <?php 
                if(isset($data['dulieu2']) && mysqli_num_rows($data['dulieu2'])>0){
                    $i=0;
                    while($row=mysqli_fetch_assoc($data['dulieu2'])){
                ?>
                <tr>
                    <td><?php echo (++$i) ?></td>
                    <td><?php echo $row['MaSach'] ?></td>
                    <td><?php echo $row['TenSach'] ?></td>
                    <td><?php echo $row['NgayHenTra'] ?></td>
                    <td><?php echo $row['SoLuong'] ?></td>
                    <td><?php echo $row['TinhTrang'] ?></td>

                    <td class="tacvu">
                    <?php 
                        // Kiểm tra nếu còn 1 dòng và nếu xóa dòng đó
                        if (mysqli_num_rows($data['dulieu2']) == 1) {
                            echo '<a href="http://localhost/quanlithuvien/trasach_ds_c/tra_cuoi/' . $row['MaPhieu'] . '" onclick="return confirm(\'Bạn có chắc chắn nhận trả sách không?\');" >📚 Trả</a>';
                            echo '<a href="http://localhost/quanlithuvien/trasach_ds_c/sua/' . $row['MaCTPhieu'] . '">📚 Sửa Tình Trạng</a>';
                        } else {
                            echo '<a href="http://localhost/quanlithuvien/trasach_ds_c/tra_one/' . $row['MaPhieu'] . '" onclick="return confirm(\'Bạn có chắc chắn nhận trả không?\');" >📚 Trả</a>';
                            echo '<a href="http://localhost/quanlithuvien/trasach_ds_c/sua/' . $row['MaCTPhieu'] . ' ">📚 Sửa Tình Trạng</a>';
                        }
                        ?>
                        
                    </td>
                </tr>
                <?php
                        }
                    }
                ?>
            </table>   
            <br>
            <a class="link" href="http://localhost/quanlithuvien/trasach_ds_c">↩ Trở về</a>
        </div>
    </div>
</form>
</body>
</html>