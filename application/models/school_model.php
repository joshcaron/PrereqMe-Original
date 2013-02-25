<?php

class School_model extends CI_Model
{
    //Returns all of the schools
    public function get_all()
    {
        return $this->db->get('pm_school')->result();
    }
}

/* End of file school_model.php */