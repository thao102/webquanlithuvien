<?php 
class trasach_c extends controller {

    public $tra;

    function __construct() {
        $this->tra = $this->model('trasach_m');
    }

    function Get_data() {
        $ma = $this->tra->id_all();
        $phieuInfo = [
            'MaSV' => '',
            'MaNV' => '',
            'NgayLap' => '',
            'NgayHenTra' => '',
            'NgayKetThuc' => '',
            'TrangThai' => ''
        ];

        if (isset($_POST['txtMaPhieu']) && $_POST['txtMaPhieu'] !== '') {
            $MaPhieu = $_POST['txtMaPhieu'];
            $phieuInfo = $this->tra->truyen_dl($MaPhieu) ?: $phieuInfo;

            // if (isset($_POST['txtTrangThai'])) {
            //     $newTrangThai = $_POST['txtTrangThai'];
            //     $this->tra->update_tra($MaPhieu, $newTrangThai);
            //     $phieuInfo['TrangThai'] = $newTrangThai; // Cập nhật trạng thái mới vào $phieuInfo
            // }
        }

        $this->view('Masterlayout', [
            'page' => 'trasach_v',
            'ma' => $ma,
            'phieuInfo' => $phieuInfo
        ]);
    }

    
}
?>
