<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Fund extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function add($transaction)
    {
        return $this->db->insert('funds', $transaction);
    }

    public function pending_transaction_count()
    {
        $this->db->select('id');
        $this->db->from('funds');
        $this->db->where('accepted', 0);
        return $this->db->count_all_results();
    }


}

/* End of file fund.php */
/* Location: ./application/models/fund.php */