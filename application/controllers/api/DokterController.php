<?php
ob_start();

use Restserver\Libraries\REST_Controller;

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';
class DokterController extends REST_Controller
{
    public function nama_get()
    {
        $id = $this->get('id');
        $data = $this->db->query("SELECT nama FROM biodata WHERE user_id = '$id'")->row_array();
        if ($data) {
            return $this->response($data, REST_Controller::HTTP_OK);
        } else {
            return $this->response([
                'message' => "Tidak Ada Data"
            ], REST_Controller::HTTP_NO_CONTENT);
        }
    }

    public function chatbyid_get()
    {
        $id = $this->get('id');
        $data = $this->db->query("SELECT c.*, a.username FROM user a JOIN cluster b JOIN chat c ON a.id = b.id_pengirim AND c.id_cluster = b.id WHERE a.id = '$id'")->result_array();
        if ($data) {
            return $this->response([
                "data" => $data
            ], REST_Controller::HTTP_OK);
        } else {
            return $this->response([
                'message' => "Tidak Ada Data"
            ], REST_Controller::HTTP_NO_CONTENT);
        }
    }
}
