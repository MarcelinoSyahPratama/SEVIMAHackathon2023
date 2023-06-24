<?php
class TugasSelesai extends Controller
{
    public function index($idtugas)
    {
        session_start();
        if (!isset($_SESSION['user'])) {
            header('Location: ' . BASEURL . '/login');
        }else{
            $data['nilai'] = $this->model('Tugas_Model')->getNilaiUser($idtugas);
            $this->view('tamplates/header_user');
            $this->view('user/tugasselesai',$data);
            $this->view('tamplates/footer');
        }
    }
}