<?php 
class nxb_them_c extends controller{
    public $them;
    
    function __construct() {
        $this->them = $this->model('nxb_m');
    }
    
    function Get_data() {
        $this->view('Masterlayout', [
            'page' => 'nxb_them_v'
        ]);
    }
    
    function themmoi() {
        if (isset($_POST['btnLuu'])) {
            $manxb = $_POST['txtManxb'];
            $tennxb = $_POST['txtTennxb'];
            $dienthoai = $_POST['txtDienthoai'];
            $email = $_POST['txtEmail'];
            $diachi = $_POST['txtDiachi'];
            
           // Kiểm tra trùng mã
            $kq1 = $this->them->checktrungma($manxb);

            //Kiểm tra các trường dữ liệu rỗng
            $kq2 = $this->them->checkrong($manxb, $tennxb,$dienthoai, $email,$diachi);
            
            if ($kq1) {
                echo "<script>alert('Trùng mã!')</script>";

            }
            elseif ($kq2) {
                echo "<script>alert('Không để trống dữ liệu!')</script>";
            } else {
                // Chèn dữ liệu nếu không trùng mã và không có trường dữ liệu rỗng
                $kq = $this->them->insert($manxb, $tennxb,$dienthoai, $email,$diachi);
                
                if ($kq) {
                    echo "<script>alert('Thêm mới thành công!')</script>";
                } else {
                    echo "<script>alert('Thêm mới thất bại!')</script>";
                }
            }
            
            // Tái render view với dữ liệu đã cung cấp
            $this->view('Masterlayout', [
                'page' => 'nxb_them_v',
                'MaNXB' => $manxb,
                'TenNXB' => $tennxb,
                'DienThoai'=> $dienthoai,
                'Email'=> $email,
                'DiaChi'=> $diachi,
            ]);
        }
    }
}

?>
