<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @author J.A.S.S. Jayasinghe
 * @organization Election Commission Sri Lanka
 * @date 12/5/2019
 */
class Logout extends CI_Controller {

    public function index(){
        $array_items = array('id' => '', 'user_name' => '', 'user_role' => '', 'user_role' => 'user_status');
                        $uid=$this->session->userdata('id');
                        $levLog="logout-id-". $uid;
                        $this->addLog($levLog);
                        $this->session->unset_userdata($array_items);
                        $this->session->sess_destroy();
                        $data['title']="EC-MMS";
                        $data['subtitle']="Election Commision Maintenance Management System";
                        redirect('http://localhost/ecmms');	
    }

    function addLog($logString){
        $data = array(
            'log_detail' => $logString,
        );
        $save_status=$this->db->insert('log_tbl`', $data); 
    }


}