<?php
class loaisach_ctrl extends controller{
    private $loaisach;
    function __construct()
    {
        $this->loaisach = $this->model('loaisach_m');
    }
    function Get_data(){
        $this->view('Masterlayout',['page'=>'danhsachloaisach_v']);
    }
    public function suadl(){
        if(isset($_POST['btnSua'])){
            $matheloai = $_POST['txtMaTheLoai'];
            $tentheloai = $_POST['txtTenTheLoai'];
            $dulieu = $this->loaisach -> loaisach_upd($matheloai,$tentheloai);
            if($dulieu){
                echo "<script>alert('Sửa loại sách thành công!')</script>";
            }else{
                echo "<script>alert('Sửa loại sách thất bại!')</script>";
            }
            $this->view('Masterlayout',[
                'page'=>'sualoaisach_v',
                'dulieu'=> $this->loaisach -> loaisach_find($matheloai,$tentheloai),
                'MaTheLoai'=>$matheloai,
                'TenTheLoai'=>$tentheloai
            ]);
        }
    }
    public function sua($matheloai){
        $this->view('Masterlayout',[
            'page'=>'sualoaisach_v',
            'dulieu'=>$this->loaisach->loaisach_find($matheloai,'')
        ]);
    }
    public function timkiem(){
        if(isset($_POST['btnTimkiem'])){
            $matheloai=$_POST['txtMaTheLoai'];
            $tentheloai=$_POST['txtTenTheLoai'];
            $dulieu=$this->loaisach->loaisach_find($matheloai,$tentheloai);
            //Gọi lại giao diện và truyền $dulieu ra
            $this->view('Masterlayout',[
                'page'=>'danhsachloaisach_v',
                'dulieu'=>$dulieu,
                'MaTheLoai'=>$matheloai,
                'TenTheLoai'=>$tentheloai
            ]);
        }
        if(isset($_POST['btnXuat'])){
            
            // Code xuất Excel
            $objExcel = new PHPExcel();
            $objExcel->setActiveSheetIndex(0);
            $sheet = $objExcel->getActiveSheet()->setTitle('Danh Sách Loại Sách');
            $rowCount = 1;
        
            // Tạo tiêu đề cho cột trong Excel
            $sheet->setCellValue('A'.$rowCount, 'STT');
            $sheet->setCellValue('B'.$rowCount, 'Mã Loại');
            $sheet->setCellValue('C'.$rowCount, 'Tên Loại');
        
            // Định dạng cột tiêu đề
            $sheet->getColumnDimension('A')->setAutoSize(true);
            $sheet->getColumnDimension('B')->setAutoSize(true);
            $sheet->getColumnDimension('C')->setAutoSize(true);
        
            // Gán màu nền
            $sheet->getStyle('A1:C1')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('00FF00');
            // Căn giữa
            $sheet->getStyle('A1:C1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        
            // Điền dữ liệu vào các dòng. Dữ liệu lấy từ DB
            $matheloai=$_POST['txtMaTheLoai'];
            $tentheloai=$_POST['txtTenTheLoai'];
            $dulieu=$this->loaisach->loaisach_find($matheloai,$tentheloai);
        
            if ($dulieu && mysqli_num_rows($dulieu) > 0) {
                while ($row = mysqli_fetch_array($dulieu)) {
                    $rowCount++;
                    $sheet->setCellValue('A'.$rowCount, $rowCount - 1); // sửa lại giá trị của STT cho đúng
                    $sheet->setCellValue('B'.$rowCount, $row['MaTheLoai']);
                    $sheet->setCellValue('C'.$rowCount, $row['TenTheLoai']);
                    
                }
            } else {
                // Handle the case where no data is found
                echo "<script>alert('Không có dữ liệu để xuất');</script>";
                return;
            }
        
            // Kẻ bảng 
            $styleArray = array(
                'borders' => array(
                    'allborders' => array(
                        'style' => PHPExcel_Style_Border::BORDER_THIN
                    )
                )
            );
            $sheet->getStyle('A1:' . 'C' . ($rowCount))->applyFromArray($styleArray);
        
            $objWriter = new PHPExcel_Writer_Excel2007($objExcel);
            $fileName = 'Danh sách loại Sách.xlsx';
            $objWriter->save($fileName);
        
            header('Content-Disposition: attachment; filename="' . $fileName . '"');
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Length: ' . filesize($fileName));
            header('Content-Transfer-Encoding: binary');
            header('Cache-Control: must-revalidate');
            header('Pragma: no-cache');
            readfile($fileName);
            exit;
        
        
        }
    }
    public function timkiem1(){
            $matheloai='';
            $tentheloai='';
            $dulieu=$this->loaisach->loaisach_find($matheloai,$tentheloai);
            //Gọi lại giao diện và truyền $dulieu ra
            $this->view('Masterlayout',[
                'page'=>'danhsachloaisach_v',
                'dulieu'=>$dulieu,
                'MaTheLoai'=>$matheloai,
                'TenTheLoai'=>$tentheloai
            ]);
    }
    function xoa($matheloai){
        $trung =$this->loaisach->loaisach_checktrungma1($matheloai);
        if($trung){
            echo "<script>alert('Không thể xóa do vẫn còn thể loại ở sách!')</script>";
        }else{
            $dulieu=$this->loaisach->loaisach_del($matheloai);
            if($dulieu)
            echo "<script>alert('Xóa thành công!')</script>";
        else
            echo "<script>alert('Xóa thất bại!')</script>";
        }
        //Gọi lại giao diện và truyền $dulieu ra
            $matheloai='';
            $tentheloai='';
            $dulieu=$this->loaisach->loaisach_find($matheloai,$tentheloai);
            //Gọi lại giao diện và truyền $dulieu ra
            $this->view('Masterlayout',[
                'page'=>'danhsachloaisach_v',
                'dulieu'=>$dulieu,
                'MaTheLoai'=>$matheloai,
                'TenTheLoai'=>$tentheloai
            ]);
    }
}
?>