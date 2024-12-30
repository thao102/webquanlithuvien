<?php 
class nxb_ds_c extends controller{
    private $ds;
    function __construct()
    {
        $this->ds=$this->model('nxb_m');
    }
    function Get_data(){
        
        $dulieu = $this->ds->all();
        $this->view('Masterlayout', [
            'page' => 'nxb_ds_v',
            'dulieu' => $dulieu
        ]);
    }
    function thuchien(){//timkiem
        if(isset($_POST['btnTimkiem'])){
            $manxb = $_POST['txtTimkiem'];
            $tennxb = $_POST['txtTimkiem'];
            $dulieu=$this->ds->find($manxb,$tennxb);
            //Gọi lại giao diện và truyền $dulieu ra
            $this->view('Masterlayout',[
                'page'=>'nxb_ds_v',
                'dulieu'=>$dulieu,
                'MaNXB' => $manxb,
                'TenNXB' => $tennxb,
                
            ]);
        }
        //xuất excel
        if(isset($_POST['btnXuat'])){
            $objExcel = new PHPExcel();
            $objExcel->setActiveSheetIndex(0);
            $sheet = $objExcel->getActiveSheet()->setTitle('Danh sách nhà xuất bản');
            $rowCount = 1;
        
            // Tạo tiêu đề cho cột trong Excel
            $sheet->setCellValue('A'.$rowCount, 'STT');
            $sheet->setCellValue('B'.$rowCount, 'Mã Nhà Xuất Bản');
            $sheet->setCellValue('C'.$rowCount, 'Tên tác giả');
            $sheet->setCellValue('D'.$rowCount, 'Điện Thoại');
            $sheet->setCellValue('E'.$rowCount, 'Email');
            $sheet->setCellValue('F'.$rowCount, 'Địa Chỉ');
            // Định dạng cột tiêu đề
            $sheet->getColumnDimension('A')->setAutoSize(true);
            $sheet->getColumnDimension('B')->setAutoSize(true);
            $sheet->getColumnDimension('C')->setAutoSize(true);
        
            // Gán màu nền
            $sheet->getStyle('A1:F1')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('00FF00');
            // Căn giữa
            $sheet->getStyle('A1:F1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        
            // Điền dữ liệu vào các dòng. Dữ liệu lấy từ DB
            $manxb = $_POST['txtTimkiem'];
            $tennxb = $_POST['txtTimkiem'];
            $dulieu=$this->ds->find($manxb,$tennxb);
        
            if ($dulieu && mysqli_num_rows($dulieu) > 0) {
                while ($row = mysqli_fetch_array($dulieu)) {
                    $rowCount++;
                    $sheet->setCellValue('A'.$rowCount, $rowCount - 1); // sửa lại giá trị của STT cho đúng
                    $sheet->setCellValue('B'.$rowCount, $row['MaNXB']);
                    $sheet->setCellValue('C'.$rowCount, $row['TenNXB']);
                    $sheet->setCellValue('D'.$rowCount, $row['ĐienThoai']);
                    $sheet->setCellValue('E'.$rowCount, $row['Email']);
                    $sheet->setCellValue('F'.$rowCount, $row['DiaChi']);
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
            $sheet->getStyle('A1:' . 'F' . ($rowCount))->applyFromArray($styleArray);
        
            $objWriter = new PHPExcel_Writer_Excel2007($objExcel);
            $fileName = 'Danh sách.xlsx';
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
///////  Nhập     //////
        if (isset($_POST['btnNhap'])) {
            if (empty($_FILES['txtfile']['name'])) {
                echo "<script>alert('Vui lòng chọn file!')</script>";
            } elseif ($_FILES['txtfile']['size'] == 0) {
                echo "<script>alert('File không được để trống!')</script>";
            } else {
                $file = $_FILES['txtfile']['tmp_name'];
                // require 'PHPExcel/IOFactory.php';  // Đảm bảo bạn đã bao gồm thư viện PHPExcel

                try {
                    $objReader = PHPExcel_IOFactory::createReaderForFile($file);
                    $objExcel = $objReader->load($file);
                    $sheetData = $objExcel->getActiveSheet()->toArray(null, true, true, true);
                    $highestRow = $objExcel->setActiveSheetIndex(0)->getHighestRow();
                    $importSuccess = true;

                    for ($i = 2; $i <= $highestRow; $i++) {
                        $manxb = $sheetData[$i]["A"];
                        $tennxb = $sheetData[$i]["B"];
                        $email = $sheetData[$i]["C"];
                        $dienthoai = $sheetData[$i]["D"];
                        $diachi = $sheetData[$i]["E"];
                        if (empty($manxb) || empty($tennxb) || empty($email) || empty($dienthoai) || empty($diachi)) {
                            echo "<script>alert('Vui lòng điền đầy đủ thông tin ở hàng {$i}!')</script>";
                            $importSuccess = false;
                            continue;
                        }

                        // Kiểm tra trùng mã tác giả
                        $kq1 = $this->ds->checktrungma($manxb);
                        if ($kq1) {
                            echo "<script>alert('Mã nhà xuất bản ở hàng {$i} đã tồn tại!')</script>";
                            $importSuccess = false;
                            continue;
                        } else {
                            // Gọi hàm thêm dữ liệu insert trong model
                            $kq = $this->ds->insert($manxb, $tennxb,$dienthoai, $email,$diachi);
                            if (!$kq) {
                                echo "<script>alert('Import thất bại ở hàng {$i}!')</script>";
                                $importSuccess = false;
                            }
                        }
                    }

                    if ($importSuccess) {
                        echo "<script>alert('Import thành công!')</script>";
                    } else {
                        echo "<script>alert('Có lỗi xảy ra khi import! Vui lòng kiểm tra lại.')</script>";
                    }
                } catch (Exception $e) {
                    echo "<script>alert('Có lỗi xảy ra khi xử lý file: ".$e->getMessage()."')</script>";
                }
            }
        }
        $dulieu = $this->ds->all();
        $this->view('MasterLayout', [
            'page' => 'nxb_ds_v',
            'dulieu' => $dulieu,
        ]);

    }
    function xoa($manxb){
        $kq=$this->ds->delete($manxb);
        if($kq)
            echo "<script>alert('Xóa thành công!')</script>";
        else
            echo "<script>alert('Xóa thất bại!')</script>";
        
        $dulieu=$this->ds->all();
        $this->view('Masterlayout',[
            'page'=>'nxb_ds_v',
            'dulieu'=>$dulieu,
        ]);
    }
    function sua($manxb){
        $this->view('Masterlayout',[
            'page'=>'nxb_sua_v',
            'dulieu'=>$this->ds->find2($manxb),
        ]);
    }
    function suadl(){
        if(isset($_POST['btnLuu'])){
            $manxb = $_POST['txtManxb'];
            $tennxb = $_POST['txtTennxb'];
            $dienthoai = $_POST['txtDienthoai'];
            $email = $_POST['txtEmail'];
            $diachi = $_POST['txtDiachi'];
            $kq2=$this->ds->checkrong($manxb, $tennxb,$dienthoai, $email,$diachi);
            if($kq2){
                echo "<script>alert('Không để trống dữ liệu !')</script>";

                //Gọi lại giao diện và truyền $dulieu ra
                $manxb = $_POST['txtManxb'];
                $tennxb = $_POST['txtTennxb'];
                // $dienthoai = $_POST['txtDienthoai'];
                // $email = $_POST['txtEmail'];
                // $diachi = $_POST['txtDiachi'];
                $dulieu=$this->ds->find2($manxb);
                $this->view('Masterlayout',[
                    'page'=>'nxb_sua_v',
                    'dulieu'=>$dulieu,
                    'MaNXB' => $manxb,
                    'TenNXB' => $tennxb,
                    // 'DienThoai'=> $dienthoai,
                    // 'Email'=> $email,
                    // 'DiaChi'=> $diachi,
            ]);
            }
            else{
                //gọi hàm sủa dl _udp trong model
                $kq=$this->ds->update($manxb, $tennxb,$dienthoai, $email,$diachi);
                
                if($kq){
                    echo "<script>alert('Sửa thành công!')</script>";
                }
                else
                    echo "<script>alert('Sửa thất bại!')</script>";

                    //Gọi lại giao diện và truyền $dulieu ra
                    $manxb = $_POST['txtManxb'];
                    $tennxb = $_POST['txtTennxb'];
                    // $dienthoai = $_POST['txtDienthoai'];
                    // $email = $_POST['txtEmail'];
                    // $diachi = $_POST['txtDiachi'];
                    $dulieu=$this->ds->all();
                    $this->view('Masterlayout',[
                        'page'=>'nxb_ds_v',
                        'dulieu'=>$dulieu,
                        'MaNXB' => $manxb,
                        'TenNXB' => $tennxb,
                        // 'DienThoai'=> $dienthoai,
                        // 'Email'=> $email,
                        // 'DiaChi'=> $diachi,
                    ]);
            }
            
           
                
        }
    }
}
?>
