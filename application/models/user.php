<?php

/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 7/30/15
 * Time: 11:31 AM
 */
class user extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function get_user_login_info($username)
    {
        $this->db->select('id, password, user_type');
        $this->db->from('user');
        $this->db->where('username', $username);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            //No username found
            return NULL;
        } else {
            //username found
            $result = $query->result()[0];
            $user_info = array(
                'id' => $result->id,
                'password' => $result->password,
                'user_type' => $result->user_type
            );
            return $user_info;
        }
    }

    public function get_user($id)
    {
        $this->db->from('user');
        $this->db->where('id', $id);
        return $this->db->get()->result()[0];
    }

    public function get_donor($id)
    {
        $this->db->select('user.id, first_name, last_name, title, email, contact_no, address_1, address_2, city, country');
        $this->db->from('donor');
        $this->db->join('user', 'donor.id=user.id', 'inner');
        $this->db->where('user.id', $id);
        return $this->db->get()->result()[0];
    }

    public function get_student($id)
    {
        $this->db->select('user.id, first_name, last_name, user.contact_no, school.name, student.address_1, student.address_2, student.city, DOB');
        $this->db->from('student');
        $this->db->join('user', 'student.id=user.id', 'inner');
        $this->db->join('school', 'student.school_id=school.id', 'inner');
        $this->db->where('user.id', $id);
        return $this->db->get()->result()[0];
    }

    public function get_cad_user($id)
    {
        $this->db->select('user.id, first_name, last_name, position, email, contact_no');
        $this->db->from('cadteam');
        $this->db->join('user', 'cadteam.id=user.id', 'inner');
        $this->db->where('cadteam.id', $id);
        return $this->db->get()->result()[0];
    }

    public function accept_reject_request($id, $user_type, $accept = true)
    {
        if ($accept) {
            $data = array('accepted' => 1);
            $this->db->where('id', $id);
            $this->db->update($user_type, $data);
        } else {
            $data = array('deleted' => 1);
            $this->db->where('id', $id);
            $this->db->update('user', $data);
        }
    }

    public function registration_request_count()
    {
        $this->db->select('id');
        $this->db->from('donor');
        $this->db->where('accepted', 0);
        $donor_count = $this->db->count_all_results();
        $this->db->select('id');
        $this->db->from('student');
        $this->db->where('accepted', 0);
        $student_count = $this->db->count_all_results();
        return $donor_count + $student_count;
    }

    public function get_user_list($type = '')
    {
        $this->db->from('user');
        if ($type != '') {
            $this->db->where('user_type', $type);
        }
        return $this->db->get()->result();
    }

    /**
     * Returns the accepted, not deleted students, donors, cad members and admins
     */
    public function get_active_user_list()
    {
        $this->db->select('*');
        $this->db->from('student');
        $this->db->join('user', 'student.id=user.id', 'inner');
        $this->db->where('student.accepted', 1);
        $this->db->where('user.deleted', 0);
        $students = $this->db->get()->result();

        $this->db->select('*');
        $this->db->from('donor');
        $this->db->join('user', 'donor.id=user.id', 'inner');
        $this->db->where('donor.accepted', 1);
        $this->db->where('user.deleted', 0);
        $donors = $this->db->get()->result();

        $this->db->select('*');
        $this->db->from('cadteam');
        $this->db->join('user', 'cadteam.id=user.id', 'inner');
        $this->db->where('deleted', 0);
        $cad = $this->db->get()->result();

        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('user_type', 'admin');
        $admin = $this->db->get()->result();

        $total = array_merge($students, $donors, $cad, $admin);
        return $total;

    }


    public function register_CAD_user($user_data)
    {
        $this->db->insert('user', $user_data);
        return $this->db->insert_id();
    }

    public function get_registration_requests()
    {
        $this->db->select('user.id, first_name, last_name, user_type, school.name AS title');
        $this->db->from('student');
        $this->db->join('user', 'student.id=user.id', 'inner');
        $this->db->join('school', 'student.school_id=school.id', 'inner');
        $this->db->where('student.accepted', 0);
        $this->db->where('user.deleted', 0);
        $students = $this->db->get()->result();

        $this->db->select('user.id, first_name, last_name, user_type, title');
        $this->db->from('donor');
        $this->db->join('user', 'donor.id=user.id', 'inner');
        $this->db->where('donor.accepted', 0);
        $this->db->where('user.deleted', 0);
        $donors = $this->db->get()->result();

        return array_merge($students, $donors);
    }

    public function delete_user($id)
    {
        $data = array('deleted' => 1);
        $this->db->where('id', $id);
        $this->db->update('user', $data);
    }

    public function update_user($id, $data, $table = 'user')
    {
        $this->db->where('id', $id);
        $this->db->update($table, $data);
    }

}