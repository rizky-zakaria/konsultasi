<?php
class ClassModel extends CI_Model
{
    public function getCount($session)
    {
        // $this->db->where(array('nip' => $session));
        // return $this->db->count_all('tb_jadwal');
        // return $this->db->get('tb_jadwal')->row_array();
        return $this->db->query("SELECT COUNT('id_kelas') AS 'id_kls' FROM `tb_jadwal` WHERE nip = $session ")->row_array();
    }

    public function getClass()
    {
        return $this->db->get('tb_kelas');
    }

    public function insertData()
    {
        $array = array(
            'kelas' => $this->input->post('kelas'),
            'semester' => $this->input->post('semester'),
        );
        $this->db->insert('tb_kelas', $array);
    }

    public function editData()
    {
        $array = array(
            'kelas' => $this->input->post('kelas'),
            'semester' => $this->input->post('semester'),
        );
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('tb_kelas', $array);
    }
}
