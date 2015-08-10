<?php

class Login extends CI_Controller
{
    function __construct()
    {
        parent::_construct();
    }

    public function index()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $this->load->model('User');
        $db_password = $this->user->get_user_password($username);
        if ($db_password === sha1($password)) {
            $this->load->view('dashboard');
            $this->load->library('session');
            $user_obj = $this->user->get_user($username);
            $user = array(
                'user_id' => $user_obj->id,
                'user_first_name' => $user_obj->first_name,
                'user_last_name' => $user_obj->last_name,
                'user_user_type' => $user_obj->type
            );
            $this->session->set_userdata($user);
        } else {
            $this->load->view('login_fail');
        }
    }
}