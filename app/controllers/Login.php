<?php
class Login extends Controller
{
    public function index()
    {
        $this->view('user/login');
    }

    public function login(){
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $username = $_POST['username'];
                $password = $_POST['password'];

                    $data = [
                      'username' => $username,
                      'password' => password_hash($password, PASSWORD_DEFAULT)
                    ];

                    // Cek kecocokan username dan password
                    $user = $this->model('User_Model')->login($data);
                    //echo "<pre>";print_r($user);die;
            
                    if ($user && password_verify($password, $data['password'])) {

                      // Login berhasil, simpan informasi pengguna ke sesi atau cookie
                      
                      session_start();

                      $_SESSION['user'] = $user;
            
                      if ($user['Role'] == 'guru') {
                        header('Location:'. BASEURL . '/managekelas');
                      } else  if ($user['Role'] == 'murid'){
                        header('Location:'. BASEURL . '/home');
                      }
                      exit;
                    } else {
                        header('Location:'. BASEURL . '/login');
                    }
            } else {
                header('Location:'. BASEURL . '/login');
            }
    }
    public function logout(){
        session_start();
        session_unset();
        session_destroy();
        header('Location:'. BASEURL . '/login');
    }
}
