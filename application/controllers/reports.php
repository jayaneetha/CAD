<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class reports extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('report');
    }

    public function transaction_detail()
    {
        $from = $this->input->post('from');
        $to = $this->input->post('to');
        $accepted = $this->input->post('accepted');

        $transactions = $this->report->get_transaction_detail($from, $to, $accepted);
        $this->load->view('transaction_detailed_report',
            array(
                'transactions' => $transactions,
                'from' => $from,
                'to' => $to,
                'timestamp' => new DateTime('now')
            )
        );
    }
}

/* End of file reports.php */
/* Location: ./application/controllers/reports.php */