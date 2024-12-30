<?php 
class tacgia_ds_c extends controller{
    private $ds;
    function __construct()
    {
        $this->ds=$this->model('tacgia_m');
    }
    function Get_data(){
        
        $dulieu = $this->ds->all();
        $this->view('Masterlayout', [
            'page' => 'tacgia_ds_v',
            'dulieu' => $dulieu
        ]);
    }

    function thuchien(){//Timkiem
        if(isset($_POST['btnTimkiem'])){
            $matacgia = $_POST['txtTimkiem'];
            $tentacgia = $_POST['txtTimkiem'];
            $dulieu=$this->ds->find($matacgia,$tentacgia);
            //Gọi lại giao diện và truyền $dulieu ra
            $this->view('Masterlayout',[
                'page'=>'tacgia_ds_v',
                'dulieu'=>$dulieu,
                'MaTacGia'=>$matacgia,
                'TenTacGia'=>$tentacgia
                
            ]);
        }
        //xuất excel
        if(isset($_POST['btnXuat'])){
            $objExcel = new PHPExcel();
            $objExcel->setActiveSheetIndex(0);
            $sheet = $objExcel->getActiveSheet()->setTitle('Danh sách tác giả');
            $rowCount = 1;
        
            // Tạo tiêu đề cho cột trong Excel
            $sheet->setCellValue('A'.$rowCount, 'STT');
            $sheet->setCellValue('B'.$rowCount, 'Mã Tác Giả');
            $sheet->setCellValue('C'.$rowCount, 'Tên tác giả');
            $sheet->setCellValue('D'.$rowCount, 'Ngày Sinh');
            $sheet->setCellValue('E'.$rowCount, 'Giới Tính');
            $sheet->setCellValue('F'.$rowCount, 'Địa Chỉ');
            $sheet->setCellValue('G'.$rowCount, 'Điện thoại');
        
            // Định dạng cột tiêu đề
            $sheet->getColumnDimension('A')->setAutoSize(true);
            $sheet->getColumnDimension('B')->setAutoSize(true);
            $sheet->getColumnDimension('C')->setAutoSize(true);
        
            // Gán màu nền
            $sheet->getStyle('A1:G1')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('00FF00');
            // Căn giữa
            $sheet->getStyle('A1:G1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        
            // Điền dữ liệu vào các dòng. Dữ liệu lấy từ DB
            $matacgia = $_POST['txtTimkiem'];
            $tentacgia = $_POST['txtTimkiem'];
            $dulieu=$this->ds->find($matacgia,$tentacgia);
        
            if ($dulieu && mysqli_num_rows($dulieu) > 0) {
                while ($row = mysqli_fetch_array($dulieu)) {
                    $rowCount++;
                    $sheet->setCellValue('A'.$rowCount, $rowCount - 1); // sửa lại giá trị của STT cho đúng
                    $sheet->setCellValue('B'.$rowCount, $row['MaTacGia']);
                    $sheet->setCellValue('C'.$rowCount, $row['TenTacGia']);
                    $sheet->setCellValue('D'.$rowCount, $row['NgaySinh']);
                    $sheet->setCellValue('E'.$rowCount, $row['GioiTinh']);
                    $sheet->setCellValue('F'.$rowCount, $row['DienThoai']);
                    $sheet->setCellValue('G'.$rowCount, $row['DiaChi']);
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
            $sheet->getStyle('A1:' . 'G' . ($rowCount))->applyFromArray($styleArray);
        
            $objWriter = new PHPExcel_Writer_Excel2007($objExcel);
            $fileName = 'Danh sách tác giả.xlsx';
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
                        $matacgia = $sheetData[$i]["A"];
                        $tentacgia = $sheetData[$i]["B"];
                        $ngaysinh = $sheetData[$i]["C"];
                        $gioitinh = $sheetData[$i]["D"];
                        $dienthoai = $sheetData[$i]["E"];
                        $diachi = $sheetData[$i]["F"];

                        if (empty($matacgia) || empty($tentacgia) || empty($ngaysinh) || empty($gioitinh) || empty($dienthoai) || empty($diachi)) {
                            echo "<script>alert('Vui lòng điền đầy đủ thông tin ở hàng {$i}!')</script>";
                            $importSuccess = false;
                            continue;
                        }

                        // Kiểm tra trùng mã tác giả
                        $kq1 = $this->ds->checktrungma($matacgia);
                        if ($kq1) {
                            echo "<script>alert('Mã tác giả ở hàng {$i} đã tồn tại!')</script>";
                            $importSuccess = false;
                            continue;
                        } else {
                            // Gọi hàm thêm dữ liệu insert trong model
                            $kq = $this->ds->insert($matacgia, $tentacgia, $ngaysinh, $gioitinh, $dienthoai, $diachi);
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
            'page' => 'tacgia_ds_v',
            'dulieu' => $dulieu,
        ]);

    }
//////
    function xoa($matacgia){
        $kq=$this->ds->delete($matacgia);
        if($kq)
            echo "<script>alert('Xóa thành công!')</script>";
        else
            echo "<script>alert('Xóa thất bại!')</script>";
        
        $dulieu=$this->ds->all();
        $this->view('Masterlayout',[
            'page'=>'tacgia_ds_v',
            'dulieu'=>$dulieu,
        ]);
    }
    function sua($matacgia){
        $this->view('Masterlayout',[
            'page'=>'tacgia_sua_v',
            'dulieu'=>$this->ds->find2($matacgia),
        ]);
    }
    function suadl(){
        if(isset($_POST['btnLuu'])){
            $matacgia = $_POST['txtMatacgia'];
            $tentacgia = $_POST['txtTentacgia'];
            $ngaysinh = $_POST['txtNgaysinh'];
            $gioitinh = $_POST['txtGioitinh'];
            $dienthoai = $_POST['txtDienthoai'];
            $diachi = $_POST['txtDiachi'];
            $kq2=$this->ds->checkrong($matacgia, $tentacgia, $ngaysinh, $gioitinh,$dienthoai,$diachi);
            if($kq2){
                echo "<script>alert('Không để trống dữ liệu !')</script>";

                //Gọi lại giao diện và truyền $dulieu ra
                $Matacgia = $_POST['txtMatacgia'];
                $Tentacgia = $_POST['txtTentacgia'];
                // $Ngaysinh = $_POST['txtNgaysinh'];
                // $Gioitinh = $_POST['txtGioitinh'];
                // $Dienthoai = $_POST['txtDienthoai'];
                // $Diachi = $_POST['txtDiachi'];
                $dulieu=$this->ds->find2($matacgia);
                $this->view('Masterlayout',[
                    'page'=>'sua_v',
                    'dulieu'=>$dulieu,
                    'MaTacGia' => $matacgia,
                    'TenTacGia' => $tentacgia,
                    // 'NgaySinh' => $ngaysinh,
                    // 'GioiTinh' => $gioitinh,
                    // 'DienThoai'=> $dienthoai,
                    // 'DiaChi'=> $diachi,
            ]);
            }
            else{
                //gọi hàm sủa dl _udp trong model
                $kq=$this->ds->update($matacgia, $tentacgia, $ngaysinh, $gioitinh,$dienthoai,$diachi);
                
                if($kq){
                    echo "<script>alert('Sửa thành công!')</script>";
                }
                else
                    echo "<script>alert('Sửa thất bại!')</script>";

                    //Gọi lại giao diện và truyền $dulieu ra
                    $matacgia = $_POST['txtMatacgia'];
                    $tentacgia = $_POST['txtTentacgia'];
                    // $ngaysinh = $_POST['txtNgaysinh'];
                    // $gioitinh = $_POST['txtGioitinh'];
                    // $dienthoai = $_POST['txtDienthoai'];
                    // $diachi = $_POST['txtDiachi'];
                    $dulieu=$this->ds->all();
                    $this->view('Masterlayout',[
                        'page'=>'tacgia_ds_v',
                        'dulieu'=>$dulieu,
                        'MaTacGia' => $matacgia,
                        'Tentacgia' => $tentacgia,
                        // 'NgaySinh' => $ngaysinh,
                        // 'GioiTinh' => $gioitinh,
                        // 'DienThoai'=> $dienthoai,
                        // 'DiaChi'=> $diachi,
                    ]);
            }
            
           
                
        }
    }
}
?>
