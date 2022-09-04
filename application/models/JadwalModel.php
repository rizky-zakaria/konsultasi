<?php
class JadwalModel extends CI_Model
{
    public function getJadwal()
    {
        return $this->db->query("SELECT tb_jadwal.*, tb_matakuliah.matakuliah, tb_dosen.nama, tb_kelas.kelas, tb_kelas.semester FROM `tb_jadwal` JOIN tb_kelas JOIN tb_matakuliah JOIN tb_dosen ON tb_jadwal.id_matakuliah = tb_matakuliah.id AND tb_jadwal.nip = tb_dosen.nip AND tb_jadwal.id_kelas = tb_kelas.id ")->result_array();
    }

    public function insertJadwal()
    {
        $post = $this->input->post();
        $this->hari = $post['hari'];
        $this->jam_masuk = $post['jam_masuk'];
        $this->jam_keluar = $post['jam_keluar'];
        $this->id_matakuliah = $post['id_matakuliah'];
        $this->id_kelas = $post['id_kelas'];
        $this->nip = $post['nip'];

        $this->db->insert('tb_jadwal', $this);
    }

    public function getJadwalById($id)
    {
        $this->db->query("SELECT * FROM tb_jadwal WHERE id = '$id'")->row_array();
    }

    public function editJadwal()
    {
        $post = $this->input->post();
        $this->hari = $post['hari'];
        $this->jam_masuk = $post['jam_masuk'];
        $this->jam_keluar = $post['jam_keluar'];
        $this->id_matakuliah = $post['id_matakuliah'];
        $this->id_kelas = $post['id_kelas'];
        $this->nip = $post['nip'];
        $id = $post['id'];

        $this->db->where('id', $id);
        $this->db->update('tb_jadwal', $this);
    }

    public function getJadwalByNip($nip)
    {
        return $this->db->query("SELECT tb_jadwal.*, tb_matakuliah.matakuliah, tb_dosen.nama, tb_kelas.kelas, tb_kelas.semester FROM `tb_jadwal` JOIN tb_kelas JOIN tb_matakuliah JOIN tb_dosen ON tb_jadwal.id_matakuliah = tb_matakuliah.id AND tb_jadwal.nip = tb_dosen.nip AND tb_jadwal.id_kelas = tb_kelas.id WHERE tb_jadwal.nip = '$nip'")->result_array();
    }

    public function getJadwalByNip1()
    {
        $data = $this->db->query("SELECT tb_jadwal.*, tb_matakuliah.matakuliah, tb_dosen.nama, tb_kelas.kelas, tb_kelas.semester, tb_user.username FROM `tb_jadwal` JOIN tb_kelas JOIN tb_matakuliah JOIN tb_dosen JOIN tb_user ON tb_jadwal.id_matakuliah = tb_matakuliah.id AND tb_jadwal.nip = tb_dosen.nip AND tb_jadwal.id_kelas = tb_kelas.id AND tb_dosen.nip = tb_user.nip WHERE tb_jadwal.nip = '$nip'")->result_array();
    }
}
