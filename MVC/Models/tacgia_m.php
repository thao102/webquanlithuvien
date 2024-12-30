<?php 
class tacgia_m extends connectDB{
    public function insert($matacgia, $tentacgia, $ngaysinh, $gioitinh,$dienthoai,$diachi){
        $sql="INSERT INTO tacgia VALUES ('$matacgia','$tentacgia', '$ngaysinh', '$gioitinh','$dienthoai','$diachi')";
        return mysqli_query($this->con,$sql);
    }
    public function all(){
        $sql="SELECT * From tacgia";
        return mysqli_query($this->con,$sql);
    }
    function checktrungma($matacgia){
        $sql="SELECT * From tacgia Where MaTacGia='$matacgia'";
        $dl=mysqli_query($this->con,$sql);
        $kq=false;
        if(mysqli_num_rows($dl)>0){
            $kq=true;  //trùng mã
        }
        return $kq;
    }
    function checkrong($matacgia, $tentacgia, $ngaysinh, $gioitinh,$dienthoai,$diachi){
        if(empty($matacgia) || empty($tentacgia) || empty($ngaysinh)||empty($gioitinh)||empty($dienthoai)||empty($diachi)){
            return true; // Có trường dữ liệu rỗng
        } else {
            return false; // Không có trường dữ liệu rỗng
        }
    }
    
    function find($matacgia,$tentacgia){
        $sql="SELECT * FROM tacgia WHERE MaTacGia like N'%$matacgia%' or TenTacGia like N'%$tentacgia%' ";
        return mysqli_query($this->con,$sql);
    }
    function find2($matacgia){
        $sql="SELECT * FROM tacgia WHERE MaTacGia = N'$matacgia' ";
        return mysqli_query($this->con,$sql);
    }
    function delete($matacgia){
        $sql="DELETE FROM tacgia WHERE MaTacGia= N'$matacgia'";
        return mysqli_query($this->con,$sql);
    }
    function update($matacgia, $tentacgia, $ngaysinh, $gioitinh,$dienthoai,$diachi){
        $sql="UPDATE tacgia SET TenTacGia='$tentacgia', NgaySinh='$ngaysinh',GioiTinh='$gioitinh', SDT='$dienthoai',DiaChi='$diachi' WHERE MaTacGia='$matacgia'";
        return mysqli_query($this->con,$sql);
    }
}
?>