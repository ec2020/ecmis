<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @author J.A.S.S. Jayasinghe
 * @organization Election Commission Sri Lanka
 * @date 12/5/2019
 */
class Complain_model extends CI_Model {
    public function save(){
        $title=$this->input->post('cmp_tittle');
        $description=$this->input->post('cmp_description');
        $location=$this->input->post('cmp_location');



        $data=array(
            'emp_title'=>$title,
            'emp_description'=> $description,
            'emp_location'=>$location


        );

        $cmp_status=$this->db->insert('complain',$data);

        return $cmp_status;
    }
}