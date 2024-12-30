<?php
    class Nhanvien_m extends connectDB{
        public function nhanvien_ins($mnv,$tnv,$user,$pass,$ns,$gt,$dc,$sdt,$email){
            $sql="INSERT INTO nhanvien VALUES ('$mnv','$tnv','$user','$pass','$ns','$gt','$dc','$sdt','$email')";
            return mysqli_query($this->con,$sql);
        }
        public function nhanvien_all(){
            $sql="Select * From nhanvien";
            return mysqli_query($this->con,$sql);
        }
        function nhanvien_checktrungma($mnv){
            $sql="Select * From nhanvien Where MaNV='$mnv'";
            $dl=mysqli_query($this->con,$sql);
            $kq=false;
            if(mysqli_num_rows($dl)>0){
                $kq=true;  //trùng mã
            }
            return $kq;
        }
        function nhanvien_find($mnv,$tnv){
            $sql="SELECT * FROM nhanvien WHERE MaNV like '%$mnv%' 
            AND TenNV like '%$tnv%'";
            return mysqli_query($this->con,$sql);
        }
        function nhanvien_del($mnv){
            $sql="DELETE FROM nhanvien WHERE MaNV='$mnv'";
            return mysqli_query($this->con,$sql);
        }
        function nhanvien_upd($mnv,$tnv,$user,$pass,$ns,$gt,$dc,$sdt,$email){
            $sql="UPDATE nhanvien SET TenNV='$tnv',Username='$user',Password='$pass',NgaySinh='$ns',GioiTinh='$gt',
            DiaChi='$dc',SoDienThoai='$sdt',Email='$email'
            WHERE MaNV='$mnv'";
            return mysqli_query($this->con,$sql);
        }
    }
?>