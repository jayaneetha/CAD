<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class report extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();

    }

    public function get_transaction_detail($from, $to, $accepted = false)
    {
        $this->db->select('first_name, last_name, amount, `timestamp`, accepted, transaction_no, transfered, transfer_timestamp');
        $this->db->from('funds');
        $this->db->join('user', 'funds.donor=user.id', 'inner');
        return $this->db->get()->results();
    }


}

/* End of file report.php */
/* Location: ./application/models/report.php */