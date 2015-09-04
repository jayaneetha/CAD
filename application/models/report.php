<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class report extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();

    }


    public function get_fund_summary($from, $to, $donor = null, $accepted = null, $transferred = null)
    {
        $this->db->from('funds');

        $this->db->where("timestamp BETWEEN '$from' AND '$to'");

        if ($donor != null) {
            $this->db->where('donor', $donor);
        }

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

    public function get_fund_detailed($from, $to, $donor = null, $accepted = null, $transferred = null)
    {
        $this->db->select('user.first_name, user.last_name, funds.amount, funds.id, funds.description, funds.timestamp, funds.transaction_no, funds.accepted, funds.transferred, funds.transfer_timestamp');
        $this->db->from('funds');
        $this->db->join('user', 'funds.donor = user.id', 'inner');
        $this->db->where("timestamp BETWEEN '$from' AND '$to'");

        if ($donor != null) {
            $this->db->where('donor', $donor);
        }

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

    public function get_fund_sum($from, $to, $donor = null, $accepted = null, $transferred = null)
    {
        $this->db->select('SUM(amount) as amount');
        $this->db->from('funds');
        $this->db->where("timestamp BETWEEN '$from' AND '$to'");

        if ($donor != null) {
            $this->db->where('donor', $donor);
        }

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
        return $this->db->get()->result()[0]->amount;

    }

}

/* End of file report.php */
/* Location: ./application/models/report.php */