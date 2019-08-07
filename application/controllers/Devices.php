<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Devices extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Database_Model");
    }

    function _remap($param) {
        $this->index($param);
    }

    public function index($device_id)
    {
        if(isset($_SESSION['user'])) {
            $getUser = $this->Database_Model->getAdmin($_SESSION['user']);
            if(!empty($getUser)) {
                $device_id = strtoupper($device_id);
                $all_devices = $this->Database_Model->listAllDevices();

                $data = array();
                $data['devices'] = $all_devices;
                
                if($device_id == "ALL") {
                    $all_data = $this->Database_Model->getAllData();
                    $data['monitoring_data'] = $all_data;
                    $this->load->view("admin/all_data", $data);
                }
                else {
                    $match = false;
                    foreach ($all_devices as $device) {
                        if($device_id == $device) {
                            $match = true;
                        }
                    }

                    if($match) {
                        $device_data = $this->Database_Model->getDeviceData($device_id);
                        $latest_data = $this->Database_Model->getDeviceLatestData($device_id);
                        $max_temp = $this->Database_Model->getDeviceMaxTemp($device_id);
                        $max_humid = $this->Database_Model->getDeviceMaxHumid($device_id);
                        $min_temp = $this->Database_Model->getDeviceMinTemp($device_id);
                        $min_humid = $this->Database_Model->getDeviceMinHumid($device_id);
                        $avg_temp = $this->Database_Model->getDeviceAvgTemp($device_id);
                        $avg_humid = $this->Database_Model->getDeviceAvgHumid($device_id);
                        $calibrate_data = $this->Database_Model->getCalibrateDevice($device_id);

                        $data['monitoring_data'] = $device_data;
                        $data['latest_data'] = $latest_data;
                        $data['max_temp'] = $max_temp;
                        $data['max_humid'] = $max_humid;
                        $data['min_temp'] = $min_temp;
                        $data['min_humid'] = $min_humid;
                        $data['avg_temp'] = $avg_temp;
                        $data['avg_humid'] = $avg_humid;
                        $data['calibrate_data'] = $calibrate_data;

                        $this->load->view("admin/devices", $data);
                    } else {
                        show_404();
                    }
                }
            } else {
                redirect(site_url('login/'));
            }
        } else {
            redirect(site_url('login/'));
        }
    }


}