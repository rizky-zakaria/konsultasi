<?php
class MatakuliahModel extends CI_Model
{
    public function getProfileMatakuliah()
    {
        $this->db->select('*');
        $this->db->from('tb_pengampuh');
        $this->db->join('tb_matakuliah', 'tb_matakuliah.id = tb_pengampuh.id_matakuliah');
        return $this->db->get()->result_array();
    }

    public function getCount($session)
    {
        // $this->db->where(array('nip' => $session));
        // return $this->db->count_all('tb_pengampuh');
        // return $this->db->get('tb_pengampuh')->row_array();
        return $this->db->query("SELECT COUNT('id_matakuliah') AS 'id_mk' FROM `tb_pengampuh` WHERE nip = $session ")->row_array();
    }

    public function getAllCourses()
    {
        return $this->db->get('tb_matakuliah')->result_array();
    }

    public function insertData()
    {
        $array = array(
            'matakuliah' => $this->input->post('mata_kuliah'),
            'sks' => $this->input->post('sks')
        );
        $this->db->insert('tb_matakuliah', $array);
    }

    public function editData()
    {
        $array = array(
            'matakuliah' => $this->input->post('mata_kuliah'),
            'sks' => $this->input->post('sks')
        );
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('tb_matakuliah', $array);
    }
}
