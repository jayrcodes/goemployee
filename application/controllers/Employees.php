<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . "/controllers/Base_Controller.php";

class Employees extends Base_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('employee_model');
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $employees = $this->employee_model->get_list();
        $data['employees'] = $employees;
        $this->load->view('admin/employees', $data);
    }

    public function test() {
        echo 'test';
    }

    public function add()
    {
        $this->employee_model->validate_employee_data();

        if ($this->form_validation->run() === TRUE) {
            $employee = $this->grab_employee_data();
            $this->employee_model->add($employee);
            $data['status']     = 'success';
        } else {
            $errors = $this->grab_errors();
            $data['status'] = 'error';
            $data['errors'] = json_encode($errors);
        }

        $employees = $this->employee_model->get_list();
        $data['employees']  = $employees;
        $this->load->view('admin/employees', $data);
    }

    public function update()
    {
        $employee_id = htmlspecialchars($this->input->post('employeeid'));
        $employee = $this->employee_model->get_one($employee_id);

        if (count($employee)) {
            $this->employee_model->validate_employee_data();
            $employee_data = $this->grab_employee_data();

            if ($this->form_validation->run() === TRUE) {
                $this->employee_model->update($employee_id, $employee_data);

                $employees = $this->employee_model->get_list();
                $data['status'] = 'success_update';
                $data['employees']  = $employees;
                $this->load->view('admin/employees', $data);
            } else {
                $errors = $this->grab_errors();
                $data['status'] = 'error';
                $data['errors'] = json_encode($errors);
                $data['employee'] = $employee[0];
                $this->load->view('admin/employee-edit', $data);
            }

        } else {
            $this->load->view('admin/employees', $data);

            $employees = $this->employee_model->get_list();
            $data['employees']  = $employees;
            $this->load->view('admin/employees', $data);
        }
    }

    public function delete()
    {
        $employee_id = htmlspecialchars($this->input->get('emp_id'));
        $employee = $this->employee_model->get_one($employee_id);

        if (!count($employee)) {
            redirect(base_url());
        }

        $this->employee_model->remove($employee_id);


        $employees = $this->employee_model->get_list();
        $data['employees']  = $employees;
        $data['status']     = 'success_delete';
        $this->load->view('admin/employees', $data);
    }

    public function edit_view()
    {
        $employee_id = htmlspecialchars($this->input->get('emp_id', TRUE));
        $employee = $this->employee_model->get_one($employee_id);

        if (count($employee)) {
            $employee = $employee[0];
            $employee->birth_date = date('m/d/Y', strtotime($employee->birth_date));
            $data['employee'] = $employee;
            $this->load->view('admin/employee-edit', $data);
        } else {
            redirect(base_url() . 'employees');
        }
    }

    public function grab_employee_data()
    {
        $employee = array();
        $employee['first_name']     =   htmlspecialchars($this->input->post('firstname'));
        $employee['middle_name']    =   htmlspecialchars($this->input->post('middlename'));
        $employee['last_name']      =   htmlspecialchars($this->input->post('lastname'));
        $employee['birth_date']     =   date('Y-m-d', strtotime($this->input->post('birthdate')));
        $employee['address']        =   htmlspecialchars($this->input->post('address'));
        $employee['salary']         =   $this->input->post('salary');
        $employee['created_at']     =   date('Y-m-d H:i:s');
        return $employee;
    }

    public function grab_errors()
    {
        $errors = array();
        $errors['firstname']      = form_error('firstname');
        $errors['middlename']     = form_error('middlename');
        $errors['lastname']       = form_error('lastname');
        $errors['birthdate']      = form_error('birthdate');
        $errors['address']        = form_error('address');
        $errors['salary']         = form_error('salary');
        return $errors;
    }
}
