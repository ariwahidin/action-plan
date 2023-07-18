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

    public function getIssueView($issue_id = null)
    {
        $user_id = $this->session->userdata('sd_user_id');
        $sql = "select * from issueView";
        if (!is_null($issue_id)) {
            $sql .= " where id ='$issue_id'";
        }
        $query = $this->db->query($sql);
        return $query;
    }

    public function getMyIssue($id = null)
    {
        $user_id = $this->session->userdata('sd_user_id');
        $sql = "select * from issueView where created_by = '$user_id' and status_name != 'close'";
        if (!is_null($id)) {
            $sql .= " and id ='$id'";
        }
        $sql .= " order by created_at desc";
        $query = $this->db->query($sql);
        return $query;
    }

    public function getDetailClosedIssue($id = null)
    {
        $sql = "select * from issueView where status_name = 'close'";
        if (!is_null($id)) {
            $sql .= " and id ='$id'";
        }
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
        $sql = "select * from issueView where assign_to_pic = '$user_id' and status_name != 'close'";
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

    public function updateIssueIsRead($issue_id)
    {
        $data = array(
            'is_read' => 'y',
            'last_read' => $this->getDate(),
        );

        $this->db->where('id', $issue_id);
        $this->db->update('sd_issue', $data);
    }

    public function closeIssue($post)
    {
        $data = array(
            'status' => 2,
            'closed_note' => $post['note'],
            'closed_at' => $this->getDate(),
            'closed_by' => $this->session->userdata('sd_user_id')
        );
        $this->db->where('id', $post['issue_id']);
        $this->db->update('sd_issue', $data);
    }

    public function getClosedIssue()
    {
        $user_id = $this->session->userdata('sd_user_id');
        $sql = "select * from(
            select * from issueView where status_name = 'close'
            )ss
            where ss.assign_to_pic = '$user_id' or closed_by = '$user_id'";
        $query = $this->db->query($sql);
        return $query;
    }

    public function gantiFotoProfile($params)
    {
        $user_id = $this->session->userdata('sd_user_id');
        $this->db->where('id', $user_id);
        $this->db->update('master_users', $params);
    }

    public function getUserDeptView()
    {
        $user_id = $this->session->userdata('sd_user_id');
        $sql = "select * from userDeptView where id = '$user_id'";
        $query = $this->db->query($sql);
        return $query;
    }

    public function gantiPassword($post)
    {
        $user_id = $this->session->userdata('sd_user_id');
        $data = array(
            'password' => $post['password'],
            'updated_by' => $user_id,
            'updated_at' => $this->getDate()
        );
        $this->db->where('id', $user_id);
        $this->db->update('master_users', $data);
    }

    public function getIssueRequestOurTeam()
    {
        $depart_id = $this->session->userdata('sd_department');
        $sql = "select * from issueView where assign_to_depart_id = '$depart_id' and status_name != 'close'";
        $query = $this->db->query($sql);
        return $query;
    }

    public function getClosedIssueOurTeam()
    {
        $depart_id = $this->session->userdata('sd_department');
        $sql = "select * from issueView where assign_to_depart_id = '$depart_id' and status_name = 'close'";
        $query = $this->db->query($sql);
        return $query;
    }

    public function teamDetailIssueRequest($issue_id)
    {
        $sql = "select * from issueView where id = '$issue_id'";
        $query = $this->db->query($sql);
        return $query;
    }
}
