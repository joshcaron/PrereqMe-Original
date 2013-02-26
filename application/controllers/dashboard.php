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
            $data['title'] => 'Dashboard - PrereqMe';

            $this->load->view('templates/header', $data);
            $this->load->view('pages/dashboard', $data);
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
            $semesters = $this->course_model->get_semesters($userId);

            $data['title'] = 'My Plan - PrereqMe';
            $data['semesters'] = $semesters;

            $this->load->view('templates/header', $data);
            $this->load->view('pages/my_plan', $data);
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
            $data['title'] => 'Browse - PrereqMe';

            $this->load->view('templates/header', $data);
            $this->load->view('pages/browse', $data);
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
            $data['title'] => 'Help - PrereqMe';

            $this->load->view('templates/header', $data);
            $this->load->view('pages/help', $data);
            $this->load->view('templates/footer');
        }
        else
        {
            redirect('/home/', 'logout');
        }
    }
}

/* End of file signup.php */