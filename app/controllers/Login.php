<?php
class Login extends Controller
{
    public function index()
    {
        session_start();
        if (isset($_SESSION['id_user'])) {

        } else {
            $this->view('user/login');
        }
    }
}
