<?php

class Course extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function view($course = NULL)
    {
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
            $data = array(
                'title' => 'Course detail - PrereqMe',
                'course' => $results[0]
            );

            $this->load->view('templates/header', $data);
            $this->load->view('pages/course', $data);
            $this->load->view('templates/footer');
        }
    }

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
            $results = $this->course_model->get_like_title($collegeId, $query);

            if (count($results) === 1)
            {
                $this->view($results[0]);
            }
            else
            {
                $data = array(
                    'title' => 'Search Results - PrereqMe',
                    'results' => $results,
                    'query' => $query
                );

                $this->load->view('templates/header', $data);
                $this->load->view('pages/search_results', $data);
                $this->load->view('templates/footer');
            }
        }
    }
}

/* End of file search.php */