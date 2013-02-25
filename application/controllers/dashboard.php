<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    //Signs a user up and sends the user to the dashboard to add classes
    //Expected params in POST: first_name, last_name, email, reenter_email, password, reenter_password
    public function signup()
    {
        //Requires that the course title isn't blank and that the total percentage adds up to 100
        $this->form_validation->set_rules('first_name', 'First name', 'required|alpha');
        $this->form_validation->set_rules('last_name', 'Last name', 'required|alpha');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique(pm_user.email)|matches[reenter_email]');
        $this->form_validation->set_rules('password', 'Password', 'required|matches[password]');

        if ($this->form_validation->run())
        {
            $firstName = $this->input->post('first_name');
            $lastName = $this->input->post('last_name');
            $email = $this->input->post('email');
            $password = $this->input->post('password');

            //Sign up user
            $userId = $this->user_model->sign_up_user($firstName, $lastName, $email, $password);
            $user = $this->user_model->get_user($userId);

            $data = array(
                'title' => 'Dashboard - PrereqMe',
                'user' => $user
            );

            $this->load->view('templates/header', $data);
            $this->load->view('pages/my_plan', $data);
            $this->load->view('templates/footer');
        }
        else
        {
            redirect('/home/', 'index');
        }
    }

    //Displays the My Plan page
    public function my_plan($user = NULL)
    {
        if($user === NULL)
        {
            log_message('error', 'user not sent to Dashboard.my_plan');
        }
    }
}

/* End of file signup.php */