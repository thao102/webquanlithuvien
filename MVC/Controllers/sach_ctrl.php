<?php
class sach_ctrl extends controller{
    private $sach;
    function __construct()
    {
        $this->sach = $this->model('sach_m');
    }
    function Get_data(){
        $this->view('Masterlayout',['page'=>'danhsachsach_v','theloai' => $this->sach -> loaisach_ListAll(),
        'tacgia'=> $this->sach -> tacgia_ListAll(),
        'nhaxuatban'=> $this->sach -> nhaxuatban_ListAll()
    ]);
    }
    public function suadl(){
        if(isset($_POST['btnSua'])){
            $masach = $_POST['txtMaSach'];
            $tensach = $_POST['txtTenSach'];
            $theloai  = $_POST['cboTheLoai'];
            $matacgia  = $_POST['cboMaTacGia'];
            $manhaxuatban  = $_POST['cboMaNhaXuatBan'];
            $soluong = $_POST['txtSoLuong'];
            $noidung  = $_POST['txtNoiDung'];
            $tinhtrang = $_POST['txtTinhTrang'];
            $dulieu = $this->sach -> sach_upd($masach,$tensach,$theloai,$matacgia,$manhaxuatban,$soluong,$noidung,$tinhtrang);
            if($dulieu){
                echo "<script>alert('Sửa sách thành công!')</script>";
            }else{
                echo "<script>alert('Sửa sách thất bại!')</script>";
            }
            $this->view('Masterlayout',[
                'page'=>'suasach_v',
                'dulieu'=> $this->sach -> sach_find($masach,$tensach)
                ,'theloai' => $this->sach -> loaisach_ListAll(),
                'tacgia'=> $this->sach -> tacgia_ListAll(),
                'nhaxuatban'=> $this->sach -> nhaxuatban_ListAll(),
                'MaSach'=>$masach,
                'TenSach'=>$tensach,
                'TheLoai' => $theloai,
                'MaTacGia'=> $matacgia,
                'MaNXB' => $manhaxuatban,
                'SoLuong' => $soluong,
                'NoiDung' => $noidung,
                'TinhTrang' => $tinhtrang
            ]);
        }
    }
    public function sua($masach){
        $this->view('Masterlayout',[
            'page'=>'suasach_v',
            'dulieu'=>$this->sach->sach_find($masach,''),
            'theloai' => $this->sach -> loaisach_ListAll(),
            'tacgia'=> $this->sach -> tacgia_ListAll(),
            'nhaxuatban'=> $this->sach -> nhaxuatban_ListAll(),
        ]);
    }
    public function timkiem(){
        if(isset($_POST['btnTimkiem'])){
            $masach = $_POST['txtMaSach'];
            $tensach = $_POST['txtTenSach'];
            $theloai  = isset($_POST['cboTheLoai']) ? isset($_POST['cboTheLoai']) : '' ;
            $matacgia  = isset($_POST['cboMaTacGia']) ? isset($_POST['cboMaTacGia']) : '' ;
            $manhaxuatban  = isset($_POST['cboMaNhaXuatBan']) ? isset($_POST['cboMaNhaXuatBan']) : '' ; 
            $soluong = isset($_POST['txtSoLuong']) ? isset($_POST['txtSoLuong']) : '' ;  
            $noidung  = isset($_POST['txtNoiDung']) ? isset($_POST['txtNoiDung']) : '';
            $tinhtrang = isset($_POST['txtTinhTrang']) ? isset($_POST['txtTinhTrang']) : '';
            $dulieu=$this->sach->sach_find($masach,$tensach);
            //Gọi lại giao diện và truyền $dulieu ra
            $this->view('Masterlayout',[
                'page'=>'danhsachsach_v',
                'dulieu'=>$dulieu,
                'MaSach'=>$masach,
                'TenSach'=>$tensach,
                'TheLoai' => $theloai,
                'MaTacGia'=> $matacgia,
                'MaNXB' => $manhaxuatban,
                'SoLuong' => $soluong,
                'NoiDung' => $noidung,
                'TinhTrang' => $tinhtrang
            ]);
        }
        if(isset($_POST['btnXuat'])){
            
            // Code xuất Excel
            $objExcel = new PHPExcel();
            $objExcel->setActiveSheetIndex(0);
            $sheet = $objExcel->getActiveSheet()->setTitle('Danh Sách Các Sách');
            $rowCount = 1;
        
            // Tạo tiêu đề cho cột trong Excel
            $sheet->setCellValue('A'.$rowCount, 'STT');
            $sheet->setCellValue('B'.$rowCount, 'Mã Sách');
            $sheet->setCellValue('C'.$rowCount, 'Tên Sách');
            $sheet->setCellValue('D'.$rowCount, 'Mã Thể Loại');
            $sheet->setCellValue('E'.$rowCount, 'Mã Tác Giả');
            $sheet->setCellValue('F'.$rowCount, 'Mã Nhà Xuất Bản');
            $sheet->setCellValue('G'.$rowCount, 'Số Lượng');
            $sheet->setCellValue('H'.$rowCount, 'Nội Dung');
            $sheet->setCellValue('I'.$rowCount, 'Tình Trạng');
        
            // Định dạng cột tiêu đề
            $sheet->getColumnDimension('A')->setAutoSize(true);
            $sheet->getColumnDimension('B')->setAutoSize(true);
            $sheet->getColumnDimension('C')->setAutoSize(true);
        
            // Gán màu nền
            $sheet->getStyle('A1:I1')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('00FF00');
            // Căn giữa
            $sheet->getStyle('A1:I1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        
            // Điền dữ liệu vào các dòng. Dữ liệu lấy từ DB
            $masach = $_POST['txtMaSach'];
            $tensach = $_POST['txtTenSach'];
            $dulieu = $this->sach->sach_find($masach, $tensach);
        
            if ($dulieu && mysqli_num_rows($dulieu) > 0) {
                while ($row = mysqli_fetch_array($dulieu)) {
                    $rowCount++;
                    $sheet->setCellValue('A'.$rowCount, $rowCount - 1); // sửa lại giá trị của STT cho đúng
                    $sheet->setCellValue('B'.$rowCount, $row['MaSach']);
                    $sheet->setCellValue('C'.$rowCount, $row['TenSach']);
                    $sheet->setCellValue('D'.$rowCount, $row['MaTheLoai']);
                    $sheet->setCellValue('E'.$rowCount, $row['MaTacGia']);
                    $sheet->setCellValue('F'.$rowCount, $row['MaNXB']);
                    $sheet->setCellValue('G'.$rowCount, $row['SoLuong']);
                    $sheet->setCellValue('H'.$rowCount, $row['NoiDung']);
                    $sheet->setCellValue('I'.$rowCount, $row['TinhTrang']);
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
            $sheet->getStyle('A1:' . 'I' . ($rowCount))->applyFromArray($styleArray);
        
            $objWriter = new PHPExcel_Writer_Excel2007($objExcel);
            $fileName = 'Danh sách các Sách.xlsx';
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
            $masach='';
            $tensach='';
            $theloai  = isset($_POST['cboTheLoai']) ? isset($_POST['cboTheLoai']) : '' ;
            $matacgia  = isset($_POST['cboMaTacGia']) ? isset($_POST['cboMaTacGia']) : '' ;
            $manhaxuatban  = isset($_POST['cboMaNhaXuatBan']) ? isset($_POST['cboMaNhaXuatBan']) : '' ; 
            $soluong = isset($_POST['txtSoLuong']) ? isset($_POST['txtSoLuong']) : '' ;  
            $noidung  = isset($_POST['txtNoiDung']) ? isset($_POST['txtNoiDung']) : '';
            $tinhtrang = isset($_POST['txtTinhTrang']) ? isset($_POST['txtTinhTrang']) : '';
            $dulieu=$this->sach->sach_find($masach,$tensach);
            //Gọi lại giao diện và truyền $dulieu ra
            $this->view('Masterlayout',[
                'page'=>'danhsachsach_v',
                'dulieu'=>$dulieu,
                'MaSach'=>$masach,
                'TenSach'=>$tensach,
                'TheLoai' => $theloai,
                'MaTacGia'=> $matacgia,
                'MaNXB' => $manhaxuatban,
                'SoLuong' => $soluong,
                'NoiDung' => $noidung,
                'TinhTrang' => $tinhtrang
            ]);
    }
    function xoa($masach){
        $dulieu=$this->sach->sach_del($masach);
        if($dulieu)
            echo "<script>alert('Xóa thành công!')</script>";
        else
            echo "<script>alert('Xóa thất bại!')</script>";
        //Gọi lại giao diện và truyền $dulieu ra
            $masach='';
            $tensach='';
            $theloai  = isset($_POST['cboTheLoai']) ? isset($_POST['cboTheLoai']) : '' ;
            $matacgia  = isset($_POST['cboMaTacGia']) ? isset($_POST['cboMaTacGia']) : '' ;
            $manhaxuatban  = isset($_POST['cboMaNhaXuatBan']) ? isset($_POST['cboMaNhaXuatBan']) : '' ; 
            $soluong = isset($_POST['txtSoLuong']) ? isset($_POST['txtSoLuong']) : '' ;  
            $noidung  = isset($_POST['txtNoiDung']) ? isset($_POST['txtNoiDung']) : '';
            $tinhtrang = isset($_POST['txtTinhTrang']) ? isset($_POST['txtTinhTrang']) : '';
            $dulieu=$this->sach->sach_find($masach,$tensach);
            //Gọi lại giao diện và truyền $dulieu ra
            $this->view('Masterlayout',[
                'page'=>'danhsachsach_v',
                'dulieu'=>$dulieu,
                'MaSach'=>$masach,
                'TenSach'=>$tensach,
                'TheLoai' => $theloai,
                'MaTacGia'=> $matacgia,
                'MaNXB' => $manhaxuatban,
                'SoLuong' => $soluong,
                'NoiDung' => $noidung,
                'TinhTrang' => $tinhtrang
            ]);
    }
}
?>