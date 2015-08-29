<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class School extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function add($data)
    {
        $this->db->insert('school', $data);
        return $this->db->insert_id();
    }

    public function update($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('school', $data);

    }

    public function get_schools()
    {
        $this->db->from('school');
        $this->db->where('deleted', 0);
        return $this->db->get()->result();
    }

    public function get_single_school($id)
    {
        $this->db->from('school');
        $this->db->where('id', $id);
        return $this->db->get()->result()[0];
    }

    public function add_class($data)
    {
        $this->db->insert('class', $data);
        return $this->db->insert_id();
    }

    public function get_classes()
    {
        $this->db->from('class');
        $this->db->where('deleted', 0);
        return $this->db->get()->result();
    }

    public function get_single_class($id)
    {
        $this->db->from('class');
        $this->db->where('id', $id);
        return $this->db->get()->result()[0];
    }

    public function update_class($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('class', $data);
    }

    public function delete_class($id)
    {
        $this->db->where('id', $id);
        $this->db->update('class', array('deleted' => 1));
    }

    public function get_subjects()
    {
        $this->db->from('subjects');
        $this->db->where('deleted', 0);
        return $this->db->get()->result();
    }

    public function get_single_subject($id)
    {
        $this->db->from('subjects');
        $this->db->where('id', $id);
        return $this->db->get()->result()[0];
    }

    public function delete_subject($id)
    {
        $this->db->where('id', $id);
        $this->db->update('subjects', array('deleted' => 1));
    }

    public function update_subject($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('subjects', $data);
    }

    public function add_subject($data)
    {
        $this->db->insert('subjects', $data);
        return $this->db->insert_id();
    }

    public function get_class_subjects()
    {
        $this->db->select('class_name, subject_name, class.id AS class_id, subjects.id AS subject_id');
        $this->db->from('class_subjects');
        $this->db->join('class', 'class_subjects.class_id = class.id', 'inner');
        $this->db->join('subjects', 'class_subjects.subject_id = subjects.id', 'inner');
        $this->db->order_by('class_name', 'ASC');
        $this->db->order_by('subject_name', 'ASC');
        return $this->db->get()->result();
    }

    public function delete_class_subject($class_id, $subject_id)
    {
        $this->db->where('class_id', $class_id);
        $this->db->where('subject_id', $subject_id);
        $this->db->delete('class_subjects');
    }

    public function add_class_subject($class_id, $subject_id)
    {
        $this->db->from('class_subjects');
        $this->db->where('class_id', $class_id);
        $this->db->where('subject_id', $subject_id);
        $num_rows = $this->db->get()->num_rows();
        if ($num_rows == 0) {
            $data = array('class_id' => $class_id, 'subject_id' => $subject_id);
            $this->db->insert('class_subjects', $data);
            return true;
        } else {
            return false;
        }
    }
}

/* End of file Schools.php */
/* Location: ./application/models/Schools.php */