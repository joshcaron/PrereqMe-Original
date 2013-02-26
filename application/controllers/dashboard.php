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
        if( $this->_is_logged_in() )
        {
            $data = array(
                'title' => 'Dashboard - PrereqMe'
            );

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
        if( $this->_is_logged_in() )
        {
            $data = array(
                'title' => 'My Plan - PrereqMe'
            );

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
        if( $this->_is_logged_in() )
        {
            $data = array(
                'title' => 'Browse - PrereqMe'
            );

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
        if( $this->_is_logged_in() )
        {
            $data = array(
                'title' => 'Help - PrereqMe'
            );

            $this->load->view('templates/header', $data);
            $this->load->view('pages/help', $data);
            $this->load->view('templates/footer');
        }
        else
        {
            redirect('/home/', 'logout');
        }
    }

    //Is user logged in?
    private function _is_logged_in()
    {
        return $this->session->userdata('is_logged_in');
    }
}

/* End of file signup.php */