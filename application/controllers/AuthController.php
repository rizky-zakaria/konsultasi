<?php
class AuthController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        if ($this->session->userdata('status') == 'logedIn') {
            redirect(base_url("DashboardController"));
        }
    }

    public function index()
    {
        $this->load->view('auth/index');
    }

    public function cekUser()
    {
        $user = $this->input->post('username');
        $pass = md5($this->input->post('password'));
        // $data = $this->User_model->checkUser($user, $pass)->row_array();
        $data = $this->db->query("SELECT * FROM user WHERE username = '$user' AND password = '$pass'")->row_array();
        // var_dump($pass);
        // die;
        if ($data) {
            $session = array(
                'id' => $data['id'],
                'username' => $data['username'],
                'password' => $data['password'],
                'role' => $data['role'],
                'token' => $data['token'],
                'status' => 'logedIn',
                'alert' => "Selamat, Anda berhasil masuk!"
            );
            $this->session->set_userdata($session);
            redirect(base_url("HomeController"));
        } else {
            redirect(base_url("AuthController"));
        }
    }
}
