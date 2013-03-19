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

            $course = $this->db->get_where('pm_course', $constraints)->row();

            if(is_object($course))
            {
                return $course;
            }
            else
            {
                return NULL;
            }
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
            $code = preg_replace("/[^0-9,.]/", "", $query);

            $midPoint = strrpos($query, '-');
            if($midPoint !== FALSE)
            {
                $query = trim(substr($query, $midPoint + 1));
            }
            print_r($query);

            $this->db->select('pm_course.*, pm_dept.code as deptCode');
            $this->db->join('pm_dept', 'pm_dept.id = pm_course.deptId');
            $this->db->where('pm_dept.schoolId', $collegeId);
            $this->db->like('pm_course.title', $query);
            $this->db->or_like('pm_course.code', $code);
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

    // Returns the prereqs for the course
    // $recursive - whether or not to get the prereqs prereqs, and so on
    public function get_prereqs($course = NULL, $recursive = FALSE) 
    {
        if ($course === NULL)
        {
            log_message('error', 'Not a valid course sent to Course.get_prereqs');
            return array();
        }
        else
        {
            $this->db->select('pm_course.*, pm_dept.code as deptCode');
            $this->db->where('pm_prereq.courseId', $course->id);
            $this->db->join('pm_course', 'pm_prereq.prereqId = pm_course.id');
            $this->db->join('pm_dept', 'pm_dept.id = pm_course.deptId');
            $prereqs = $this->db->get('pm_prereq')->result();
            
            //Get each prereq's prereqs
            if($recursive)
            {
                foreach ($prereqs as $prereq)
                {
                    $prereq->prereqs = $this->get_prereqs($prereq, TRUE);
                }
            }
            return $prereqs;
        }
    }
}

/* End of course_model.php */