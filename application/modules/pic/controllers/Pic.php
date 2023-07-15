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
        $this->load->view('index');
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
        $issue_id = $this->input->post('issue_id');
        $data = array(
            'detail' => $this->pic_model->getMyIssue($issue_id)
        );
        $this->load->view('issue/modalissuedetail', $data);
    }

    public function trackingIssue()
    {
        $issue_id = $this->input->post('issue_id');
        $comment = $this->pic_model->getComment($issue_id);
        $data = array(
            'issue_id' => $issue_id,
            'comment' => $comment
        );
        $this->load->view('issue/modaltracking', $data);
    }

    public function createComment()
    {
        $post = $this->input->post();
        $params = array(
            'issue_id' => $post['issue_id'],
            'desc' => $post['comment'],
            'created_by' => $this->session->userdata('sd_user_id')
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
            'comment' => $comment
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

    public function detailIssueRequest()
    {
        $issue_id = $this->input->post('issue_id');
        $data = array(
            'detail' => $this->pic_model->getIssueRequestForMe($issue_id)
        );
        $this->load->view('issue/issuerequest/modalissuedetail', $data);
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

        $params = array(
            'issue_id' => $post['issue_id'],
            'desc' => $post['gambar_desc'],
            'image' => $fileName,
            'created_by' => $this->session->userdata('sd_user_id')
        );

        $create = $this->pic_model->createComment($params);

        if ($this->db->affected_rows() > 0) {
            $response = array('success' => true);
        } else {
            $response = array('success' => false);
        }

        echo json_encode($response);
    }
}
