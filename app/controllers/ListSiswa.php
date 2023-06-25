<?php
class ListSiswa extends Controller
{
    public function index($kodekelas)
    {
        session_start();
        if (!isset($_SESSION['user'])) {
            header('Location: ' . BASEURL . '/login');
        }else{
            $data['siswa'] = $this->model('Kelas_Model')->getsiswakelas($kodekelas);
            $this->view('tamplates/header_admin');
            $this->view('admin/listsiswa',$data);
            $this->view('tamplates/footer');
        }
    }
}