<?php
class sachmuonnhieunhat_m extends connectDB {
    public function thongke($startDate, $endDate) {
        $sql = "SELECT 
                    ct.MaSach,
                    s.TenSach,
                    ct.SoLuong,
                    ct.NgayHenTra
                FROM 
                    phieu p
                JOIN 
                    chitietphieu ct ON p.MaPhieu = ct.MaPhieu
                JOIN 
                    sach s ON ct.MaSach = s.MaSach
                WHERE 
                    ct.NgayHenTra BETWEEN '$startDate' AND '$endDate'
                GROUP BY 
                    ct.MaSach, s.TenSach
                ORDER BY 
                    ct.SoLuong DESC";
        return mysqli_query($this->con, $sql);
    }
}

?>
