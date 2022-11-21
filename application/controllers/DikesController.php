<?php
class DikesController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('status') != 'logedIn') {
            redirect(base_url("AuthController"));
        }
    }

    public function faskes()
    {
        $data['judul'] = 'Manajemen Akun Dokter';
        $data['controller'] = 'DikesController';
        $data['header'] = 'Rumah Sakit';
        $data['role'] = "dokter";
        $token = $this->session->userdata('token');
        $data['data'] = $this->db->query("SELECT *  FROM user WHERE user.role = 3 AND token = '$token'")->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('dikes/index', $data);
        $this->load->view('templates/footer');
    }
    public function formTambahFaskes()
    {
        $data['judul'] = 'Manajemen Akun Rumah Sakit';
        $data['controller'] = 'RootController';
        $data['header'] = 'Root';
        $data['role'] = "dokter";
        $this->load->view('templates/header', $data);
        $this->load->view('dikes/tambah', $data);
        $this->load->view('templates/footer');
    }

    public function insertDataFaskes()
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
            return redirect(base_url('DikesController/faskes'));
        }
    }

    public function formEdit($id)
    {
        $data['judul'] = 'Manajemen Akun Rumah Sakit';
        $data['controller'] = 'RootController';
        $data['header'] = 'Root';
        $data['data'] = $this->db->get_where('user', ['id' => $id])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('dikes/edit', $data);
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
        $data['controller'] = 'DikesController';
        $data['header'] = 'Root';
        $token = $this->session->userdata('token');
        $data['pasien'] = $this->db->query("SELECT user.id, biodata.nama FROM user JOIN biodata JOIN rekamedis JOIN alamat ON biodata.user_id = user.id AND rekamedis.user_id = user.id AND alamat.user_id = user.id WHERE user.id NOT IN (SELECT id_pengirim FROM cluster) AND role = 4 AND user.token = '$token'")->result_array();
        $data['dokter'] = $this->db->get_where('user', ['role' => 3])->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('dikes/manajemen', $data);
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
        $getDokter = $this->db->get_where('user', ['id' => $id_dokter])->row_array();
        $data = array(
            "id_pengirim" => $id_pasien,
            "id_dokter" => $id_dokter,
            "nama_dokter" => $getDokter['username'],
            "timestamp" => date('Y-m-d H:i:s'),
            "token" => $this->session->userdata('token')
        );
        $insert = $this->db->insert('cluster', $data);
        redirect('DikesController/manajemen');
    }

    public function pasien()
    {
        $data['judul'] = 'Manajemen Akun Dokter';
        $data['controller'] = 'DikesController';
        $data['header'] = 'Rumah Sakit';
        $data['role'] = "pasien";
        $token = $this->session->userdata('token');
        $data['data'] = $this->db->query("SELECT user.*, user.username AS nik, biodata.nama AS username FROM user JOIN biodata ON user.id = biodata.user_id WHERE user.role = 4 AND user.token = '$token'")->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('dikes/index', $data);
        $this->load->view('templates/footer');
    }

    public function formTambahPasien()
    {
        $data['judul'] = 'Manajemen Akun Rumah Sakit';
        $data['controller'] = 'DikesController';
        $data['header'] = 'Root';
        $data['role'] = "perawat";
        $this->load->view('templates/header', $data);
        $this->load->view('dikes/tambah_pasien', $data);
        $this->load->view('templates/footer');
    }

    public function insertPasien()
    {

        $cekNik = $this->db->get_where('user', ['username' => $this->input->post('nik')])->row_array();
        if ($cekNik !== null) {
            $session = array(
                'alert' => "Nik sudah digunakan!"
            );
            $this->session->set_userdata($session);
            redirect('DikesController/pasien');
        }
        $user = array(
            'username' => $this->input->post('nik'),
            'password' => md5($this->input->post('nik')),
            'role' => 4,
            'token' => $this->session->userdata('token')
        );
        $this->db->insert('user', $user);
        $getUser = $this->db->get_where('user', $user)->row_array();

        $alamat = array(
            'alamat' => $this->input->post('alamat'),
            'desa' => $this->input->post('desa'),
            'kecamatan' => $this->input->post('kecamatan'),
            'kabupaten' => $this->input->post('kabupaten'),
            'provinsi' => $this->input->post('provinsi'),
            'user_id' => $getUser['id'],
        );
        $this->db->insert('alamat', $alamat);

        $rekamedis = array(
            'nomor_rekamedis' => '000' . rand(1, 100) . rand(1, 999),
            'penyebab' => $this->input->post('penyebab'),
            'user_id' => $getUser['id'],
        );
        $this->db->insert('rekamedis', $rekamedis);

        $biodata = array(
            'nama' => $this->input->post('nama'),
            'jk' => $this->input->post('jk'),
            'kontak' => $this->input->post('kontak'),
            'status_kawin' => $this->input->post('status_kawin'),
            'tgl_lahir' => $this->input->post('tgl_lahir'),
            'pekerjaan' => $this->input->post('pekerjaan'),
            'user_id' => $getUser['id'],
            'token' => $this->session->userdata('token')
        );
        $this->db->insert('biodata', $biodata);
        $session = array(
            'alert' => "Proses Berhasil!"
        );
        $this->session->set_userdata($session);
        redirect('DikesController/pasien');
    }

    public function detail($id)
    {
        $data['judul'] = 'Detail User';
        $data['controller'] = 'DikesController';
        $data['header'] = 'Rumah Sakit';
        $token = $this->session->userdata('token');
        $data['data'] = $this->db->query("SELECT user.*, user.username AS nik, biodata.* FROM user JOIN biodata ON user.id = biodata.user_id WHERE user.id = '$id' AND user.token = '$token'")->row_array();
        $data['alamat'] = $this->db->get_where("alamat", ['id_alamat' => 1])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('dikes/detail', $data);
        $this->load->view('templates/footer');
    }
}
