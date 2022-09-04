<?php
class MahasiswaModel extends CI_Model
{
    public function getAllMahasiswa()
    {
        return $this->db->query("SELECT * FROM tb_mahasiswa JOIN tb_kelas ON tb_mahasiswa.id_kelas = tb_kelas.id")->result_array();
    }

    public function tambah()
    {
        $post = $this->input->post();
        $this->nim = $post["nim"];
        $this->nama = $post["nama"];
        $this->alamat = $post["alamat"];
        $this->id_kelas = $post["kelas"];
        $this->foto = $this->_uploadImage();
        $this->db->insert('tb_mahasiswa', $this);
    }

    private function _uploadImage()
    {
        $config['upload_path']          = './assets/upload';
        $config['allowed_types']        = 'jpg|png|jpeg|docx|pdf';
        $config['file_name']            = $this->input->post('nim');
        $config['overwrite']            = true;
        $config['max_size']             = 8000;
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->upload->initialize($config);

        if ($this->upload->do_upload('file')) {
            return $this->upload->data("file_name");
        }
        return "default.jpg";

        // print_r($this->upload->display_errors());
    }
}
