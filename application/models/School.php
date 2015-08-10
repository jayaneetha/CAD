<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class School extends CI_Model {
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function add($data)
    {
        $this->db->insert('school',$data);
        return $this->db->insert_id();
    }


}

/* End of file Schools.php */
/* Location: ./application/models/Schools.php */