<?php
class giahanmuon_ctrl extends controller {
    private $giahan;

    function __construct() {
        $this->giahan = $this->model('giahanmuon_m');
    }

    function Get_data() {
        // $dulieu = $this->giahan->giahanmuon_find($MaPhieu);
        $this->view('Masterlayout', ['page' => 'quanligiahan']);
    }

    public function suadl() {
        if (isset($_POST['btnsua'])) {
            $NgayHenTra = isset($_POST['dateNgayHenTra']) ? trim($_POST['dateNgayHenTra']) : '';
            $MaCTPhieu = isset($_POST['txtMaChiTietPhieu']) ? trim($_POST['txtMaChiTietPhieu']) : '';
            // Cập nhật dữ liệu độc giả
            $dulieu = $this->giahan->giahanmuon_upd($MaCTPhieu, $NgayHenTra);
            if ($dulieu) {
                echo "<script>alert('Gia hạn mượn thành công!')</script>";
            } else {
                echo "<script>alert('Gia hạn mượn thất bại!')</script>";
            }
            // Gọi view để hiển thị thông tin cập nhật
            $this->view('Masterlayout', [
                'page' => 'giahanmuon',
                'dulieu' => $this->giahan->giahanmuon_find1($MaCTPhieu),
                'NgayHenTra' => $NgayHenTra
            ]);
        }
    }

    public function sua($MaCTPhieu) {
        $this->view('Masterlayout', [
            'page' => 'giahanmuon',
            'dulieu' => $this->giahan->giahanmuon_find1($MaCTPhieu),
        ]);
    }

    public function timkiem() {
        if (isset($_POST['btnTimkiem'])) {
            $MaPhieu = $_POST['txtMaPhieu'];
            $MaNV = isset($_POST['txtMaNV']) ? $_POST['txtMaNV'] : '';
            $MaSV = isset($_POST['txtMaSV']) ? $_POST['txtMaSV'] : '';
            $NgayLap = isset($_POST['dateNgayLap']) ? $_POST['dateNgayLap'] : '';
            $NgayHenTra = isset($_POST['dateNgayHenTra']) ? $_POST['dateNgayHenTra'] : '';
            $MaSach = isset($_POST['txtMaSach']) ? $_POST['txtMaSach'] : '';
            $TenSach = isset($_POST['txtTenSach']) ? $_POST['txtTenSach'] : '';
            $SoLuong = isset($_POST['txtSoLuong']) ? $_POST['txtSoLuong'] : '';
            $dulieu = $this->giahan->giahanmuon_find($MaPhieu);
            // Gọi lại giao diện và truyền $dulieu ra
            $this->view('Masterlayout', [
                'page' => 'quanligiahan',
                'dulieu' => $dulieu,
                'MaPhieu' => $MaPhieu,
                'MaNV' => $MaNV,
                'MaSV' => $MaSV,
                'NgayLap' => $NgayLap,
                'NgayHenTra' => $NgayHenTra,
                'MaSach' => $MaSach,
                'TenSach' => $TenSach,
                'SoLuong' => $SoLuong,
            ]);
        }
    }

    public function timkiem1() {
        $MaPhieu = '';
        $MaNV = isset($_POST['txtMaNV']) ? $_POST['txtMaNV'] : '';
        $MaSV = isset($_POST['txtMaSV']) ? $_POST['txtMaSV'] : '';
        $NgayLap = isset($_POST['dateNgayLap']) ? $_POST['dateNgayLap'] : '';
        $NgayHenTra = isset($_POST['dateNgayHenTra']) ? $_POST['dateNgayHenTra'] : '';
        $MaSach = isset($_POST['txtMaSach']) ? $_POST['txtMaSach'] : '';
        $TenSach = isset($_POST['txtTenSach']) ? $_POST['txtTenSach'] : '';
        $SoLuong = isset($_POST['txtSoLuong']) ? $_POST['txtSoLuong'] : '';
        $dulieu = $this->giahan->giahanmuon_find($MaPhieu);
        // Gọi lại giao diện và truyền $dulieu ra
        $this->view('Masterlayout', [
            'page' => 'quanligiahan',
            'dulieu' => $dulieu,
            'MaPhieu' => $MaPhieu,
            'MaNV' => $MaNV,
            'MaSV' => $MaSV,
            'NgayLap' => $NgayLap,
            'NgayHenTra' => $NgayHenTra,
            'MaSach' => $MaSach,
            'TenSach' => $TenSach,
            'SoLuong' => $SoLuong,
        ]);
    }
}
?>
