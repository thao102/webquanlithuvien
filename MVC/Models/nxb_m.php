<?php 
class nxb_m extends connectDB{
    public function insert($manxb, $tennxb,$dienthoai, $email,$diachi){
        $sql="INSERT INTO nhaxuatban VALUES ('$manxb','$tennxb', '$dienthoai','$email','$diachi')";
        return mysqli_query($this->con,$sql);
    }
    public function all(){
        $sql="SELECT * From nhaxuatban";
        return mysqli_query($this->con,$sql);
    }
    function checktrungma($manxb){
        $sql="SELECT * From nhaxuatban Where MaNXB='$manxb'";
        $dl=mysqli_query($this->con,$sql);
        $kq=false;
        if(mysqli_num_rows($dl)>0){
            $kq=true;  //trùng mã
        }
        return $kq;
    }
    function checkrong($manxb, $tennxb,$dienthoai, $email,$diachi){
        if(empty($manxb) || empty($tennxb) || empty($dienthoai)||empty($email)||empty($diachi)){
            return true; // Có trường dữ liệu rỗng
        } else {
            return false; // Không có trường dữ liệu rỗng
        }
    }
    
    function find($manxb,$tennxb){
        $sql="SELECT * FROM nhaxuatban WHERE MaNXB like N'%$manxb%' or TenNXB like N'%$tennxb%' ";
        return mysqli_query($this->con,$sql);
    }
    function find2($manxb){
        $sql="SELECT * FROM nhaxuatban WHERE MaNXB = N'$manxb' ";
        return mysqli_query($this->con,$sql);
    }
    function delete($manxb){
        $sql="DELETE FROM nhaxuatban WHERE MaNXB= N'$manxb'";
        return mysqli_query($this->con,$sql);
    }
    function update($manxb, $tennxb,$dienthoai, $email,$diachi){
        $sql="UPDATE nhaxuatban SET TenNXB='$tennxb' , SDT='$dienthoai', Email='$email',DiaChi='$diachi' WHERE MaNXB='$manxb'";
        return mysqli_query($this->con,$sql);
    }
}
?>