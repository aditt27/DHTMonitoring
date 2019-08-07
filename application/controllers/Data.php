<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Database_Model");
        $this->load->helper('download');

    }

    public function download($param = null) {
        if($param != null && isset($_SERVER['HTTP_REFERER']) && isset($_SESSION['user'])) {
            $referer = $_SERVER['HTTP_REFERER'];
            $check_ref = site_url('devices/') . $param;
            if($referer == $check_ref) {
                if($param=='all') {
                    $file = $this->Database_Model->exportCSV();
                    force_download("DHT.csv", $file);
                } else {
                    $file = $this->Database_Model->exportCSVDevice($param);
                    force_download($param.".csv",$file);
                }
            } else {
                show_404();
            }
        } else {
            show_404();
        }
    }

    public function delete($param = null) {
        if($param != null && isset($_SERVER['HTTP_REFERER']) && isset($_SESSION['user'])) {
            $referer = $_SERVER['HTTP_REFERER'];
            $check_ref = site_url('devices/') . $param;
            if($referer == $check_ref) {
                $this->Database_Model->deleteDevice($param);
                //$this->Database_Model->removeCalibrateDevice($param);
                redirect(site_url());
            } else {
                show_404();
            }
        } else {
            show_404();
        }
    }

    public function calibrate($param = null) {
        if($param != null && isset($_SERVER['HTTP_REFERER']) && isset($_SESSION['user'])) {
            $referer = $_SERVER['HTTP_REFERER'];
            $check_ref = site_url('devices/') . $param;
            if($referer == $check_ref) {
                $suhu = $_POST['suhu'];
                $kelembaban = $_POST['kelembaban'];
                $this->Database_Model->calibrateDevice($param, $suhu, $kelembaban);
                redirect(site_url('devices/') . $param);
            } else {
                show_404();
            }
        } else {
            show_404();
        }
    }
}