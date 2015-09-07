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
        redirect('/');
    }

    public function accept_funds($success = 0)
    {
        if ($this->ua->check_login() == 'admin') {

            $view_data = array(
                'user' => $this->USER_OBJ,
                'position' => $this->USER_OBJ->user_type,
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
                'position' => $this->USER_OBJ->user_type,
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
        if ($this->ua->check_login() == 'donor') {
            $transaction = array(
                'donor' => $this->USER_OBJ->id,
                'amount' => $this->input->post('amount'),
                'description' => $this->input->post('description'),
                'transaction_no' => $this->input->post('transaction_no')
            );
            $result = $this->fund->add($transaction);
            if ($result > 0) {
                //success
                redirect('/funds/status/1');
            } else {
                redirect('/funds/status/2');
            }
        } else {
            $this->load->view('401');
        }
    }

    public function add()
    {
        if ($this->ua->check_login() == 'donor') {
            $view_data = array(
                'user' => $this->USER_OBJ,
                'position' => $this->USER_OBJ->user_type,
            );
            $this->load->view('donor/donor_add_fund', $view_data);
        } else {
            $this->load->view('401');
        }
    }

    public function status($success = 0)
    {
        if ($this->ua->check_login() == 'donor') {
            $view_data = array(
                'user' => $this->USER_OBJ,
                'position' => $this->USER_OBJ->user_type,
                'success' => $success,
                'accepted' => $this->fund->get_accepted_funds($this->USER_OBJ->id),
                'pending' => $this->fund->get_pending_funds($this->USER_OBJ->id),
            );
            $this->load->view('donor/donor_fund_status', $view_data);
        } elseif ($this->ua->check_login() == 'cad') {
            $view_data = array(
                'user' => $this->USER_OBJ,
                'position' => $this->USER_OBJ->user_type,
                'success' => $success,
                'accepted' => $this->fund->get_accepted_funds(),
                'pending' => $this->fund->get_pending_funds(),
            );
            $this->load->view('cad/cad_fund_status', $view_data);
        }elseif($this->ua->check_login()=='student'){
            $view_data = array(
                'user' => $this->USER_OBJ,
                'position' => $this->USER_OBJ->user_type,
                'success' => $success,
                'funds' => $this->fund->get_transferred_funds($this->USER_OBJ->id),
            );
            $this->load->view('student/student_fund_status', $view_data);
        }
        else {
            $this->load->view('401');
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
                'position' => $this->USER_OBJ->user_type,
                'funds' => $this->fund->get_accepted_funds()
            );
            $view_data['success'] = $success;
            $this->load->view('admin/admin_accepted_funds', $view_data);

        } else {
            $this->load->view('401');
        }
    }

    public function transfer($success = 0)
    {
        if ($this->ua->check_login() == 'cad') {
            $view_data = array(
                'user' => $this->USER_OBJ,
                'position' => $this->USER_OBJ->user_type,
                'funds' => $this->fund->get_pending_transfers()
            );
            $view_data['success'] = $success;
            $this->load->view('cad/cad_transfer_funds', $view_data);
        } else {
            $this->load->view('401');
        }
    }

    public function transfer_fund()
    {
        if ($this->ua->check_login() == 'cad') {
            $id = $this->input->post('fund_id');
            if ($this->fund->transfer_fund($id) > 0) {
                redirect('/funds/transfer/1');
            }
        } else {
            $this->load->view('401');
        }
    }

}