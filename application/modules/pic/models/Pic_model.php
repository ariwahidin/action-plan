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
        $sql = "SELECT * FROM userDeptView WHERE division_name is not null and department_id = '$depart_id'";
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
        $sql = "select * from MyIssueView where created_by = '$user_id' and status_name not in ('close','cancel')";
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
        $user_id = $this->session->userdata('sd_user_id');
        $sql = "select t1.*,
            (select count(id) from commentView where id = t1.id and is_read = 'n' and created_by != '$user_id' ) as new_action
            from commentView t1 where
            issue_id = '$issue_id' order by created_at asc";
        $query = $this->db->query($sql);
        return $query;
    }

    public function getCommentSendToMe($issue_id)
    {
        $user_id = $this->session->userdata('sd_user_id');
        $sql = "select * from commentView where issue_id = '$issue_id' and is_read = 'n' and send_to = '$user_id'";
        $query = $this->db->query($sql);
        return $query;
    }

    public function getIssueRequest($user_id)
    {
        $sql = "select * from issueView where assign_to_pic = '$user_id' and status_name not in ('close', 'cancel')";
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
            'bintang' => $post['bintang'],
            'closed_note' => $post['note'],
            'closed_at' => $this->getDate(),
            'closed_by' => $this->session->userdata('sd_user_id')
        );
        $this->db->where('id', $post['issue_id']);
        $this->db->update('sd_issue', $data);
    }

    public function getClosedIssue($user_id = null)
    {
        if (is_null($user_id)) {
            $user_id = $this->session->userdata('sd_user_id');
        }

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
        $sql = "select * from issueView where assign_to_depart_id = '$depart_id' and status_name not in ('close','cancel')";
        $query = $this->db->query($sql);
        // var_dump($query->result());
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

    public function getDashboardTeam()
    {
        $depart_id = $this->session->userdata('sd_department');
        $sql = "select t1.id, t1.fullname, t1.username, t1.department_id, t1.department_name, t1.job_position,
        (select count(id) from issueView where assign_to_pic = t1.id and status_name = 'open') as count_request_issue,
        (select count(id) from issueView where assign_to_pic = t1.id and status_name = 'close') as count_closed_issue,
        (select count(id) from issueView where created_by = t1.id and status_name = 'open') as count_users_open_issue,
        t2.image as user_image
        from userDeptView t1
        left join master_users t2 on t1.id = t2.id
        where t1.job_position is not null and t1.department_id = '$depart_id'";
        $query = $this->db->query($sql);
        return $query;
    }

    public function updateIsReadComment($issue_id)
    {
        $user_id = $this->session->userdata('sd_user_id');
        $data = array(
            'is_read' => 'y',
            'read_at' => $this->getDate(),
            'read_by' => $user_id
        );

        $where = array(
            'issue_id' => $issue_id,
            'is_read' => 'n',
            'created_by !=' => $user_id
        );
        $this->db->where($where);
        $this->db->update('sd_issue_tracking', $data);
    }

    public function getIssueMyTeam($issue_id = null)
    {
        $sql = "select * from issueView";
        if ($issue_id != null) {
            $sql .= " where id = '$issue_id'";
        }
        $query = $this->db->query($sql);
        return $query;
    }
    public function getIssueOpen($user_id = null)
    {
        $sql = "select * from issueView where status_name = 'open'";
        if ($user_id != null) {
            $sql .= " and assign_to_pic = '$user_id'";
        }
        $query = $this->db->query($sql);
        // var_dump($this->db->last_query());
        return $query;
    }

    public function cancelIssue($issue_id)
    {
        $data = array(
            'status' => 4,
            'cancel_at' => $this->getDate(),
            'cancel_by' => $this->session->userdata('sd_user_id')
        );
        $where = array(
            'id' => $issue_id
        );

        $this->db->where($where);
        $this->db->update('sd_issue', $data);
    }
}
