<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class schools extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('school');

        $this->USER_OBJ = $this->session->userdata('user');
    }

    public function add_school($success = null)
    {

        if ($this->ua->check_login() == 'admin') {
            $view_data = array(
                'user' => $this->USER_OBJ,
                'position' => 'Administrator',
            );
            if ($success != null) {
                $view_data['success'] = $success;
            }
            $this->load->view('admin/admin_add_school', $view_data);
        } else {
            $this->load->view('401');
        }

    }

    public function add()
    {
        if ($this->ua->check_login() == 'admin') {

            $this->load->library('form_validation');

            $this->form_validation->set_rules('name', 'School Name', 'required');
            $this->form_validation->set_rules('address1', 'Address Line 1', 'required');
            $this->form_validation->set_rules('city', 'City', 'required');
            $this->form_validation->set_rules('contact_no', 'Contact Number', 'required|numeric');
            $this->form_validation->set_rules('principal', 'Principal Name', 'required');

            if ($this->form_validation->run() != FALSE) {
                $school_data = array(
                    'name' => $this->input->post('name'),
                    'address_1' => $name = $this->input->post('address1'),
                    'address_2' => $name = $this->input->post('address2'),
                    'city' => $name = $this->input->post('city'),
                    'contact_no' => $name = $this->input->post('contact_no'),
                    'principal' => $name = $this->input->post('principal')
                );

                $school_id = $this->school->add($school_data);
                if ($school_id != 0) {
                    redirect('/schools/add_school/true');
                } else {
                    redirect('/schools/add_school/false');
                }
            }
        } else {
            $this->load->view('401');
        }
    }

    public function update_school()
    {
        if ($this->ua->check_login() == 'admin') {

            $school_id = $this->input->post('school_id');

            $school_data = array(
                'name' => $this->input->post('name'),
                'address_1' => $name = $this->input->post('address1'),
                'address_2' => $name = $this->input->post('address2'),
                'city' => $name = $this->input->post('city'),
                'contact_no' => $name = $this->input->post('contact_no'),
                'principal' => $name = $this->input->post('principal')
            );
            $this->school->update($school_id, $school_data);
            redirect('/schools/registered_schools/true');
        } else {
            $this->load->view('401');
        }
    }

    public function registered_schools($success = null)
    {
        if ($this->ua->check_login() == 'admin') {
            $view_data = array(
                'user' => $this->USER_OBJ,
                'position' => 'Administrator',
                'schools' => $this->school->get_schools(),
            );
            if ($success != null) {
                $view_data['success'] = $success;
            }
            $this->load->view('admin/admin_registered_schools', $view_data);
        } else {
            $this->load->view('401');
        }

    }

    public function get_single_school()
    {
        $id = $this->input->post('school_id');
        if (isset($this->USER_OBJ->id)) {
            $this->load->view('json', array('data' => $this->school->get_single_school($id)));
        } else {
            echo "Unauthorized";
        }
    }

    public function manage_classes($success = 0)
    {

        if ($this->ua->check_login() == 'admin') {
            $view_data = array(
                'user' => $this->USER_OBJ,
                'position' => 'Administrator',
                'classes' => $this->school->get_classes(),
            );
            $view_data['success'] = $success;
            $this->load->view('admin/admin_manage_classes', $view_data);
        } else {
            $this->load->view('401');
        }

    }

    public function add_class()
    {

        if ($this->ua->check_login() == 'admin') {

            $this->load->library('form_validation');

            $this->form_validation->set_rules('name', 'Class Name', 'required');
            if ($this->form_validation->run() != FALSE) {
                $data = array(
                    'class_name' => $this->input->post('name')
                );
                $class_id = $this->school->add_class($data);
                if ($class_id > 0) {
                    redirect('/schools/manage_classes/1');
                } else {
                    redirect('/schools/manage_classes/2');
                }
            } else {
                redirect('/schools/manage_classes/2');
            }
        } else {
            $this->load->view('401');
        }

    }

    public function get_single_class()
    {
        if ($this->ua->check_login() == 'admin') {

            $class_id = $this->input->post('class_id');
            $this->load->view('json', array('data' => $this->school->get_single_class($class_id)));

        } else {
            $this->load->view('401');
        }

    }

    public function update_class()
    {

        if ($this->ua->check_login() == 'admin') {

            $this->load->library('form_validation');

            $this->form_validation->set_rules('name', 'Class Name', 'required');
            if ($this->form_validation->run() != FALSE) {
                $data = array(
                    'class_name' => $this->input->post('name')
                );

                $this->school->update_class($this->input->post('class_id'), $data);

                redirect('/schools/manage_classes/3');

            } else {
                redirect('/schools/manage_classes/2');
            }
        } else {
            $this->load->view('401');
        }

    }

    public function delete_class()
    {

        if ($this->ua->check_login() == 'admin') {

            $this->load->library('form_validation');

            $this->form_validation->set_rules('password', 'Password', 'required');
            if ($this->form_validation->run() != FALSE) {
                $this->load->model('user');
                $user_info = $this->user->get_user($this->USER_OBJ->id);
                if (sha1($this->input->post('password')) == $user_info->password) {
                    $this->school->delete_class($this->input->post('id'));
                    redirect('/schools/manage_classes/4');
                }
            } else {
                redirect('/schools/manage_classes/5');
            }
        } else {
            $this->load->view('401');
        }

    }

    public function manage_subjects($success = 0)
    {

        if ($this->ua->check_login() == 'admin') {
            $view_data = array(
                'user' => $this->USER_OBJ,
                'position' => 'Administrator',
                'subjects' => $this->school->get_subjects(),
            );
            $view_data['success'] = $success;
            $this->load->view('admin/admin_manage_subjects', $view_data);
        } else {
            $this->load->view('401');
        }

    }

    public function get_single_subject()
    {

        if ($this->ua->check_login() == 'admin') {

            $subject_id = $this->input->post('subject_id');
            $this->load->view('json', array('data' => $this->school->get_single_subject($subject_id)));

        } else {
            $this->load->view('401');
        }

    }

    public function delete_subject()
    {

        if ($this->ua->check_login() == 'admin') {

            $this->load->library('form_validation');

            $this->form_validation->set_rules('password', 'Password', 'required');
            if ($this->form_validation->run() != FALSE) {
                $this->load->model('user');
                $user_info = $this->user->get_user($this->USER_OBJ->id);
                if (sha1($this->input->post('password')) == $user_info->password) {
                    $this->school->delete_subject($this->input->post('id'));
                    redirect('/schools/manage_subjects/4');
                }
            } else {
                redirect('/schools/manage_subjects/5');
            }
        } else {
            $this->load->view('401');
        }

    }

    public function update_subject()
    {

        if ($this->ua->check_login() == 'admin') {

            $this->load->library('form_validation');

            $this->form_validation->set_rules('name', 'Class Name', 'required');
            if ($this->form_validation->run() != FALSE) {
                $data = array(
                    'subject_name' => $this->input->post('name')
                );

                $this->school->update_subject($this->input->post('subject_id'), $data);

                redirect('/schools/manage_subjects/3');

            } else {
                redirect('/schools/manage_subjects/2');
            }
        } else {
            $this->load->view('401');
        }

    }

    public function add_subject()
    {

        if ($this->ua->check_login() == 'admin') {

            $this->load->library('form_validation');

            $this->form_validation->set_rules('name', 'Subject Name', 'required');
            if ($this->form_validation->run() != FALSE) {
                $data = array(
                    'subject_name' => $this->input->post('name')
                );
                $class_id = $this->school->add_subject($data);
                if ($class_id > 0) {
                    redirect('/schools/manage_subjects/1');
                } else {
                    redirect('/schools/manage_subjects/2');
                }
            } else {
                redirect('/schools/manage_subjects/2');
            }
        } else {
            $this->load->view('401');
        }

    }

    public function manage_class_subjects($success = 0)
    {

        if ($this->ua->check_login() == 'admin') {
            $view_data = array(
                'user' => $this->USER_OBJ,
                'position' => 'Administrator',
                'classes' => $this->school->get_classes(),
                'subjects' => $this->school->get_subjects(),
                'class_subjects' => $this->school->get_class_subjects(),
            );
            $view_data['success'] = $success;
            $this->load->view('admin/admin_class_subject', $view_data);
        } else {
            $this->load->view('401');
        }

    }

    public function add_class_subjects()
    {

        if ($this->ua->check_login() == 'admin') {


            $class_id = $this->input->post('class_id');
            $subject_id = $this->input->post('subject_id');

            $ret = $this->school->add_class_subject($class_id, $subject_id);

            if ($ret) {
                redirect('/schools/manage_class_subjects/1');
            } else {
                redirect('/schools/manage_class_subjects/5');
            }
        } else {
            $this->load->view('401');
        }

    }

    public function delete_class_subject()
    {


        if ($this->ua->check_login() == 'admin') {

            $this->load->library('form_validation');

            $this->form_validation->set_rules('password', 'Password', 'required');
            if ($this->form_validation->run() != FALSE) {
                $this->load->model('user');
                $user_info = $this->user->get_user($this->USER_OBJ->id);
                if (sha1($this->input->post('password')) == $user_info->password) {
                    echo sha1($this->input->post('password'));
                    echo "<br>";
                    echo $user_info->password;
                    //die();
                    $class_id = $this->input->post('class_id');
                    $subject_id = $this->input->post('subject_id');
                    $this->school->delete_class_subject($class_id, $subject_id);

                    redirect('/schools/manage_class_subjects/3');
                } else {
                    redirect('/schools/manage_class_subjects/4');
                }
            } else {
                redirect('/schools/manage_class_subjects/4');
            }
        } else {
            $this->load->view('401');
        }
    }


}

/* End of file Schools.php */
/* Location: ./application/controllers/School.php */