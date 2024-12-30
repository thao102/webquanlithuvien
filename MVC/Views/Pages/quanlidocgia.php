<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            padding: 10 !important;
        }
         .dd2{width: 400px !important;}
    </style>
    <link rel="stylesheet" href="http://localhost/quanlimuontra/Public/Css/bootstrap.min.css">
    <link rel="stylesheet" href="http://localhost/quanlimuontra/Public/Css/dinhdang7.css">
    <script src="http://localhost/quanlithuvien/Public/Js/jquery-3.3.1.slim.min.js"></script>
    <script src="http://localhost/quanlithuvien/Public/Js/popper.min.js"></script>
    <script src="http://localhost/quanlithuvien/Public/Js/bootstrap.min.js"></script>
</head>
<body class="alert alert-warning">
    <div class="header">
    
    <i ><b><p style="margin-left: 450px;font-size: 26px;font-weight: bold;color: black;text-align: center;font-style: normal;"> QUẢN LÍ SINH VIÊN</p></b></i>
    </div>
 <form method = "post" action="http://localhost/quanlithuvien/docgia_ctrl/timkiem">
        <div class="form-inline">
          <table class="table table-striped">
          <label style="width: 100px;color: black;">Mã Sinh Viên</label>
            <input type="text" class="form-control dd2" name="txtTimkiem" value="<?php isset($data['MaSV']) ? isset($data['MaSV']) : '' ?>">
         
            <button type="submit" class="btn btn-success" name="btnTimkiem" style="margin-left: 10px;"><img src="http://localhost/quanlimuontra/Public/Pictures/search.png" alt="">Tìm kiếm</button> &nbsp &nbsp
            <a href="http://localhost/quanlithuvien/themdocgia_ctrl" class="btn btn-primary" name="btnthem">Thêm</a>
            
         
          <thead>
            <tr><td></td><td></td></tr>
            <tr style="background:rgb(0, 0, 0);">
                <th style="color: white;">STT</th>
                <th style="color: white;">Mã Sinh Viên</th>
                <th style="color: white;">Tên Sinh Viên</th>
                <th style="color: white;">Mã Lớp</th>
                <th style="color: white;">Ngày Sinh</th>
                <th style="color: white;">Giới Tính</th>
                <th style="color: white;">Email</th>
                <th style="color: white;">Số Điện Thoại</th>
                
        
                <th>Thao Tác</th>
            </thead>
            <tbody>
                    <?php 
                        if(isset($data['dulieu']) && mysqli_num_rows($data['dulieu'])>0){
                            $i=0;
                            while($row=mysqli_fetch_assoc($data['dulieu'])){
                    ?>
                            <tr>
                               <td><?php echo (++$i) ?></td>
                               <td style="color: black;"><?php echo $row['MaSV'] ?></td>
                               <td style="color: black;"><?php echo $row['TenSV'] ?></td>
                               <td style="color: black;"><?php echo $row['MaLop'] ?></td>
                               <td style="color: black;"><?php echo $row['NgaySinh'] ?></td>
                               <td style="color: black;"><?php echo $row['GioiTinh'] ?></td>
                               <td style="color: black;"><?php echo $row['Email'] ?></td>
                               <td style="color: black;"><?php echo $row['SDT'] ?></td>
                  
                           
                               
                               <td>
                                    <a href="http://localhost/quanlithuvien/docgia_ctrl/sua/<?php echo $row['MaSV'] ?>" class="btn btn-primary">Sửa</a> &nbsp;
                                    <a href="http://localhost/quanlithuvien/docgia_ctrl/xoa/<?php echo $row['MaSV'] ?>" onclick="return confirmDelete()" class="btn btn-danger">Xóa</a>
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