<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Course extends PM_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    // Displays the course detail page
    // NOTE: there are two ways to retrieve course:
    // 1. Passed as a variable (such as from search function)
    // 2. Sent by GET (from a view)
    public function view($course = NULL)
    {
        //If course wasn't sent, retrieve courseId from GET and course from course_model
        if($course === NULL)
        {
            $courseId = $this->input->get('courseId');
            $course = $this->course_model->get_by_id($courseId);
        }

        if($course === NULL)
        {
            log_message('error', 'course was not sent to Course.view as an argument or it was not pulled from DB');
        }
        else
        {
            //Retrieve recursive prereqs for the course
            $course->prereqs = $this->course_model->get_prereqs($course);

            $data['title'] = 'Course detail - PrereqMe';
            $data['course'] = $course;

            $this->load->view('templates/header', $data);
            $this->load->view('pages/course', $data);
            $this->load->view('templates/footer');
        }
    }

    // Performs search
    // Displays course detail page if exactly one course was found
    // Otherwise, displays search results page
    public function search_results()
    {
        $collegeId = $this->input->get('collegeId');
        $query = $this->input->get('query');

        if($collegeId === FALSE || $query === FALSE)
        {
            log_message('error', 'GET Params were not received by search.index');
        }
        else
        {
            //Performs search
            $results = $this->course_model->get_like_title($collegeId, $query);

            if (count($results) === 1)
            {
                //Display course detail page
                $this->view($results[0]);
            }
            else
            {
                //Display search results page
                $data['title'] = 'Search Results - PrereqMe';
                $data['results'] = $results;
                $data['query'] = $query;

                $this->load->view('templates/header', $data);
                $this->load->view('pages/search_results', $data);
                $this->load->view('templates/footer');
            }
        }
    }

    //Performs a search and prints an array of titles
    //Used by an AJAX call for the search typeahead
    public function search()
    {
        $collegeId = $this->input->get('collegeId');
        $query = $this->input->get('query');

        if($collegeId === FALSE || $query === FALSE)
        {
            log_message('error', 'GET Params were not received by search.index');
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
}

/* End of file search.php */