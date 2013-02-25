<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('school_model');
    }

    // Displays the home page
    public function index()
    {
        $schools = $this->school_model->get_all();

        $data = array(
            'title' => 'PrereqMe',
            'schools' => $schools
        );

        $this->load->view('templates/header', $data);
        $this->load->view('pages/index', $data);
        $this->load->view('templates/footer');
    }
}


/* End of file home.php */