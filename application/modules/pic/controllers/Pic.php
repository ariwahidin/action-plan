<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pic extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model(['pic_model']);
    }

    public function index()
    {
        // $this->load->view('index');
        redirect(base_url('dashboard/profile'));
    }

    public function myissue()
    {
        $department = $this->pic_model->getDepartment();
        $myissue = $this->pic_model->getMyIssue();
        $data = array(
            'department' => $department,
            'myissue' => $myissue
        );
        $this->load->view('issue/myissue', $data);
    }

    public function showModalPic()
    {
        $post = $this->input->post();
        $pic = $this->pic_model->get_pic($post);
        $data = array(
            'pic' => $pic
        );
        $this->load->view('issue/modalpic', $data);
    }

    public function createIssue()
    {
        $post = $this->input->post();
        $fileName = $this->session->userdata('sd_username') . date('YmdHis') . ".jpg";

        // var_dump($post);
        if (!empty($post['gambar_kompres']) && $post['gambar_kompres'] != "") {
            $gambarKompres = $post['gambar_kompres'];
            $gambarKompres = str_replace('data:image/jpeg;base64,', '', $gambarKompres);
            $gambarKompres = str_replace(' ', '+', $gambarKompres);
            $decodedData = base64_decode($gambarKompres);
            $fileDestination = 'upload/img/' . $fileName;
            file_put_contents($fileDestination, $decodedData);
        } else {
            $fileName = "noimage.jpg";
        }


        $params = array(
            'code_issue' => $this->pic_model->generateCodeIssue(),
            'subject' => $post['subject'],
            'desc' => $post['desc'],
            'image' => $fileName,
            'status' => 1,
            'assign_to_pic' => $post['input-pic-id'],
            'created_by' => $this->session->userdata('sd_user_id')
        );
        $createIssue = $this->pic_model->createIssue($params);

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil disimpan');
        } else {
            $this->session->set_flashdata('error', 'Gagal simpan data');
        }
        redirect(base_url('issue/myissue'));
    }

    public function detailIssue()
    {
        // die;
        $issue_id = $this->input->post('issue_id');
        $data = array(
            'detail' => $this->pic_model->getMyIssue($issue_id)
        );
        $this->load->view('issue/modalissuedetail', $data);
    }

    public function trackingIssue()
    {
        $issue_id = $this->input->post('issue_id');
        $issue = $this->pic_model->getIssueView($issue_id);
        $comment = $this->pic_model->getComment($issue_id);
        $data = array(
            'issue_id' => $issue_id,
            'issue' => $issue,
            'comment' => $comment
        );
        $this->load->view('issue/modaltracking', $data);
    }

    public function createComment()
    {
        $post = $this->input->post();
        $issue_id = $post['issue_id'];
        $user_id = $this->session->userdata('sd_user_id');
        $send_to = $this->pic_model->getIssueView($issue_id)->row()->created_by;

        if ($user_id == $send_to) {
            //jika yang comment yang bikin issue, comment akan ditujukan kepada si pic nya
            $send_to = $this->pic_model->getIssueView($issue_id)->row()->assign_to_pic;
        } else {
            //jika yang comment bukan yang bikin issue, comment akan ditujukan ke si pembuat issue
            $send_to;
        }

        $params = array(
            'issue_id' => $issue_id,
            'desc' => $post['comment'],
            'send_to' => $send_to,
            'created_by' => $this->session->userdata('sd_user_id'),
            'is_read' => 'n'
        );

        $create = $this->pic_model->createComment($params);

        if ($this->db->affected_rows() > 0) {
            $response = array('success' => true);
        } else {
            $response = array('success' => false);
        }
        echo json_encode($response);
    }

    public function loadComment()
    {
        $issue_id = $this->input->post('issue_id');
        $comment = $this->pic_model->getComment($issue_id);
        $data = array(
            'comment' => $comment,
        );
        $this->load->view('issue/boxcomment', $data);
    }

    public function loadIssueRequest()
    {
        $user_id = $this->session->userdata('sd_user_id');
        $issueRequest = $this->pic_model->getIssueRequest($user_id);
        $department = $this->pic_model->getDepartment();
        $data = array(
            'issuerequest' => $issueRequest,
            'department' => $department,
        );
        $this->load->view('issue/issuerequest/issuerequest', $data);
    }

    public function loadCloseIssue($issue_id = null)
    {
        $department = $this->pic_model->getDepartment();

        if (is_null($issue_id)) {
            $issuerequest = $this->pic_model->getClosedIssue();
        } else {
            $issuerequest = $this->pic_model->getClosedIssue($issue_id);
        }

        $data = array(
            'issuerequest' => $issuerequest,
            'department' => $department
        );
        $this->load->view('issue/closedissue/issuerequest', $data);
    }

    public function detailIssueRequest()
    {
        $issue_id = $this->input->post('issue_id');
        // $update_issue_is_read = $this->pic_model->updateIssueIsRead($issue_id);
        $data = array(
            'detail' => $this->pic_model->getIssueRequestForMe($issue_id)
        );
        $this->load->view('issue/issuerequest/modalissuedetail', $data);
    }

    public function detailCloseIssue()
    {
        $issue_id = $this->input->post('issue_id');
        $data = array(
            'detail' => $this->pic_model->getDetailClosedIssue($issue_id)
        );
        $this->load->view('issue/closedissue/modalissuedetail', $data);
    }

    public function loadModalCommentImage()
    {
        $post = $this->input->post();
        $data = array(
            'issue_id' => $post['issue_id']
        );
        $this->load->view('issue/issuerequest/modalcommentimage', $data);
    }

    public function createCommentImage()
    {
        $post = $this->input->post();
        $fileName = "COMIMG" . $this->session->userdata('sd_username') . date('YmdHis') . ".jpg";
        // var_dump($post);
        if (!empty($post['gambar_kompres']) && $post['gambar_kompres'] != "") {
            $gambarKompres = $post['gambar_kompres'];
            $gambarKompres = str_replace('data:image/jpeg;base64,', '', $gambarKompres);
            $gambarKompres = str_replace(' ', '+', $gambarKompres);
            $decodedData = base64_decode($gambarKompres);
            $fileDestination = 'upload/commentimg/' . $fileName;
            file_put_contents($fileDestination, $decodedData);
        }

        $issue_id = $post['issue_id'];
        $user_id = $this->session->userdata('sd_user_id');
        $send_to = $this->pic_model->getIssueView($issue_id)->row()->created_by;

        if ($user_id == $send_to) {
            //jika yang comment yang bikin issue, comment akan ditujukan kepada si pic nya
            $send_to = $this->pic_model->getIssueView($issue_id)->row()->assign_to_pic;
        } else {
            //jika yang comment bukan yang bikin issue, comment akan ditujukan ke si pembuat issue
            $send_to;
        }

        $params = array(
            'issue_id' => $post['issue_id'],
            'desc' => $post['gambar_desc'],
            'image' => $fileName,
            'created_by' => $this->session->userdata('sd_user_id'),
            'send_to' => $send_to,
            'is_read' => 'n'
        );

        $create = $this->pic_model->createComment($params);

        if ($this->db->affected_rows() > 0) {
            $response = array('success' => true);
        } else {
            $response = array('success' => false);
        }

        echo json_encode($response);
    }

    public function closeIssue()
    {
        $post = $this->input->post();
        $this->pic_model->closeIssue($post);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'issue has been completed');
        } else {
            $this->session->set_flashdata('error', 'failed');
        }
        redirect(base_url('issue/myissue'));
    }

    public function loadProfile()
    {
        $myissue = $this->pic_model->getMyIssue()->num_rows();
        $issuerequest = $issueRequest = $this->pic_model->getIssueRequest($this->session->userdata('sd_user_id'))->num_rows();
        $closedissue = $this->pic_model->getClosedIssue()->num_rows();
        $data = array(
            'profile' => $this->pic_model->getUserDeptView(),
            'myissue' => $myissue,
            'issuerequest' => $issuerequest,
            'closedissue' => $closedissue
        );
        $this->load->view('settings/profile/profile', $data);
    }

    public function gantiFotoProfile()
    {
        $post = $this->input->post();
        $fileName = "PP" . $this->session->userdata('sd_username') . date('YmdHis') . ".jpg";
        // var_dump($post);
        if (!empty($post['gambar_kompres']) && $post['gambar_kompres'] != "") {
            $gambarKompres = $post['gambar_kompres'];
            $gambarKompres = str_replace('data:image/jpeg;base64,', '', $gambarKompres);
            $gambarKompres = str_replace(' ', '+', $gambarKompres);
            $decodedData = base64_decode($gambarKompres);
            $fileDestination = 'upload/fotoprofil/' . $fileName;
            file_put_contents($fileDestination, $decodedData);
        }

        $params = array(
            'image' => $fileName,
            'updated_by' => $this->session->userdata('sd_user_id'),
            'updated_at' => $this->pic_model->getDate()
        );

        $this->pic_model->gantiFotoProfile($params);

        if ($this->db->affected_rows() > 0) {
            $this->session->set_userdata('sd_image', $fileName);
            $response = array('success' => true);
        } else {
            $response = array('success' => false);
        }

        echo json_encode($response);
    }

    public function gantiPassword()
    {
        $post = $this->input->post();
        $this->pic_model->gantiPassword($post);
        if ($this->db->affected_rows() > 0) {
            $response = array('success' => true);
        } else {
            $response = array('success' => false);
        }
        echo json_encode($response);
    }

    public function loadIssueRequestOurTeam()
    {
        $issue = $this->pic_model->getIssueRequestOurTeam();
        $data = array(
            'issue' => $issue
        );
        $this->load->view('team/issuerequest/issuerequest', $data);
    }

    public function loadClosedIssueOurTeam()
    {
        $issue = $this->pic_model->getClosedIssueOurTeam();
        $data = array(
            'issue' => $issue
        );
        $this->load->view('team/closedissue/issuerequest', $data);
    }

    public function teamDetailIssueRequest()
    {
        $issue_id = $this->input->post('issue_id');
        $data = array(
            'detail' => $this->pic_model->teamDetailIssueRequest($issue_id)
        );
        $this->load->view('team/issuerequest/modalissuedetail', $data);
    }

    public function teamTrackingIssue()
    {
        $issue_id = $this->input->post('issue_id');
        // $issue = $this->pic_model->getIssueView($issue_id);
        $comment = $this->pic_model->getComment($issue_id);
        $data = array(
            'issue_id' => $issue_id,
            // 'issue' => $issue,
            'comment' => $comment
        );
        $this->load->view('team/issuerequest/modaltrackingissue', $data);
    }

    public function loadTeamDashboard()
    {
        $team = $this->pic_model->getDashboardTeam();
        $data = array(
            'team' => $team
        );
        $this->load->view('team/dashboard', $data);
    }

    public function loadResponseIssue($issue_id)
    {
        $data = array(
            'detail' => $this->pic_model->getIssueRequestForMe($issue_id)
        );
        $this->load->view('issue/issuerequest/detailissuepage', $data);
    }

    public function loadIssueForMyTeam($issue_id)
    {
        $data = array(
            'detail' => $this->pic_model->getIssueMyTeam($issue_id)
        );
        $this->load->view('issue/issuerequest/detailissuepage', $data);
    }

    public function loadResponseMyIssue($issue_id)
    {
        $data = array(
            'detail' => $this->pic_model->getMyIssue($issue_id)
        );
        $this->load->view('issue/issuerequest/detailissuepage', $data);
    }

    public function loadBoxComment($issue_id)
    {
        $comment = $this->pic_model->getComment($issue_id);
        $data = array(
            'comment' => $comment
        );
        $this->load->view('issue/issuerequest/comment/boxcomment', $data);
    }

    public function sendComment()
    {
        $post = $this->input->post();
        var_dump($post);
    }

    public function updateIsReadComment()
    {
        $issue_id = $this->input->post('issue_id');
        $user_id = $this->session->userdata('sd_user_id');
        $send_to = $this->pic_model->getCommentSendToMe($issue_id)->row()->send_to;

        if ($user_id == $send_to) {
            $this->pic_model->updateIsReadComment($issue_id);
        }

        if ($this->db->affected_rows() > 0) {
            $response = array('success' => true);
        } else {
            $response = array('success' => false);
        }

        echo json_encode($response);
    }

    public function loadIssueOpen($issue_id)
    {

        $issue = $this->pic_model->getIssueOpen($issue_id);
        // var_dump($issue->result());
        // die;
        $data = array(
            'issue' => $issue
        );
        $this->load->view('team/issuerequest/issuerequest', $data);
    }

    public function cancelIssue($issue_id)
    {
        // var_dump($issue_id);
        $this->pic_model->cancelIssue($issue_id);

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Issue berhasil dicancel');
        } else {
            $this->session->set_flashdata('error', 'Gagal cancel issue');
        }
        redirect(base_url('issue/myissue'));
    }
}
