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
}

/* End of file base.php */