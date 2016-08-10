<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    protected $table_name = 'users';

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

	public function index()
	{
		$this->load->view('home/home');
	}

    public function get_list()
    {
        $query = $this->db->get('users');
        return $query->result();
    }

    public function get_one($username)
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('username', $username);

        return $this->db->get()->row_array();
    }

    public function add($user)
    {
       $this->db->insert('users', $user); 
    }

}
