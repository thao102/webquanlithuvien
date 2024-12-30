<?php 
class trasach_datra_c extends controller{
    private $ds;
    function __construct()
    {
        $this->ds=$this->model('trasach_m');
    }
    function Get_data(){
        
        $dulieu = $this->ds->all_sachtra();
        $this->view('Masterlayout', [
            'page' => 'trasach_datra_v',
            'dulieu' => $dulieu
        ]);
    }
    function timkiem(){
        if(isset($_POST['btnTimkiem'])){
            $masach = $_POST['txtTimkiem'];
            $tensach= $_POST['txtTimkiem'];
            $dulieu=$this->ds->find_sachtra($masach,$tensach);
            //Gọi lại giao diện và truyền $dulieu ra
            $this->view('Masterlayout',[
                'page'=>'trasach_datra_v',
                'dulieu'=>$dulieu,
                'masach' => $masach,
                'tensach' => $tensach,
                
            ]);
        }
    }
    
}
?>
