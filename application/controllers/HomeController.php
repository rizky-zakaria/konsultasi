<?php
class HomeController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('status') != 'logedIn') {
            redirect(base_url("AuthController"));
        }
    }

    public function index()
    {
        $data['judul'] = 'Dashboard Page';
        $data['controller'] = 'HomeController';
        $data['header'] = 'Akun';
        $this->load->view('templates/header', $data);
        $this->load->view('dashboard/index', $data);
        $this->load->view('templates/footer');
    }

    public function logout()
    {
        $data = array('username', 'password', 'role', 'status');
        $this->session->unset_userdata($data);
        redirect(base_url("AuthController"));
    }
}
