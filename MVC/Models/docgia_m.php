<?php 
class docgia_m extends connectDB{
    public function docgia_ins($MaSV,$TenSV,$MaLop,$NgaySinh,$GioiTinh,$Email,$SoDienThoai){
        $sql = "INSERT INTO sinhvien values ('$MaSV','$TenSV','$MaLop','$NgaySinh','$GioiTinh','$Email','$SoDienThoai') ";
        return mysqli_query($this->con,$sql);
    }
    public function docgia_checktrungma($MaSV){
        $sql = "select * from sinhvien where MaSV = '$MaSV'";
        $dl =  mysqli_query($this->con,$sql);
        $kq = false;
        if(mysqli_num_rows($dl)>0){
            $kq = true;
        }
        return $kq;
    }
    public function docgia_upd($MaSV, $TenSV, $MaLop, $NgaySinh, $GioiTinh, $Email, $SoDienThoai) {
        $sql = "UPDATE sinhvien SET TenDG=?, MaLop=?, NgaySinh=?, GioiTinh=?, Email=?, SoDienThoai=? WHERE MaSV=?";
        
        if ($stmt = mysqli_prepare($this->con, $sql)) {
            mysqli_stmt_bind_param($stmt, 'sssssssss', $TenSV, $MaLop, $NgaySinh, $GioiTinh, $Email, $SoDienThoai,$MaSV);
            
            if (mysqli_stmt_execute($stmt)) {
                mysqli_stmt_close($stmt);
                return true;
            } else {
                printf("Error: %s.\n", mysqli_stmt_error($stmt));
                mysqli_stmt_close($stmt);
                return false;
            }
        } else {
            printf("Error: %s.\n", mysqli_error($this->con));
            return false;
        }
    }    public function docgia_find($MaSV){
        $sql="SELECT * FROM sinhvien WHERE MaSV like '%$MaSV%'" ;
        return mysqli_query($this->con,$sql);
    }
    public function docgia_del($MaSV){
        $sql="DELETE FROM sinhvien WHERE MaSV = '$MaSV'" ;
        return mysqli_query($this->con,$sql);
    }
    


    public function layDanhSachLopHoc() {
        $sql = "SELECT MaLop, TenLop FROM lophoc";
        $result = mysqli_query($this->con, $sql);
        if (!$result) {
            printf("Error: %s\n", mysqli_error($this->con));
            return false; // Xử lý lỗi nếu có
        }
        return $result;
    }
}

    // public function all(){
    //     $sql = "SELECT "
         
           
        
?>
    