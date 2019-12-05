<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @author J.A.S.S. Jayasinghe
 * @organization Election Commission Sri Lanka
 * @date 1/5/2019
 */
class User extends CI_Controller {

	public function __construct()
	{
	parent::__construct();
		$this->load->library('form_validation');
	$this->load->library('pagination');
	$this->load->model('user_model');
	}
    
	public function index()
	{
		$this->loadLoginPage();
	}
    
	//load login page
	function loadLoginPage(){
		$data['title']="EC-MMS";
		$data['subtitle']="Election Commision Maintenance Management System";
		$this->load->view('login_v',$data);
	}

	public function login(){
		$this->loginValidation();
	}

	function loginValidation(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('user_name', 'Username', 'required');
		$this->form_validation->set_rules('user_pw', 'Password', 'required');
		if($this->form_validation->run() == FALSE){
			$this->loadLoginPage();
		}else{
			$data = array(
				'user_name' => $this->input->post('user_name'),
				'user_pw' => $this->input->post('user_pw')
				);
			$result=$this->user_model->loginValidation($data);
			if($result){
				$this->loadDashedBoard();
			}else{
				$data['db_err']='Please enter  correct details';
				$data['title']="EC-MMS";
				$data['subtitle']="Election Commision Maintenance Management System";
				$this->load->view('login_v',$data);
			}
			
		}
	}

	public function loadDashedBoard(){
		//load dashboard
		$page='dashboard';
		$header='header';
		$data['user_name']=$this->session->userdata('user_name');
		$data['user_role']=$this->session->userdata('user_role');
		$data['user_type']=$this->session->userdata('user_type');
		$data['view_cont']=$page;
		$data['view_header']=$header;
		$this->load->view('layout/template',$data);


	}

	
	
}