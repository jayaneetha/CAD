<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Funds extends CI_Controller
{
    function __construct()
    {
        parent::_construct();
        $this->load->model('fund');
    }

    public function add_fund()
    {
        $transaction = array(
            'donor' => $this->session->userdata('user')->user_id,
            'amount' => $this->input->post('amount'),
            'description' => $this->input->post('description'),
            'transaction_no' => $this->input->post('transaction_no')
        );
        $result = $this->fund->add($transaction);
        if ($result != 0) {
            $this->load->view('add_fund', array('success' => false));
        } else {
            $this->load->view('add_fund', array('success' => true));
        }
    }

    public function view_funds()
    {
        $user_id = $this->session->userdata('user')->user_id;
        $funds = $this->fund->get_funds($user_id);
        $this->load->view('view_funds',$funds);
    }

}