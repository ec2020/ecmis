<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Complain extends CI_Controller {
    public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('pagination');
		$this->load->model('complain_model');
		
	}
    
	public function index()
	{
		//load dashboard
		$page='complain';
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
	public function save_complain(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('cmp_tittle','Title','required');


		if($this->form_validation->run() == false){
			redirect('complain');
		}else{

			$this->complain_model->save();
			redirect('complain');
		}


	}
}
?>