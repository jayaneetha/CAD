<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Test extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function add($data, $table = 'test')
    {
        $this->db->insert($table, $data);
        return $this->db->insert_id();
    }

    public function edit($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('test', $data);
    }

    public function delete($id, $table)
    {
        $this->db->where('id', $id);
        $this->db->delete($table);
    }

    public function get_tests()
    {
        $this->db->from('test');
        return $this->db->get()->result();
    }

    public function get_subjects_of_class($class)
    {
        $this->db->select('class_subjects.class_id, class_subjects.subject_id, subjects.subject_name');
        $this->db->from('class_subjects');
        $this->db->join('subjects', 'class_subjects.subject_id = subjects.id', 'inner');
        $this->db->where('class_subjects.class_id', $class);
        return $this->db->get()->result();
    }

    public function get_student_from_stc($id)
    {
        $this->db->select('user.first_name, user.last_name');
        $this->db->from('student_test_class');
        $this->db->join('user', 'student_test_class.student_id = user.id', 'inner');
        $this->db->where('student_test_class.id', $id);
        return $this->db->get()->result()[0];
    }
}

/* End of file test.php */
/* Location: ./application/models/test.php */