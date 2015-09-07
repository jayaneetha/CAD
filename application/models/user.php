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
        $this->db->where('deleted', 0);
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

    public function get_student($id = null)
    {
        $this->db->select('user.id, class.id AS class_id, class.class_name, first_name, last_name, student.assigned_teacher, student.teacher_contact, user.contact_no, school.name, student.address_1, student.address_2, student.city, DOB, student.donor');
        $this->db->from('student');
        $this->db->join('user', 'student.id=user.id', 'inner');
        $this->db->join('school', 'student.school_id=school.id', 'inner');
        $this->db->join('class', 'student.class_id=class.id', 'inner');
        if ($id == null) {
            return $this->db->get()->result();

        } else {
            $this->db->where('user.id', $id);
            return $this->db->get()->result()[0];
        }

    }

    public function get_cad_user($id)
    {
        $this->db->select('user.id, first_name, last_name, position, email, contact_no');
        $this->db->from('cadteam');
        $this->db->join('user', 'cadteam.id=user.id', 'inner');
        $this->db->where('cadteam.id', $id);
        return $this->db->get()->result()[0];
    }

//
//SELECT cad_donor.id,
//cad_user.first_name,
//cad_user.last_name
//FROM cad_student RIGHT OUTER JOIN cad_donor ON cad_student.donor = cad_donor.id
//INNER JOIN cad_user ON cad_donor.id = cad_user.id
//WHERE cad_student.`id` IS NULL
    public function get_unassigned_donors()
    {
        $this->db->select('donor.id, user.first_name, user.last_name');
        $this->db->from('student');
        $this->db->join('donor', 'student.donor=donor.id', 'right outer');
        $this->db->join('user', 'donor.id=user.id', 'inner');
        $this->db->where('student.id is NULL');
        return $this->db->get()->result();
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
        return $this->db->affected_rows();
    }

    public function get_student_from_donor($id)
    {
        $this->db->select('user.first_name, user.last_name, student.id, student.DOB, student.address_1, student.address_2, student.city, school.name, class.class_name, student.assigned_teacher');
        $this->db->from('student');
        $this->db->join('class', 'class.id = student.class_id', 'inner');
        $this->db->join('school', 'school.id = student.school_id', 'inner');
        $this->db->join('user', 'user.id = student.id', 'inner');
        $this->db->where('student.donor', $id);
        return $this->db->get()->result()[0];
    }

//SELECT cad_student_marks.mark,
//cad_test.`year`,
//cad_test.term,
//cad_subjects.subject_name
//FROM cad_student_marks INNER JOIN cad_student_test_class ON cad_student_marks.stc_id = cad_student_test_class.id
//INNER JOIN cad_test ON cad_test.id = cad_student_test_class.test_id
//INNER JOIN cad_subjects ON cad_subjects.id = cad_student_marks.subject_id
//WHERE cad_student_test_class.student_id = 11

    public function get_student_overall_marks($id)
    {
        $this->db->select('student_marks.mark, test.year, test.month, subjects.subject_name');
        $this->db->from('student_marks');
        $this->db->join('student_test_class', 'student_marks.stc_id=student_test_class.id', 'inner');
        $this->db->join('test', 'test.id=student_test_class.test_id', 'inner');
        $this->db->join('subjects', 'subjects.id=student_marks.subject_id', 'inner');
        $this->db->where('student_test_class.student_id', $id);
        return $this->db->get()->result();
    }

    public function get_student_overall_marks_subjects($id)
    {
        $this->db->select('student_marks.mark, test.year, test.term, subjects.subject_name');
        $this->db->from('student_marks');
        $this->db->join('student_test_class', 'student_marks.stc_id=student_test_class.id', 'inner');
        $this->db->join('test', 'test.id=student_test_class.test_id', 'inner');
        $this->db->join('subjects', 'subjects.id=student_marks.subject_id', 'inner');
        $this->db->group_by('subjects.subject_name');
        $this->db->where('student_test_class.student_id', $id);
        return $this->db->get()->result();
    }

    public function get_student_list($id = null)
    {

    }

}