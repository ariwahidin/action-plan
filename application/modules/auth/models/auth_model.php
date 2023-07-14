<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends CI_Model
{

    public function getUser($post)
    {
        $username = $post['username'];
        $password = $post['password'];
        $sql = "SELECT * FROM master_users WHERE username = '$username' AND [password] = '$password'";
        $query = $this->db->query($sql);
        return $query;
    }

    public function getRole($role_id)
    {
        $sql = "SELECT role_name FROM master_role WHERE id = '$role_id'";
        $query = $this->db->query($sql);
        return $query->row()->role_name;
    }
}
