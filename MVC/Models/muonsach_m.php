<?php 
class muonsach_m extends connectDB{
    public function muonsachphieu_ins($maphieu,$manv,$masv,$ngaylap,$ngayhentra,$ngayketthuc,$trangthai){
        $sql = "INSERT INTO phieu values ('$maphieu','$manv','$masv','$ngaylap','$ngayhentra','$ngayketthuc','$trangthai')";
        return mysqli_query($this->con,$sql);
    }
    public function muonsachchitietphieu_ins($maphieu,$masach,$ngayhentra,$ngayketthuc,$soluong,$ghichu,$tinhtrang){
        $sql = "INSERT INTO chitietphieu(MaPhieu,MaSach,NgayHenTra,NgayKetThuc,SoLuong,GhiChu,TinhTrang) values ('$maphieu','$masach','$ngayhentra','$ngayketthuc','$soluong','$ghichu','$tinhtrang')";
        return mysqli_query($this->con,$sql);
    }
    public function muonsach_checktrungma($maphieu){
        $sql = "select * from phieu where MaPhieu = '$maphieu'  ";
        $dl =  mysqli_query($this->con,$sql);
        $kq = false;
        if(mysqli_num_rows($dl)>0){
            $kq = true;
        }
        return $kq;
    }
    public function muonsach_checktrungmaDG($maphieu,$masv){
        $sql = "select * from phieu where MaPhieu = '$maphieu' and MaSV = '$masv'  ";
        $dl =  mysqli_query($this->con,$sql);
        $kq = false;
        if(mysqli_num_rows($dl)>0){
            $kq = true;
        }
        return $kq;
    }
    
    
    public function muonsach_checktrungmaphieuvamasach($maphieu,$masach){
        $sql = "select * from chitietphieu where MaPhieu = '$maphieu' and MaSach = '$masach'  ";
        $dl =  mysqli_query($this->con,$sql);
        $kq = false;
        if(mysqli_num_rows($dl)>0){
            $kq = true;
        }
        return $kq;
    }
    public function muonsach_upd($maloaisach,$tenloaisach){
        $sql = "UPDATE theloai SET TenTheLoai='$tenloaisach' WHERE MaTheLoai = '$maloaisach'";
        return mysqli_query($this->con,$sql);
    }
    public function muonsach_find($masv){
        $sql="SELECT p.MaPhieu, p.NgayLap, p.NgayHenTra, ct.MaSach, ct.SoLuong, ct.GhiChu, ct.TinhTrang
              FROM phieu p
              JOIN chitietphieu ct ON p.MaPhieu = ct.MaPhieu
              WHERE p.MaSV like '%$masv%'
              ORDER BY ct.MaPhieu;
              ";
        return mysqli_query($this->con,$sql);
    }
    public function muonsach_del($maloaisach){
        $sql = "DELETE FROM theloai WHERE MaTheLoai = '$maloaisach'";
        return mysqli_query($this->con,$sql);
    }
    public function muonsach_ListAll(){
        $sql = "SELECT * FROM theloai";
        return mysqli_query($this->con,$sql);
    }
    public function docgia_ListAll(){
        $sql = "SELECT * FROM sinhvien";
        return mysqli_query($this->con,$sql);
    }
    public function sach_ListAll(){
        $sql = "SELECT * FROM sach";
        return mysqli_query($this->con,$sql);
    }
    public function sach_updsach($masach,$soluongconlai){
        $sql = "UPDATE sach SET SoLuong='$soluongconlai' WHERE MaSach = '$masach'";
        return mysqli_query($this->con,$sql);
    }
}
?>
