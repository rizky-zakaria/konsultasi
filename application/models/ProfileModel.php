<?php
class ProfileModel extends CI_Model
{
    public function getDataProfile($session)
    {
        $this->db->select('*');
        $this->db->from('tb_pengampuh');
        $this->db->join('tb_dosen', 'tb_dosen.nip = tb_pengampuh.nip');
        $this->db->join('tb_matakuliah', 'tb_matakuliah.id = tb_pengampuh.id_matakuliah');
        $this->db->where(array('tb_pengampuh.nip' => $session));
        return $this->db->get()->row_array();
    }
}
