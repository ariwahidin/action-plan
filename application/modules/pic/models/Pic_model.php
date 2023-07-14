<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pic_model extends CI_Model
{
    public function getDate()
    {
        $timezone = new DateTimeZone('Asia/Jakarta');
        $date = new DateTime();
        $date->setTimeZone($timezone);
        return $date->format('Y-m-d H:i:s');
    }

    public function generateCodeIssue()
    {
        $prefix = "PK";
        $username = $this->session->userdata('sd_username');
        $timezone = new DateTimeZone('Asia/Jakarta');
        $date = new DateTime();
        $date->setTimeZone($timezone);
        return $prefix . "/" . $username . "/" . $date->format('YmdHis');
    }

    public function getApp()
    {
        $sql = "SELECT * FROM master_config";
        $query = $this->db->query($sql);
        return $query;
    }

    public function getDepartment()
    {
        $sql = "select * from master_department";
        $query = $this->db->query($sql);
        return $query;
    }

    public function get_pic($post)
    {
        $depart_id = $post['depart_id'];
        $sql = "SELECT * FROM userDeptView WHERE department_id = '$depart_id'";
        $query = $this->db->query($sql);
        return $query;
    }

    public function createIssue($params)
    {
        $this->db->insert('sd_issue', $params);
    }

    public function getMyIssue($id = null)
    {
        $user_id = $this->session->userdata('sd_user_id');
        $sql = "select * from issueView where created_by = '$user_id'";
        if (!is_null($id)) {
            $sql .= " and id ='$id'";
        }
        $sql .= " order by created_at desc";
        $query = $this->db->query($sql);
        return $query;
    }

    public function createComment($params)
    {
        $this->db->insert('sd_issue_tracking', $params);
    }

    public function getComment($issue_id)
    {
        $sql = "select * from commentView where issue_id = '$issue_id' order by created_at desc";
        $query = $this->db->query($sql);
        return $query;
    }

    public function getIssueRequest($user_id)
    {
        $sql = "select * from issueView where assign_to_pic = '$user_id'";
        $query = $this->db->query($sql);
        return $query;
    }

    public function getIssueRequestForMe($id = null)
    {
        $user_id = $this->session->userdata('sd_user_id');
        $sql = "select * from issueView where assign_to_pic = '$user_id'";
        if (!is_null($id)) {
            $sql .= " and id ='$id'";
        }
        $sql .= " order by created_at desc";
        $query = $this->db->query($sql);
        return $query;
    }
}
