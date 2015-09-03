<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Backup extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    public function add($data)
    {
        $this->db->insert('backups', $data);
        return $this->db->insert_id();
    }

    public function past_backups()
    {
        $this->db->from('backups');
        $this->db->order_by('created_at', 'DESC');
        return $this->db->get()->result();
    }

    public function get_single_backup($id)
    {
        $this->db->from('backups');
        $this->db->where('id', $id);
        $query = $this->db->get();

        if ($query->num_rows() == 0) {
            return false;
        } else {
            return $query->result()[0];
        }
    }

    public function is_backup_name_exists($name)
    {
        $this->db->select('filename');
        $this->db->from('backups');
        $this->db->where('filename', $name);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return false;
        } else {
            return true;
        }
    }

    public function delete($id)
    {
        $this->db->where('id',$id);
        $this->db->delete('backups');
    }


}

/* End of file backup.php */
/* Location: ./application/models/backup.php */