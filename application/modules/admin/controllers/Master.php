<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Master extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model(['admin_model']);
    }

    public function User()
    {
        $user = $this->admin_model->getUser();
        $data = array(
            'user' => $user
        );
        $this->load->view('master/masterusers', $data);
    }

    public function showModalEdit()
    {
        $user = $this->admin_model->getUser($this->input->post('user_id'));
        $level = $this->admin_model->getLevel();
        $role = $this->admin_model->getRole();
        $data = array(
            'usr' => $user,
            'level' => $level,
            'role' => $role,
        );
        $this->load->view('master/modal-edit', $data);
    }

    public function editAccessUser()
    {
        $post = $this->input->post();
        $this->admin_model->editAccessUser($post);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil diedit');
        } else {
            $this->session->set_flashdata('error', 'Gagal edit data');
        }
        redirect(base_url('admin/master/users'));
    }
}
