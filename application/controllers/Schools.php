<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class schools extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('school');
    }

    public function add()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('name', 'School Name', 'required');
        $this->form_validation->set_rules('address1', 'Address Line 1', 'required');
        $this->form_validation->set_rules('city', 'City', 'required');
        $this->form_validation->set_rules('contact_no', 'Contact Number', 'required|numeric');
        $this->form_validation->set_rules('principal', 'Principal Name', 'required');

        if ($this->form_validation->run() != FALSE) {
            $school_data = array(
                'name' => $this->input->post('name'),
                'address1' => $name = $this->input->post('address1'),
                'address2' => $name = $this->input->post('address2'),
                'city' => $name = $this->input->post('city'),
                'contact_no' => $name = $this->input->post('contact_no'),
                'principal' => $name = $this->input->post('principal')
            );
            $school_id = $this->school->add($school_data);
            if ($school_id != 0) {
                $this->load->view('add_school', array('success' => true));
            } else {
                $this->load->view('add_school', array('success' => false));
            }
        }
    }
}

/* End of file Schools.php */
/* Location: ./application/controllers/School.php */