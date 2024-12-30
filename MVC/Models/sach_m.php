<?php 
class sach_m extends connectDB{
    public function sach_ins($masach,$tensach,$matheloai,$matacgia,$manhaxuatban,$soluong,$noidung,$tinhtrang){
        $sql = "INSERT INTO sach values ('$masach','$tensach','$matheloai','$matacgia','$manhaxuatban','$soluong','$noidung','$tinhtrang')";
        return mysqli_query($this->con,$sql);
    }
    public function sach_checktrungma($masach){
        $sql = "select * from sach where MaSach = '$masach'";
        $dl =  mysqli_query($this->con,$sql);
        $kq = false;
        if(mysqli_num_rows($dl)>0){
            $kq = true;
        }
        return $kq;
    }
    public function sach_checktrungma2($tensach){
        $sql = "select * from sach where TenSach = '$tensach'";
        $dl =  mysqli_query($this->con,$sql);
        $kq = false;
        if(mysqli_num_rows($dl)>0){
            $kq = true;
        }
        return $kq;
    }
    public function sach_checktrungma1($masach,$tensach){
        $sql = "select * from sach where MaSach = '$masach' and TenSach = '$tensach'";
        $dl =  mysqli_query($this->con,$sql);
        $kq = false;
        if(mysqli_num_rows($dl)>0){
            $kq = true;
        }
        return $kq;
    }
    public function sach_soluong($masach){
        $sql = "SELECT SoLuong FROM sach WHERE MaSach = '$masach'";
        $result = mysqli_query($this->con, $sql);
    
        if(mysqli_num_rows($result) > 0) {
            // Lấy số lượng từ kết quả truy vấn
            $soluong = mysqli_fetch_assoc($result)['SoLuong'];
            return $soluong;
        } else {
            // Không tìm thấy sách có mã sách như vậy
            return 0; // hoặc return false; tùy theo yêu cầu của bạn
        }
    }
    public function sach_upd($masach,$tensach,$theloai,$matacgia,$manhaxuatban,$soluong,$noidung,$tinhtrang){
        $sql = "UPDATE sach SET TenSach='$tensach',MaTheLoai = '$theloai',MaTacGia = '$matacgia',MaNXB = '$manhaxuatban',SoLuong = '$soluong',NoiDung = '$noidung',TinhTrang = '$tinhtrang' WHERE MaSach = '$masach'";
        return mysqli_query($this->con,$sql);
    }
    public function sach_upd1($masach,$soluong){
        $sql = "UPDATE sach SET SoLuong = '$soluong' WHERE MaSach = '$masach'";
        return mysqli_query($this->con,$sql);
    }
    public function sach_find($masach,$tensach){
        $sql="SELECT * FROM sach WHERE MaSach like '%$masach%' AND TenSach like '%$tensach%'";
        return mysqli_query($this->con,$sql);
    }
    public function sach_del($masach){
        $sql = "DELETE FROM sach WHERE MaSach = '$masach'";
        return mysqli_query($this->con,$sql);
    }
    public function loaisach_ListAll(){
        $sql = "SELECT * FROM theloai";
        return mysqli_query($this->con,$sql);
    }
    public function tacgia_ListAll(){
        $sql = "SELECT * FROM tacgia";
        return mysqli_query($this->con,$sql);
    }
    public function nhaxuatban_ListAll(){
        $sql = "SELECT * FROM nhaxuatban";
        return mysqli_query($this->con,$sql);
    }
}
?>
