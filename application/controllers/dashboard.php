<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
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