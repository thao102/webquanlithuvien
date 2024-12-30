<?php 
class trasach_m extends connectDB{
    
    // public function id_all(){
    //     $sql = "SELECT MaPhieu FROM phieu";
    //     return mysqli_query($this->con,$sql);
    // }
    public function all(){
        $sql="SELECT phieu.*, sinhvien.TenSV, sinhvien.MaLop FROM phieu, sinhvien WHERE phieu.MaSV = sinhvien.MaSV";
        return mysqli_query($this->con,$sql);
    }
    // public function truyen_dl($MaPhieu) {
    //     $sql = "SELECT * FROM phieu WHERE MaPhieu = '$MaPhieu' and TrangThai='Chưa trả'";
    //     $result = mysqli_query($this->con, $sql);
    //     if ($result && mysqli_num_rows($result) > 0) {
    //         return mysqli_fetch_assoc($result);
    //     }
    //     return null;
    // }
    // public function update_tra($MaPhieu, $TrangThai) {
    //     $sql = "UPDATE phieu SET TrangThai = '$TrangThai' WHERE MaPhieu = '$MaPhieu'";
    //     return mysqli_query($this->con, $sql);
    // }
    public function chitiet($maphieu){
        $sql="SELECT chitietphieu.* , sach.TenSach
        FROM chitietphieu, sach 
        WHERE chitietphieu.MaSach = sach.MaSach and MaPhieu = N'$maphieu'";
        return mysqli_query($this->con,$sql);
    }
    public function chitiet1($machitietphieu){
        $sql="SELECT chitietphieu.* , sach.TenSach
        FROM chitietphieu, sach 
        WHERE chitietphieu.MaSach = sach.MaSach and MaCTPhieu = '$machitietphieu'";
        return mysqli_query($this->con,$sql);
    }
    function find($maphieu){
        $sql="SELECT phieu.*, sinhvien.TenSV, sinhvien.MaLop
         FROM phieu, sinhvien 
         WHERE phieu.MaSV = sinhvien.MaSV AND MaPhieu like N'%$maphieu%'  ";
        return mysqli_query($this->con,$sql);
    }
    function find2($maphieu){
        $sql="SELECT phieu.*, sinhvien.TenSV, sinhvien.MaLop 
        FROM phieu, sinhvien 
        WHERE phieu.MaSV = sinhvien.MaSV and MaPhieu = N'$maphieu' ";
        return mysqli_query($this->con,$sql);
    }
    function delete($maphieu){
        $sql="DELETE FROM phieu WHERE MaPhieu= N'$maphieu'";
        return mysqli_query($this->con,$sql);
    }
    //////////////
    //chitietphieu
    public function all_chitiet($maphieu){
        $sql="SELECT chitietphieu.* , sach.TenSach
        FROM chitietphieu, sach 
        WHERE chitietphieu.MaSach = sach.MaSach and MaPhieu = N'$maphieu'";
        return mysqli_query($this->con,$sql);
    }
    function delete_tra($maphieu,$masach){
        $sql="DELETE FROM chitietphieu WHERE MaPhieu= N'$maphieu' and MaSach= N'$masach' ";
        return mysqli_query($this->con,$sql);
    }
    public function select_tra($maphieu, $masach) {
        $sql = "SELECT SoLuong FROM chitietphieu WHERE MaPhieu = '$maphieu' AND MaSach = '$masach'";
        $result = mysqli_query($this->con, $sql);
    
        if(mysqli_num_rows($result) > 0) {
            // Lấy số lượng từ kết quả truy vấn
            $soluong = mysqli_fetch_assoc($result)['SoLuong'];
            return $soluong;
        } else {
            // Không tìm thấy chi tiết phiếu có MaPhieu và MaSach như vậy
            return 0; // hoặc return false; tùy theo yêu cầu của bạn
        }
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
    public function sach_updsach($masach,$soluongconlai){
        $sql = "UPDATE sach SET SoLuong='$soluongconlai' WHERE MaSach = '$masach'";
        return mysqli_query($this->con,$sql);
    }
    // function get_masach_list($maphieu) {
    //     $sql = "SELECT MaSach FROM chitietphieu WHERE MaPhieu = N'$maphieu'";
    //     return mysqli_query($this->con, $sql);
    // }
    //bang sach tra
    public function insert($masach,$masv, $soluong,$maphieu,$ngaylap,$ngayhentra,$tinhtrang){
        $sql="INSERT INTO sachtra (MaSach, MaSV, SoLuong, MaPhieu, NgayLap, NgayHenTra, TinhTrang) VALUES ('$masach','$masv','$soluong','$maphieu','$ngaylap','$ngayhentra','$tinhtrang')";
        return mysqli_query($this->con,$sql);
    }
    public function ket_hop($maphieu,$masach){//
        $sql="SELECT chitietphieu.*, sach.TenSach, phieu.NgayLap, phieu.MaSV
            FROM chitietphieu
            JOIN sach ON chitietphieu.MaSach = sach.MaSach
            JOIN phieu ON chitietphieu.MaPhieu = phieu.MaPhieu
            WHERE chitietphieu.MaPhieu = N'$maphieu' and chitietphieu.MaSach =N'$masach' ";
        return mysqli_query($this->con,$sql);
    }
    public function all_sachtra(){
        $sql="SELECT sachtra.* , sach.TenSach, sinhvien.TenSV
        FROM sachtra, sach , sinhvien
        WHERE sachtra.MaSach = sach.MaSach and sachtra.MaSV= sinhvien.MaSV ";
        return mysqli_query($this->con,$sql);
    }
    function find_sachtra($masach,$tensach){
        $sql="SELECT sachtra.*, sach.TenSach, sinhvien.MaSV
            FROM sachtra
            JOIN sach ON sachtra.MaSach = sach.MaSach
            JOIN sinhvien on sachtra.MaSV= sinhvien.MaSV
            WHERE sachtra.MaSach LIKE N'%$masach%' OR sach.TenSach LIKE N'%$tensach%'";
        return mysqli_query($this->con,$sql);
    }
    function tinhtrang_upd($machitietphieu,$tinhtrang){
        $sql = "UPDATE chitietphieu SET TinhTrang='$tinhtrang' WHERE MaCTPhieu = '$machitietphieu'";
        return mysqli_query($this->con,$sql);
    }
    //trả muộn
    public function muon(){
        $sql="SELECT phieu.*, sinhvien.TenSV, sinhvien.MaLop 
        FROM phieu, sinhvien 
        WHERE phieu.MaSV = sinhvien.MaSV and NgayHenTra < CURDATE()";
        return mysqli_query($this->con,$sql);
    }
    public function muon1($maphieu){
        $sql="SELECT phieu.*, sinhvien.MaSV, sinhvien.MaLop 
        FROM phieu, sinhvien 
        WHERE phieu.MaSV = sinhvien.MaSV and NgayHenTra < CURDATE()";
        return mysqli_query($this->con,$sql);
    }
}
?>