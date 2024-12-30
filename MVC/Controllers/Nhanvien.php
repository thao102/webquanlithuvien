<?php
class Nhanvien extends controller{
    private $nhanvien;
    function __construct()
    {
        $this->nhanvien = $this->model('Nhanvien_m');
    }
    function Get_data(){
        $this->view('Masterlayout',['page'=>'Nhanvien_v']);
    }
    public function them(){
        if(isset($_POST['btnLuu'])){
            $manv = $_POST['txtMaNV'];
            $tennv = $_POST['txtTenNV'];
            $taikhoan = $_POST['txtTaiKhoan'];
            $matkhau = $_POST['txtMatKhau'];
            $ngaysinh = $_POST['txtNgaySinh'];
            $gioitinh = $_POST['ddlGioiTinh'];
            $diachi = $_POST['txtDiaChi'];
            $dienthoai = $_POST['txtSDT'];
            $email = $_POST['txtEmail'];
            
            // kiem tra trung ma
            $trung = $this->nhanvien -> nhanvien_checktrungma($manv);
            if($trung){
                echo "<script>alert('Mã nhân viên bị trùng mời nhập lại!')</script>";
            }else{
                // insert
                $kq = $this->nhanvien -> nhanvien_ins($manv,$tennv,$taikhoan,$matkhau,$ngaysinh,$gioitinh,$diachi,$dienthoai,$email);
                if($kq){
                    echo "<script>alert('Thêm nhân viên thành công!')</script>";
                }else{
                    echo "<script>alert('Thêm nhân viên thất bại!')</script>";
                }
            }
            $this->view('Masterlayout',
            ['page'=>'Nhanvien_v',
            'MaCanBo'=>$manv,
            'TenCanBo'=>$tennv,
            'Username'=>$taikhoan,
            'Password'=>$matkhau,
            'NgaySinh'=>$ngaysinh,
            'GioiTinh'=>$gioitinh,
            'DiaChi'=>$diachi,
            'SDT'=>$dienthoai,
            'Email'=>$email,
           
        ]);
        }
    }
}
?>