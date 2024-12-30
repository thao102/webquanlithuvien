<?php 
class trasach_ds_c extends controller{
    private $ds;

    function __construct()
    {
        $this->ds = $this->model('trasach_m');
    }

    function Get_data() {
        // if (isset($_POST['txtMaphieu'])) {
        //     $maphieu = $_POST['txtMaphieu'];
        //     $dulieu = $this->ds->all();
        //     $dulieu2 = $this->ds->chitiet($maphieu);

        //     $this->view('Masterlayout', [
        //         'page' => 'trasach_tra_v',
        //         'dulieu' => $dulieu,
        //         'dulieu2' => $dulieu2
        //     ]);
        // } else {
            $dulieu = $this->ds->all();
            $this->view('Masterlayout', [
                'page' => 'trasach_ds_v',
                'dulieu' => $dulieu,
            ]);
        // }
    }

    function timkiem() {
        if (isset($_POST['btnTimkiem'])) {
            $maphieu = $_POST['txtTimkiem'];
            $dulieu = $this->ds->find($maphieu);

            // Gọi lại giao diện và truyền $dulieu ra
            $this->view('Masterlayout', [
                'page' => 'trasach_ds_v',
                'dulieu' => $dulieu,
                'MaPhieu' => $maphieu,
            ]);
        }
    }

    function tra_one($maphieu) {
            $masach_list = $this->ds->chitiet($maphieu);
            //xóa
            while ($row = mysqli_fetch_assoc($masach_list)) {
                $masach = $row['MaSach'];
                $ket_hop = $this->ds->ket_hop($maphieu,$masach);
                $soluongconlai = $this->ds->sach_soluong($masach);
                $soluong = $this->ds-> select_tra($maphieu,$masach);
                $kq2 = $soluongconlai + $soluong;
                $kq3 = $this->ds -> sach_updsach($masach,$kq2);
                $kq = $this->ds->delete_tra($maphieu, $masach);
                //
                // lưu về bảng sách trả
                $ngayketthuc = date('Y-m-d');
                while ($row = mysqli_fetch_assoc($ket_hop)) {
                    $masach = $row['MaSach'];
                    $masv = $row['MaSV'];
                    $soluong =$row['SoLuong'];
                    $maphieu=$row['MaPhieu'];
                    $ngaylap = $row['NgayLap'];
                    $ngayhentra = $row['NgayHenTra'];
                    $tinhtrang = $row['TinhTrang'];
                    $kq1 = $this->ds->insert($masach,$masv, $soluong,$maphieu,$ngaylap,$ngayhentra,$tinhtrang);
                }
                if ($kq && $kq3) {
                    echo "<script>alert('Đã xác nhận mã sách $masach!')</script>";
                } else {
                    echo "<script>alert('Gặp lỗi với mã sách $masach!')</script>";
                }
                
                break; // Dừng sau lần xóa đầu tiên
            }

            $dulieu = $this->ds->find2($maphieu);
            $dulieu2 = $this->ds->chitiet($maphieu);

            $this->view('Masterlayout', [
                'page' => 'trasach_tra_v',
                'dulieu' => $dulieu,
                'dulieu2' => $dulieu2
            ]);
        
    }
    function tra_all($maphieu) {
        $masach_list = $this->ds->chitiet($maphieu);
        
            //xóa
            while ($row = mysqli_fetch_assoc($masach_list)) {
                $masach = $row['MaSach'];
                $soluongconlai = $this->ds->sach_soluong($masach);
                $soluong = $this->ds-> select_tra($maphieu,$masach);
                $kq2 = $soluongconlai + $soluong;
                $kq3 = $this->ds -> sach_updsach($masach,$kq2);
                $ket_hop = $this->ds->ket_hop($maphieu,$masach);
                $kq = $this->ds->delete_tra($maphieu, $masach); 
            // lưu về bảng sách trả
                $ngayketthuc = date('Y-m-d');
                while ($row = mysqli_fetch_assoc($ket_hop)) {
                    $masach = $row['MaSach'];
                    $masv = $row['MaSV'];
                    $soluong =$row['SoLuong'];
                    $maphieu=$row['MaPhieu'];
                    $ngayhentra = $row['NgayHenTra'];
                    $ngaylap = $row['NgayLap'];
                    $tinhtrang = $row['TinhTrang'];
                    $kq1 = $this->ds->insert($masach,$masv, $soluong,$maphieu,$ngaylap,$ngayhentra,$tinhtrang);
                }
            }
            // xóa phiếu
            $kq3 = $this->ds->delete($maphieu);
            if ($kq3)
                echo "<script>alert('Hoàn tất trả phiếu $maphieu!')</script>";
            else
                echo "<script>alert('Gặp lỗi!')</script>";

            $dulieu = $this->ds->all();
            $this->view('Masterlayout', [
                'page' => 'trasach_ds_v',
                'dulieu' => $dulieu,
            ]);
}
function tra_cuoi($maphieu) {
    $masach_list = $this->ds->chitiet($maphieu);
        //xóa
        while ($row = mysqli_fetch_assoc($masach_list)) {
            $masach = $row['MaSach'];
            $soluongconlai = $this->ds->sach_soluong($masach);
                $soluong = $this->ds-> select_tra($maphieu,$masach);
                $kq2 = $soluongconlai + $soluong;
                $kq3 = $this->ds -> sach_updsach($masach,$kq2);
            $ket_hop = $this->ds->ket_hop($maphieu,$masach);
            $kq = $this->ds->delete_tra($maphieu, $masach);
        
        // lưu về bảng sách trả
            $ngayketthuc = date('Y-m-d');
            while ($row = mysqli_fetch_assoc($ket_hop)) {
                $masach = $row['MaSach'];
                $masv = $row['MaSV'];
                $soluong =$row['SoLuong'];
                $maphieu=$row['MaPhieu'];
                $ngaylap = $row['NgayLap'];
                $ngayhentra = $row['NgayHenTra'];
                $tinhtrang = $row['TinhTrang'];
                $kq1 = $this->ds->insert($masach,$masv, $soluong,$maphieu,$ngaylap,$ngayhentra,$tinhtrang);
            }
        }
        // xóa phiếu
        $kq3 = $this->ds->delete($maphieu);
        if ($kq3)
            echo "<script>alert('Hoàn tất trả phiếu $maphieu!')</script>";
        else
            echo "<script>alert('Gặp lỗi!')</script>";

        $dulieu = $this->ds->all();
        $this->view('Masterlayout', [
            'page' => 'trasach_ds_v',
            'dulieu' => $dulieu,
        ]);
}

    

    function truyen($maphieu) {
        $dulieu = $this->ds->find2($maphieu);
        $dulieu2 = $this->ds->chitiet($maphieu);

        $this->view('Masterlayout', [
            'page' => 'trasach_tra_v',
            'dulieu' => $dulieu,
            'dulieu2' => $dulieu2
        ]);
    }
    function sua($machitietphieu){
        $dulieu2 = $this->ds->chitiet1($machitietphieu);

        $this->view('Masterlayout', [
            
            'page' => 'trasach_sua_v',
            'dulieu' => $dulieu2
        ]);
    }
    public function suadl(){
        if(isset($_POST['btnLuu'])){
            $masach = $_POST['txtMaSach'];
            $tensach = $_POST['txtTenSach'];
            $ngayhentra = $_POST['txtNgayHenTra'];
            $soluong = $_POST['txtSoLuong'];
            $machitietphieu = $_POST['txtMaChiTietPhieu'];
            $tinhtrang = $_POST['txtTinhTrang'];
            $dulieu2 = $this->ds->chitiet1($machitietphieu);
            $dulieu = $this->ds -> tinhtrang_upd($machitietphieu,$tinhtrang);
            if($dulieu){
                echo "<script>alert('Sửa tình trạng thành công!')</script>";
            }else{
                echo "<script>alert('Sửa tình trạng thất bại!')</script>";
            }
            $this->view('Masterlayout',[
                'page' => 'trasach_sua_v',
                'dulieu' => $dulieu2,
                'MaSach'=>$masach,
                'TenSach'=>$tensach,
                'NgayHenTra' => $ngayhentra,
                'SoLuong' => $soluong,
                'TinhTrang' => $tinhtrang
            ]);
        }
    }
    

//
}
?>
