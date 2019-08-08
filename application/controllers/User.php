<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Database_Model");
    }

    public function login()
    {
        if(isset($_SESSION['user'])) {
            $getUser = $this->Database_Model->getAdmin($_SESSION['user']);
            if(!empty($getUser)) {
                redirect(site_url());
            } else {
                $this->load->view("admin/login");
            }
        } else {
            $this->load->view("admin/login");
        }

    }

    public function validate()
    {
        $referer = $_SERVER['HTTP_REFERER'];
        $check_ref = site_url('login/');
        $uname = $_POST['username'];
        $pass = $_POST['password'];

        if(isset($referer) && isset($uname) && isset($pass)) {
            if($referer == $check_ref) {
                $getUser = $this->Database_Model->getAdmin($uname);
                if($uname == $getUser['username'] && $pass == $getUser['password']) {
                    $data_session = array(
                        'user' => $uname,
                        'status' => "sudah login",
                        'admin' => $getUser['admin']
                    );
                    $this->session->set_userdata($data_session);
                    $this->Database_Model->updateAdminLogin($uname);
                    redirect(site_url());
                } else {
                    $this->session->set_flashdata('wrong', true);
                    redirect(site_url('login/'));
                }
            } else {
                redirect(site_url('login/'));
            }
        } else {
            redirect(site_url('login/'));
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect(site_url());
    }

    public function chgps() {
        $referer = parse_url($_SERVER['HTTP_REFERER'], PHP_URL_HOST);
        $check_ref = $_SERVER['HTTP_HOST'];
        $passlama = $_POST['passlama'];
        $passbaru = $_POST['passbaru'];
        $session = $_SESSION;

        if(isset($referer) && isset($passlama) && isset($passbaru) && isset($session['user'])) {
            if($referer == $check_ref) {
                $getUser = $this->Database_Model->getAdmin($session['user']);
                if($getUser['username'] == $session['user'] && $getUser['password'] == $passlama) {
                    $getUser = $this->Database_Model->changePassword($session['user'], $passbaru);
                    $this->session->unset_userdata(array('user', 'status'));
                    $this->session->set_flashdata('passupdate', true);
                    redirect(site_url('login/'));
                } else {
                    echo "Username atau password tidak sesuai. Silahkan coba lagi";
                }
            } else {
                redirect(site_url());
            }
        } else {
            redirect(site_url());
        }
    }
}