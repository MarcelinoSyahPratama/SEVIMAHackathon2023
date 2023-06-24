<?php
class Register extends Controller
{
    public function index()
    {
            $this->view('user/register');
    }
    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $role = "murid";

            $data = [
                'username' => $username,
                'password' => $password,
                'role' => $role
            ];
            $this->model('User_Model')->addDataUser($data);
            
            header('Location:'. BASEURL .'/manageuser');

        }
    }
}
