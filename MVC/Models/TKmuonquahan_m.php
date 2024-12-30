<?php
    class TKmuonquahan_m extends connectDB{
        public function muonquahan_ListAll() {
            $sql = "
            SELECT sinhvien.MaSV, sinhvien.TenSV, sach.MaMuon, muonsach.NgayMuon, muonsach.HanTra
FROM muonsach
JOIN sinhvien ON muonsach.MaSV = sinhvien.MaSV
WHERE muonsach.NgayTra IS NULL AND muonsach.HanTra < CURDATE();
        ";
        return mysqli_query($this->con, $sql);
        }
        public function quahan_find($theDG, $tenDG) {
            $sql = "SELECT sinhvien.MaSV, sinhvien.TenSV, muonsach.MaMuon, muonsach.NgayMuon, muonsach.HanTra
FROM muonsach
JOIN sinhvien ON muonsach.MaSV = sinhvien.MaSV
WHERE muonsach.NgayTra IS NULL AND muonsach.HanTra < CURDATE();";
            return mysqli_query($this->con, $sql);
        }
    }
?>