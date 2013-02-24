<?php

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        if (TRUE)
        {

        }
        else
        {
            
        }
    }

    public function signup()
    {
        $data = array(
            'title' => 'Sign Up - PrereqMe'
        );

        if (TRUE)
        {
            $this->load->view('templates/header', $data);
            $this->load->view('pages/signup', $data);
            $this->load->view('templates/footer');
        }
        else
        {
            redirect('/home/', 'index');
        }
    }
}

/* End of file signup.php */