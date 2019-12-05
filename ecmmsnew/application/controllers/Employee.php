<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @author J.A.S.S. Jayasinghe
 * @organization Election Commission Sri Lanka
 * @date 5/1/2019
 */
class Employee extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('pagination');
		$this->load->model('employee_model');
		$this->load->library('session');
	}
    
	public function index()
	{
		$page='employee';
		$header='header';
		$data['user_name']=$this->session->userdata('user_name');
		$data['user_role']=$this->session->userdata('user_role');
		$data['user_type']=$this->session->userdata('user_type');
		$data['view_cont']=$page;
		$data['view_header']=$header;
		$this->load->view('layout/template',$data);
	}

	public function addLeave(){
		$page='addleave';
		$header='header';
		$user_role=$this->session->userdata('user_role');
		$user_dept=$this->session->userdata('user_dept');
		$data['user_name']=$this->session->userdata('user_name');
		$data['user_role']=$user_role;
		$data['user_type']=$this->session->userdata('user_type');
		//$data['over_look_list']=getOverLookOfficers($user_dept,$user_role);
		$data['over_look_list']=$this->employee_model->getOverLookOfficers($user_dept,$user_role);
		//$data['approve_list']=getExecutoveOfficers();
		$data['approve_list']=$this->employee_model->getExecutiveOfficers();
		$data['view_cont']=$page;
		$data['view_header']=$header;
		$this->load->view('layout/template',$data);
	}

	public function addleavesave(){
				
		$usertype=$this->session->userdata('user_type');
		if($usertype=="admin"){
			$this->load->library('form_validation');
			$this->form_validation->set_rules('emp_id', 'Employee Id', 'required');
			$this->form_validation->set_rules('leave_type', 'Leave Type', 'required');
			$this->form_validation->set_rules('sdate', 'Start Date', 'required');
			$this->form_validation->set_rules('edate', 'End Date', 'required');
			if(!($leave_type=$this->input->post('leave_type')=='Shortleave')){
				$this->form_validation->set_rules('num_days', 'Number of Days', 'required');
			}
			$this->form_validation->set_rules('reason', 'Reason', 'required');
			if($this->form_validation->run() == FALSE){
				redirect('employee/addleave');
			}else{
				$this->employee_model->saveLeaveAddedByAdmin();
				redirect('employee/addleave');				
			}

        }else{
			$this->session->set_flashdata('permission_error', 'You do not have authority to perform this!!');
			redirect('employee/addleave');
		}
	}

	public function save()
	{   
		$err="";
		$usertype=$this->session->userdata('user_type');
		if($usertype=="admin"){
			$this->load->library('form_validation');
			$this->form_validation->set_rules('emp_id', 'Employee Id', 'required');
			$this->form_validation->set_rules('emp_name', 'Employee Name', 'required');
			$this->form_validation->set_rules('emp_apt_date', 'First Appointment Date', 'required');
			$this->form_validation->set_rules('emp_type', 'Employee Type', 'required');
			$this->form_validation->set_rules('emp_desig', 'Employee Designation', 'required');
			$this->form_validation->set_rules('emp_dept', 'Employee Department', 'required');
			$this->form_validation->set_rules('emp_anu_leave', 'Anual Leaves', 'required');
			$this->form_validation->set_rules('emp_cas_leave', 'Casual Leaves', 'required');
			if($this->form_validation->run() == FALSE){
			
				$this->index();
			}else{
				$result=$this->employee_model->save();
				if($result){
				   $this->session->set_flashdata('success',"Employee Saved Successfully");
				   redirect('employee');
				}
				else{
					$this->session->set_flashdata('error', 'Somthing worng. Error!!');
					redirect('employee');
				}
			}

        }else{
			$this->session->set_flashdata('Permission error', 'You do not have authority to perform this!!');
			redirect('employee');
		}
   	}
}