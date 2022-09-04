<?php

class RootController extends CI_Controller
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
        $data['judul'] = 'Manajemen Akun Rumah Sakit';
        $data['controller'] = 'RootController';
        $data['header'] = 'Root';
        $data['data'] = $this->db->query("SELECT * FROM user WHERE user.role = 2")->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('root/index', $data);
        $this->load->view('templates/footer');
    }

    public function formTambah()
    {
        $data['judul'] = 'Manajemen Akun Rumah Sakit';
        $data['controller'] = 'RootController';
        $data['header'] = 'Root';
        $this->load->view('templates/header', $data);
        $this->load->view('root/tambah', $data);
        $this->load->view('templates/footer');
    }

    public function insert()
    {
        $token = rand(0, 999) . rand(0, 999) . rand(0, 999);
        $cekToken = $this->db->get_where('user', ['token' => $token])->row_array();
        if ($cekToken != null) {
            $token = rand(0, 999) . rand(0, 999) . rand(0, 999);
        }
        $data = array(
            'username' => $this->input->post('username'),
            'password' => md5($this->input->post('password')),
            'role' => 2,
            'token' => $token
        );

        $insert = $this->db->insert('user', $data);
        if ($insert) {
            return redirect(base_url('RootController'));
        }
    }

    public function formEdit($id)
    {
        $data['judul'] = 'Manajemen Akun Rumah Sakit';
        $data['controller'] = 'RootController';
        $data['header'] = 'Root';
        $data['data'] = $this->db->get_where('user', ['id' => $id])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('root/edit', $data);
        $this->load->view('templates/footer');
    }
    public function update()
    {
        $id = $this->input->post('id');
        $username = $this->input->post('username');
        if ($this->input->post('password') != null) {
            $password = $this->input->post('password');
            $data = $this->db->query("UPDATE `user` SET `password` = MD5($password), username = '$username' WHERE `user`.`id` = $id");
        } else {
            $data = $this->db->query("UPDATE `user` SET username = '$username' WHERE `user`.`id` = $id");
        }

        return redirect(base_url('RootController'));
    }

    public function hapus($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user');
        return redirect(base_url('RootController'));
    }
}
