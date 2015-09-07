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
//        $this->load->view('404');
        redirect('/');
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
        $user_type = $this->ua->check_login();

        if ($user_type == 'donor' OR $user_type == 'student') {

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
            if ($user_type == 'donor') {
                $donor = $this->USER_OBJ->id;
            }

            if ($user_type == 'student') {
                $this->load->model('user');
                $donor = $this->user->get_student($this->USER_OBJ->id)->donor;
            }

            $view_data = array_merge($view_data, $this->fund_report_data($start, $end, $donor));

            if ($user_type == 'donor') {
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
            }

            if ($user_type == 'student') {
                switch ($type) {
                    case 'detailed':
                        $this->load->view('student/student_fund_detailed_report', $view_data);
                        break;
                    case 'detailed_print':
                        $this->load->view('student/student_fund_detailed_report_print', $view_data);
                        break;
                    default:
                        $this->load->view('404');
                }
            }


        } else {
            $this->load->view('401');
        }
    }

    public function student_results($type = 'latest', $print = false)
    {
        $user_type = $this->ua->check_login();
        if ($user_type == 'donor' OR $user_type == 'student') {
            date_default_timezone_set('Asia/Colombo');
            $this->load->helper('date');
            $this->load->model('result');
            $this->load->model('user');

            if ($user_type == 'donor') {
                $donor_id = $this->USER_OBJ->id;
            }
            if ($user_type == 'student') {
                $donor_id = $this->user->get_student($this->USER_OBJ->id)->donor;
            }

            $student = $this->user->get_student_from_donor($donor_id);
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

            if ($user_type == 'donor') {
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
            }

            if($user_type=='student'){
                if ($type == 'latest') {
                    if ($print == 'print') {
                        $this->load->view('student/student_student_results_print', $view_data);
                    } else {
                        $this->load->view('student/student_latest_student_results', $view_data);
                    }
                } elseif ($type == 'past') {
                    if ($print == 'print') {
                        $this->load->view('student/student_student_results_print', $view_data);
                    } else {
                        $this->load->view('student/student_past_student_results', $view_data);
                    }
                }
            }


        } else {
            $this->load->view('401');
        }
    }

    public function transaction($type, $print = false)
    {
        if ($this->ua->check_login() == 'admin') {
            date_default_timezone_set('Asia/Colombo');
            $this->load->helper('date');
            $this->load->config('cad');


            if (isset($_POST['start'])) {
                $start = $this->input->post('start');
                $end = $this->input->post('end');
                $show = $this->input->post('show_accepted');

            } else {
                $start = $this->config->item('imcd_start_date');
                $end = now("Asia/Colombo");
                $end = substr(unix_to_human($end), 0, 10);
                $show = null;
            }

            $view_data = array(
                'user' => $this->USER_OBJ,
                'position' => $this->USER_OBJ->user_type,
                'now' => unix_to_human(time()),
                'start' => $start,
                'end' => $end,
                'funds' => $this->report->get_fund_detailed($start, $end, null, $show),
                'accepted' => $this->report->get_fund_detailed($start, $end, null, true),
                'transferred' => $this->report->get_fund_detailed($start, $end, null, true, true),
                'sum_all' => $this->report->get_fund_sum($start, $end),
                'sum_accepted' => $this->report->get_fund_sum($start, $end, null, true),
                'sum_transferred' => $this->report->get_fund_sum($start, $end, null, true, true),
                'show' => $show,
            );

            switch ($type) {
                case 'detailed':
                    if ($print) {
                        $this->load->view('admin/admin_transaction_detailed_print', $view_data);
                    } else {
                        $this->load->view('admin/admin_transaction_detailed', $view_data);
                    }
                    break;
                case 'history':
                    if ($print) {
                        $this->load->view('admin/admin_transaction_history_print', $view_data);
                    } else {
                        $this->load->view('admin/admin_transaction_history', $view_data);
                    }
                    break;
                case 'summary':
                    if ($print) {
                        $this->load->view('admin/admin_transaction_summary_print', $view_data);
                    } else {
                        $this->load->view('admin/admin_transaction_summary', $view_data);
                    }
                    break;
                default:
                    $this->load->view('404');
                    break;
            }


        } else {
            $this->load->view('401');
        }


    }

    public function donors_birthday($print = false)
    {
        if ($this->ua->check_login() == 'admin') {
            date_default_timezone_set('Asia/Colombo');
            $this->load->helper('date');

            $DOB_list = $this->report->get_donors_birthday();

            $view_data = array(
                'user' => $this->USER_OBJ,
                'position' => $this->USER_OBJ->user_type,
                'now' => unix_to_human(time()),
                'DOB_list' => $DOB_list,
            );

            if ($print) {

                $this->load->view('admin/admin_donors_birthday_print', $view_data);
            } else {
                $this->load->view('admin/admin_donors_birthday', $view_data);
            }

        } else {
            $this->load->view('401');
        }
    }


}

/* End of file reports.php */
/* Location: ./application/controllers/reports.php */