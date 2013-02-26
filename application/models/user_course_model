<?php

class User_course_model extends CI_Model
{
        // Gets all the semesters with their respective courses
    public function get_semesters($userId = -1)
    {
        if($userId === -1)
        {
            log_message('error', 'Not a valid userId sent to Course.get_semesters');
            return array();
        }
        else
        {
            $constraints = array(
                'userId' => $userId
            );

            $semesters = $this->db->get_where('pm_user_semester', $constraints)->result();

            //Gets the courses for each semester
            foreach($semesters as $semester)
            {
                $semester->courses = $this->_get_courses_for_semester($semester->id);
            }

            return $semesters;
        }
    }

    //Gets all the courses with the given semester id
    private function _get_courses_for_semester($semesterId = -1)
    {
        if($userId === -1)
        {
            log_message('error', 'Not a valid semesterId sent to Course.get_courses_for_semester');
            return array();
        }
        else
        {
            $constraints = array(
                'semesterId' => $semesterId
            );

            $this->db->select('pm_course.*');
            $this->db->join('pm_course', 'pm_course.id = pm_user_course.courseId');
            
            return $this->db->get_where('pm_user_course', $constraints)->result();
        }
    }

    //Inserts the course into the semester
    public function add_course_to_semester($courseId = -1, $semesterId = -1)
    {
        if($courseId === -1 OR $semesterId === -1)
        {
            log_message('error', 'Not valid params sent to Course.add_course_to_semester');
        }
        else
        {
            $data = array(
                'semesterId' => $semesterId,
                'courseId' => $courseId
            );

            $this->db->insert('pm_user_course', $data);
            return $this->db->insert_id();
        }
    }

    //Inserts the new semester
    public function add_semester($title = '', $userId = -1)
    {
        if($title === '' OR $userId === -1)
        {
            log_message('error', 'Not valid params sent to Course.add_semester');
        }
        else
        {
            $data = array(
                'title' => $title,
                'userId' => $userId
            );

            $this->db->insert('pm_user_semeseter', $data);
            return $this->db->insert_id();
        }
    }


}

/* End of file user_course_model.php