<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Test extends CI_Controller
{
    public function index(){
        $this->test2('login');
    }

    public function test2($view)
    {
        $this->load->view($view);
    }

    public function admin($view)
    {
        $this->load->view('admin/' . $view);
    }

    public function donor($view)
    {
        $this->load->view('donor/' . $view);
    }
    public function cad($view)
    {
        $this->load->view('cad/' . $view);
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */