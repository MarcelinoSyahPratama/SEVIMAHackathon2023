<?php
class Home extends Controller
{
    public function index()
    {
        $data['kelas'] = $this->model('Kelas_Model')->getKelasUser();
        $this->view('tamplates/header_user');
        $this->view('user/home',$data);
        $this->view('tamplates/footer');
    }

    public function joinkelas()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $kodekelas = $_POST['KodeKelas'];
            $data = [
                'kodekelas' => $kodekelas
            ];
            $this->model('Kelas_Model')->joinkelas($data);
            
            header('Location:'. BASEURL .'/Home');

        }
    }
}