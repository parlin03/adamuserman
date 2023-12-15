<?php

function is_logged_in()
{
    $ci = get_instance();
    if (!$ci->session->userdata('user_id')) {
        redirect('auth');
    } else {
        $role_id = $ci->session->userdata('role_id');
        $uri = $ci->uri->segment(1);
        // if ($ci->uri->segment(2)) {
        //     if ($ci->uri->segment(2) == 'roleaccess') {
        //         $uri = $ci->uri->segment(1);
        //     } else {
        //         $uri = $ci->uri->segment(1) . '/' . $ci->uri->segment(2);
        //     }
        // } else {
        //     $uri = $ci->uri->segment(1);
        // }



        $queryMenu = $ci->db->get_where('user_menu', ['uri' => $uri])->row_array();
        // $queryMenu = $ci->db->get_where('user_sub_menu', ['url' => $uri])->row_array();
        $menu_id = $queryMenu['id'];

        // var_dump($uri);
        // var_dump($role_id); //debug 403 blocked
        // var_dump($menu_id); //debug 403 blocked
        // die;
        // echo $uri . ' ini ' . $menu_id . ' role ' . $role_id;

        $userAccess = $ci->db->get_where('user_access_menu', ['role_id' => $role_id, 'menu_id' => $menu_id]);

        if ($userAccess->num_rows() < 1) {

            // redirect('auth/blocked');
        }
    }
}

function check_access($user_id, $active_id)
{
    $ci = get_instance();

    $ci->db->WHERE('id', $user_id);
    $ci->db->WHERE('is_active', $active_id);
    $result = $ci->db->get('user')->result_array();
    var_dump($result);
    if ($result['is_active'] == 1) {
        return "checked='checked'";
    }
}
