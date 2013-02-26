<?php

class User_model extends CI_Model
{
    //Signs up a user with the given params
    public function sign_up_user($firstName = '', $email = '', $password = '')
    {
        if($firstName === '' OR $email === '' OR $password === '')
        {
            log_message('error', 'Necessary params were not sent to User_model.sign_up_user()');
        }
        else
        {
            $data = array(
                'firstName' => $firstName,
                'email' => $email,
                'password' => $password
            );

            $this->db->insert('pm_user', $data); 
            return $this->db->insert_id();
        }
    }

    //Gets user by user id
    public function get_by_id($userId = -1)
    {
        if($userId === -1)
        {
            log_message('error', 'Necessary params were not sent to User_model.get_by_id()');
        }
        else
        {
            $data = array(
                'id' => $userId
            );

            return $this->db->get_where('pm_user', $data)->row();
        }
    }

    //Verifies the email-password combination
    public function get_by_email_password($email = '', $password = '')
    {
        if($email === '')
        {
            log_message('error','Email not sent to User_model.verify_login');
            return NULL;
        }
        else
        {
            $constraints = array(
                'email' => $email,
                'password' => $password
            );

            return $this->db->get_where('pm_user', $constraints)->row();
        }
    }
}

/* End of file user_model.php */