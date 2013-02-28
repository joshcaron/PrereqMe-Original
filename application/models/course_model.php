<?php

class Course_model extends CI_Model
{
    // Returns a course based on its id
    public function get_by_id($courseId = -1)
    {
        if($courseId === -1)
        {
            log_message('error', 'Necessary params were not sent to Course_model.get_by_id');
        }
        else
        {
            $constraints = array(
                'pm_course.id' => $courseId
            );

            $this->db->select('pm_course.*, pm_dept.code as deptCode');
            $this->db->join('pm_dept', 'pm_dept.id = pm_course.deptId');
            return $this->db->get_where('pm_course', $constraints)->row();
        }
    }

    // Returns the courses that contain the query string
    public function get_like_title($collegeId = -1, $query = '')
    {
        if ($collegeId === -1 OR $query === '')
        {
            log_message('error', 'Necessary params were not sent to Course_model.get_like_title');
            return array();
        }
        else
        {
            $this->db->select('pm_course.*, pm_dept.code as deptCode');
            $this->db->join('pm_dept', 'pm_dept.id = pm_course.deptId');
            $this->db->where('pm_dept.schoolId', $collegeId);
            $this->db->like('pm_course.title', $query);
            return $this->db->get('pm_course')->result();
        }
    }



    // Returns the course with the given id and all it's prereqs
    public function get_with_prereqs($courseId = -1) 
    {
        if ($courseId === -1)
        {
            log_message('error', 'Not a valid course sent to Course.get_with_prereqs');
            return NULL;
        }
        else 
        {
            $course = $this->get_by_id($courseId);
            $course->prereqs = $this->get_prereqs($course);
            return $course;
        }
    }

    // Returns the recursive prereqs for the course
    public function get_prereqs($course = NULL) 
    {
        if ($course === NULL)
        {
            log_message('error', 'Not a valid course sent to Course.get_prereqs');
            return array();
        }
        else
        {
            $this->db->select('pm_course.*');
            $this->db->where('pm_prereq.courseId', $course->id);
            $this->db->join('pm_course', 'pm_prereq.courseId = pm_course.id');
            $prereqs = $this->db->get('pm_prereq')->result();
            foreach ($prereqs as $prereq)
            {
                $prereq->prereqs = $this->get_prereqs($prereq);
            }
            return $prereqs;
        }
    }
}










/* End of course_model.php */