<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

    public function users()
    {
        $this->load->view('users/users');
    }
}
