<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class users extends CI_Controller
{
    var $USER_OBJ = false;

    function __construct()
    {
        parent::__construct();

        $this->load->model('user');

        $this->USER_OBJ = $this->session->userdata('user');

    }

    public function index()
    {
        if ($this->USER_OBJ != false) {
            //session exists
            redirect('/dashboard');

        } else {
            //session expired or DNE
            $this->load->view('login');
        }
    }

    public function login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');


        //$remember = $this->input->post('remember');
        // Change the session timeout for the remember me option
        // Value return from the remember is "remember"


        $user_info = $this->user->get_user_login_info($username);

        if ($user_info == null) {
            //user DNE
            $this->load->view('login', array('login_fail' => true));
        } elseif ($password == $user_info['password']) {
            //Login Success
            $user_obj = $this->user->get_user($user_info['id']);
            $this->session->set_userdata('user', $user_obj);
            redirect('/dashboard');
        } else {
            //Login Fail
            $this->load->view('login', array('login_fail' => true));
        }

    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('/');

    }

    public function dashboard()
    {
        if (!isset($this->USER_OBJ->id)) {
            redirect('/');
        }

        switch ($this->USER_OBJ->user_type) {
            case 'admin':
                $this->admin_dashboard($this->USER_OBJ);
        }

    }

    /**
     * Loads the Administrator Dashboard
     * @param $user_obj
     */
    private function admin_dashboard($user_obj)
    {
        $this->load->model('message');
        $this->load->model('fund');
        $this->load->model('article');

        $dashboard_data = array(
            'user' => $user_obj,
            'position' => 'Administrator',
            'inbox_count' => $this->message->get_inbox_count($user_obj->id),
            'pending_transaction_count' => $this->fund->pending_transaction_count(),
            'published_article_count' => $this->article->published_article_count(),
            'registration_request_count' => $this->user->registration_request_count()
        );
        $this->load->view('admin/admin_dashboard', $dashboard_data);
    }

    public function create_CAD_user()
    {
        if (isset($this->USER_OBJ->id)) {
            $view_data = array(
                'user' => $this->USER_OBJ,
                'position' => 'Administrator',
            );
            $this->load->view('admin/admin_create_CAD_user', $view_data);

        } else {
            redirect('/');
        }
    }

    public function register_CAD_user()
    {
        $this->load->config('cad');
        $this->load->helper('string');

        $user_data = array(
            'first_name' => $this->input->post('first_name'),
            'last_name' => $this->input->post('last_name'),
            'title' => $this->input->post('position'),
            'email' => $this->input->post('email'),
            'username' => $this->input->post('email'),
            'password' => random_string('alnum', $this->config->item('default_password_length')),
            'user_type' => 'cad',
        );

        $id = $this->user->register_CAD_user($user_data);
        if ($id != 0) {
            $email_body = $this->load->view('email_templates/add_user', array(
                'receiver_name' => $user_data['first_name'] . " " . $user_data['last_name'],
                'email' => $user_data['email'],
                'password' => $user_data['password']
            ),true);
            if($this->send_email($user_data['email'], 'Your Login details in CAD Portal', $email_body)){
                $view_data = array(
                    'user' => $this->USER_OBJ,
                    'position' => 'Administrator',

                );
                $this->load->view('admin/admin_create_CAD_user');
            }
        } else {
            echo 'error : ' . $id;
        }

    }


    public function registration_request()
    {
        if (isset($this->USER_OBJ->id)) {
            $view_data = array(
                'user' => $this->USER_OBJ,
                'position' => 'Administrator',
                'users' => $this->user->get_registration_requests(),
            );
            $this->load->view('admin/admin_registration_request', $view_data);

        } else {
            redirect('/');
        }
    }

    private function send_email($to, $subject, $body)
    {
        $this->load->library('email');

        $this->email->from('Colour A Dream Web Portal');
        $this->email->reply_to('info@imcds.org', 'IMCD');
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($body);
        $this->email->set_mailtype('html');
        if ($this->email->send() == 1) {
            return true;
        } else {
            echo $this->email->print_debugger();
        }


    }

}

/* End of file users.php */
/* Location: ./application/controllers/users.php */