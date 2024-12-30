

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thống Kê Sách Mượn Nhiều Nhất</title>
    <link rel="stylesheet" href="http://localhost/quanlimuontra/Public/Css/bootstrap.min.css">
    <link rel="stylesheet" href="http://localhost/quanlimuontra/Public/Css/dinhdang7.css">
    <script src="http://localhost/quanlithuvien/Public/Js/jquery-3.3.1.slim.min.js"></script>
    <script src="http://localhost/quanlithuvien/Public/Js/popper.min.js"></script>
    <script src="http://localhost/quanlithuvien/Public/Js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
    <h1 class="mt-5" style="margin-left: 300px; padding: 10px;font-size: 28px;font-weight: bold;">THỐNG KÊ SÁCH MƯỢN NHIỀU NHẤT</h1>
    <form method="post" action="http://localhost/quanlithuvien/sachmuonnhieunhat/danhsachmuonnhieunhat"  class="my-4">
        <div class="form-group">
            <label for="startDate">Từ Ngày:</label>
            <input type="date" id="startDate" name="startDate" class="form-control" value="<?php if(isset($data['NgayNhap'])) echo $data['NgayNhap'] ?>" required>
        </div>
        <div class="form-group">
            <label for="endDate">Đến Ngày:</label>
            <input type="date" id="endDate" name="endDate" class="form-control" value="<?php if(isset($data['NgayKetThuc'])) echo $data['NgayKetThuc'] ?>" required>
        </div>
        <button type="submit" class="btn btn-primary" name = "btnThongKe" >Thống Kê</button>
    </form>
    <table class="table table-striped">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Mã Sách</th>
                        <th>Tên Sách</th>
                        <th>Số Lượng Mượn</th>
                    </tr>
                </thead>
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
                </tr>
                <?php
                        }
                    }
                ?>
                </table>
</div>
</body>
</html>


