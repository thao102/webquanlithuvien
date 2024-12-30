<?php
    class quanlitinhtrang_m extends connectDB{
        public function sachtra_ListAll(){
            $sql = "SELECT st.*, s.TenSach, sv.TenSV, tl.TenTheLoai, tg.TenTacGia, nxb.TenNXB  
                    FROM sachtra st
                    JOIN sach s ON s.MaSach = st.MaSach
                    JOIN sinhvien sv ON st.MaSV = sv.MaSV
                    JOIN theloai tl ON tl.MaTheLoai = s.MaTheLoai
                    JOIN tacgia tg ON tg.MaTacGia = s.MaTacGia
                    JOIN nhaxuatban nxb ON nxb.MaNXB = s.MaNXB
                    ORDER BY TinhTrang";
            return mysqli_query($this->con,$sql);
        }
        public function sachtra_find($ms, $ts) {
            $sql = "SELECT st.*, s.TenSach, sv.TenSV, tl.TenTheLoai, tg.TenTacGia, nxb.TenNXB  
                    FROM sachtra st
                    JOIN sach s ON s.MaSach = st.MaSach
                    JOIN sinhvien sv ON st.MaSV = sv.MaSV
                    JOIN theloai tl ON tl.MaTheLoai = s.MaTheLoai
                    JOIN tacgia tg ON tg.MaTacGia = s.MaTacGia
                    JOIN nhaxuatban nxb ON nxb.MaNXB = s.MaNXB
                    WHERE s.MaSach LIKE '%$ms%' AND s.TenSach LIKE '%$ts%'
                    ORDER BY TinhTrang";
            return mysqli_query($this->con, $sql);
        }
    }
?>