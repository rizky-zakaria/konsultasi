<?php
class DosenModel extends CI_Model
{
    public function getAllDosen()
    {
        return $this->db->get('tb_dosen')->result_array();
    }

    public function insertData()
    {
        $array = array(
            'nip' => $this->input->post('nip'),
            'nama' => $this->input->post('nama'),
            'alamat' => $this->input->post('alamat'),
            'jabatan' => $this->input->post('jabatan')
        );
        $this->db->insert('tb_dosen', $array);
    }
}
