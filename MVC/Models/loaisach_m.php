<?php 
class loaisach_m extends connectDB{
    public function loaisach_ins($maloaisach,$tenloaisach){
        $sql = "INSERT INTO theloai values ('$maloaisach','$tenloaisach')";
        return mysqli_query($this->con,$sql);
    }
    public function loaisach_checktrungma($maloaisach){
        $sql = "select * from theloai where MaTheLoai = '$maloaisach'";
        $dl =  mysqli_query($this->con,$sql);
        $kq = false;
        if(mysqli_num_rows($dl)>0){
            $kq = true;
        }
        return $kq;
    }
    public function loaisach_checktrungma2($tenloaisach){
        $sql = "select * from theloai where TenTheLoai = '$tenloaisach'";
        $dl =  mysqli_query($this->con,$sql);
        $kq = false;
        if(mysqli_num_rows($dl)>0){
            $kq = true;
        }
        return $kq;
    }
    public function loaisach_checktrungma1($maloaisach) {
        $sql = "SELECT sach.MaSach, theloai.TenTheLoai
                FROM sach
                JOIN theloai ON sach.MaTheLoai = theloai.MaTheLoai
                WHERE theloai.MaTheLoai = '$maloaisach'";
    
        $dl = mysqli_query($this->con, $sql);
        $kq = false;
    
        if (mysqli_num_rows($dl) > 0) {
            $kq = true;
        }
    
        return $kq;
    }
    
    public function loaisach_upd($maloaisach,$tenloaisach){
        $sql = "UPDATE theloai SET TenTheLoai='$tenloaisach' WHERE MaTheLoai = '$maloaisach'";
        return mysqli_query($this->con,$sql);
    }
    public function loaisach_find($maloaisach,$tenloaisach){
        $sql="SELECT * FROM theloai WHERE MaTheLoai like '%$maloaisach%' 
        AND TenTheLoai like '%$tenloaisach%'";
        return mysqli_query($this->con,$sql);
    }
    public function loaisach_del($maloaisach){
        $sql = "DELETE FROM theloai WHERE MaTheLoai = '$maloaisach'";
        return mysqli_query($this->con,$sql);
    }
    public function loaisach_ListAll(){
        $sql = "SELECT * FROM theloai";
        return mysqli_query($this->con,$sql);
    }
}
?>
