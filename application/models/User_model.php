<?php

class User_model extends CI_Model
{
    public function getAllUser()
    {
        return $this->db->get('tb_user')->result_array();
    }

    public function checkUser($user, $pass)
    {
        $data = array(
            'username' => $user,
            'password' => md5($pass),
            'role' => 4
        );
        // return $this->db->get_where('user', $data);
        $password = md5($pass);
        return $this->db->query("SELECT user.*, biodata.nama FROM user JOIN biodata ON user.id = biodata.user_id WHERE username = '$user' AND password = '$password' AND role = 4");
    }
}
