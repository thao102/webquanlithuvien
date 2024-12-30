<?php
class sachmuonnhieunhat extends controller {
    private $model;

    function __construct()
    {
        $this->model = $this->model('sachmuonnhieunhat_m');
    }
    function Get_data(){
        $this->view('Masterlayout',['page'=>'thongkesachmuonnhieunhat'
    ]);
    }

    public function danhsachmuonnhieunhat() {
        if (isset($_POST['btnThongKe'])) {
            $startDate = $_POST['startDate'];
            $endDate = $_POST['endDate'];
            $result = $this->model->thongke($startDate, $endDate);
            if($result){
                echo "<script>alert('Danh sách theo $startDate và $endDate')</script>"; 
            }else{
                echo "<script>alert('Không có dữ liệu')</script>"; 
            }
            
        } else {
            
        }
        $this->view('Masterlayout',['page'=>'thongkesachmuonnhieunhat',
        'dulieu' => $result,
        'NgayNhap' => $startDate,
        'NgayKetThuc' => $endDate
    ]);
    }
}


?>
