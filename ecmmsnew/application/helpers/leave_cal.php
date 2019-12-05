<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if ( ! function_exists('getTotalLeaves'))
{
    //return available leaves for user per year
    public function getTotalLeaves($uid)
    {
        $ci = get_instance();
        $arr=array();
        if(isset($uid)){
            $query=$ci->db->get_where('employee_tbl', array('emp_id'=>$uid));
            $result=$query->result();
            if($result->num_rows()>0){
                foreach($result as $r){
                    $arr['anual']=$r->emp_anual;
                    $arr['casual']=$r->emp_casual;
                }
            }
        }
        return $arr;
    } 
}

  
    
    //return leaves taken for current year
    public function getLeavesTaken($uid)
    {
        $ci=get_instance();
        $arr=array();
        if(isset($uid)){
            $ci->db->select('lev_type, SUM(lev_net_days) AS amt');
            $ci->db->group_by("lev_type");
            $query=$ci->db->get_where('leave_tbl', array('lev_emp_id'=>$uid));
            $result=$query->result();
            if($result->num_rows()>0){
                foreach($result as $r){
                    $arr[]=$r->amt;
                }
            }
        }
         return $arr;
    }

    public function calRemaingLeaves($uid){
        $arr_resul=array();
        $arr_total=$this->getTotalLeaves($uid);
        $arr_taken=$this->getLeavesTaken($uid);
        if(empty($arr_total)){
            $arr_resul['tot_anual']=0;
            $arr_resul['tot_casual']=0;
        }else{
            $arr_resul['tot_anual']=$arr_total['anual'];
            $arr_resul['tot_casual']=$arr_total['casual']
        }
        if(empty($arr_taken)){
            $arr_resul['taken_anual']=0;
            $arr_resul['taken_casual']=0;
        }else{
            $arr_resul['taken_anual']=$arr_total[0];
            $arr_resul['taken_casual']=$arr_total[1]
        }
        if(empty($arr_total) && empty($arr_taken)){
            $arr_resul['rem_anual']=$arr_total[]-$arr_taken[0];
            $arr_resul['rem_casual']=$arr_total[]-$arr_taken[1];
        }
    }
}