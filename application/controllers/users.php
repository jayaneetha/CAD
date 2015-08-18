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
        $password = sha1($this->input->post('password'));

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
        $temp_password = random_string('alnum', $this->config->item('default_password_length'));
        $user_data = array(
            'first_name' => $this->input->post('first_name'),
            'last_name' => $this->input->post('last_name'),
            'title' => $this->input->post('position'),
            'email' => $this->input->post('email'),
            'username' => $this->input->post('email'),
            'password' => sha1($temp_password),
            'user_type' => 'cad',
        );

        $id = $this->user->register_CAD_user($user_data);
        if ($id != 0) {
            $email_body = $this->load->view('email_templates/add_user', array(
                'receiver_name' => $user_data['first_name'] . " " . $user_data['last_name'],
                'email' => $user_data['email'],
                'password' => $temp_password
            ), true);
            if ($this->send_email($user_data['email'], 'Your Login details in CAD Portal', $email_body)) {
                $view_data = array(
                    'user' => $this->USER_OBJ,
                    'position' => 'Administrator',
                    'success' => true,
                );
                $this->load->view('admin/admin_create_CAD_user', $view_data);
            }
        } else {
            echo 'error : ' . $id;
        }

    }

    public function registration_request($success = 0)
    {
        if (isset($this->USER_OBJ->id)) {
            $view_data = array(
                'user' => $this->USER_OBJ,
                'position' => 'Administrator',
                'users' => $this->user->get_registration_requests(),
            );
            if ($success == 1) {
                $view_data['success'] = 'true';
            }
            $this->load->view('admin/admin_registration_request', $view_data);

        } else {
            redirect('/');
        }
    }

    public function get_single_user()
    {
        $user_id = $this->input->post('user_id');
        $user_type = $this->input->post('user_type');
        $user = array();
        switch ($user_type) {
            case 'donor':
                $user = $this->user->get_donor($user_id);
                break;
            case 'student':
                $user = $this->user->get_student($user_id);
                break;
            case 'cad':
                $user = $this->user->get_cad_user($user_id);
                break;
        }
        echo json_encode($user);
    }

    public function accept_reject_request($id, $type)
    {
        switch ($type) {
            case 'accept':
                $this->user->accept_reject_request($id, $this->user->get_user($id)->user_type);
                redirect('/users/registration_request/1');
                break;
            case 'reject':
                $this->user->accept_reject_request($id, $this->user->get_user($id)->user_type, false);
                redirect('/users/registration_request/1');
                break;
            default:
                redirect('/users/registration_request/0');

        }
    }

    public function manage_users($success = 0)
    {
        if (isset($this->USER_OBJ->id)) {
            $view_data = array(
                'user' => $this->USER_OBJ,
                'position' => 'Administrator',
                'users' => $this->user->get_active_user_list(),
                'success' => $success,
            );
            $this->load->view('admin/admin_manage_users', $view_data);

        } else {
            redirect('/');
        }
    }

    public function update_cad_user()
    {
        echo $id = $this->input->post('id');
        $data = array('position' => $this->input->post('position'));
        $this->user->update_user($id, $data, 'cadteam');
        redirect('/users/manage_users/3');

    }

    public function delete_user()
    {
        $id = $this->input->post('id');
        $password = sha1($this->input->post('password'));
        if (isset($this->USER_OBJ->id)) {
            if ($password == $this->USER_OBJ->password) {
                if ($this->USER_OBJ->user_type == 'admin') {
                    $this->user->delete_user($id);
                    redirect('/users/manage_users/1');
                } else {
                    $this->load->view('401');
                }
            } else {
                redirect('/users/manage_users/2');
            }
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