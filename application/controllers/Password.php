<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @author J.A.S.S. Jayasinghe
 * @organization Election Commission Sri Lanka
 * @date 16/5/2019
 */
class Password extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('pagination');
		$this->load->helper('captcha');
		$this->load->helper('url');
		$this->load->model('employee_model');
	}
    
	public function index()
	{
		// start -captcha
		$vals = array(
			'img_path'  => './captcha/',
		   'img_url'  => base_url().'/captcha/',
		   'img_width' => 150,
		   'img_height' => '75',
		   'expiration' => 10000
		   );
		$cap = create_captcha($vals);
		$data['cap']=$cap;
		// end - captcha
		//load page
		$page='password';
		$header='header';
		$data['user_name']=$this->session->userdata('user_name');
		$data['user_role']=$this->session->userdata('user_role');
		$data['user_type']=$this->session->userdata('user_type');
		$data['view_cont']=$page;
		$data['view_header']=$header;
		$this->load->view('layout/template',$data);
	}

	public function change(){
		$result=$this->employee_model->changePassword();
		if($result){
			$this->session->set_flashdata('success', 'Success!');
			redirect('password');
		}else{
			$this->session->set_flashdata('fail', 'Fail!');
			redirect('password');
		}
	}
}