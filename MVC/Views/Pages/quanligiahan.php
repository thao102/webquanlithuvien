<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            
            padding: 0 !important;
        
        }
        .hidden {
            display: none;
        }
         .dd2{width: 400px !important;}
         .header_form {
            background-color: black;
            padding: 20px;
            border-radius: 10px 10px 10px 10px;
            display: flex;
            font-size: 20px;
            color: white;
            font-style: normal;
            justify-content: center;
            align-items: center;
            margin: 30px;
            color: #fff;
        }
    </style>
    <link rel="stylesheet" href="http://localhost/quanlimuontra/Public/Css/bootstrap.min.css">
    <link rel="stylesheet" href="http://localhost/quanlimuontra/Public/Css/dinhdang7.css">
    <script src="http://localhost/quanlithuvien/Public/Js/jquery-3.3.1.slim.min.js"></script>
    <script src="http://localhost/quanlithuvien/Public/Js/popper.min.js"></script>
    <script src="http://localhost/quanlithuvien/Public/Js/bootstrap.min.js"></script>
</head>
<body class="alert alert-warning">
    <div class="header_form">
        <i><b><p style="font-style: normal;">GIA HẠN MƯỢN SÁCH</p></b></i>
    </div>
    <form method="post" action="http://localhost/quanlithuvien/giahanmuon_ctrl/timkiem">
        <div class="form-inline">
            <table class="table table-striped">
                <label style="width: 100px;margin-left: 250px;">Mã Phiếu</label>
                <input type="text"  class="form-control dd2" name="txtMaPhieu" value="<?php echo isset($data['MaPhieu']) ? $data['MaPhieu'] : '' ?>">
                <button type="submit" class="btn btn-success" name="btnTimkiem" style="margin-left: 10px;">🔍Tìm kiếm</button>
                <thead>
                    <tr><td></td><td></td></tr>
                    <tr style="background: #e9e6e6;">
                        <th>STT</th>
                        <th>Mã Phiếu</th>
                        <th>Người lập Phiếu</th>
                        <th>Mã Sinh Viên</th>
                        <th>Ngày Lập</th>
                        <th>Ngày Hẹn Trả</th>
                        <th>Số Lượng Sách Mượn</th>
                        <th class="hidden">Mã Chi Tiết Phiếu</th>
                        <th>Thao Tác</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        if(isset($data['dulieu']) && mysqli_num_rows($data['dulieu']) > 0){
                            $i = 0;
                            while($row = mysqli_fetch_assoc($data['dulieu'])){
                    ?>
                            <tr>
                                <td><?php echo ++$i; ?></td>
                                <td><?php echo $row['MaPhieu']; ?></td>
                                <td><?php echo $row['MaNV']; ?></td>
                                <td><?php echo $row['MaSV']; ?></td>
                                <td><?php echo $row['NgayLap']; ?></td>
                                <td><?php echo $row['NgayHenTra']; ?></td>
                                <td><?php echo $row['SoLuong']; ?></td>
                                <td class="hidden"><?php echo $row['MaCTTPhieu']; ?></td>
                                <td>
                                    <a href="http://localhost/quanlithuvien/giahanmuon_ctrl/sua/<?php echo $row['MaCTPhieu']; ?>" class="btn btn-primary" name ="btnsua">Gia Hạn</a>
                                </td>
                            </tr>
                    <?php
                            }
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </form>
</body>
</html>
