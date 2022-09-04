<?php

class PerawatController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('status') != 'logedIn') {
            redirect(base_url("AuthController"));
        }
    }

    public function konsultasi()
    {
        $data['judul'] = 'Manajemen Akun Dokter';
        $data['controller'] = 'RumahsakitController';
        $data['header'] = 'Rumah Sakit';
        $data['data'] = $this->db->query("SELECT user.*, biodata.nama  FROM user JOIN biodata ON user.id = biodata.user_id WHERE user.role = 3")->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('perawat/konsultasi', $data);
        $this->load->view('templates/footer');
    }

    public function laporan()
    {
        $data['judul'] = 'Manajemen Akun Dokter';
        $data['controller'] = 'RumahsakitController';
        $data['header'] = 'Rumah Sakit';
        $data['data'] = $this->db->query("SELECT user.*, biodata.nama  FROM user JOIN biodata ON user.id = biodata.user_id WHERE user.role = 3")->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('perawat/laporan', $data);
        $this->load->view('templates/footer');
    }
}
