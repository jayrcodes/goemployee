<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee_model extends CI_Model {

    protected $table_name = 'employees';

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->database();
    }

    public function get_list()
    {
        $query = $this->db->get($this->table_name);
        return $query->result();
    }

    public function add($employee)
    {
       $this->db->insert($this->table_name, $employee);
    }

    public function update($employee_id, $employee)
    {
        $this->db->set($employee);
        $this->db->where('employee_id', $employee_id);
        $this->db->update($this->table_name);
    }

    public function get_one($employee_id) {
        $this->db->select('*');
        $this->db->from($this->table_name);
        $this->db->where('employee_id', $employee_id);
        $query = $this->db->get();
        return $query->result();
    }

    public function validate_employee_data()
    {
        $this->form_validation->set_rules('firstname', 'First Name', 'trim|required');
        $this->form_validation->set_rules('middlename', 'Middle Name', 'trim|required');
        $this->form_validation->set_rules('lastname', 'Last Name', 'trim|required');
        $this->form_validation->set_rules('birthdate', 'Birth date', 'trim|required');
        $this->form_validation->set_rules('address', 'Address', 'trim|required');
        $this->form_validation->set_rules('salary', 'Salary', 'trim|required');
    }

    public function remove($employee_id) {
        $this->db->where('employee_id', $employee_id);
        $this->db->delete($this->table_name);
    }

}
