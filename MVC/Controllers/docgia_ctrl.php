<?php
class docgia_ctrl extends controller{
    private $docgia;
    function __construct()
    {
        $this->docgia = $this->model('docgia_m');
    }
    function Get_data(){
        $dulieu = $this->docgia->all();
        $this->view('Masterlayout',['page'=>'quanlidocgia']);
    }
    public function suadl() {
        if (isset($_POST['btnsua'])) {
            $MaSV = isset($_POST['txtTheDG']) ? trim($_POST['txtTheDG']) : '';
            $TenSV = isset($_POST['txtTenSV']) ? trim($_POST['txtTenSV']) : '';
            $MaLop = isset($_POST['txtMaLop']) ? trim($_POST['txtMaLop']) : '';
            $NgaySinh = isset($_POST['dNgaySinh']) ? trim($_POST['dNgaySinh']) : '';
            $GioiTinh = isset($_POST['txtGioiTinh']) ? trim($_POST['txtGioiTinh']) : '';
            $Email = isset($_POST['txtEmail']) ? trim($_POST['txtEmail']) : '';
            $SoDienThoai = isset($_POST['txtSDT']) ? trim($_POST['txtSDT']) : '';
            
            // Chuyển đổi định dạng ngày nếu cần thiết
            $NgaySinh = date('Y-m-d', strtotime($NgaySinh));
         
            // Cập nhật dữ liệu độc giả
            $dulieu = $this->docgia->docgia_upd($MaSV, $TenSV, $MaLop, $NgaySinh, $GioiTinh, $Email, $SoDienThoai);
            
            if ($dulieu) {
                echo "<script>alert('Sửa độc giả thành công!')</script>";
            } else {
                echo "<script>alert('Sửa độc giả thất bại!')</script>";
            }

            // Gọi view để hiển thị thông tin cập nhật
            $this->view('Masterlayout', [
                'page' => 'suadocgia',
                'dulieu' => $this->docgia->docgia_find($MaSV),
                'MaSV' => $MaSV,
                'TenSV' => $TenSV,
                'MaLop' => $MaLop,
                'NgaySinh' => $NgaySinh,
                'GioiTinh' => $GioiTinh,
                'Email' => $Email,
                'SDT' => $SoDienThoai,
                

            ]);
        }
    }
    public function sua($MaSV){
        $this->view('Masterlayout',[
            'page'=>'suadocgia',
            'dulieu'=>$this->docgia->docgia_find($MaSV)
        ]);
    }
    public function timkiem(){
        if(isset($_POST['btnTimkiem'])){
            $MaSV = $_POST['txtTimkiem'];
            $dulieu=$this->docgia->docgia_find($MaSV);
            //Gọi lại giao diện và truyền $dulieu ra
            $this->view('Masterlayout',[
                'page'=>'quanlidocgia',
                'dulieu'=>$dulieu,
                'MaSV' =>$MaSV
            ]);
        }
    }
  public function timkiem1(){
    $MaSV = '';
    $TenSV = isset($_POST['txtTenSV'])? $_POST['txtTenSV']:'';
    $MaLop = isset($_POST['txtMaLop'])? $_POST['txtMaLop']:'';
    $NgaySinh = isset($_POST['dNgaySinh'])? $_POST['dNgaySinh']:'' ;
    $GioiTinh = isset($_POST['txtGioiTinh'])? $_POST['txtGioiTinh']:'';
    $Email = isset($_POST['txtEmail'])? $_POST['txtEmail']:'';
    $SoDienThoai = isset($_POST['txtSDT'])? $_POST['txtSDT']:'';
    
    
            $dulieu=$this->docgia->docgia_find($MaSV);
            //Gọi lại giao diện và truyền $dulieu ra
            $this->view('Masterlayout',[
                'page'=>'quanlidocgia',
                'dulieu'=>$dulieu,
                'MaSV' =>$MaSV,
                'TenSV'=>$TenSV,
                'MaLop' =>$MaLop,
                'NgaySinh'=>$NgaySinh,
                'GioiTinh'=>$GioiTinh,
                'Email' =>$Email,
                'SDT' =>$SoDienThoai,
                
               
            ]);
    }
    function xoa($MaSV){
        $dulieu=$this->docgia->docgia_del($MaSV);
        if($dulieu)
            echo "<script>alert('Xóa thành công!')</script>";
        else
            echo "<script>alert('Xóa thất bại!')</script>";
        //Gọi lại giao diện và truyền $dulieu ra
        $MaSV = '';
        $TenSV = isset($_POST['txtTenSV'])? $_POST['txtTenSV']:'';
        $MaLop = isset($_POST['txtMaLop'])? $_POST['txtMaLop']:'';
        $NgaySinh = isset($_POST['dNgaySinh'])? $_POST['dNgaySinh']:'' ;
        $GioiTinh = isset($_POST['txtGioiTinh'])? $_POST['txtGioiTinh']:'';
        $Email = isset($_POST['txtEmail'])? $_POST['txtEmail']:'';
        $SoDienThoai = isset($_POST['txtSDT'])? $_POST['txtSDT']:'';
        
        
            $dulieu=$this->docgia->docgia_find($MaSV,$TenSV,$MaLop,$NgaySinh,$GioiTinh,$Email,$SoDienThoai);
            //Gọi lại giao diện và truyền $dulieu ra
            $this->view('Masterlayout',[
                'page'=>'quanlidocgia',
                'dulieu'=>$dulieu,
                'MaSV' =>$MaSV,
            'TenSV'=>$TenSV,
            'MaLop' =>$MaLop,
            'NgaySinh'=>$NgaySinh,
            'GioiTinh'=>$GioiTinh,
            'Email' =>$Email,
            'SDT' =>$SoDienThoai,
          
      
            ]);
    }
}
?>