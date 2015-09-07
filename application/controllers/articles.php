<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Articles extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->model('article');

        $this->USER_OBJ = $this->session->userdata('user');

    }

    public function index()
    {
        redirect('/');
    }

    public function add_article($success = 0)
    {
        $user_type = $this->ua->check_login();
        if ($user_type == 'admin' OR $user_type == 'cad') {
            $view_data = array(
                'user' => $this->USER_OBJ,
                'position' => $this->USER_OBJ->user_type,
            );
            $view_data['success'] = $success;
            if ($user_type == 'admin') {
                $this->load->view('admin/admin_add_article', $view_data);
            }
            if ($user_type == 'cad') {
                $this->load->view('cad/cad_add_article', $view_data);

            }
        } else {
            $this->load->view('401');
        }
    }

    public function create_article()
    {
        $user_type = $this->ua->check_login();

        if ($user_type == 'admin' OR $user_type == 'cad') {
            $data = array(
                'title' => $this->input->post('title'),
                'body' => $this->input->post('body'),
            );
            if ($user_type == 'cad') {
                $data['published'] = 0;
            }
            $article_id = $this->article->add($data);
            if ($article_id > 0) {
                if ($user_type == 'admin') {
                    redirect('/articles/manage_articles/1');
                }
                if ($user_type == 'cad') {
                    redirect('/articles/add_article');
                }
            } else {
                redirect('/articles/add_article/2');
            }
        } else {
            $this->load->view('401');
        }
    }

    public function manage_articles($success = 0)
    {
        if ($this->ua->check_login() == 'admin') {
            $view_data = array(
                'user' => $this->USER_OBJ,
                'position' => $this->USER_OBJ->user_type,
                'articles' => $this->article->get_articles(),
            );
            $view_data['success'] = $success;
            $this->load->view('admin/admin_manage_articles', $view_data);
        } else {
            $this->load->view('401');
        }
    }

    public function get_single_article()
    {
        $this->ua->check_login();
        $id = $this->input->post('article_id');

        $data = $this->article->get_single_article($id);
        $this->load->view('json', array('data' => $data));
    }

    public function publish($id)
    {
        $this->ua->check_login();

        $affected_rows = $this->article->update($id, array('published' => 1));
        if ($affected_rows > 0) {
            redirect('/articles/manage_articles/2');
        } else {
            redirect('/articles/manage_articles/3');
        }
    }

    public function unpublish($id)
    {
        $this->ua->check_login();

        $affected_rows = $this->article->update($id, array('published' => 0));
        if ($affected_rows > 0) {
            redirect('/articles/manage_articles/2');
        } else {
            redirect('/articles/manage_articles/3');
        }
    }

    public function update_article()
    {
        $this->ua->check_login();

        $id = $this->input->post('article_id');

        $data = array(
            'title' => $this->input->post('title'),
            'body' => $this->input->post('body')
        );
        $affected_rows = $this->article->update($id, $data);
        if ($affected_rows > 0) {
            redirect('/articles/manage_articles/2');
        } else {
            redirect('/articles/manage_articles/3');
        }
    }

}

/* End of file articles.php */
/* Location: ./application/controllers/articles.php */