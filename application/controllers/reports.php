<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Reports extends CI_Controller
{
    var $USER_OBJ = false;

    function __construct()
    {
        parent::__construct();
        $this->load->model('report');

        $this->USER_OBJ = $this->session->userdata('user');

    }

    public function index()
    {
        $this->load->view('404');
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

    private function fund_report_data($from, $to, $donor)
    {
        $data = array(
            'funds_all' => $this->report->get_fund_summary($from, $to, $donor),
            'funds_accepted' => $this->report->get_fund_summary($from, $to, $donor, true),
            'funds_transferred' => $this->report->get_fund_summary($from, $to, $donor, true, true),
            'start' => $from,
            'end' => $to,
        );
        return $data;
    }

    public function fund_report($type)
    {
        if ($this->ua->check_login() == 'donor') {
            date_default_timezone_set('Asia/Colombo');
            $this->load->helper('date');
            $this->load->config('cad');

            if (isset($_POST['start'])) {
                $start = $this->input->post('start');
                $end = $this->input->post('end');

            } else {
                $start = $this->config->item('imcd_start_date');
                $end = now("Asia/Colombo");
                $end = substr(unix_to_human($end), 0, 10);
            }

            $view_data = array(
                'user' => $this->USER_OBJ,
                'position' => $this->USER_OBJ->user_type,
                'now' => unix_to_human(time()),
            );

            $view_data = array_merge($view_data, $this->fund_report_data($start, $end, $this->USER_OBJ->id));

            switch ($type) {
                case 'summary':
                    $this->load->view('donor/donor_fund_report', $view_data);
                    break;
                case 'summary_print':
                    $this->load->view('donor/donor_fund_report_print', $view_data);
                    break;
                case 'detailed':
                    $this->load->view('donor/donor_fund_detailed_report', $view_data);
                    break;
                case 'detailed_print':
                    $this->load->view('donor/donor_fund_detailed_report_print', $view_data);
                    break;
                default:
                    $this->load->view('404');

            }
        } else {
            $this->load->view('401');
        }
    }

    public function student_results($type = 'latest', $print = false)
    {
        if ($this->ua->check_login() == 'donor') {
            date_default_timezone_set('Asia/Colombo');
            $this->load->helper('date');
            $this->load->model('result');
            $this->load->model('user');

            $student = $this->user->get_student_from_donor($this->USER_OBJ->id);
            $stc = $this->result->get_latest_stc($student->id);
            $stc_list = $this->result->get_stc_list($student->id);


            if ($type == 'past') {
                if (isset($_POST['stc_id'])) {
                    $stc = $this->result->get_stc($this->input->post('stc_id'));
                }
            }

            $marks = $this->result->get_subject_marks($stc->id);

            $view_data = array(
                'user' => $this->USER_OBJ,
                'position' => $this->USER_OBJ->user_type,
                'now' => unix_to_human(time()),
                'student' => $student,
                'stc' => $stc,
                'marks' => $marks,
                'stc_list' => $stc_list,
            );

            if ($type == 'latest') {
                if ($print == 'print') {
                    $this->load->view('donor/donor_student_results_print', $view_data);

                } else {
                    $this->load->view('donor/donor_latest_student_results', $view_data);
                }
            } elseif ($type == 'past') {
                if ($print == 'print') {
                    $this->load->view('donor/donor_student_results_print', $view_data);

                } else {
                    $this->load->view('donor/donor_past_student_results', $view_data);
                }
            }


        } else {
            $this->load->view('401');
        }

    }
}

/* End of file reports.php */
/* Location: ./application/controllers/reports.php */