<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Tests extends CI_Controller
{
    var $USER_OBJ = false;

    function __construct()
    {
        parent::__construct();
        $this->load->model('result');
        $this->load->model('test');

        $this->USER_OBJ = $this->session->userdata('user');

    }

    public function create()
    {
        if ($this->ua->check_login() == 'cad') {
            $view_data = array(
                'user' => $this->USER_OBJ,
                'position' => $this->USER_OBJ->user_type,
                'tests' => $this->test->get_tests(),
            );
            $this->load->view('cad/cad_manage_test', $view_data);
        } else {
            $this->load->view('401');
        }
    }

    public function add()
    {
        if ($this->ua->check_login() == 'cad') {
            $data = array(
                'year' => $this->input->post('year'),
                'month' => $this->input->post('month'),
                'term' => $this->input->post('term'),
            );
            $this->test->add($data);
            redirect('/tests/create');
        } else {
            $this->load->view('401');
        }
    }

    public function edit()
    {
        if ($this->ua->check_login() == 'cad') {
            $id = $this->input->post('id');
            $data = array(
                'year' => $this->input->post('year'),
                'month' => $this->input->post('month'),
                'term' => $this->input->post('term'),
            );
            $this->test->edit($id, $data);
            redirect('/tests/create');
        } else {
            $this->load->view('401');
        }
    }

    public function add_marks($stc = null)
    {
        if ($this->ua->check_login() == 'cad') {
            $this->load->model('user');
            $this->load->model('school');

            $view_data = array(
                'user' => $this->USER_OBJ,
                'position' => $this->USER_OBJ->user_type,
                'tests' => $this->test->get_tests(),
                'students' => $this->user->get_student(),
                'stc' => $stc
            );
            if ($stc != null) {
                $stc_obj = $this->result->get_stc($stc);
                $view_data['subjects'] = $this->test->get_subjects_of_class($stc_obj->class_id);
                $view_data['marks'] = $this->result->get_subject_marks($stc);
            }
            $this->load->view('cad/cad_add_marks', $view_data);
        } else {
            $this->load->view('401');
        }
    }

    public function enroll()
    {
        $this->load->model('user');

        if ($this->ua->check_login() == 'cad') {
            $student = $this->user->get_student($this->input->post('student'));
            $test = $this->input->post('test');
            $data = array(
                'student_id' => $student->id,
                'test_id' => $test,
                'class_id' => $student->class_id,
            );
            $stc_id = $this->test->add($data, 'student_test_class');
            redirect('/tests/add_marks/' . $stc_id);
        } else {
            $this->load->view('401');
        }
    }

    public function new_mark($stc,$from)
    {
        if ($this->ua->check_login() == 'cad') {
            $data = array(
                'stc_id' => $stc,
                'subject_id' => $this->input->post('subject'),
                'mark' => $this->input->post('mark'),
            );
            $this->test->add($data, 'student_marks');
            if ($from == 'add') {
                redirect('/tests/add_marks/' . $stc);
            }
            if ($from == 'edit') {
                redirect('/tests/edit_marks/' . $stc);

            }

        } else {
            $this->load->view('401');
        }
    }

    public function delete_mark($stc, $id, $from)
    {
        if ($this->ua->check_login() == 'cad') {
            $this->test->delete($id, 'student_marks');
            if ($from == 'add') {
                redirect('/tests/add_marks/' . $stc);
            }
            if ($from == 'edit') {
                redirect('/tests/edit_marks/' . $stc);

            }
        } else {
            $this->load->view('401');
        }
    }

    public function edit_marks($stc = null)
    {
        if ($this->ua->check_login() == 'cad') {
            $this->load->model('user');
            $this->load->model('school');

            $view_data = array(
                'user' => $this->USER_OBJ,
                'position' => $this->USER_OBJ->user_type,
                'stc' => $stc,
                'stc_list' => $this->result->get_stc_list(),
            );
            if ($stc != null) {
                $stc_obj = $this->result->get_stc($stc);
                $view_data['subjects'] = $this->test->get_subjects_of_class($stc_obj->class_id);
                $view_data['marks'] = $this->result->get_subject_marks($stc);
                $view_data['student']=$this->test->get_student_from_stc($stc);
            }
            $this->load->view('cad/cad_edit_marks', $view_data);
        } else {
            $this->load->view('401');
        }
    }

    public function select_stc()
    {
        if ($this->ua->check_login() == 'cad') {
            $stc = $this->input->post('stc');
            redirect('/tests/edit_marks/' . $stc);
        } else {
            $this->load->view('401');
        }
    }

}

/* End of file Tests.php */
/* Location: ./application/controllers/Tests.php */