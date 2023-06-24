<?php
class HalamanUjian extends Controller
{
    public function index()
    {
            $data['soal'] = $this->model('Halamanujian_Model')->getAllSoal();
            $this->view('user/halamanujian',$data);
    }
    public function Nilai()
    {
        if(isset($_POST['kirim'])){
            echo "<pre>";print_r($_POST);die;
        }
    }
}
