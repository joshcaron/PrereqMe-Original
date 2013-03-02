<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class PM_Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->add_user();
    }

    //Adds the user if it exists to the data object
    public function add_user()
    {
        $is_logged_in = $this->session->userdata('is_logged_in');

        if($is_logged_in)
        {
            $user['id'] = $this->session->userdata('user_id');
            $user['email'] = $this->session->userdata('email');
            $user['firstName'] = $this->session->userdata('first_name');
            $user['schoolId'] = $this->session->userdata('school_id');
            $user['deptId'] = $this->session->userdata('dept_id');
            $data['user'] = $user;

            $this->load->vars($data);
        }
    }

    //Is user logged in?
    public function _is_logged_in()
    {
        return $this->session->userdata('is_logged_in');
    }

    //Performs a search and prints an array of titles
    //Used by an AJAX call for the search typeahead
    public function search()
    {
        $collegeId = $this->input->get('collegeId');
        $query = $this->input->get('term'); //use 'term' instead of 'query' here because it is automatically set by jQueryUI

        if($collegeId === FALSE || $query === FALSE)
        {
            log_message('error', 'GET Params were not received by search autocomplete');
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

/* End of file base.php */