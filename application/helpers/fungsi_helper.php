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

function int3($s){$pattern = '/([^0-9]+)/';$s = preg_replace($pattern,'',$s); return $s;}
function bintangrating($a){
    $res = "";
    $mentah = explode(".",$a);
    $intx = $mentah[0];
    $floatx = (count($mentah) >= 2) ? $mentah[1] : 0;
    // Check if $intx is not empty
    if (!empty($intx)) {
    
        // Iterate over each character in $intx
        for ($i = 1; $i <= ($intx); $i++) {

            if(($i == ($intx))&&(($floatx > 0))){ $ptx = "<i class='half'></i>"; }
            else{
                $ptx = "<span class='full'></span>";
            }

            $res .= "<i class='bintangx'>".$ptx."</i>";
        }

        // Iterate over each character in $intx
        for ($i = 1; $i <= (5 - $intx); $i++) {
            $res .= "<i class='bintangx'></i>";
        }

        return $res;
    }

}

function getDeptPic($user_id)
{
    $ci = &get_instance();
    $sql = "SELECT department_name FROM userDeptView WHERE id = '$user_id'";
    $query = $ci->db->query($sql);
    return $query->row()->department_name;
}
