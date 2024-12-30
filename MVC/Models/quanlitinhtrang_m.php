<?php
    class quanlitinhtrang_m extends connectDB{
        public function sachtra_ListAll(){
            $sql = "SELECT * FROM sachtra
                    
                    ORDER BY TinhTrang";
            return mysqli_query($this->con,$sql);
        }
        public function sachtra_find($ms) {
            $sql = "SELECT * FROM sachtra
                    WHERE MaSach LIKE '%$ms%' 
                    ORDER BY TinhTrang DESC" ;
            return mysqli_query($this->con, $sql);
        }
    }
?>