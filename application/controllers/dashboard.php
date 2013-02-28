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
            redirect('/home/', 'logout');
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

            $data['title'] = 'My Plan - PrereqMe';
            $data['semesters'] = $semesters;
            $data['schoolSemesters'] = $schoolSemesters;

            $this->load->view('templates/header', $data);
            $this->load->view('dashboard/my_plan', $data);
            $this->load->view('templates/footer');
        }
        else
        {
            redirect('/home/', 'logout');
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
            redirect('/home/', 'logout');
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
            redirect('/home/', 'logout');
        }
    }

    //Adds a new semester and reloads the my_plan page
    //Expected params in post: title
    public function add_semester()
    {
        $this->form_validation->set_rules('semesterId', 'Semester', 'required');
        $this->form_validation->set_rules('year', 'Year', 'required');

        if( $this->form_validation->run())
        {
            $semesterId = $this->input->post('semesterId');
            $year = $this->input->post('year');
            $userId = $this->session->userdata('user_id');
            $this->user_course_model->add_semester($userId, $semesterId, $year);
        }
        $this->my_plan();
    }

    //Performs a search and prints an array of titles
    //Used by an AJAX call for the search typeahead
    public function search()
    {
        $collegeId = $this->input->get('collegeId');
        $query = $this->input->get('term'); //use 'term' instead of 'query' here because it is automatically set by jQueryUI

        if($collegeId === FALSE || $query === FALSE)
        {
            log_message('error', 'GET Params were not received by dashboard.search');
        }
        else
        {
            $fullCourses = $this->course_model->get_like_title($collegeId, $query);

            $courseTitles = array();

            foreach($fullCourses as $course)
            {
                $courseTitles[] = $course->title;
            }

            $data['response'] = $courseTitles;
            $this->load->view('json', $data);
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
            $this->course_model
        }
    }
}

/* End of file signup.php */