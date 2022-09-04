<?php

use Restserver\Libraries\REST_Controller;

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';
class ChatController extends REST_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index_post()
    {
        $id = $this->post('id');
        $data = $this->db->get_where('chat', ['id_cluster' => $id])->result_array();
        if ($data) {
            return
                $this->response([
                    'status' => TRUE,
                    'message' => 'Successfuly',
                    'data' => $data
                ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status' => FALSE,
                'message' => 'No chats were found'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function chat_post()
    {
        $id = $this->post('id');
        $pengirim = $this->post('pengirim');
        $pesan = $this->post('pesan');
        $token = $this->post('token');
        $data = array(
            'id_cluster' => $id,
            'pengirim' => $pengirim,
            'pesan' => $pesan,
            'waktu' => date('H:i:s'),
            'tanggal' => date('d-m-Y'),
            'desa' => "",
            'kecamatan' => "",
            'kabupaten' => "",
            'token' => $token
        );
        $insert = $this->db->insert($data);
        if ($insert) {
            return
                $this->response([
                    'status' => TRUE,
                    'message' => 'Successfuly'
                ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status' => FALSE,
                'message' => 'No chats were found'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function lokasi_post()
    {
        $data = array(
            'user_id' => $this->post('id'),
            'log' => "Berhasil Masuk",
            'provinsi' => $this->post('provinsi'),
            'kabupaten' => $this->post('kabupaten'),
            'kecamatan' => $this->post('kecamatan'),
            'desa' => $this->post('desa'),
            'waktu' => date('H:i:s'),
            'tanggal' => date('d-m-Y')

        );
        $data = $this->db->insert('log_login', $data);
        if ($data) {
            return
                $this->response([
                    'status' => TRUE,
                    'message' => 'Successfuly'
                ], REST_Controller::HTTP_OK);
        } else {
            return
                $this->response([
                    'status' => FALSE,
                    'message' => 'Wrong Action'
                ], REST_Controller::HTTP_NO_CONTENT);
        }
    }

    // public function chat_post()
    // {
    //     $id = $this->input->post('id');
    //     $chat = $this->input->post('chat');
    //     $getCluster = $this->db->query("SELECT id FROM cluster WHERE id_pengirim = $id")->row_array();
    //     $getRole = $this->db->query("SELECT r.roles FROM user u JOIN role r  ON u.role = r.id WHERE u.id = $id")->row_array();
    //     $data = array(
    //         'id_cluster' => $getCluster['id'],
    //         'pengirim' => $getRole['roles'],
    //         'pesan' => $chat,
    //         'waktu' => date('H:i:d'),
    //         'tanggal' => date('d-m-Y'),
    //         'desa' => "",
    //         'kecamatan' => "",
    //         'kabupaten' => "",
    //         'token' => $this->session->userdata('token')
    //     );

    //     $insert = $this->db->insert('chat', $data);
    //     if ($insert) {
    //         $session = array(
    //             'alert' => "Berhasil mengirim pesan!"
    //         );
    //         $this->session->set_userdata($session);
    //         redirect(base_url('DokterController/konsultasi'));
    //     } else {
    //         $session = array(
    //             'alert' => "Gagal mengirim pesan!"
    //         );
    //         $this->session->set_userdata($session);
    //         redirect(base_url('DokterController/konsultasi'));
    //     }
    // }
}
