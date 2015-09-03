<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Result extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    public function get_latest_stc($student_id)
    {
        $this->db->select('test.term, test.year, test.month, class.class_name, student_test_class.id');
        $this->db->from('student_test_class');
        $this->db->join('test', 'student_test_class.test_id = test.id', 'inner');
        $this->db->join('class', 'class.id = student_test_class.class_id', 'inner');
        $this->db->where('student_id', $student_id);
        $this->db->where('cad_student_test_class.id=(SELECT MAX(cad_student_test_class.id) FROM cad_student_test_class)');
        return $this->db->get()->result()[0];
    }

    public function get_stc_list($student_id)
    {
        $this->db->select('test.term, test.year, test.month, class.class_name, student_test_class.id');
        $this->db->from('student_test_class');
        $this->db->join('test', 'student_test_class.test_id = test.id', 'inner');
        $this->db->join('class', 'class.id = student_test_class.class_id', 'inner');
        $this->db->where('student_id', $student_id);
        return $this->db->get()->result();
    }

    public function get_stc($id)
    {
        $this->db->select('test.term, test.year, test.month, class.class_name, student_test_class.id');
        $this->db->from('student_test_class');
        $this->db->join('test', 'student_test_class.test_id = test.id', 'inner');
        $this->db->join('class', 'class.id = student_test_class.class_id', 'inner');
        $this->db->where('student_test_class.id', $id);
        return $this->db->get()->result()[0];
    }

    public function get_subject_marks($stc_id)
    {
        $this->db->select('student_marks.mark, subjects.subject_name');
        $this->db->from('student_marks');
        $this->db->join('subjects', 'student_marks.subject_id = subjects.id', 'inner');
        $this->db->where('stc_id', $stc_id);
        return $this->db->get()->result();
    }


}

/* End of file result.php */
/* Location: ./application/models/result.php */