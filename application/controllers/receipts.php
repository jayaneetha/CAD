<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class receipts extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function print_receipt($type, $id)
    {
        switch ($type) {
            case 'fund_accept':
                $this->fund_accept($id);
                break;
            default:
                $this->load->view('404');
        }
    }

    private function fund_accept($id)
    {
        $this->load->model('fund');
        if (substr($id, 0, 1) == 'f') {
            $transaction_id = substr($id, 1, strlen($id));
            $id = $this->fund->get_receipt_from_transaction_id($transaction_id);
        }

        $this->ua->check_login();
        $this->load->model('user');

        $receipt = $this->fund->get_single_receipt($id);

        $view_data = array(
            'receipt' => $receipt,
            'receiver' => $this->user->get_donor($receipt->receiver),
            'transaction' => $this->fund->get_single_fund($receipt->transaction_id)
        );

        $this->load->view('admin/admin_accept_fund_receipt_print', $view_data);

    }


}

/* End of file receipts.php */
/* Location: ./application/controllers/receipts.php */