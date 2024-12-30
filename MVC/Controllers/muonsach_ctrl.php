<?php
class muonsach_ctrl extends controller{
    private $muonsach;
    function __construct()
    {
        $this->muonsach = $this->model('muonsach_m');
    }
    function Get_data(){
        $this->view('Masterlayout',['page'=>'danhsachmuonsach_v',
    ]);
    }
    public function suadl(){
        if(isset($_POST['btnSua'])){
            $masach = $_POST['txtMaSach'];
            $tensach = $_POST['txtTenSach'];
            $theloai  = $_POST['cboTheLoai'];
            $matacgia  = $_POST['cboMaTacGia'];
            $manhaxuatban  = $_POST['cboMaNhaXuatBan'];
            $soluong = $_POST['txtSoLuong'];
            $noidung  = $_POST['txtNoiDung'];
            $tinhtrang = $_POST['txtTinhTrang'];
            $dulieu = $this->muonsach -> sach_upd($masach,$tensach,$theloai,$matacgia,$manhaxuatban,$soluong,$noidung,$tinhtrang);
            if($dulieu){
                echo "<script>alert('Sửa sách thành công!')</script>";
            }else{
                echo "<script>alert('Sửa sách thất bại!')</script>";
            }
            $this->view('Masterlayout',[
                'page'=>'suasach_v',
                'dulieu'=> $this->muonsach -> sach_find($masach,$tensach)
                ,'theloai' => $this->muonsach -> loaisach_ListAll(),
                'tacgia'=> $this->muonsach -> tacgia_ListAll(),
                'nhaxuatban'=> $this->muonsach -> nhaxuatban_ListAll(),
                'MaSach'=>$masach,
                'TenSach'=>$tensach,
                'TheLoai' => $theloai,
                'MaTacGia'=> $matacgia,
                'MaNXB' => $manhaxuatban,
                'SoLuong' => $soluong,
                'NoiDung' => $noidung,
                'TinhTrang' => $tinhtrang
            ]);
        }
    }
    public function sua($masach){
        $this->view('Masterlayout',[
            'page'=>'suasach_v',
            'dulieu'=>$this->muonsach->sach_find($masach,''),
            'theloai' => $this->muonsach -> loaisach_ListAll(),
            'tacgia'=> $this->muonsach -> tacgia_ListAll(),
            'nhaxuatban'=> $this->muonsach -> nhaxuatban_ListAll(),
        ]);
    }
    public function timkiem(){
        if(isset($_POST['btnTimkiem'])){
            $masv = $_POST['txtMaSV'];
            $maphieu  = isset($_POST['txtMaPhieu']) ? isset($_POST['txtMaPhieu']) : '' ;
            $masach  = isset($_POST['cboMaSach']) ? isset($_POST['cboMaSach']) : '' ;
            $ngaylap  = isset($_POST['dateNgayLap']) ? isset($_POST['dateNgayLap']) : '' ; 
            $ngayhentra = isset($_POST['dateNgayHenTra']) ? isset($_POST['dateNgayHenTra']) : '' ;  
            $soluong  = isset($_POST['txtSoLuong']) ? isset($_POST['txtSoLuong']) : '';
            $ghichu = isset($_POST['txtGhiChu']) ? isset($_POST['txtGhiChu']) : '';
            $tinhtrang = isset($_POST['txtTinhTrang']) ? isset($_POST['txtTinhTrang']) : '';
            $dulieu=$this->muonsach->muonsach_find($masv);
            //Gọi lại giao diện và truyền $dulieu ra
            $this->view('Masterlayout',[
                'page'=>'danhsachmuonsach_v',
                'dulieu'=>$dulieu,
                'MaPhieu'=>$maphieu,
                'MaSach'=>$masach,
                'NgayLap' => $ngaylap,
                'NgayHenTra'=> $ngayhentra,
                'SoLuong' => $soluong,
                'GhiChu' => $ghichu,
                'TinhTrang' => $tinhtrang
            ]);
        }
    }
    public function timkiem1(){
            $masv = '';
            $maphieu  = isset($_POST['txtMaPhieu']) ? isset($_POST['txtMaPhieu']) : '' ;
            $masach  = isset($_POST['cboMaSach']) ? isset($_POST['cboMaSach']) : '' ;
            $ngaylap  = isset($_POST['dateNgayLap']) ? isset($_POST['dateNgayLap']) : '' ; 
            $ngayhentra = isset($_POST['dateNgayHenTra']) ? isset($_POST['dateNgayHenTra']) : '' ;  
            $soluong  = isset($_POST['txtSoLuong']) ? isset($_POST['txtSoLuong']) : '';
            $ghichu = isset($_POST['txtGhiChu']) ? isset($_POST['txtGhiChu']) : '';
            $tinhtrang = isset($_POST['txtTinhTrang']) ? isset($_POST['txtTinhTrang']) : '';
            $dulieu=$this->muonsach->muonsach_find($masv);
            //Gọi lại giao diện và truyền $dulieu ra
            $this->view('Masterlayout',[
                'page'=>'danhsachmuonsach_v',
                'dulieu'=>$dulieu,
                'MaPhieu'=>$maphieu,
                'MaSach'=>$masach,
                'NgayLap' => $ngaylap,
                'NgayHenTra'=> $ngayhentra,
                'SoLuong' => $soluong,
                'GhiChu' => $ghichu,
                'TinhTrang' => $tinhtrang
            ]);
    }
    function xoa($masach){
        $dulieu=$this->muonsach->sach_del($masach);
        if($dulieu)
            echo "<script>alert('Xóa thành công!')</script>";
        else
            echo "<script>alert('Xóa thất bại!')</script>";
        //Gọi lại giao diện và truyền $dulieu ra
            $masach='';
            $tensach='';
            $theloai  = isset($_POST['cboTheLoai']) ? isset($_POST['cboTheLoai']) : '' ;
            $matacgia  = isset($_POST['cboMaTacGia']) ? isset($_POST['cboMaTacGia']) : '' ;
            $manhaxuatban  = isset($_POST['cboMaNhaXuatBan']) ? isset($_POST['cboMaNhaXuatBan']) : '' ; 
            $soluong = isset($_POST['txtSoLuong']) ? isset($_POST['txtSoLuong']) : '' ;  
            $noidung  = isset($_POST['txtNoiDung']) ? isset($_POST['txtNoiDung']) : '';
            $tinhtrang = isset($_POST['txtTinhTrang']) ? isset($_POST['txtTinhTrang']) : '';
            $dulieu=$this->muonsach->sach_find($masach,$tensach);
            //Gọi lại giao diện và truyền $dulieu ra
            $this->view('Masterlayout',[
                'page'=>'danhsachsach_v',
                'dulieu'=>$dulieu,
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
?>