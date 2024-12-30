<?php 
class dangnhap_ctrl extends controller{
    private $dangnhap;
    
    function __construct()
    {
        // Khởi tạo model dangnhap_m
        $this->dangnhap = $this->model('dangnhap_m');
        // Khởi tạo session (nếu chưa có)
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    // Hàm hiển thị trang đăng nhập
    function Get_data(){
        $this->view('space',[
            'page' => 'dangnhap'
        ]);
    }

    // Hàm xử lý đăng nhập
    function dangnhap(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Kiểm tra sự tồn tại và lọc các trường nhập liệu
            $username = trim($_POST['txtUsername']) ?? '';
            $password = trim($_POST['txtPassword']) ?? '';
    
            // Kiểm tra đăng nhập trong model
            $user = $this->dangnhap->checkdangnhap($username, $password);
            if ($user) {
                // Đăng nhập thành công
                echo "<script>alert('Đăng nhập thành công!')</script>";
    
                // Lưu thông tin người dùng vào session
                $_SESSION['username'] = $user['username'];
                $_SESSION['role'] = $user['role'];
    
                // Chuyển hướng theo quyền
                if ($user['role'] == 'admin') {
                    $this->view('Masterlayout', [
                        'page' => 'Home_v'
                    ]);
                } elseif ($user['role'] == 'sinhvien') {
                    $this->view('Masterlayout', [
                        'page' => 'Sinhvien_v'
                    ]);
                } else {
                    echo "<script>alert('Quyền không hợp lệ!')</script>";
                    $this->view('space', [
                        'page' => 'dangnhap'
                    ]);
                }
            } else {
                // Đăng nhập không thành công
                echo "<script>alert('Tài khoản hoặc mật khẩu không đúng!')</script>";
                $this->view('space', [
                    'page' => 'dangnhap'
                ]);
            }
        }
    }
    

    // Hàm xử lý logout
    public function logout() {
        // Xóa các biến session
        session_unset();

        // Hủy phiên session
        session_destroy();

        // Chuyển hướng về trang đăng nhập
        $this->view('space', [
            'page' => 'dangnhap',
        ]);
    }
}
?>
