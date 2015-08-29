<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Funds extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->model('fund');

        $this->USER_OBJ = $this->session->userdata('user');

    }

    public function index()
    {
        redirect('/funds/accept_funds');
    }

    public function accept_funds($success = 0)
    {
        if ($this->ua->check_login() == 'admin') {

            $view_data = array(
                'user' => $this->USER_OBJ,
                'position' => 'Administrator',
                'funds' => $this->fund->get_pending_funds()
            );
            $view_data['success'] = $success;
            $this->load->view('admin/admin_accept_funds', $view_data);

        } else {
            $this->load->view('401');
        }
    }

    public function get_single_fund()
    {
        $id = $this->input->post('fund_id');
        $this->ua->check_login();
        $this->load->view('json', array('data' => $this->fund->get_single_fund($id)));
    }

    public function accept_fund()
    {
        $id = $this->input->post('fund_id');

        $this->fund->accept_fund($id);

        $FUND_OBJ = $this->fund->get_single_fund($id);

        $receipt_data = array(
            'receipt_type' => 'Fund',
            'receiver' => $FUND_OBJ->donor,
            'transaction_id' => $FUND_OBJ->id,
            'total' => $FUND_OBJ->amount
        );

        $receipt_id = $this->fund->add_receipt($receipt_data);

        if ($receipt_id > 0) {

            $this->load->model('user');

            $receipt = $this->fund->get_single_receipt($receipt_id);

            $view_data = array(
                'user' => $this->USER_OBJ,
                'position' => 'Administrator',
                'receipt' => $receipt,
                'receiver' => $this->user->get_donor($receipt->receiver),
                'transaction' => $this->fund->get_single_fund($receipt->transaction_id)
            );

            $this->load->view('admin/admin_accept_fund_receipt', $view_data);
        } else {
            $this->load->view('500');
        }

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

    public function reject_fund()
    {
        $fund_id = $this->input->post('fund_id');
        $this->fund->reject_fund($fund_id);
        redirect('/funds/accept_funds/2');
    }


    public function accepted_funds($success = 0)
    {
        if ($this->ua->check_login() == 'admin') {

            $view_data = array(
                'user' => $this->USER_OBJ,
                'position' => 'Administrator',
                'funds' => $this->fund->get_accepted_funds()
            );
            $view_data['success'] = $success;
            $this->load->view('admin/admin_accepted_funds', $view_data);

        } else {
            $this->load->view('401');
        }
    }

}