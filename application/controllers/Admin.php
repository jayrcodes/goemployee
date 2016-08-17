<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->library('session');
    }

    public function index()
    {
        $this->verify_auth();
        redirect(base_url() . 'employees');
    }

    public function verify_auth()
    {
        $user_auth = $this->session->userdata['logged_in'];
        if (!isset($user_auth))
        {
            redirect(base_url() . 'login');
        }
    }

}
