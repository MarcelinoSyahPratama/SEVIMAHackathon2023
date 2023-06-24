<?php
class ManageTugas extends Controller
{
    public function index()
    {
        session_start();
        if (!isset($_SESSION['user'])) {
            header('Location: ' . BASEURL . '/login');
        }else{
            $data['kelas'] = $this->model('Kelas_Model')->getAllKelas();
            $data['tugas'] = $this->model('Tugas_Model')->getAllTugas();
            $this->view('tamplates/header_admin');
            $this->view('admin/managetugas',$data);
            $this->view('tamplates/footer');
        }
    }
    public function addTugas()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $judul = $_POST['judul'];
            $desc = $_POST['desc'];
            $deadline = $_POST['deadline'];
            $kelas = $_POST['kelas'];

            $data = [
                'kelas' => $kelas,
                'judul' => $judul,
                'desc' => $desc,
                'deadline' => $deadline,
                'Status' => "",
                'DateTime' => date("Y-m-d H:s:i")
            ];
            $this->model('Tugas_Model')->addDataTugas($data);
            
            header('Location:'. BASEURL .'/managetugas');

            // }

        }
           
    }

    public function updateTugas()
    {
        //print_r($_POST);die;
        $idTugas = $_POST['id_tugas'];
        $judul = $_POST['judul'];
        $desc = $_POST['desc'];
        $deadline = $_POST['deadline'];

        $data = [
            'idTugas' => $idTugas,
            'judul' => $judul,
            'desc' => $desc,
            'deadline' => $deadline
        ];

        $this->model('Tugas_Model')->updateDataTugas($data);
            //print_r($data);die;
            
        header('Location:'. BASEURL .'/managetugas');

            // }
        
    }

    public function deleteTugas($id_tugas)
    {
        if ($this->model('Tugas_Model')->hapusDataTugas($id_tugas) > 0) {
            
            header('Location:'. BASEURL .'/managetugas');
            exit;   
        } else {
            header('Location:'. BASEURL .'/managetugas');
            exit;
        }
    }

    public function uploadfile()
    {
        //require 'vendor/autoload.php';
        $idTugas = $_POST['id_tugas'];
        $path = $_FILES['filesoal']['tmp_name'];
        $file = fopen($path, 'r');
        while (($line = fgetcsv($file)) !== FALSE) {
        //$line is an array of the csv elements
        $excel[] = $line;
        }
        fclose($file);
        unset($excel[0]);
        //echo "<pre>";print_r($excel);die;
        foreach($excel as $key=>$value){
            $data = [
                'idTugas' => $idTugas,
                'soal' => $value[0],
                'a' => $value[1],
                'b' => $value[2],
                'c' => $value[3],
                'd' => $value[4],
                'jwb' => $value[5],
            ];
        $this->model('Tugas_Model')->addDataSoal($data);
    }
    $this->model('Tugas_Model')->UpdStsTgs($idTugas);
        header('Location:'. BASEURL .'/managetugas');
    }
}
