<?php
class NilaiSiswa extends Controller
{
    public function index($idtugas)
    {
        session_start();
        if (!isset($_SESSION['user'])) {
            header('Location: ' . BASEURL . '/login');
        }else{
            $data['nilai'] = $this->model('Tugas_Model')->getNilaiUserall($idtugas);
            $this->view('tamplates/header_admin');
            $this->view('admin/nilaisiswa',$data);
            $this->view('tamplates/footer');
        }
    }
    public function belumkerja($idtugas)
    {
        session_start();
        if (!isset($_SESSION['user'])) {
            header('Location: ' . BASEURL . '/login');
        }else{
            $data['nilai'] = $this->model('Tugas_Model')->getBelumKerja($idtugas);
            $this->view('tamplates/header_admin');
            $this->view('admin/listsiswabelummengerjakan',$data);
            $this->view('tamplates/footer');
        }
    }
}