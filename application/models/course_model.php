<?php

class Course_model extends CI_Model
{
    //Returns a course based on its id
    public function get_by_id($courseId = -1)
    {
        if($courseId === -1)
        {
            log_message('error', 'Necessary params were not sent to Course_model.get_by_id');
        }
        else
        {
            $constraints = array(
                'id' => $courseId
            );

            return $this->db->get_where('pm_course', $constraints)->row();
        }
    }

    //Returns the courses that contain the query string
    public function get_like_title($collegeId = -1, $courseTitle = '')
    {
        if ($collegeId === -1 OR $courseTitle === '')
        {
            log_message('error', 'Necessary params were not sent to Course_model.get_like_title');
        }
        else
        {
            $this->db->select('pm_course.*, pm_dept.code as deptCode');
            $this->db->join('pm_dept', 'pm_dept.id = pm_course.deptId');
            $this->db->where('pm_dept.schoolId', $collegeId);
            $this->db->like('pm_course.title', $courseTitle);
            return $this->db->get('pm_course')->result();
        }
    }
}


/* End of course_model.php */