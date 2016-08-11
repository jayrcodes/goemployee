<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee_model extends CI_Model {

    protected $table_name = 'employees';

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_list()
    {
        $query = $this->db->get($this->table_name);
        return $query->result();
    }

}
