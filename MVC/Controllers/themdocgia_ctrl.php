<?php
class themdocgia_ctrl extends controller{
    private $nutthem;
    function __construct()
    {
        $this->nutthem = $this->model('docgia_m');
    }
    function Get_data(){
        $this->view('Masterlayout',['page'=>'docgia']);
    }
    public function them(){
        if(isset($_POST['btnluu'])){
            $MaSV = $_POST['txtMaSV'];
            $TenSV = $_POST['txtTenSV'];
            $MaLop = $_POST['txtMaLop'];
            $NgaySinh = $_POST['dNgaySinh'] ;
            $GioiTinh = $_POST['txtGioiTinh'];
            $Email = $_POST['txtEmail'];
            $SoDienThoai = $_POST['txtSDT'];
           
         
            // kiem tra trung ma
            $trung = $this->nutthem-> docgia_checktrungma($MaSV);
            if($trung){
                echo "<script>alert('Mã độc giả bị trùng mời nhập lại')</script>";
            }else{
                // insert
                $kq = $this->nutthem -> docgia_ins($MaSV,$TenSV,$MaLop,$NgaySinh,$GioiTinh,$Email,$SoDienThoai);
                if($kq){
                    echo "<script>alert('Thêm mới độc giả thành công!')</script>";
                }else{
                    echo "<script>alert('Thêm mới độc giả thất bại!')</script>";
                }
            }
            $this->view('Masterlayout',
            ['page'=>'docgia',
            'MaSV' =>$MaSV,
            'TenSV'=>$TenSV,
            'MaLop' =>$MaLop,
            'NgaySinh'=>$NgaySinh,
            'GioiTinh'=>$GioiTinh,
            'Email' =>$Email,
            'SDT' =>$SoDienThoai,
           
    
             ]);
        }
    }
    
}