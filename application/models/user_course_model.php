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

            $this->db->select('pm_user_semester.*, pm_semester.title');
            $this->db->join('pm_semester', 'pm_semester.id = pm_user_semester.semesterId');
            $this->db->order_by('pm_user_semester.year', 'desc');
            $this->db->order_by('pm_semester.id', 'desc'); 

            $semesters = $this->db->get_where('pm_user_semester', $constraints)->result();

            $completedCourseIds = array();

            //Gets the courses for each semester
            foreach(array_reverse($semesters) as $semester)
            {
                $semester->courses = $this->get_courses_for_semester($userId, $semester->id);
            }

            return  $semesters;
        }
    }

    //Gets all the courses with the given semester id
    public function get_courses_for_semester($userId = -1, $semesterId = -1)
    {
        if($userId === -1 OR $semesterId === -1)
        {
            log_message('error', 'Not a valid semesterId sent to Course.get_courses_for_semester');
            return array();
        }
        else
        {
            $constraints = array(
                'semesterId' => $semesterId,
                'userId' => $userId
            );

            $this->db->select('pm_course.*, pm_dept.code as deptCode');
            $this->db->join('pm_course', 'pm_course.id = pm_user_course.courseId');
            $this->db->join('pm_dept', 'pm_course.deptId = pm_dept.id');
            
            $courses = $this->db->get_where('pm_user_course', $constraints)->result();

            //Gets the prerequisites for each course
            foreach($courses as $course)
            {
                $course->prereqs = $this->course_model->get_prereqs($course, FALSE);
            }

            return $courses;
        }
    }

    //Inserts the course into the semester
    public function add_course_to_semester($courseId = -1, $semesterId = -1, $userId = -1)
    {
        if($courseId === -1 OR $semesterId === -1 OR $userId === -1)
        {
            log_message('error', 'Not valid params sent to Course.add_course_to_semester');
        }
        else
        {
            $data = array(
                'semesterId' => $semesterId,
                'courseId' => $courseId,
                'userId' => $userId
            );

            $this->db->insert('pm_user_course', $data);
            return $this->db->insert_id();
        }
    }

    //Deletes the course from the user
    public function delete_course_from_user($courseId = -1, $semesterId = -1, $userId = -1)
    {
        if($courseId === -1 OR $semesterId === -1 OR $userId === -1)
        {
            log_message('error', 'Not valid params sent to Course.delete_course_from_user');
        }
        else
        {
            $constraints = array(
                'semesterId' => $semesterId,
                'courseId' => $courseId,
                'userId' => $userId
            );

            $this->db->delete('pm_user_course', $constraints);
        }
    }

    //Deletes the semester and all the courses connected to it
    public function delete_semester($semesterId = -1)
    {
        if($semesterId <= 0)
        {
            log_message('error', 'Not valid params sent to Course.delete_semester');
        }
        else
        {
            $constraints = array(
                'id' => $semesterId
            );

            //Delete semester
            $this->db->delete('pm_user_semester', $constraints);

            $constraints = array(
                'semesterId' => $semesterId
            );

            //Delete courses
            $this->db->delete('pm_user_course', $constraints);
        }
    }

    //Changes the semester of the course
    public function change_semester($courseId = -1, $semesterId = -1, $userId = -1)
    {
        if($courseId === -1 OR $semesterId === -1 OR $userId === -1)
        {
            log_message('error', 'Not valid params sent to Course.change_semester');
        }
        else
        {
            $data = array(
                'semesterId' => $semesterId
            );

            $this->db->where('courseId', $courseId);
            $this->db->where('userId', $userId);

            $this->db->update('pm_user_course', $data);
        }
    }

    //Inserts the new semester
    public function add_semester($userId = -1, $semesterId = -1, $year = -1)
    {
        if($userId === -1 OR $semesterId === -1 OR $year === -1)
        {
            log_message('error', 'Not valid params sent to Course.add_semester');
        }
        else
        {
            $data = array(
                'userId' => $userId,
                'semesterId' => $semesterId,
                'year' => $year
            );

            $this->db->insert('pm_user_semester', $data);
            return $this->db->insert_id();
        }
    }

    //Move course to semester
    public function move_course($courseId = -1, $semesterId = -1, $userId = -1)
    {
        if($courseId === -1 OR $semesterId === -1 OR $userId === -1)
        {
            log_message('error', 'Not valid params sent to User_course_model.move_course');
        }
        else
        {
            //Deletes the course from any current semester
            $data = array(
                'courseId' => $courseId,
                'userId' => $userId
            );

            $this->db->delete('pm_user_course', $data);

            //Adds the course to the new semester
            $newData = array(
                'semesterId' => $semesterId,
                'courseId' => $courseId,
                'userId' => $userId
            );

            $this->db->insert('pm_user_course', $newData);
            return $this->db->insert_id();
        }
    }

    //Returns whether the user has already added the semester
    public function has_semester($semesterId = -1, $year = -1, $userId = -1)
    {
        if($semesterId === -1 OR $year === -1 OR $userId === -1)
        {
            log_message('error', 'Not valid params sent to User_course_model.has_semester');
        }
        else
        {
            $constraints = array(  
                'semesterId ' => $semesterId,
                'year' => $year,
                'userId' => $userId
            );
            $this->db->where($constraints);
            $this->db->from('pm_user_semester');
            return $this->db->count_all_results() == 1;
        }
    }

    //Returns whether the user has already added the course
    public function has_course($courseId = -1, $userId = -1)
    {
        if($courseId === -1 OR $userId === -1)
        {
            log_message('error', 'Not valid params sento to User_course_model.has_course()');
        }
        else
        {
            $constraints = array(
                'courseId' => $courseId,
                'userId' => $userId
            );
            $this->db->where($constraints);
            $this->db->from('pm_user_course');
            return $this->db->count_all_results() > 0;
        }
    }

    //Get the courses based on the supplied filters
    public function get_courses_by_filters($deptId = -1)
    {
        $this->db->select('pm_course.*, pm_dept.code as deptCode');
        $this->db->join('pm_dept', 'pm_dept.id = pm_course.deptId');
        $this->db->where('pm_course.deptId', $deptId);
        return $this->db->get('pm_course')->result();
    }
}

/* End of file user_course_model.php */