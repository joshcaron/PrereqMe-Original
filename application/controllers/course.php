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
    public function view($courseId = -1)
    {
        $course = $this->course_model->get_by_id($courseId);           

        if($course === NULL)
        {
            log_message('error', 'Course was not sent to Course.view as an argument or it was not pulled from DB');
        }
        else
        {
            //Retrieve recursive prereqs for the course
            $course->prereqs = $this->course_model->get_prereqs($course, TRUE);

            //Converts the course into a spacetreeCourse and then into JSON
            $spacetreeCourse = new Spacetree_course($course);
            $courseJSON = json_encode($spacetreeCourse);

            $data['title'] = 'Course detail - PrereqMe';
            $data['selectedNav'] = 'browse';
            $data['course'] = $course;
            $data['courseJSON'] = $courseJSON;

            if(isset($data['user']))
            {
                $data['hasCourseInPlan'] = $this->user_course_model->has_course($course->id, $data['user']['id']);
            }

            $this->load->view('templates/header', $data);
            $this->load->view('course/detail', $data);
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
                $course = $results[0];
                redirect('/course/view/'.$course->id);
            }
            else
            {
                //Display search results page
                $data['title'] = 'Search Results - PrereqMe';
                $data['selectedNav'] = 'browse';
                $data['results'] = $results;
                $data['query'] = $query;

                $this->load->view('templates/header', $data);
                $this->load->view('course/search_results', $data);
                $this->load->view('templates/footer');
            }
        }
        else
        {
            redirect('/', '');
        }
    }

    //AJAX call to add the course to the user's course dump
    public function add_to_my_plan($userId = -1, $courseId = -1)
    {
        if($userId === -1 OR $courseId === -1)
        {
            log_message('error', "Necessary params weren't sent to Course.add_to_my_plan");
        }
        else
        {
            $this->user_course_model->add_course_to_semester($courseId, 0, $userId);
        }
    }
}

/* End of file search.php */