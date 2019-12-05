<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if ( ! function_exists('getOverLookOfficers'))
{
    //get employees for duty over look
    function getOverLookOfficers($dept,$user_type){
        $ci = get_instance();
        $result=null;
        if($user_type=='FRONT'){
            //get employees in same department and same uselr level
            $ci->db->select('emp_id','emp_name');
            $result=$ci->db->get_where('employee_tbl',array('emp_dept'=>$dept,'emp_user_type'=>$user_type));
        }else{ 
            //get all executive users.
            $ci->db->select('emp_id','emp_name');
            $result=$ci->db->get_where('employee_tbl',array('emp_user_type'=>$user_type));
        }
        return $result;
    }
}

if ( ! function_exists('getExecutoveOfficers'))
{
    //get employees for approvel
    function getExecutoveOfficers(){
        $ci = get_instance();
        $result=null;
        //get all executive users.
        $ci->db->select('emp_id','emp_name');
        $result=$ci->db->get_where('employee_tbl',array('emp_user_type'=>'HOD'));   
        return $result;
    }
}