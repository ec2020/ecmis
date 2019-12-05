<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @author J.A.S.S. Jayasinghe
 * @organization Election Commission Sri Lanka
 * @date 20/5/2019
 */
class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('pagination');
		
		
	}
    
	public function index()
	{
		//load dashboard
		$page='dashboard';
		$header='header';
		$data['user_name']=$this->session->userdata('user_name');
		$data['user_role']=$this->session->userdata('user_role');
		$data['user_type']=$this->session->userdata('user_type');
		$uid=$this->session->userdata('id');
		//get latest leaves
		
		
		$data['view_cont']=$page;
		$data['view_header']=$header;
		$this->load->view('layout/template',$data);
	}

	//delete leave
	public function deleteLeave(){
		if($this->uri->segment(3)){
			$lev_id=$this->uri->segment(3);
			$this->leave_model->deleteLeave($lev_id);
			redirect('dashboard');	
		}
	}
}