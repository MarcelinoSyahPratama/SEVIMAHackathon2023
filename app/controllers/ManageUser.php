<?php
class ManageUser extends Controller
{
    public function index()
    {
        $data['user'] = $this->model('User_Model')->getAllUser();
        $this->view('tamplates/header_admin');
        $this->view('admin/manageuser',$data);
        $this->view('tamplates/footer');
    }
    public function addUser()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $role = $_POST['role'];

            $data = [
                'username' => $username,
                'password' => $password,
                'role' => $role
            ];
            $this->model('User_Model')->addDataUser($data);
            
            header('Location:'. BASEURL .'/manageuser');

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
