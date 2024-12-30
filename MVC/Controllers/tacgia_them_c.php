<?php 
class tacgia_them_c extends controller{
    public $them;
    
    function __construct() {
        $this->them = $this->model('tacgia_m');
    }
    
    function Get_data() {
        $this->view('Masterlayout', [
            'page' => 'tacgia_them_v'
        ]);
    }
    
    function themmoi() {
        if (isset($_POST['btnLuu'])) {
            $matacgia = $_POST['txtMatacgia'];
            $tentacgia = $_POST['txtTentacgia'];
            $ngaysinh = $_POST['txtNgaysinh'];
            $gioitinh = $_POST['txtGioitinh'];
            $dienthoai = $_POST['txtDienthoai'];
            $diachi = $_POST['txtDiachi'];
            
           // Kiểm tra trùng mã
            $kq1 = $this->them->checktrungma($matacgia);

            //Kiểm tra các trường dữ liệu rỗng
            $kq2 = $this->them->checkrong($matacgia, $tentacgia, $ngaysinh, $gioitinh,$dienthoai,$diachi);
            
            if ($kq1) {
                echo "<script>alert('Trùng mã!')</script>";

            }
            elseif ($kq2) {
                echo "<script>alert('Không để trống dữ liệu!')</script>";
            } else {
                // Chèn dữ liệu nếu không trùng mã và không có trường dữ liệu rỗng
                $kq = $this->them->insert($matacgia, $tentacgia, $ngaysinh, $gioitinh,$dienthoai,$diachi);
                
                if ($kq) {
                    echo "<script>alert('Thêm mới thành công!')</script>";
                } else {
                    echo "<script>alert('Thêm mới thất bại!')</script>";
                }
            }
            
            // Tái render view với dữ liệu đã cung cấp
            $this->view('Masterlayout', [
                'page' => 'tacgia_them_v',
                'MaTacGia' => $matacgia,
                'TenTacGia' => $tentacgia,
                'NgaySinh' => $ngaysinh,
                'GioiTinh' => $gioitinh,
                'DienThoai'=> $dienthoai,
                'DiaChi'=> $diachi,
            ]);
        }
    }
}

?>
