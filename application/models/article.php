<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class article extends CI_Model {
    function __construct()
    {
        parent::__construct();
    }

    public function published_article_count()
    {
        $this->db->select('id');
        $this->db->from('article');
        $this->db->where('published',1);
        return $this->db->count_all_results();
    }

}

/* End of file article.php */
/* Location: ./application/models/article.php */