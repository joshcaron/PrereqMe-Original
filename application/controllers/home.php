<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Home extends PM_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    // Displays the home page
    public function index($errorLoggingIn = FALSE)
    {
        $schools = $this->school_model->get_all();

        $data['title'] = 'PrereqMe';
        $data['schools'] = $schools;
        $data['loginError'] = $errorLoggingIn;

        $this->load->view('templates/header', $data);
        $this->load->view('pages/index', $data);
        $this->load->view('templates/footer');
    }

    //Called by an ajax request to get the departments for a school
    public function get_departments()
    {
        $schoolId = $this->input->get('collegeId');

        if($schoolId === FALSE)
        {
            log_message('error', 'SchoolId not sent to home.get_categories');
        }
        else
        {
            //Get departments for the school and send back the JSON array
            $departments = $this->school_model->get_departments($schoolId);

            $data['response'] = $departments;
            $this->load->view('json', $data);
        }
    }

    //Called by an ajax request to get the majors for a school
    public function get_majors()
    {
        $deptId = $this->input->get('deptId');

        if($deptId === FALSE)
        {
            log_message('error', 'DeptId not sent to home.get_majors');
        }
        else
        {
            //Get departments for the school and send back the JSON array
            $majors = $this->school_model->get_majors($deptId);

            $data['response'] = $majors;
            $this->load->view('json', $data);
        }
    }

    //Signs a user up and sends the user to the dashboard to add classes
    //Expected params in POST: first_name, last_name, email, reenter_email, password, reenter_password
    public function signup()
    {
        //Requires that the course title isn't blank and that the total percentage adds up to 100
        $this->form_validation->set_rules('first_name', 'First name', 'required|alpha');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique(pm_user.email)|matches[reenter_email]');
        $this->form_validation->set_rules('password', 'Password', 'required|matches[password]');

        if ($this->form_validation->run())
        {
            $firstName = $this->input->post('first_name');
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $schoolId = $this->input->post('collegeId');
            $deptId = $this->input->post('deptId');
            $majorId = $this->input->post('majorId');

            //Signs up user
            $this->user_model->sign_up_user($firstName, $email, $password, $schoolId, $deptId, $majorId);

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
                    'school_id' => $user->schoolId,
                    'dept_id' => $user->deptId,
                    'major_id' => $user->majorId
                );

                $this->session->set_userdata($user_data);
                parent::add_user(); 

                //Go to dashboard
                // redirect('/dashboard/', 'index');
                redirect('/dashboard/my_plan/index');
            }
            else
            {
                redirect('/home/index/true');
            }
        }
    }

    //Logs out the user and loads homepage
    public function logout()
    {
        $this->session->unset_userdata('is_logged_in');
        unset($user);
        redirect('/home/index');
    }

    // 
    public function forgot_password() 
    {
        $data['title'] = 'Forgot Password';
        $this->load->view('templates/header', $data);
        $this->load->view('pages/forgot');
        $this->load->view('templates/footer');
    }
}


/* End of file home.php */