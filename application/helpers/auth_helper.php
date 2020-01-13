<?php

function is_not_login()
{
    $ci = &get_instance();
    $login_token    = $ci->session->userdata('username');
    $hash           = $ci->session->userdata('petshop-token');
    if (!password_verify($login_token, $hash)) {
        $ci->session->set_flashdata('message', '<div class="alert alert-danger">Akses ditolak, masuk untuk dapat akses.</div>');
        redirect('auth/login');
    }
}