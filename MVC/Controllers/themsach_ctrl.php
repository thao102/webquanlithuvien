<?php
class themsach_ctrl extends controller{
    private $sach;
    function __construct()
    {
        $this->sach = $this->model('sach_m');
    }
    function Get_data(){
        $this->view('Masterlayout',['page'=>'sach_v',
        'theloai' => $this->sach -> loaisach_ListAll(),
        'tacgia'=> $this->sach -> tacgia_ListAll(),
        'nhaxuatban'=> $this->sach -> nhaxuatban_ListAll()]);
    }
    public function them(){
        if(isset($_POST['btnLuu'])){
            $masach = $_POST['txtMaSach'];
            $tensach = $_POST['txtTenSach'];
            $theloai  =  $_POST['cboTheLoai'];
            $matacgia  =  $_POST['cboMaTacGia'] ; 
            $manhaxuatban  = $_POST['cboMaNhaXuatBan'] ;  
            $soluong = $_POST['txtSoLuong'];
            $noidung  = $_POST['txtNoiDung'];
            $tinhtrang = 'Tốt';
            // kiem tra trung ma
            $trung = $this->sach -> sach_checktrungma($masach);
            $trung1 = $this->sach -> sach_checktrungma1($masach,$tensach);
            $trung2 = $this->sach -> sach_checktrungma2($tensach);
            $soluongconlai = $this->sach -> sach_soluong($masach);
            $sl = $soluongconlai + $soluong;
            if($trung){
                if($trung1){
                    $update = $this ->sach -> sach_upd1($masach,$sl);
                    if($update){
                        echo "<script>alert('Thêm mới sách thành công!')</script>";
                    }else{
                        echo "<script>alert('Thêm mới sách thất bại!')</script>";
                    }
                }else{
                    echo "<script>alert('Mã sách bị trùng mời nhập lại')</script>";
                }
            }else{
                if($trung2){
                    echo "<script>alert('Tên sách bị trùng mời nhập lại')</script>";
                }else{
                    $kq = $this->sach -> sach_ins($masach,$tensach,$theloai,$matacgia,$manhaxuatban,$soluong,$noidung,$tinhtrang);
                if($kq){
                    echo "<script>alert('Thêm mới sách thành công!')</script>";
                }else{
                    echo "<script>alert('Thêm mới sách thất bại!')</script>";
                }
                }
                // insert
                
            }
            $this->view('Masterlayout',
            ['page'=>'sach_v',
            'theloai' => $this->sach -> loaisach_ListAll(),
            'tacgia'=> $this->sach -> tacgia_ListAll(),
            'nhaxuatban'=> $this->sach -> nhaxuatban_ListAll(),
            'MaSach'=>$masach,
            'TenSach'=>$tensach,
            'TheLoai' => $theloai,
            'MaTG'=> $matacgia,
             'MaNXB' => $manhaxuatban,
             'SoLuong' => $soluong,
             'NoiDung' => $noidung,
             'TinhTrang' => $tinhtrang
            ]);
            
        }
    }
}