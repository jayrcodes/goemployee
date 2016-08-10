<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->library('form_validation');
    }

    # GET LIST
    public function index()
    {
    }

    # ADD ONE USER 
    public function add()
    {
        $this->form_validation->set_rules('username', 'username', 'trim|required|is_unique[users.username]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');

        if ($this->form_validation->run() === TRUE) 
        {
            $user = array();

            $user['created_at']     = date('Y-m-d H:i:s');
            $user['username']       = $this->input->post('username');
            $user['password']       = password_hash(
                $this->input->post('password'), 
                PASSWORD_BCRYPT, 
                array('salt' => 'UycSAbzwYLMsah7Rj2yvzH2TcRRaYZnyCysT7AdD')
            );

            $response['status'] = true;
            $this->user_model->add($user);
            die(json_encode($user));
        } 
        else 
        {
            $response['status'] = false;
            $response['email']      = form_error('email');
            $response['password']   = form_error('password');
            die(json_encode($response));
        }
    }

    # EDIT ONE USER 
    public function edit($user_id)
    {
    }

    # EDIT ONE USER 
    public function view($user_id)
    {
    }

    # DELETE ONE USER 
    public function delete($user_id)
    {
    }

}
