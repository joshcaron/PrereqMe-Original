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
            $course->prereqs = $this->course_model->get_prereqs($course, TRUE);

            $data['title'] = 'Course detail - PrereqMe';
            $data['selectedNav'] = 'browse';
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
        $this->form_validation->set_rules('collegeId', 'College id', 'required');
        $this->form_validation->set_rules('query', 'Search Query', 'required');

        if ($this->form_validation->run())
        {
            $collegeId = $this->input->post('collegeId');
            $query = $this->input->post('query');

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
        else
        {
            redirect('/', '');
        }
    }
}

/* End of file search.php */