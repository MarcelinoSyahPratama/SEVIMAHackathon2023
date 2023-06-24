<?php
class ListTugas extends Controller
{
    public function index($id_kelas)
    {
        $data['tugas'] = $this->model('Tugas_Model')->getTugasUser($id_kelas);
        $this->view('tamplates/header_user');
        $this->view('user/listtugas',$data);
        $this->view('tamplates/footer');
    }
}