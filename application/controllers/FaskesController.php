<?php

class FaskesController extends CI_Controller
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
        $data['controller'] = 'FaskesController';
        $data['header'] = 'Rumah Sakit';
        // $data['data'] = $this->db->query("SELECT user.*, biodata.nama  FROM user JOIN biodata ON user.id = biodata.user_id WHERE user.role = 3")->result_array();
        $id = $this->session->userdata('id');
        $data['data'] = $this->db->query("SELECT a.*, b.username, c.nama FROM cluster a JOIN user b JOIN biodata c ON a.id_pengirim = b.id AND a.id_pengirim = c.user_id WHERE a.id_dokter = '$id'")->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('faskes/konsultasi', $data);
        $this->load->view('templates/footer');
    }

    public function laporan()
    {
        $data['judul'] = 'Manajemen Akun Dokter';
        $data['controller'] = 'FaskesController';
        $data['header'] = 'Rumah Sakit';
        $id = $this->session->userdata('id');
        $data['data'] = $this->db->query("SELECT a.*, b.username, c.nama FROM cluster a JOIN user b JOIN biodata c ON a.id_pengirim = b.id AND a.id_pengirim = c.user_id WHERE a.id_dokter = '$id'")->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('faskes/laporan', $data);
        $this->load->view('templates/footer');
    }

    public function logmasukpasien()
    {
        $data['judul'] = 'Manajemen Akun Dokter';
        $data['controller'] = 'FaskesController';
        $data['header'] = 'Rumah Sakit';
        $data['data'] = $this->db->query("SELECT user.*, biodata.nama  FROM user JOIN biodata ON user.id = biodata.user_id WHERE user.role = 5")->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('faskes/logmasukpasien', $data);
        $this->load->view('templates/footer');
    }

    public function detaillogmasukpasien($id)
    {
        $data['judul'] = 'Manajemen Akun Dokter';
        $data['controller'] = 'FaskesController';
        $data['header'] = 'Rumah Sakit';
        $data['data'] = $this->db->query("SELECT a.*, b.username, c.nama FROM log_login a JOIN user b JOIN biodata c ON a.user_id = b.id AND a.user_id = c.user_id WHERE a.user_id = '$id' ")->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('faskes/detaillogmasukpasien', $data);
        $this->load->view('templates/footer');
    }

    public function detaillaporan($id)
    {
        $data['judul'] = 'Manajemen Akun Dokter';
        $data['controller'] = 'FaskesController';
        $data['header'] = 'Rumah Sakit';
        $id = $this->session->userdata('id');
        $data['data'] = $this->db->query("SELECT a.*, b.username, c.nama FROM cluster a JOIN user b JOIN biodata c ON a.id_pengirim = b.id AND a.id_pengirim = c.user_id WHERE a.id_dokter = '$id'")->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('faskes/laporan', $data);
        $this->load->view('templates/footer');
    }

    public function post_chat()
    {
        $id = $this->input->post('id');
        $chat = $this->input->post('chat');
        $getCluster = $this->db->query("SELECT id FROM cluster WHERE id_pengirim = $id")->row_array();
        $getRole = $this->db->query("SELECT r.roles FROM user u JOIN role r  ON u.role = r.id WHERE u.id = $id")->row_array();
        $data = array(
            'id_cluster' => $getCluster['id'],
            'pengirim' => 'dokter',
            'pesan' => $chat,
            'waktu' => date('H:i:d'),
            'tanggal' => date('d-m-Y'),
            'desa' => "",
            'kecamatan' => "",
            'kabupaten' => "",
            'token' => $this->session->userdata('token')
        );

        $insert = $this->db->insert('chat', $data);
        if ($insert) {
            $session = array(
                'alert' => "Berhasil mengirim pesan!"
            );
            $this->session->set_userdata($session);
            redirect(base_url('FaskesController/konsultasi'));
        } else {
            $session = array(
                'alert' => "Gagal mengirim pesan!"
            );
            $this->session->set_userdata($session);
            redirect(base_url('FaskesController/konsultasi'));
        }
    }
}
