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
        $this->db->insert('funds', $transaction);
        return $this->db->insert_id();
    }

    public function pending_transaction_count()
    {
        $this->db->select('id');
        $this->db->from('funds');
        $this->db->where('accepted', 0);
        return $this->db->count_all_results();
    }

    public function get_pending_funds($donor = null)
    {
        $this->db->select('first_name, last_name, funds.id, amount, description, timestamp, transaction_no');
        $this->db->from('funds');
        $this->db->join('user', 'funds.donor=user.id', 'inner');
        $this->db->where('accepted', 0);
        if ($donor != null) {
            $this->db->where('funds.donor', $donor);
        }
        return $this->db->get()->result();
    }

    public function get_single_fund($id)
    {
        $this->db->select('first_name, last_name, funds.id, donor, amount, description, timestamp, transaction_no');
        $this->db->from('funds');
        $this->db->join('user', 'funds.donor=user.id', 'inner');
        $this->db->where('funds.id', $id);
        return $this->db->get()->result()[0];
    }

    public function accept_fund($id)
    {
        $this->db->where('id', $id);
        $this->db->update('funds', array('accepted' => 1));
    }

    public function reject_fund($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('funds');
    }

    public function add_receipt($data)
    {
        $this->db->insert('receipt', $data);
        return $this->db->insert_id();
    }

    public function get_single_receipt($id)
    {
        $this->db->from('receipt');
        $this->db->where('id', $id);
        return $this->db->get()->result()[0];
    }

    public function get_accepted_funds($donor = null)
    {
        $this->db->select('first_name, last_name, funds.id, donor, amount, description, timestamp, transaction_no, transferred, transfer_timestamp');
        $this->db->from('funds');
        $this->db->join('user', 'funds.donor=user.id', 'inner');
        $this->db->where('accepted', 1);
        if ($donor != null) {
            $this->db->where('funds.donor', $donor);
        }
        return $this->db->get()->result();
    }

    public function get_receipt_from_transaction_id($transaction_id)
    {
        $this->db->select('id');
        $this->db->from('receipt');
        $this->db->where('transaction_id', $transaction_id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result()[0]->id;
        } else {
            return null;
        }
    }

    public function get_transaction_status($donor)
    {

    }

}

/* End of file fund.php */
/* Location: ./application/models/fund.php */