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

    public function register_CAD_user($user_data)
    {
        $this->db->insert('user',$user_data);
        return $this->db->insert_id();
    }


}