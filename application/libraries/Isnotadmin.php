<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Isnotadmin {

    public function __construct()
    {
        parent::__construct();
        $this->CI->load->library('ion_auth');
    }
    public function check()
    {
        if ( ! $this->ion_auth->logged_in() OR $this->ion_auth->is_admin())
        {
            redirect('auth/login', 'refresh');
        }
	}

}