<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Twilio\Rest\Client;

/**
 * @author J.A.S.S. Jayasinghe
 * @organization Election Commission Sri Lanka
 * @date 12/5/2019
 */
class SMSAction extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
        $this->load->helper('sendsms_helper');
	}

    public function index(){
        sendsms( '0712224567', 'test message' );
    }
}