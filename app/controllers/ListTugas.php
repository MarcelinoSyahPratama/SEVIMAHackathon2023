<?php
class ListTugas extends Controller
{
    public function index($id_kelas)
    {
        session_start();
        if (!isset($_SESSION['user'])) {
            header('Location: ' . BASEURL . '/login');
        }else{
            $data['tugas'] = $this->model('Tugas_Model')->getTugasUser($id_kelas);
            $this->view('tamplates/header_user');
            $this->view('user/listtugas',$data);
            $this->view('tamplates/footer');
        }
    }

    public function deadline($id_kelas)
    {
        session_start();
        if (!isset($_SESSION['user'])) {
            header('Location: ' . BASEURL . '/login');
        }else{
            $data['tugas'] = $this->model('Tugas_Model')->getTugasUserDeadline($id_kelas);
            $this->view('tamplates/header_user');
            $this->view('user/tugasdeadline',$data);
            $this->view('tamplates/footer');
        }
    }
}