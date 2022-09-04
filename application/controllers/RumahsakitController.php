<?php
class RumahsakitController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('status') != 'logedIn') {
            redirect(base_url("AuthController"));
        }
    }

    public function dokter()
    {
        $data['judul'] = 'Manajemen Akun Dokter';
        $data['controller'] = 'RumahsakitController';
        $data['header'] = 'Rumah Sakit';
        $data['role'] = "dokter";
        $token = $this->session->userdata('token');
        $data['data'] = $this->db->query("SELECT *  FROM user WHERE user.role = 3 AND token = '$token'")->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('rumah_sakit/index', $data);
        $this->load->view('templates/footer');
    }
    public function formTambahDokter()
    {
        $data['judul'] = 'Manajemen Akun Rumah Sakit';
        $data['controller'] = 'RootController';
        $data['header'] = 'Root';
        $data['role'] = "dokter";
        $this->load->view('templates/header', $data);
        $this->load->view('rumah_sakit/tambah', $data);
        $this->load->view('templates/footer');
    }

    public function insertDataDokter()
    {
        $session = array(
            'alert' => "Berhasil Menambahkan Data!"
        );
        $this->session->set_userdata($session);
        $token = $this->session->userdata('token');
        $data = array(
            'username' => $this->input->post('username'),
            'password' => md5($this->input->post('password')),
            'role' => 3,
            'token' => $token
        );

        $insert = $this->db->insert('user', $data);
        if ($insert) {
            return redirect(base_url('RumahsakitController/dokter'));
        }
    }

    public function formEdit($id)
    {
        $data['judul'] = 'Manajemen Akun Rumah Sakit';
        $data['controller'] = 'RootController';
        $data['header'] = 'Root';
        $data['data'] = $this->db->get_where('user', ['id' => $id])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('rumah_sakit/edit', $data);
        $this->load->view('templates/footer');
    }
    public function update()
    {
        $session = array(
            'alert' => "Berhasil Mengubah Data!"
        );
        $this->session->set_userdata($session);
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

    public function perawat()
    {
        $data['judul'] = 'Manajemen Akun Perawat';
        $data['controller'] = 'RumahsakitController';
        $data['header'] = 'Rumah Sakit';
        $data['role'] = "perawat";
        $token = $this->session->userdata('token');
        $data['data'] = $this->db->query("SELECT *  FROM user WHERE user.role = 4 AND token = '$token'")->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('rumah_sakit/index', $data);
        $this->load->view('templates/footer');
    }
    public function formTambahPerawat()
    {
        $data['judul'] = 'Manajemen Akun Rumah Sakit';
        $data['controller'] = 'RootController';
        $data['header'] = 'Root';
        $data['role'] = "perawat";
        $this->load->view('templates/header', $data);
        $this->load->view('rumah_sakit/tambah', $data);
        $this->load->view('templates/footer');
    }

    public function insertDataPerawat()
    {
        $session = array(
            'alert' => "Berhasil Menambahkan Data!"
        );
        $this->session->set_userdata($session);
        $token = $this->session->userdata('token');
        $data = array(
            'username' => $this->input->post('username'),
            'password' => md5($this->input->post('password')),
            'role' => 3,
            'token' => $token
        );

        $insert = $this->db->insert('user', $data);
        if ($insert) {
            return redirect(base_url('RumahsakitController/dokter'));
        }
    }

    public function hapus($id)
    {
        $session = array(
            'alert' => "Berhasil Menghapus Data!"
        );
        $this->session->set_userdata($session);
        $hapus = $this->db->query("DELETE FROM user WHERE id = '$id' ");
        if ($hapus) {
            return redirect(base_url("DashboardController"));
        }
    }

    public function manajemen()
    {
        $data['judul'] = 'Manajemen Akun Rumah Sakit';
        $data['controller'] = 'RumahsakitController';
        $data['header'] = 'Root';
        $token = $this->session->userdata('token');
        $data['pasien'] = $this->db->query("SELECT * FROM user WHERE id NOT IN (SELECT id_pengirim FROM cluster) AND role = 5 AND token = '$token'")->result_array();
        $data['dokter'] = $this->db->get_where('user', ['role' => 3])->result_array();
        $data['perawat'] = $this->db->get_where('user', ['role' => 4])->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('rumah_sakit/manajemen', $data);
        $this->load->view('templates/footer');
    }

    public function insertManajemen()
    {
        $session = array(
            'alert' => "Proses Berhasil!"
        );
        $this->session->set_userdata($session);
        $id_pasien = $this->input->post('id_pasien');
        $id_dokter = $this->input->post('id_dokter');
        $id_perawat = $this->input->post('id_perawat');
        $getDokter = $this->db->get_where('user', ['id' => $id_dokter])->row_array();
        $getPerawat = $this->db->get_where('user', ['id' => $id_perawat])->row_array();
        $data = array(
            "id_pengirim" => $id_pasien,
            "id_dokter" => $id_dokter,
            "id_perawat" => $id_perawat,
            "nama_dokter" => $getDokter['username'],
            "nama_perawat" => $getPerawat['username'],
            "timestamp" => date('Y-m-d H:i:s'),
            "token" => $this->session->userdata('token')
        );
        $insert = $this->db->insert('cluster', $data);
        // if ($insert) {
        redirect('Rumahsakit/manajemen');
        // } else {
        //     redirect('Rumahsakit/manajemen');
        // }
        // var_dump($getDokter['username']);
    }

    public function pasien()
    {
        $data['judul'] = 'Manajemen Akun Dokter';
        $data['controller'] = 'RumahsakitController';
        $data['header'] = 'Rumah Sakit';
        $data['role'] = "pasien";
        $token = $this->session->userdata('token');
        $data['data'] = $this->db->query("SELECT user.*, user.username AS nik, biodata.nama AS username FROM user JOIN biodata ON user.id = biodata.user_id WHERE user.role = 5 AND user.token = '$token'")->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('rumah_sakit/index', $data);
        $this->load->view('templates/footer');
    }

    public function detail($id)
    {
        $data['judul'] = 'Detail User';
        $data['controller'] = 'RumahsakitController';
        $data['header'] = 'Rumah Sakit';
        $token = $this->session->userdata('token');
        $data['data'] = $this->db->query("SELECT user.*, user.username AS nik, biodata.* FROM user JOIN biodata ON user.id = biodata.user_id WHERE user.id = '$id' AND user.token = '$token'")->row_array();
        $data['alamat'] = $this->db->get_where("alamat", ['id_alamat' => 1])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('rumah_sakit/detail', $data);
        $this->load->view('templates/footer');
    }
}
