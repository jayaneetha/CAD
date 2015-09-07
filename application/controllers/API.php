<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class API extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Colombo');

    }


    public function index()
    {

    }

    public function login()
    {
        $this->load->model('user');

        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user_info = $this->user->get_user_login_info($username);

        $view_data = array(
            'username' => $username,
        );

        if ($user_info == null) {
            //user DNE
            $view_data = array_merge($view_data, array('success' => false, 'message' => 'Username does not exists'));
        } elseif (sha1($password) == $user_info['password']) {
            //Login Success
            $user_obj = $this->user->get_user($user_info['id']);
            $this->session->set_userdata('user', $user_obj);
            $view_data = array_merge($view_data, array('success' => true));

        } else {
            //Login Fail
            $view_data = array_merge($view_data, array('success' => false, 'message' => 'Username/Password combination is wrong'));

        }

        $this->composer->log('API', json_encode($view_data));

        $this->load->view('json', array('data' => $view_data));
    }
}

/* End of file API.php */
/* Location: ./application/controllers/API.php */