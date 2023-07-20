<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{
    public function getDate()
    {
        $timezone = new DateTimeZone('Asia/Jakarta');
        $date = new DateTime();
        $date->setTimeZone($timezone);
        return $date->format('Y-m-d H:i:s');
    }

    public function getUser($user_id = null)
    {
        $sql = "select * from userDeptView";
        if ($user_id != null) {
            $sql .= " where id ='$user_id'";
        }
        $sql .= " order by level_name desc";
        $query = $this->db->query($sql);
        return $query;
    }

    public function getLevel()
    {
        $sql = "SELECT * FROM master_level";
        $query = $this->db->query($sql);
        return $query;
    }

    public function getRole()
    {
        $sql = "SELECT * FROM master_role";
        $query = $this->db->query($sql);
        return $query;
    }

    public function editAccessUser($post)
    {
        $data = array(
            'role_id' => $post['role'],
            'level_id' => $post['level'],
            'updated_by' => $this->session->userdata('sd_user_id'),
            'updated_at' => $this->getDate()
        );

        $this->db->where('id', $post['user_id']);
        $this->db->update('master_users', $data);
    }
}
