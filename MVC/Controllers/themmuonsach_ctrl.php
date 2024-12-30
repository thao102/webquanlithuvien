<?php
class themmuonsach_ctrl extends controller {
    private $muonsach;

    function __construct() {
        $this->muonsach = $this->model('muonsach_m');
    }

    function Get_data() {
        $this->view('Masterlayout', [
            'page' => 'muonsach_v',
            'sach' => $this->muonsach->sach_ListAll(),
            'sinhvien' => $this->muonsach->docgia_ListAll(),
        ]);
    }

    public function them() {
        if (isset($_POST['btnLuu'])) {
            // Lấy dữ liệu từ form và kiểm tra lỗi SQL Injection
            $maphieu = mysqli_real_escape_string($this->muonsach->con, $_POST['txtMaPhieu']);
            $masach = mysqli_real_escape_string($this->muonsach->con, $_POST['cboMaSach']);
            $masv = mysqli_real_escape_string($this->muonsach->con, $_POST['cboMaSV']);
            $manv = mysqli_real_escape_string($this->muonsach->con, $_POST['txtMaNV']);
            $ngaylap = mysqli_real_escape_string($this->muonsach->con, $_POST['dateNgayLap']);
            $ngayhentra = mysqli_real_escape_string($this->muonsach->con, $_POST['dateNgayHenTra']);
            $ngayketthuc = '0000-00-00';
            $soluong = intval($_POST['txtSoLuong']);
            $ghichu = mysqli_real_escape_string($this->muonsach->con, $_POST['txtGhiChu']);
            $tinhtrang = mysqli_real_escape_string($this->muonsach->con, $_POST['txtTinhTrang']);
            $trangthai = 'Chưa trả';
            $soluongconlai = intval($_POST['txtSoLuongConLai']);

            // Kiểm tra dữ liệu đầu vào
            if (empty($maphieu) || empty($masach) || empty($masv) || empty($manv) || empty($ngaylap) || empty($ngayhentra) || $soluong <= 0) {
                echo "<script>alert('Vui lòng nhập đầy đủ và chính xác thông tin!')</script>";
                return;
            }

            // Tính toán số lượng còn lại
            $kq2 = $soluongconlai - $soluong;
            if ($kq2 < 0) {
                echo "<script>alert('Số lượng sách không đủ!')</script>";
                return;
            }

            if ($soluong > 4) {
                echo "<script>alert('Mỗi mã phiếu chỉ được mượn tối đa 4 quyển mỗi loại!')</script>";
                return;
            }

            // Kiểm tra mã trùng
            $trung = $this->muonsach->muonsach_checktrungma($maphieu);
            $trung1 = $this->muonsach->muonsach_checktrungmaDG($maphieu, $masv);
            $trung2 = $this->muonsach->muonsach_checktrungmaphieuvamasach($maphieu, $masach);

            if ($trung) {
                if (!$trung1) {
                    echo "<script>alert('Mã độc giả không hợp lệ!')</script>";
                    return;
                }
                $kq1 = $this->muonsach->muonsachchitietphieu_ins($maphieu, $masach, $ngayhentra, $ngayketthuc, $soluong, $ghichu, $tinhtrang);
                $kq3 = $this->muonsach->sach_updsach($masach, $kq2);
                if ($kq1 && $kq3) {
                    echo "<script>alert('Mượn sách thành công!')</script>";
                } else {
                    die("Lỗi SQL khi mượn sách (chi tiết phiếu hoặc cập nhật sách): " . mysqli_error($this->muonsach->con));
                }
            } else {
                $kq = $this->muonsach->muonsachphieu_ins($maphieu,$manv,$masv,$ngaylap,$ngayhentra,$ngayketthuc,$trangthai);
                $kq1 = $this->muonsach->muonsachchitietphieu_ins($maphieu, $masach, $ngayhentra, $ngayketthuc, $soluong, $ghichu, $tinhtrang);
                $kq3 = $this->muonsach->sach_updsach($masach, $kq2);
                if ($kq && $kq1 && $kq3) {
                    echo "<script>alert('Mượn sách thành công!')</script>";
                } else {
                    die("Lỗi SQL khi thêm phiếu mượn: " . mysqli_error($this->muonsach->con));
                }
            }

            // Hiển thị lại giao diện
            $this->view('Masterlayout', [
                'page' => 'muonsach_v',
                'MaPhieu' => $maphieu,
                'MaNV' => $manv,
                'MaSV' => $masv,
                'NgayLap' => $ngaylap,
                'NgayHenTra' => $ngayhentra,
                'NgayTra' => $ngayketthuc,
                'sach' => $this->muonsach->sach_ListAll(),
                'sinhvien' => $this->muonsach->docgia_ListAll(),
                'SoLuong' => $soluong,
                'GhiChu' => $ghichu,
                'TinhTrang' => $tinhtrang,
                'TrangThai' => $trangthai
            ]);
        }
    }
}
?>
