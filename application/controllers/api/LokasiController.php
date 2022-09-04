<?php

use Restserver\Libraries\REST_Controller;

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';
class LokasiController extends REST_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index_post()
    {
        $insert = array(
            'user_id' => $this->post('user_id'),
            'log' => 'Berhasil Masuk',
            'provinsi' => $this->post('provinsi'),
            'kabupaten' => $this->post('kabupaten'),
            'kecamatan' => $this->post('kecamatan'),
            'desa' => $this->post('desa'),
            'waktu' => date('H:i:s'),
            'tanggal' => date('d-m-Y'),
            'token' => $this->post('token')
        );
        $data = $this->db->insert('log_login', $insert);
        if ($data) {
            return
                $this->response([
                    'status' => TRUE,
                    'message' => 'Successfuly',
                ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status' => FALSE,
                'message' => 'No chats were found'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }
}
