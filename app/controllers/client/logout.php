<?php
    class Logout extends Controller
    {
        private $data, $model;

        function __construct()
        {
            $this->model = $this->model('Database');
        }

        function index()
        {
            // $this->isLogin();
            
            // $this->view('client/index', []);
            $this->logOut();
        }

        function logOut() {
            if(isLogin()) {
                $token = $_SESSION['loginToken']['token'];
                // $condition = "token=$token";
                $this->model->delete('token_login', "WHERE token='$token'");
                session_unset();
                session_destroy();
                redirect('client/login');
            }
        }
        
    }
?>