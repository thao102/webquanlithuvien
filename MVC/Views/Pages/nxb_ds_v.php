<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý nhà xuất bản</title>
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
<form method="post" action="http://localhost/quanlithuvien/nxb_ds_c/thuchien">
    <div class="form-in1" style="max-width: auto">
            <div class="header_form">
                <h2>Quản lý nhà xuất bản</h2>
            </div>
            <br>
            <div style="text-align: center" class="form-in">
                <input type="text" name="txtTimkiem" placeholder="🔍 Tìm kiếm mã hoặc tên nhà xuất bản ">
                <input type="submit" name="btnTimkiem" value="Tìm kiếm">
            </div>
            <br>
            <div>
            <a class="link" style="text-align:left" href="http://localhost/quanlithuvien/nxb_them_c">➕  Thêm mới</a>
            </div>
            <!-- <div class="cung">
                <input type="file"  id="myFile2" name="txtfile">&nbsp;
                <button type="submit" name="btnNhap">📥</button>
            </div> -->
            <table >
                    <tr style="background: #facc6afd">
                        <th>STT</th>
                        <th>Mã nhà xuất bản</th>
                        <th>Tên nhà xuất bản</th>
                        <th>Điện thoại</th>
                        <th>Email</th>
                        <th>Địa chỉ</th>
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
                                    <td><?php echo $row['MaNXB'] ?></td>
                                    <td><?php echo $row['TenNXB'] ?></td>
                                    <td><?php echo $row['SDT'] ?></td>
                                    <td><?php echo $row['Email'] ?></td>
                                    <td><?php echo $row['DiaChi'] ?></td>
                                    <td class="tacvu">
                                        <a href="http://localhost/quanlithuvien/nxb_ds_c/sua/<?php echo $row['MaNXB'] ?>" >📝 Sửa</a> &nbsp;&nbsp;&nbsp;&nbsp;
                                        <a href="http://localhost/quanlithuvien/nxb_ds_c/xoa/<?php echo $row['MaNXB'] ?> " onclick="return confirm('Bạn có chắc chắn muốn xóa ?');">❌ Xóa</a>
                                    </td>
                                </tr>
                    <?php
                            }else{
                    ?>
                    <tr style="background: rgb(255, 252, 248)">
                        <td style="text-align: center"><?php echo ($i++) ?></td>
                        <td><?php echo $row['MaNXB'] ?></td>
                        <td><?php echo $row['TenNXB'] ?></td>
                        <td><?php echo $row['SDT'] ?></td>
                        <td><?php echo $row['Email'] ?></td>
                        <td><?php echo $row['DiaChi'] ?></td>
                        <td class="tacvu">
                            <a href="http://localhost/quanlithuvien/nxb_ds_c/sua/<?php echo $row['MaNXB'] ?>">📝 Sửa</a> &nbsp;&nbsp;&nbsp;&nbsp;
                            <a href="http://localhost/quanlithuvien/nxb_ds_c/xoa/<?php echo $row['MaNXB'] ?> "onclick="return confirm('Bạn có chắc chắn muốn xóa ?');">❌ Xóa</a>
                        </td>
                    </tr>
                    <?php
                            }
                        }
                    }
                    ?>
                </table>  
                <br>
                <button type="submit"  name="btnXuat">📤 Xuất Excel</button>  
    </div>
</form>
</body>
</html>