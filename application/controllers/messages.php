<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class messages extends CI_Controller
{
    var $USER_OBJ;

    function __construct()
    {
        parent::__construct();
        $this->load->model('message');
        $this->USER_OBJ = $this->session->userdata('user');

    }

    public function compose()
    {
        if (isset($this->USER_OBJ->id)) {
            $this->load->model('user');
            $compose_data = array(
                'user' => $this->USER_OBJ,
                'position' => 'Administrator',
                'users' => $this->user->get_user_list(),
            );
            $this->load->view('compose', $compose_data);
        } else {
            redirect('/');
        }
    }

    public function send()
    {
        $this->load->model('user');
        if (isset($this->USER_OBJ->id)) {
            $from = $this->USER_OBJ->id;
            $to = $this->input->post('to');
            $subject = $this->input->post('subject');
            $body = $this->input->post('body');

            foreach ($to as $receiver) {
                $this->send_individual_message($from, $receiver, $subject, $body);
            }

        } else {
            redirect('/');
        }
    }

    private function send_individual_message($from, $to, $subject, $body)
    {
        $this->message->save_message($from, $to, $subject, $body);
        $to_email = $this->user->get_user($to)->email;

        $body = $this->load->view('email_templates/message', array(
            'receiver_name' => $this->user->get_user($to)->first_name . " " . $this->user->get_user($to)->last_name,
            'sender_name' => $this->user->get_user($from)->first_name . " " . $this->user->get_user($from)->last_name,
            'body' => $body),
            true);

        if ($this->send_email($to_email, $subject, $body)) {
            redirect('/');
        } else {
            die();
        }
    }

    private function send_email($to, $subject, $body)
    {
        $this->load->library('email');

        $this->email->from('Colour A Dream Web Portal');
        $this->email->reply_to('info@imcds.org', 'IMCD');
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($body);
        $this->email->set_mailtype('html');
        if ($this->email->send() == 1) {
            return true;
        } else {
            echo $this->email->print_debugger();
        }


    }

    public function inbox()
    {
        if (isset($this->USER_OBJ->id)) {

            $inbox_messages = $this->message->get_inbox($this->USER_OBJ->id);
            $inbox_data = array(
                'user' => $this->USER_OBJ,
                'position' => 'Administrator',
                'inbox_messages' => $inbox_messages
            );
            $this->load->view('inbox', $inbox_data);
        } else {
            redirect('/');
        }
    }

    public function inbox_ajax()
    {
        $inbox_messages = $this->message->get_inbox($this->USER_OBJ->id);
        $inbox_data = array(
            'inbox_messages' => $inbox_messages
        );
        $this->load->view('inbox-ajax', $inbox_data);
    }


    public function mail_detail($message_id)
    {
        $message = $this->message->get_message($message_id);
        $this->message->mark_read($message_id);

        $this->load->view('mail-detail', array('message' => $message));
    }


    public function mark_unread($message_id)
    {
        $this->message->mark_unread($message_id);
        echo "success";
    }

    public function sentbox()
    {
        if (isset($this->USER_OBJ->id)) {

            $sentbox_messages = $this->message->get_sentbox($this->USER_OBJ->id);
            $sentbox_data = array(
                'user' => $this->USER_OBJ,
                'position' => 'Administrator',
                'sentbox_messages' => $sentbox_messages
            );
            $this->load->view('sentbox', $sentbox_data);
        } else {
            redirect('/');
        }
    }

    public function sentbox_ajax()
    {
        $sentbox_messages = $this->message->get_sentbox($this->USER_OBJ->id);
        $sentbox_data = array(
            'sentbox_messages' => $sentbox_messages
        );
        $this->load->view('sentbox-ajax', $sentbox_data);
    }

    public function sentmail_detail($message_id)
    {
        $message = $this->message->get_message($message_id);
        $this->message->mark_read($message_id);

        $this->load->view('sentmail-detail', array('message' => $message));
    }

    public function delete_message($message_id)
    {
        $this->message->delete($message_id);
        echo 'success';
    }

    public function notification()
    {
        if (isset($this->USER_OBJ->id)) {
            $inbox = $this->message->get_inbox($this->USER_OBJ->id, 5);
            $this->load->view('partial/mail_notification', array('notifications' => $inbox));
        } else {
            $message_ = '<li>
        <div class="text-center link-block">
            <a href="/">
                <i class="fa fa-sign-out"></i> Session Expired! <br/> <strong>Please Login Again</strong>
            </a>
        </div>
    </li>';
            echo $message_;
        }
    }

    public function get_inbox_count()
    {
        if (isset($this->USER_OBJ->id)) {
            echo '<div id="inbox-count">';
            echo $this->message->get_inbox_count($this->USER_OBJ->id, true);
            echo '</div>';
        } else {
            echo "error";
        }
    }


}

/* End of file messages.php */
/* Location: ./application/controllers/messages.php */