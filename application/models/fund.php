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

//SELECT cad_user.first_name,
//cad_user.last_name,
//cad_funds.amount,
//cad_funds.description,
//cad_funds.transaction_no,
//cad_funds.id
//FROM cad_funds INNER JOIN cad_student ON cad_funds.donor = cad_student.donor
//INNER JOIN cad_user ON cad_student.id = cad_user.id
//WHERE cad_funds.transferred = 0
    public function get_pending_transfers()
    {
        $this->db->select('user.first_name, user.last_name, funds.amount, funds.timestamp, funds.description, funds.transaction_no, funds.id');
        $this->db->from('funds');
        $this->db->join('student', 'funds.donor=student.donor', 'inner');
        $this->db->join('user', 'student.id=user.id', 'inner');
        $this->db->where('funds.accepted', 1);
        $this->db->where('funds.transferred', 0);
        return $this->db->get()->result();
    }

    public function transfer_fund($id)
    {
        $this->db->where('id', $id);
        $this->db->update('funds', array('transferred' => 1, 'transfer_timestamp' => 'CURRENT_TIMESTAMP'));
        return $this->db->affected_rows();
    }

}

/* End of file fund.php */
/* Location: ./application/models/fund.php */