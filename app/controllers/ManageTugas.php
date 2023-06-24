<?php
class ManageTugas extends Controller
{
    public function index()
    {
        $data['tugas'] = $this->model('Tugas_Model')->getAllTugas();
        $this->view('tamplates/header_admin');
        $this->view('admin/managetugas',$data);
        $this->view('tamplates/footer');
    }
    public function addUser()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $judul = $_POST['judul'];
            $desc = $_POST['desc'];
            $deadline = $_POST['deadline'];

            $data = [
                'idguru' => "1",
                'judul' => $judul,
                'desc' => $desc,
                'deadline' => $deadline,
                'Status' => "Aktiv",
                'DateTime' => date("Y-m-d H:s:i")
            ];
            $this->model('Tugas_Model')->addDataTugas($data);
            
            header('Location:'. BASEURL .'/managetugas');

            // }

        }
           
    }

    public function updateUser()
    {
        $id_user = $_POST['id_user'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $role = $_POST['role'];

        $data = [
            'id_user' => $id_user,
            'username' => $username,
            'password' => $password,
            'role' => $role
        ];

        $this->model('User_Model')->updateDataUser($data);
            //print_r($data);die;
            
        header('Location:'. BASEURL .'/manageuser');

            // }
        
    }

    public function deleteUser($id_user)
    {
        if ($this->model('User_Model')->hapusDataUser($id_user) > 0) {
            
            header('Location:'. BASEURL .'/manageuser');
            exit;   
        } else {
            header('Location:'. BASEURL .'/manageuser');
            exit;
        }
    }
}
