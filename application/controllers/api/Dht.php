<?php

defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
require APPPATH . 'libraries/REST_Controller.php';

class dht extends REST_Controller
{
    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->model("Database_Model");
    }

    // show data dht
    function index_get() {
        $data = null;
        $device_id = $this->get('device_id');
        if ($device_id == '') {
            $data = $this->Database_Model->getAllData();
        } else {
            $data = $this->Database_Model->getDeviceData($device_id);
        }

        $this->response($data, 200);
    }

    // insert new data to database
    function index_post() {
        $device_id = $this->post('device_id');
        $suhu_data = $this->post('suhu_data');
        $kelembaban_data = $this->post('kelembaban_data');

        if($kelembaban_data!="" && $suhu_data!="" && $kelembaban_data!="" && is_numeric($suhu_data) && is_numeric($kelembaban_data)) {
            $insert = $this->Database_Model->updateData($device_id, $suhu_data, $kelembaban_data);
            if ($insert) {
                $this->response(array('status' => 'Update data berhasil'), 200);
            } else {
                $this->response(array('status' => 'Update data gagal'), 400);
            }
        } else {
            $this->response(array('status' => 'Update data gagal'), 406);
        }

    }


}