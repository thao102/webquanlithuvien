<?php
class themloaisach_ctrl extends controller{
    private $loaisach;
    function __construct()
    {
        $this->loaisach = $this->model('loaisach_m');
    }
    function Get_data(){
        $this->view('Masterlayout',['page'=>'loaisach_v','theloai' => $this->loaisach -> loaisach_ListAll()]);
    }
    public function them(){
        if(isset($_POST['btnLuu'])){
            $matheloai = $_POST['txtMaTheLoai'];
            $tentheloai = $_POST['txtTenTheLoai'];
            // kiem tra trung ma
            $trung = $this->loaisach -> loaisach_checktrungma($matheloai);
            $trung1 = $this->loaisach ->loaisach_checktrungma2($tentheloai);
            if($trung){
                echo "<script>alert('Mã loại sách bị trùng mời nhập lại')</script>";
            }else{
                if($trung1){
                    echo "<script>alert('Tên loại sách bị trùng mời nhập lại')</script>";
                }else{
                    // insert
                $kq = $this->loaisach -> loaisach_ins($matheloai,$tentheloai);
                if($kq){
                    echo "<script>alert('Thêm mới loại sách thành công!')</script>";
                }else{
                    echo "<script>alert('Thêm mới loại sách thất bại!')</script>";
                }
                }
            }
            $this->view('Masterlayout',
            ['page'=>'loaisach_v',
            'MaTheLoai'=>$matheloai,
            'TenTheLoai'=>$tentheloai,
            'theloai' => $this->loaisach -> loaisach_ListAll()]);
            
        }
    }
}