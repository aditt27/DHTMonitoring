<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Database_Model extends CI_Model
{
    public function getAllData() {
        $this->setTimezone();
        $query = $this->db->get('monitoring');

        $infos = array();
        foreach ($query->result_array() as $row)
        {
            array_push($infos, $row);
        }
        return $infos;
    }

    public function exportCSV() {
        $this->load->dbutil();
        $this->setTimezone();
        $query = $this->db->get('monitoring');
        return $this->dbutil->csv_from_result($query);
    }

    public function exportCSVDevice($device_id) {
        $this->load->dbutil();
        $this->setTimezone();
        $query = "SELECT monitoring_id, device_id, suhu_data, kelembaban_data, monitoring_date 
                                    FROM monitoring WHERE device_id = ?";
        $result = $this->db->query($query, array($device_id));
        return $this->dbutil->csv_from_result($result);
    }

    public function deleteDevice($device_id) {
        $query = "DELETE FROM monitoring WHERE device_id = ?;";
        $result = $this->db->query($query, array($device_id));
        return $result;
    }

    public function updateData($device_id, $suhu_data, $kelembaban_data) {
        $calibrate_device = $this->getCalibrateDevice($device_id);
        $suhu_data = $suhu_data + $calibrate_device['suhu_kalibrasi'];
        $kelembaban_data = $kelembaban_data + $calibrate_device['kelembaban_kalibrasi'];

        $query = "INSERT INTO monitoring (monitoring_id, device_id, suhu_data, kelembaban_data, monitoring_date) 
                                    VALUES (NULL, UPPER(?), ?, ?, CURRENT_TIMESTAMP)";
        $result = $this->db->query($query, array($device_id, $suhu_data, $kelembaban_data));
        return $result;
    }

    public function getDeviceLatestData($device_id) {
        $this->setTimezone();
        $query = "SELECT monitoring_id, device_id, suhu_data, kelembaban_data, monitoring_date 
                                    FROM monitoring WHERE device_id = ? ORDER BY monitoring_date DESC LIMIT 1";
        $result = $this->db->query($query, array($device_id));
        $infos = array();
        foreach ($result->result_array() as $row)
        {
            $infos = $row;
        }
        return $infos;
    }

    public function getDeviceData($device_id) {
        $this->setTimezone();
        $query = "SELECT monitoring_id, device_id, suhu_data, kelembaban_data, monitoring_date 
                                    FROM monitoring WHERE device_id = ?";
        $result = $this->db->query($query, array($device_id));
        $infos = array();
        foreach ($result->result_array() as $row)
        {
            array_push($infos, $row);
        }
        return $infos;
    }

    public function listAllDevices() {
        $query = "SELECT DISTINCT device_id FROM monitoring";
        $result = $this->db->query($query);

        $infos = array();
        foreach ($result->result_array() as $row)
        {
            array_push($infos, $row['device_id']);
        }
        return $infos;
    }

    public function getDeviceMaxTemp($device_id) {
        $query = "SELECT suhu_data, monitoring_date FROM monitoring WHERE device_id = ? ORDER BY suhu_data DESC LIMIT 1";
        $result = $this->db->query($query, array($device_id));

        $infos= array();
        foreach ($result->result_array() as $row)
        {
            $infos=$row;
        }
        return $infos;
    }

    public function getDeviceMaxHumid($device_id) {
        $query = "SELECT kelembaban_data, monitoring_date FROM monitoring WHERE device_id = ? ORDER BY kelembaban_data DESC LIMIT 1";
        $result = $this->db->query($query, array($device_id));

        $infos= array();
        foreach ($result->result_array() as $row)
        {
            $infos=$row;
        }
        return $infos;
    }

    public function getDeviceMinTemp($device_id) {
        $query = "SELECT suhu_data, monitoring_date FROM monitoring WHERE device_id = ? ORDER BY suhu_data ASC LIMIT 1";
        $result = $this->db->query($query, array($device_id));

        $infos= array();
        foreach ($result->result_array() as $row)
        {
            $infos=$row;
        }
        return $infos;
    }

    public function getDeviceMinHumid($device_id) {
        $query = "SELECT kelembaban_data, monitoring_date FROM monitoring WHERE device_id = ? ORDER BY kelembaban_data ASC LIMIT 1";
        $result = $this->db->query($query, array($device_id));

        $infos= array();
        foreach ($result->result_array() as $row)
        {
            $infos=$row;
        }
        return $infos;
    }

    public function getDeviceAvgHumid($device_id) {
        $query = "SELECT AVG(kelembaban_data) AS 'avg_humid', monitoring_date FROM monitoring WHERE device_id = ?";
        $result = $this->db->query($query, array($device_id));

        $infos= array();
        foreach ($result->result_array() as $row)
        {
            $infos=$row;
        }
        return $infos;
    }

    public function getDeviceAvgTemp($device_id) {
        $query = "SELECT AVG(suhu_data) AS 'avg_temp', monitoring_date FROM monitoring WHERE device_id = ?";
        $result = $this->db->query($query, array($device_id));

        $infos= array();
        foreach ($result->result_array() as $row)
        {
            $infos=$row;
        }
        return $infos;
    }

    public function setTimezone() {
        $query = "SET time_zone = '+07:00'"; //UTC Jakarta
        $result = $this->db->query($query);

    }

    public function calibrateDevice($device_id, $suhu, $kelembaban) {
        $query = "INSERT INTO device (device_id, suhu_kalibrasi, kelembaban_kalibrasi, tanggal_perubahan) 
                        VALUES (?, ?, ?, CURRENT_TIMESTAMP) 
                            ON DUPLICATE KEY UPDATE 
                                    suhu_kalibrasi=VALUES(suhu_kalibrasi),
                                    kelembaban_kalibrasi=VALUES(kelembaban_kalibrasi), 
                                    tanggal_perubahan=VALUES(CURRENT_TIMESTAMP)";
        $result = $this->db->query($query, array($device_id, $suhu, $kelembaban));
        return $result;
    }

    public function getCalibrateDevice($device_id) {
        $query = "SELECT device_id, suhu_kalibrasi, kelembaban_kalibrasi, tanggal_perubahan FROM device WHERE device_id=?";
        $result = $this->db->query($query, array($device_id));

        $infos= array();
        foreach ($result->result_array() as $row)
        {
            $infos=$row;
        }
        if(empty($infos)) {
            $infos['device_id'] = "";
            $infos['suhu_kalibrasi'] = 0;
            $infos['kelembaban_kalibrasi'] = 0;
            $infos['tanggal_perubahan'] = "-";
        }

        return $infos;
    }

    public function getAdmin($username) {
        $query = "SELECT username, password, role FROM admin WHERE username=?";
        $result = $this->db->query($query, array($username));

        $infos= array();
        foreach ($result->result_array() as $row)
        {
            $infos=$row;
        }
        return $infos;
    }

    public function updateAdminLogin($username) {
        $query = "UPDATE admin SET last_login=CURRENT_TIMESTAMP WHERE username=?";
        $result = $this->db->query($query, array($username));
        return $result;
    }

}