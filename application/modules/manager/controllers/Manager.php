<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Manager extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        check_not_login();
        // $this->load->model(['admin_model']);
    }

    public function index()
    {
        $this->load->view('index');
    }
}
