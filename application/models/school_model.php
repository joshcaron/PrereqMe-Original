<?php

class School_model extends CI_Model
{
    //Returns all of the schools
    public function get_all()
    {
        return $this->db->get('pm_school')->result();
    }

    //Returns all of the departments for the school
    public function get_departments($schoolId = -1)
    {
        if($schoolId === -1)
        {
            log_message('error', 'Necessary params not sent to School_model.get_categories()');
            return array();
        }
        else
        {
            $constraints = array(
                'schoolId' => $schoolId
            );

            return $this->db->get_where('pm_dept', $constraints)->result();
        }
    }

    //Returns all of the majors for the department
    public function get_majors($deptId = -1)
    {
        if($deptId === -1)
        {
            log_message('error', 'Necessary params not sent to School_model.get_majors()');
            return array();
        }
        else
        {
            $constraints = array(
                'deptId' => $deptId
            );

            return $this->db->get_where('pm_major', $constraints)->result();
        }
    }

    //Gets semesters for the school
    public function get_semeseters($schoolId = -1)
    {
        if($schoolId === -1)
        {
            log_message('error', 'Necessary params not sent to School_model.get_semeseters()');
            return array();
        }
        else
        {
            $constraints = array(
                'schoolId' => $schoolId
            );

            return $this->db->get_where('pm_semester', $constraints)->result();
        }
    }
}

/* End of file school_model.php */