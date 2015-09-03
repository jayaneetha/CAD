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

    public function get_fund_summary($from, $to, $donor, $accepted = null, $transferred = null)
    {
        $this->db->from('funds');
        $this->db->where('donor', $donor);
        $this->db->where("timestamp BETWEEN '$from' AND '$to'");

        if ($accepted != null) {
            if ($accepted == true) {
                $this->db->where('accepted', 1);
            } else {
                $this->db->where('accepted', 0);
            }
        }

        if ($transferred != null) {
            if ($transferred == true) {
                $this->db->where('transferred', 1);
            } else {
                $transferred->db->where('transferred', 0);
            }
        }

        return $this->db->get()->result();

    }

}

/* End of file report.php */
/* Location: ./application/models/report.php */