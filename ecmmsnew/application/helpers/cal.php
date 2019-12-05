<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if ( ! function_exists('getAnualLeaves'))
{
    public function getAnualLeaves($uid){
        $curr_year=date("Y");
        $ci = get_instance();
        $query=$ci->db->get_where('employee_tbl', array('emp_id'=>$uid));
        $result=$query->result();
        $anual_tot=0;
        if($result->num_rows()>0){
            foreach($result as $r){
                $anual_tot=$r->emp_anual;
            }
        }
    }
}