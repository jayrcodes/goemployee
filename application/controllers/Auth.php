<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->helper('form');
        $this->load->helper('security');
        $this->load->library('form_validation');
        $this->load->library('session');
    }

    public function index()
    {
        $this->verify_auth();
        $this->load->view('auth/login');
    }

    public function register()
    {
        $this->load->view('auth/register');
    }

    public function do_login()
    {
        $email = $this->input->post('email');

        $session_data = array(
            'email' => $email
        );

        $this->session->set_userdata('logged_in', $session_data);
        $this->load->view('home/home', 'refresh');
    }

    public function do_logout()
    {
        $session_data = array();
        $this->session->unset_userdata('logged_in', $session_data);
        $data['message'] = 'Logout Success.';
        $this->load->view('auth/login', $data);
    }

    public function verify_auth()
    {
        if (isset($this->session->userdata['logged_in'])) {
            redirect(base_url());
        }
    }

    function validate_login()
    {
        $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|md5');

        $username = htmlspecialchars($this->input->post('username'));
            $password = password_hash(
            $this->input->post('password'),
            PASSWORD_BCRYPT,
            array('salt' => 'UycSAbzwYLMsah7Rj2yvzH2TcRRaYZnyCysT7AdD')
        );

        $user = $this->user_model->get_one($username);

        if ($this->form_validation->run() === TRUE) {
            $response = array();
            $response['status'] = true;

            if (($username === $user['username'] && $password === $user['password'])) {
                $response['status'] = 'login_ok';

                $user_data = array();
                $user_data['id']            = $user['agent_id'];
                $user_data['username']      = $user['username'];
                $user_data['role']          = $user['role'];
                $user_data['first_name']    = $user['first_name'];
                $user_data['last_name']     = $user['last_name'];
                $user_data['logged_in']     = 'logged_in';

                $this->session->set_userdata($user_data);
                redirect(base_url());
            } else {
                $data['status'] = 'login_fail';
                $this->load->view('auth/login', $data);
            }
        } else {
            $data['status'] = 'login_fail';
            $response['username'] = form_error('username');
            $response['password'] = form_error('password');
            $data['response'] = $response;
            $this->load->view('auth/login', $data);
        }
    }

}
