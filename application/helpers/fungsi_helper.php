<?php

function check_already_login()
{
    $ci = &get_instance();
    $session = $ci->session->userdata();
    if (!empty($session['sd_username'])) {
        redirect(base_url('/' . $session['sd_role']));
    }
}

function check_not_login()
{
    $ci = &get_instance();
    $session = $ci->session->userdata('sd_username');
    if (!$session) {
        redirect('auth');
    }
}

function getDeptPic($user_id)
{
    $ci = &get_instance();
    $sql = "SELECT department_name FROM userDeptView WHERE id = '$user_id'";
    $query = $ci->db->query($sql);
    return $query->row()->department_name;
}
