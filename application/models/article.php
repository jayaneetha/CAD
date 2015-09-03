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

    public function add($data)
    {
        $this->db->insert('article', $data);
        return $this->db->insert_id();
    }

    public function update($id, $data)
    {
        $this->db->where('id',$id);
        $this->db->update('article',$data);
        return $this->db->affected_rows();
    }

    public function get_articles()
    {
        $this->db->from('article');
        return $this->db->get()->result();
    }

    public function get_single_article($id)
    {
        $this->db->from('article');
        $this->db->where('id',$id);
        return $this->db->get()->result()[0];
    }
}

/* End of file article.php */
/* Location: ./application/models/article.php */