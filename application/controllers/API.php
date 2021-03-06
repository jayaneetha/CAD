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
            $view_data = array_merge($view_data, array('success' => true, 'id' => intval($user_obj->id), 'name' => $user_obj->first_name . " " . $user_obj->last_name));

        } else {
            //Login Fail
            $view_data = array_merge($view_data, array('success' => false, 'message' => 'Username/Password combination is wrong'));

        }

        $this->composer->log('API', json_encode($view_data));

        $this->load->view('json', array('data' => $view_data));
    }

    public function add_fund()
    {
        $amount = $this->input->post('amount');
        $donor = $this->input->post('donor');
        $description = $this->input->post('description');
        $transaction_no = $this->input->post('transaction_no');

        $data = array('amount' => $amount, 'donor' => $donor, 'description' => $description, 'transaction_no' => $transaction_no);
        $this->load->model('fund');
        $view_data = array('amount' => $amount);
        if ($this->fund->add($data) > 0) {
            $view_data['success'] = true;
        } else {
            $view_data['success'] = false;
        }
        $this->load->view('json', array('data' => $view_data));

    }

    public function get_funds($donor)
    {
        //$donor = $this->input->post('donor');
        $this->load->model('fund');
        $funds = $this->fund->get_funds($donor);
        $this->load->view('API_show_funds', array('data' => $funds));
    }
}

/* End of file API.php */
/* Location: ./application/controllers/API.php */