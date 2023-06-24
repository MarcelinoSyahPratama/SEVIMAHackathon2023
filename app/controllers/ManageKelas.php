<?php
class ManageKelas extends Controller
{
    public function index()
    {
        session_start();
        if (!isset($_SESSION['user'])) {
            header('Location: ' . BASEURL . '/login');
        }else{
            $data['kelas'] = $this->model('Kelas_Model')->getAllKelas();
            $this->view('tamplates/header_admin');
            $this->view('admin/managekelas',$data);
            $this->view('tamplates/footer');
        }
    }

    public function addKelas()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $namakelas = $_POST['namakelas'];

            $data = [
                'namakelas' => $namakelas
            ];
            $this->model('Kelas_Model')->addDataKelas($data);
            
            header('Location:'. BASEURL .'/manageKelas');

        }
    }

    public function deleteKelas($id_Kelas)
    {
        if ($this->model('Kelas_Model')->hapusDataKelas($id_Kelas) > 0) {
            
            header('Location:'. BASEURL .'/managekelas');
            exit;   
        } else {
            header('Location:'. BASEURL .'/managekelas');
            exit;
        }
    }

    public function updateKelas()
    {
        //print_r($_POST);die;
        $idKelas = $_POST['id_kelas'];
        $Nama = $_POST['kelas'];

        $data = [
            'idKelas' => $idKelas,
            'Nama' => $Nama
        ];

        $this->model('Kelas_Model')->updateDataKelas($data);
            //print_r($data);die;
            
        header('Location:'. BASEURL .'/managekelas');

            // }
        
    }
}