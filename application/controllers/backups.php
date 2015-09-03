<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Backups extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        $this->USER_OBJ = $this->session->userdata('user');

        $this->load->model('backup');
    }

    public function index($success = 0)
    {
        if ($this->ua->check_login() == 'admin') {
            $view_data = array(
                'user' => $this->USER_OBJ,
                'position' => $this->USER_OBJ->user_type,
                'success' => $success,
                'backups' => $this->backup->past_backups()
            );
            $this->load->view('admin/admin_backup', $view_data);
        } else {
            $this->load->view('401');
        }
    }

    public function create()
    {
        if ($this->ua->check_login() == 'admin') {
            date_default_timezone_set('Asia/Colombo');

            $this->load->helper('date');
            $this->load->helper('file');
            $this->load->helper('download');

            $this->load->dbutil();

            $name = $this->input->post('name');
            $download = $this->input->post('download');

            if (!$this->backup->is_backup_name_exists($name . '.sql')) {
                //No entries in the database with the filename
                if ($name == '') {
                    //filename is empty
                    $name = date(DATE_W3C, time());
                }
            } else {
                //An entry exists with the filename. timestamp is tailed to the filename
                $name = $name . '-' . date(DATE_W3C, time());
            }

            $name = $name . '.sql';

            $prefs = array(
                'ignore' => array(),                     // List of tables to omit from the backup
                'format' => 'txt',                       // gzip, zip, txt
                'filename' => $name,                       // File name - NEEDED ONLY WITH ZIP FILES
                'add_drop' => TRUE,                        // Whether to add DROP TABLE statements to backup file
                'add_insert' => TRUE,                        // Whether to add INSERT data to backup file
                'newline' => "\n"                         // Newline character used in backup file
            );

            $backup = $this->dbutil->backup($prefs);

            write_file('./backups/' . $name, $backup);

            $backup_id = $this->backup->add(array('filename' => $name));

            if ($backup_id > 0) {
                if ($download == 'download') {
                    force_download($name, $backup);
                }
                redirect('/backups/index/1');
            } else {
                redirect('/backups/index/2');
            }
        } else {
            $this->load->view('401');
        }
    }

    public function download($id)
    {

        if ($this->ua->check_login() == 'admin') {
            $backup = $this->backup->get_single_backup($id);

            if ($backup) {
                $name = $backup->filename;

                $this->load->helper('file');
                $this->load->helper('download');

                $file = read_file('./backups/' . $name);

                force_download($name, $file);

            } else {
                $this->load->view('404');
            }
        } else {
            $this->load->view('401');
        }
    }

    public function delete()
    {
        if ($this->ua->check_login() == 'admin') {
            $id = $this->input->post('id');
            $password = sha1($this->input->post('password'));
            if ($password == $this->USER_OBJ->password) {

                $backup = $this->backup->get_single_backup($id);

                $this->backup->delete($id);

                $this->load->helper('file');

                unlink('./backups/' . $backup->filename);

                redirect('/backups/index/3');

            } else {
                redirect('/backups/index/5');
            }
        } else {
            $this->load->view('401');
        }
    }


}

/* End of file backups.php */
/* Location: ./application/controllers/backups.php */