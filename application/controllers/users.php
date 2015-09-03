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
        if (isset($_POST['username'])) {
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
        } else {
            $this->load->view('login');
        }

    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('/');
    }

    public function dashboard()
    {
        switch ($this->ua->check_login()) {
            case 'admin':
                $this->admin_dashboard($this->USER_OBJ);
                break;
            case 'donor';
                $this->donor_dashboard($this->USER_OBJ);
                break;
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
            'position' => $this->USER_OBJ->user_type,
            'inbox_count' => $this->message->get_inbox_count($user_obj->id),
            'pending_transaction_count' => $this->fund->pending_transaction_count(),
            'published_article_count' => $this->article->published_article_count(),
            'registration_request_count' => $this->user->registration_request_count()
        );
        $this->load->view('admin/admin_dashboard', $dashboard_data);
    }

    private function donor_dashboard($user_obj)
    {
        $this->load->model('message');
        $this->load->model('fund');
        $this->load->model('article');

        $dashboard_data = array(
            'user' => $user_obj,
            'position' => $this->USER_OBJ->user_type,
            'inbox_count' => $this->message->get_inbox_count($user_obj->id),
            'pending_transaction_count' => $this->fund->pending_transaction_count(),
            'published_article_count' => $this->article->published_article_count(),
            'registration_request_count' => $this->user->registration_request_count()
        );
        $this->load->view('donor/donor_dashboard', $dashboard_data);

    }

    public function create_CAD_user()
    {
        if ($this->ua->check_login() == 'admin') {
            $view_data = array(
                'user' => $this->USER_OBJ,
                'position' => $this->USER_OBJ->user_type,
            );
            $this->load->view('admin/admin_create_CAD_user', $view_data);

        } else {
            $this->load->view('401');
        }
    }

    public function register_CAD_user()
    {
        if ($this->ua->check_login() == 'admin') {
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
                        'position' => $this->USER_OBJ->user_type,
                        'success' => true,
                    );
                    $this->load->view('admin/admin_create_CAD_user', $view_data);
                }
            } else {
                echo 'error : ' . $id;
            }
        } else {
            $this->load->view('401');
        }

    }

    public function registration_request($success = 0)
    {

        if ($this->ua->check_login() == 'admin') {
            $view_data = array(
                'user' => $this->USER_OBJ,
                'position' => $this->USER_OBJ->user_type,
                'users' => $this->user->get_registration_requests(),
                'donors' => $this->user->get_unassigned_donors(),
            );
            if ($success == 1) {
                $view_data['success'] = 'true';
            }
            $this->load->view('admin/admin_registration_request', $view_data);

        } else {
            $this->load->view('401');
        }
    }

    public function get_single_user()
    {
        $this->ua->check_login();
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
        $this->load->view('json', array('data' => $user));
    }

    public function accept_reject_request($id, $type)
    {
        $this->ua->check_login();
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

    public function accept_student()
    {
        if ($this->ua->check_login() == 'admin') {
            $id = $this->input->post('id');
            $password = sha1($this->input->post('password'));
            $donor_id = $this->input->post('donor');
            if ($password == $this->USER_OBJ->password) {

                $this->user->accept_reject_request($id, $this->user->get_user($id)->user_type);

                $this->user->update_user($id, array('donor' => $donor_id), 'student');
                redirect('/users/registration_request/1');

            } else {
                $this->load->view('401');
            }
        }
    }

    public function manage_users($success = 0)
    {
        if ($this->ua->check_login() == 'admin') {
            $view_data = array(
                'user' => $this->USER_OBJ,
                'position' => $this->USER_OBJ->user_type,
                'users' => $this->user->get_active_user_list(),
                'success' => $success,
            );
            $this->load->view('admin/admin_manage_users', $view_data);

        } else {
            $this->load->view('401');
        }
    }

    public function update_cad_user()
    {
        if ($this->ua->check_login() == 'admin') {
            $id = $this->input->post('id');
            $data = array('position' => $this->input->post('position'));
            $this->user->update_user($id, $data, 'cadteam');
            redirect('/users/manage_users/3');
        } else {
            $this->load->view('401');
        }

    }

    public function delete_user()
    {
        $id = $this->input->post('id');
        $password = sha1($this->input->post('password'));
        if ($this->ua->check_login() == 'admin') {
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
            $this->load->view('401');
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

    public function update_profile()
    {
        $this->ua->check_login();
        $id = $this->input->post('id');
        $data = array(
            'first_name' => $this->input->post('first_name'),
            'last_name' => $this->input->post('last_name'),
            'email' => $this->input->post('email'),
            'contact_no' => $this->input->post('contact_no'),
        );

        if ($this->input->post('new_password') != "") {
            if ($this->input->post('new_password') == $this->input->post('confirm_new_password')) {
                $data['password'] = sha1($this->input->post('new_password'));
            } else {
                redirect('/users/profile/3');
            }
        }

        if (sha1($this->input->post('password')) == $this->user->get_user($id)->password) {
//            if ($this->user->update_user($id, $data) > 0) {
            $this->user->update_user($id, $data);
            if (isset($_FILES['profile_picture'])) {
                $config['upload_path'] = './profile_pictures/';
                $config['allowed_types'] = 'jpg|png';
                $config['file_name'] = $id;
                $config['overwrite'] = TRUE;

                $this->load->library('upload', $config);
                $this->upload->do_upload('profile_picture');

                $file_ext = $this->upload->data()['file_ext'];
                $filename = $id . $file_ext;

                $this->user->update_user($id, array('profile_pic' => $filename));


                $config['image_library'] = 'gd2';
                $config['source_image'] = './profile_pictures/' . $filename;
                $config['maintain_ratio'] = TRUE;
                $config['width'] = 128;
                $config['height'] = 128;

                $this->load->library('image_lib', $config);

                $this->image_lib->resize();

            }

            $user_obj = $this->user->get_user($id);
            $this->session->set_userdata('user', $user_obj);

            redirect('/users/profile/1');
//            } else {
//                redirect('/users/profile/2');
//            }
        } else {
            redirect('/users/profile/4');
        }


    }

    public function profile($success = 0)
    {
        $user_type = $this->ua->check_login();
        switch ($user_type) {
            case 'admin':
                $this->admin_profile($success);
                break;

            default:
                $this->load->view('500');
        }
    }

    private function admin_profile($success = 0)
    {
        $view_data = array(
            'user' => $this->USER_OBJ,
            'position' => $this->USER_OBJ->user_type,
            'success' => $success
        );
        $this->load->view('admin/admin_profile', $view_data);

    }

    public function student_details()
    {
        if ($this->ua->check_login() == 'donor') {

            $student = $this->user->get_student_from_donor($this->USER_OBJ->id);

            if ($student != NULL) {
                $view_data = array(
                    'user' => $this->USER_OBJ,
                    'position' => $this->USER_OBJ->user_type,
                    'student' => $student,
                    'marks'=>$this->user->get_student_overall_marks($student->id),
                    'subjects'=>$this->user->get_student_overall_marks_subjects($student->id),
                );

                $this->load->view('donor/donor_student_profile', $view_data);
            } else {
                //no students
                $this->load->view('500');
            }
        } else {
            $this->load->view('401');
        }

    }


}

/* End of file users.php */
/* Location: ./application/controllers/users.php */