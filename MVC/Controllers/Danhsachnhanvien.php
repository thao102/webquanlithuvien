<?php
class Danhsachnhanvien extends controller{
    private $dsnv;
    function __construct()
    {
        $this->dsnv = $this->model('Nhanvien_m');
    }
    function Get_data(){
        $this->view('Masterlayout',['page'=>'Danhsachnhanvien_v']);
    }   
    public function suadl(){
        if(isset($_POST['btnSua'])){
            $manv = $_POST['txtMaNV'];
            $tennv = $_POST['txtTenNV'];
            $taikhoan = $_POST['txtTaiKhoan'];
            $matkhau = $_POST['txtMatKhau'];
            $ngaysinh = $_POST['txtNgaySinh'];
            $gioitinh = $_POST['ddlGioiTinh'];
            $diachi = $_POST['txtDiaChi'];
            $dienthoai = $_POST['txtSDT'];
            $email = $_POST['txtEmail'];
            
            $dulieu = $this->dsnv -> nhanvien_upd($manv,$tennv,$taikhoan,$matkhau,$ngaysinh,$gioitinh,$diachi,$dienthoai,$email);
            if($dulieu){
                echo "<script>alert('Sửa thông tin nhân viên thành công!')</script>";
            }else{
                echo "<script>alert('Sửa thông tin nhân viên thất bại!')</script>";
            }
            $this->view('Masterlayout',[
                'page'=>'Nhanvien_sua_v',
                'dulieu'=> $this->dsnv -> nhanvien_find($manv,$tennv),
                'MaNV'=>$manv,
                'TenNV'=>$tennv,
                'Username'=>$taikhoan,
                'Password'=>$matkhau,
                'NgaySinh'=>$ngaysinh,
                'GioiTinh'=>$gioitinh,
                'DiaChi'=>$diachi,
                'SDT'=>$dienthoai,
                'Email'=>$email,
                
            ]);
        }
    }
    public function sua($manv){
        $this->view('Masterlayout',[
            'page'=>'Nhanvien_sua_v',
            'dulieu'=>$this->dsnv->nhanvien_find($manv,'')
        ]);
    }
    public function timkiem(){
        if(isset($_POST['btnTimkiem'])){
            $manv=$_POST['txtMaNV'];
            $tennv=$_POST['txtTenNV'];
            $taikhoan= isset($_POST['txtTaiKhoan']) ? $_POST['txtTaiKhoan'] : '';
            $matkhau= isset($_POST['txtMatKhau']) ? $_POST['txtMatKhau'] : '';
            $ngaysinh= isset($_POST['txtNgaySinh']) ? $_POST['txtNgaySinh'] : '';
            $gioitinh= isset($_POST['ddlGioiTinh']) ? $_POST['ddlGioiTinh'] : '';
            $diachi= isset($_POST['txtDiaChi']) ? $_POST['txtDiaChi'] : '';
            $dienthoai= isset($_POST['txtSDT']) ? $_POST['txtSDT'] : '';
            $email= isset($_POST['txtEmail']) ? $_POST['txtEmail'] : '';
            
            $dulieu=$this->dsnv->nhanvien_find($manv,$tennv);
            //Gọi lại giao diện và truyền $dulieu ra
            $this->view('Masterlayout',[
                'page'=>'Danhsachnhanvien_v',
                'dulieu'=>$dulieu,
                'MaNV'=>$manv,
                'TenNV'=>$tennv,
                'Username'=>$taikhoan,
                'Password'=>$matkhau,
                'NgaySinh'=>$ngaysinh,
                'GioiTinh'=>$gioitinh,
                'DiaChi'=>$diachi,
                'SDT'=>$dienthoai,
                'Email'=>$email,
                
            ]);
        }
    
    if(isset($_POST['btnXuatExcel'])){
            
        // Code xuất Excel
        $objExcel = new PHPExcel();
        $objExcel->setActiveSheetIndex(0);
        $sheet = $objExcel->getActiveSheet()->setTitle('Danh Sách Nhân Viên');
        $rowCount = 1;
    
        // Tạo tiêu đề cho cột trong Excel
        $sheet->setCellValue('A'.$rowCount, 'STT');
        $sheet->setCellValue('B'.$rowCount, 'Mã Nhân Viên');
        $sheet->setCellValue('C'.$rowCount, 'Tên Nhân Viên');
        $sheet->setCellValue('D'.$rowCount, 'Tài Khoản');
        $sheet->setCellValue('E'.$rowCount, 'Mật Khẩu');
        $sheet->setCellValue('F'.$rowCount, 'Ngày Sinh');
        $sheet->setCellValue('G'.$rowCount, 'Giới Tính');
        $sheet->setCellValue('K'.$rowCount, 'Địa Chỉ');
        $sheet->setCellValue('I'.$rowCount, 'Điện Thoại');
        $sheet->setCellValue('J'.$rowCount, 'Email');
        
    
        // Định dạng cột tiêu đề
        $sheet->getColumnDimension('A')->setAutoSize(true);
        $sheet->getColumnDimension('B')->setAutoSize(true);
        $sheet->getColumnDimension('C')->setAutoSize(true);
    
        // Gán màu nền
        $sheet->getStyle('A1:K1')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('00FF00');
        // Căn giữa
        $sheet->getStyle('A1:K1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    
        // Điền dữ liệu vào các dòng. Dữ liệu lấy từ DB
            $manv=$_POST['txtMaNV'];
            $tennv=$_POST['txtTenNV'];
            $taikhoan= isset($_POST['txtTaiKhoan']) ? $_POST['txtTaiKhoan'] : '';
            $matkhau= isset($_POST['txtMatKhau']) ? $_POST['txtMatKhau'] : '';
            $ngaysinh= isset($_POST['txtNgaySinh']) ? $_POST['txtNgaySinh'] : '';
            $gioitinh= isset($_POST['ddlGioiTinh']) ? $_POST['ddlGioiTinh'] : '';
            $diachi= isset($_POST['txtDiaChi']) ? $_POST['txtDiaChi'] : '';
            $dienthoai= isset($_POST['txtSDT']) ? $_POST['txtSDT'] : '';
            $email= isset($_POST['txtEmail']) ? $_POST['txtEmail'] : '';
           
            $dulieu=$this->dsnv->nhanvien_find($manv,$tennv);
    
        if ($dulieu && mysqli_num_rows($dulieu) > 0) {
            while ($row = mysqli_fetch_array($dulieu)) {
                $rowCount++;
                $sheet->setCellValue('A'.$rowCount, $rowCount - 1); // sửa lại giá trị của STT cho đúng
                $sheet->setCellValue('B'.$rowCount, $row['MaNV']);
                $sheet->setCellValue('C'.$rowCount, $row['TenNV']);
                $sheet->setCellValue('D'.$rowCount, $row['Username']);
                $sheet->setCellValue('E'.$rowCount, $row['Password']);
                $sheet->setCellValue('F'.$rowCount, $row['NgaySinh']);
                $sheet->setCellValue('G'.$rowCount, $row['GioiTinh']);
                $sheet->setCellValue('K'.$rowCount, $row['DiaChi']);
                $sheet->setCellValue('I'.$rowCount, $row['SDT']);
                $sheet->setCellValue('J'.$rowCount, $row['Email']);
                
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
            $sheet->getStyle('A1:' . 'K' . ($rowCount))->applyFromArray($styleArray);
        
            $objWriter = new PHPExcel_Writer_Excel2007($objExcel);
            $fileName = 'Nhân Viên.xlsx';
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
            $manv='';
            $tennv='';
            $taikhoan= isset($_POST['txtTaiKhoan']) ? $_POST['txtTaiKhoan'] : '';
            $matkhau= isset($_POST['txtMatKhau']) ? $_POST['txtMatKhau'] : '';
            $ngaysinh= isset($_POST['txtNgaySinh']) ? $_POST['txtNgaySinh'] : '';
            $gioitinh= isset($_POST['ddlGioiTinh']) ? $_POST['ddlGioiTinh'] : '';
            $diachi= isset($_POST['txtDiaChi']) ? $_POST['txtDiaChi'] : '';
            $dienthoai= isset($_POST['txtSDT']) ? $_POST['txtSDT'] : '';
            $email= isset($_POST['txtEmail']) ? $_POST['txtEmail'] : '';
            
            $dulieu=$this->dsnv->nhanvien_find($manv,$tennv);
            //Gọi lại giao diện và truyền $dulieu ra
            $this->view('Masterlayout',[
                'page'=>'Danhsachnhanvien_v',
                'dulieu'=>$dulieu,
                'MaNV'=>$manv,
                'TenNV'=>$tennv,
                'Username'=>$taikhoan,
                'Password'=>$matkhau,
                'NgaySinh'=>$ngaysinh,
                'GioiTinh'=>$gioitinh,
                'DiaChi'=>$diachi,
                'SDT'=>$dienthoai,
                'Email'=>$email,
                
            ]);
    }
    function xoa($manv){
        $dulieu=$this->dsnv->nhanvien_del($manv);
        if($dulieu)
            echo "<script>alert('Xóa thành công!')</script>";
        else
            echo "<script>alert('Xóa thất bại!')</script>";
        //Gọi lại giao diện và truyền $dulieu ra
            $manv='';
            $tennv='';
            $taikhoan= isset($_POST['txtTaiKhoan']) ? $_POST['txtTaiKhoan'] : '';
            $matkhau= isset($_POST['txtMatKhau']) ? $_POST['txtMatKhau'] : '';
            $ngaysinh= isset($_POST['txtNgaySinh']) ? $_POST['txtNgaySinh'] : '';
            $gioitinh= isset($_POST['ddlGioiTinh']) ? $_POST['ddlGioiTinh'] : '';
            $diachi= isset($_POST['txtDiaChi']) ? $_POST['txtDiaChi'] : '';
            $dienthoai= isset($_POST['txtSDT']) ? $_POST['txtSDT'] : '';
            $email= isset($_POST['txtEmail']) ? $_POST['txtEmail'] : '';
           
            $dulieu=$this->dsnv->nhanvien_find($manv,$tennv);
            //Gọi lại giao diện và truyền $dulieu ra
            $this->view('Masterlayout',[
                'page'=>'Danhsachnhanvien_v',
                'dulieu'=>$dulieu,
                'MaNV'=>$manv,
                'TenNV'=>$tennv,
                'Username'=>$taikhoan,
                'Password'=>$matkhau,
                'NgaySinh'=>$ngaysinh,
                'GioiTinh'=>$gioitinh,
                'DiaChi'=>$diachi,
                'SDT'=>$dienthoai,
                'Email'=>$email,
                
            ]);
    }
}
?>