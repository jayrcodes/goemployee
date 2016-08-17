<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('employee_model');
        $this->load->library('session');
        $this->load->library('excel');
        $this->load->library('pdf');
    }

    public function index()
    {
        $this->verify_auth();
        redirect(base_url() . 'employees');
    }

    public function generate_excel() 
    {
        $employees = $this->employee_model->get_list();
        $excel_title = 'Employee List';
        $file_name = 'EMPLOYEE_LIST.xls';
        $creator = 'Pastor Albano Jr.';
        $description = 'The employee list';
    
        # Initialize Excel
        $this->excel->getProperties()->setCreator($creator);
        $this->excel->getProperties()->setLastModifiedBy($creator);
        $this->excel->getProperties()->setTitle($excel_title);
        $this->excel->getProperties()->setSubject($excel_title);
        $this->excel->getProperties()->setDescription($description);

        $sheet = $this->excel->getActiveSheet();

        # Set Column Names 
        $this->excel->createSheet(1);
        $this->excel->getActiveSheet()->SetCellValue('A1', 'ID');
        $this->excel->getActiveSheet()->SetCellValue('B1', 'First Name');
        $this->excel->getActiveSheet()->SetCellValue('C1', 'Middle Name');
        $this->excel->getActiveSheet()->SetCellValue('D1', 'Last Name');
        $this->excel->getActiveSheet()->SetCellValue('E1', 'Birth Date');
        $this->excel->getActiveSheet()->SetCellValue('F1', 'Address');
        $this->excel->getActiveSheet()->SetCellValue('G1', 'Salary');

        # Store Data
        $ctr = 1;
        for ($i = 0; $i < count($employees); $i++) {
            $ctr++;
            $this->excel->createSheet($ctr);
            $this->excel->getActiveSheet()->SetCellValue('A' . $ctr, $employees[$i]->employee_id);
            $this->excel->getActiveSheet()->SetCellValue('B' . $ctr, $employees[$i]->first_name);
            $this->excel->getActiveSheet()->SetCellValue('C' . $ctr, $employees[$i]->middle_name);
            $this->excel->getActiveSheet()->SetCellValue('D' . $ctr, $employees[$i]->last_name);
            $this->excel->getActiveSheet()->SetCellValue('E' . $ctr, $employees[$i]->birth_date);
            $this->excel->getActiveSheet()->SetCellValue('F' . $ctr, $employees[$i]->address);
            $this->excel->getActiveSheet()->SetCellValue('G' . $ctr, $employees[$i]->salary);
        }

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $file_name . '"');
        header('Cache-Control: max-age=0'); // no cache

        $obj_writer = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
        $obj_writer->save('php://output');
    }

    public function generate_pdf()
    {
        $employees = $this->employee_model->get_list();
        $data['employees'] = $employees;
        $pdf_title = 'Employee List';
        $pdf_author = 'Pastor Albano Jr';
        $file_name = 'Employee_List.pdf';

        $pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
        $pdf->SetTitle($pdf_title);
        $pdf->SetHeaderMargin(30);
        $pdf->SetTopMargin(20);
        $pdf->setFooterMargin(20);
        $pdf->SetAutoPageBreak(true);
        $pdf->SetAuthor($pdf_author);
        $pdf->SetDisplayMode('real', 'default');

        $pdf->AddPage();

        $total_width = 190;
        $column_count = 7;

        $w = $total_width / $column_count; 
        $h = 7;

        $pdf->Cell(0, 0, $pdf_title, 1, 1, 'C', 0, '', 0);
        $pdf->Ln();

        $pdf->Cell($w, $h, 'ID', 1, 0, 'C', 0);
        $pdf->Cell($w, $h, 'First Name', 1, 0, 'C', 0);
        $pdf->Cell($w, $h, 'Middle Name', 1, 0, 'C', 0);
        $pdf->Cell($w, $h, 'Last Name', 1, 0, 'C', 0);
        $pdf->Cell($w, $h, 'Birth date', 1, 0, 'C', 0);
        $pdf->Cell($w, $h, 'Address', 1, 0, 'C', 0);
        $pdf->Cell($w, $h, 'Salary', 1, 0, 'C', 0);
        $pdf->Ln();

        for ($i = 0; $i < count($employees); $i++) {
            $pdf->Cell($w, $h, $employees[$i]->employee_id, 1, 0, 'C', 0);
            $pdf->Cell($w, $h, $employees[$i]->first_name, 1, 0, 'C', 0);
            $pdf->Cell($w, $h, $employees[$i]->middle_name, 1, 0, 'C', 0);
            $pdf->Cell($w, $h, $employees[$i]->last_name, 1, 0, 'C', 0);
            $pdf->Cell($w, $h, $employees[$i]->birth_date, 1, 0, 'C', 0);
            $pdf->Cell($w, $h, $employees[$i]->address, 1, 0, 'C', 0);
            $pdf->Cell($w, $h, $employees[$i]->salary, 1, 0, 'C', 0);
            $pdf->Ln();
        }

        $pdf->Output($file_name, 'I');
    }

    public function table() {
        $employees = $this->employee_model->get_list();
        $data['employees'] = $employees;
        $this->load->view('admin/table', $data);
    }

    public function verify_auth()
    {
        $user_auth = $this->session->userdata['logged_in'];
        if (!isset($user_auth)) {
            redirect(base_url() . 'login');
        }
    }

}
