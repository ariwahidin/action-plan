<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model(['auth_model']);
    }

    public function index()
    {
        check_already_login();
        $this->load->view('index_v');
    }

    public function prosesLogin()
    {
        $post = $this->input->post();
        $response = array();
        $login = $this->auth_model->getUser($post);
        if ($login->num_rows() > 0) {
            if (is_null($login->row()->role_id) || is_null($login->row()->level_id)) {
                $response = array(
                    'success' => false,
                    'message' => "User belum terdaftar"
                );
            } else {
                $session = array(
                    'sd_user_id' => $login->row()->id,
                    'sd_wa' => $login->row()->whatsapp,
                    'sd_email' => $login->row()->email,
                    'sd_fullname' => $login->row()->fullname,
                    'sd_username' => $login->row()->username,
                    'sd_image' => $login->row()->image,
                    'sd_role' => $this->auth_model->getRole($login->row()->role_id),
                    'sd_department' => $login->row()->department_id,
                    'sd_level' => $this->auth_model->getLevel($login->row()->level_id),
                );
                $this->session->set_userdata($session);
                $response = array(
                    'success' => true,
                    'message' => "Login success"
                );
            }
        } else {
            $response = array(
                'success' => false,
                'message' => "Username/password salah"
            );
        }
        echo json_encode($response);
    }

    public function loginSuccess()
    {
        redirect(base_url());
    }

    public function logout()
    {
        // var_dump($this->session->userdata());
        $session = array(
            'sd_user_id',
            'sd_fullname',
            'sd_username',
            'sd_image',
            'sd_role',
            'sd_department',
            'sd_level',
        );
        $this->session->unset_userdata($session);
        redirect('auth');
    }
}
