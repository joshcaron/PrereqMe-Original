<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Home extends PM_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    // Displays the home page
    public function index()
    {
        $schools = $this->school_model->get_all();

        $data['title'] = 'PrereqMe';
        $data['schools'] = $schools;

        $this->load->view('templates/header', $data);
        $this->load->view('pages/index', $data);
        $this->load->view('templates/footer');
    }

    //Signs a user up and sends the user to the dashboard to add classes
    //Expected params in POST: first_name, last_name, email, reenter_email, password, reenter_password
    public function signup()
    {
        //Requires that the course title isn't blank and that the total percentage adds up to 100
        $this->form_validation->set_rules('first_name', 'First name', 'required|alpha');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique(pm_user.email)|matches[reenter_email]');
        $this->form_validation->set_rules('password', 'Password', 'required|matches[password]');
        $this->form_validation->set_rules('collegeId', 'College', 'required|greater_than[0]');

        if ($this->form_validation->run())
        {
            $firstName = $this->input->post('first_name');
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $schoolId = $this->input->post('collegeId');

            //Signs up user
            $this->user_model->sign_up_user($firstName, $email, $password, $schoolId);

            //Logs new user in
            $this->login($email, $password);
        }
        else
        {
            $this->index();
        }
    }

    //Logs in the user
    //Expected params in POST: email, password
    public function login($email = '', $password = '')
    {
        if($email === '')
        {
            $email = $this->input->post('email');
        }

        if($password === '')
        {
            $password = $this->input->post('password');
        }

        if($email === FALSE OR $password === FALSE)
        {
            log_message('error', 'Necessary params not in POST for home.logIn');
        }
        else
        {
            $user = $this->user_model->get_by_email_password($email, $password);
            if($user !== NULL)
            {
                //Adds the user data to the session and goes to the dashboard
                $user_data = array(
                    'is_logged_in' => TRUE,
                    'user_id' => $user->id,
                    'email' => $user->email,
                    'first_name' => $user->firstName,
                    'school_id' => $user->schoolId
                );

                $this->session->set_userdata($user_data);
                parent::add_user(); 
                redirect('/dashboard/', 'index');
            }
            else
            {
                $this->index();
            }
        }
    }

    //Logs out the user and loads homepage
    public function logout()
    {
        $this->session->unset_userdata('is_logged_in');
        unset($user);
        redirect('/home/', 'index');
    }
}


/* End of file home.php */