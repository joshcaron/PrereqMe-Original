<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends PM_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    //Loads the homepage of the dashboard
    public function index()
    {
        if( parent::_is_logged_in() )
        {
            $data['title'] = 'Dashboard - PrereqMe';

            $this->load->view('templates/header', $data);
            $this->load->view('dashboard/index', $data);
            $this->load->view('templates/footer');
        }
        else
        {
            redirect('/home/logout');
        }
    }

    //Loads the my plan page of the dashboard
    public function my_plan()
    {
        if( parent::_is_logged_in() )
        { 
            $userId = $this->session->userdata('user_id');
            $schoolId = $this->session->userdata('school_id');
            $semesters = $this->user_course_model->get_semesters($userId);
            $schoolSemesters = $this->school_model->get_semeseters($schoolId);
            $courseDump = $this->user_course_model->get_courses_for_semester($userId, 0);

            $data['title'] = 'My Plan - PrereqMe';
            $data['semesters'] = $semesters;
            $data['schoolSemesters'] = $schoolSemesters;
            $data['courseDump'] = $courseDump;

            $this->load->view('templates/header', $data);
            $this->load->view('dashboard/my_plan', $data);
            $this->load->view('templates/footer');
        }
        else
        {
            redirect('/home/logout');
        }
    }

    //Loads the browse page of the dashboard
    public function browse()
    {
        if( parent::_is_logged_in() )
        {
            $data['title'] = 'Browse - PrereqMe';

            $this->load->view('templates/header', $data);
            $this->load->view('dashboard/browse', $data);
            $this->load->view('templates/footer');
        }
        else
        {
            redirect('/home/logout');
        }
    }

    //Loads the help page of the dashboard
    public function help()
    {
        if( parent::_is_logged_in() )
        {
            $data['title'] = 'Help - PrereqMe';

            $this->load->view('templates/header', $data);
            $this->load->view('dashboard/help', $data);
            $this->load->view('templates/footer');
        }
        else
        {
            redirect('/home/logout');
        }
    }

    //Adds a new semester and reloads the my_plan page
    //Expected params in post: title
    public function add_semester()
    {
        $this->form_validation->set_rules('year', 'Year', 'required');
        $this->form_validation->set_rules('semesterId', 'Semester', 'callback_duplicate_semester');

        if( $this->form_validation->run())
        {
            $semesterId = $this->input->post('semesterId');
            $year = $this->input->post('year');
            $userId = $this->session->userdata('user_id');

            $this->user_course_model->add_semester($userId, $semesterId, $year);

            redirect('/dashboard/my_plan');
        }
        else
        {
            $this->my_plan();
        }
    }

    public function duplicate_semester($semesterId)
    {
        if($semesterId !== FALSE && $semesterId > 0)
        {
            $year = $this->input->post('year');
            $userId = $this->session->userdata('user_id');
            return ! $this->user_course_model->has_semester($semesterId, $year, $userId);
        }
        else
        {
            return FALSE;
        }
    }

    //Gets a course based on its title
    //Used by an AJAX call to add courses to your dump
    public function get_course_by_title()
    {
        $title = $this->input->get('title');

        if($title === FALSE)
        {
            log_message('error', 'Title was not received by dashboard.get_course_by_title');
        }
        else
        {
            //Retrieves the course
            $collegeId = $this->session->userdata('school_id');
            $courses = $this->course_model->get_like_title($collegeId, $title);

            $data = array();

            if(count($courses) > 0)
            {
                //Adds the course to the user
                $course = $courses[0];
                $userId = $this->session->userdata('user_id');

                //Sees if it wa

                $this->user_course_model->add_course_to_semester($course->id, 0, $userId);

                //Sends back the JSON of the course
                $data['response'] = $course;
            }


            $this->load->view('json', $data);
        }
    }

    //Removes the course from the user
    public function delete_course_from_user()
    {
        $courseId = $this->input->get('courseId');
        $semesterId = $this->input->get('semesterId');

        if($courseId === FALSE OR $semesterId === FALSE)
        {
            log_message('error', 'Necessary params were not received by dasboard.delete_course_by_id');
        }
        else
        {
            $userId = $this->session->userdata('user_id');

            $this->user_course_model->delete_course_from_user($courseId, $semesterId, $userId);
        }
    }

    //Removes the semester from the user and all the courses associated with it
    public function delete_semester_from_user()
    {
        $semesterId = $this->input->get('semesterId');

        if($semesterId === FALSE)
        {
            log_message('error', 'SemesterId not received by dasboard.delete_course_by_id');
        }
        else
        {
            $this->user_course_model->delete_semester($semesterId);
        }
    }

    //Changes the semester of the course to a new semester
    public function change_semester()
    {
        $courseId = $this->input->get('courseId');
        $semesterId = $this->input->get('semesterId');

        if($courseId === FALSE OR $semesterId === FALSE)
        {
            log_message('error', 'Necessary params were not received by dasboard.change_semester');
        }
        else
        {
            $userId = $this->session->userdata('user_id');

            $this->user_course_model->change_semester($courseId, $semesterId, $userId);
        }
    }
}

/* End of file signup.php */