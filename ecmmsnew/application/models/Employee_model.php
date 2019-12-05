<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @author J.A.S.S. Jayasinghe
 * @organization Election Commission Sri Lanka
 * @date 12/5/2019
 */
class Employee_model extends CI_Model {
    public function save(){
            $save_status=false;
            $emp_id=$this->input->post('emp_id');
            $emp_name=$this->input->post('emp_name');
            $emp_apt_date=$this->input->post('emp_apt_date');
            $emp_type=$this->input->post('emp_type');
            $emp_desig=$this->input->post('emp_desig');
            $emp_dept=$this->input->post('emp_dept');
            $emp_anu_leave=$this->input->post('emp_anu_leave');
            $emp_cas_leave=$this->input->post('emp_cas_leave');
            $uid=$this->session->userdata('id');
            // add form values to an array
            $data = array(
                'emp_id' => $emp_id,
                'emp_name' => $emp_name,
                'emp_designation' => $emp_desig,
                'emp_dept' => $emp_dept,
                'user_name' => $emp_id,
                'user_pw' => sha1('123'),
                'emp_user_type' => $emp_type,
                'emp_anual' => $emp_anu_leave,
                'emp_casual' => $emp_cas_leave,
                'emp_start_date' => $emp_apt_date,
                'emp_entered_user' => $uid
                );
             echo $data;
             $save_status=$this->db->insert('employee_tbl', $data); 
            //insert data to leave summer (employee_leave_tbl)
            if($save_status){
                $emp_year=date("Y");
                $data = array(
                    'emp_id' => $emp_id,
                    'emp_year' => $emp_year,
                    'emp_anual' => $emp_anu_leave,
                    'emp_casual' => $emp_cas_leave
                    );
                $save_status=$this->db->insert('leave_summery_tbl`', $data); 
                $levLog="employeeadded-id". $uid."-empid-".$emp_id;
                $this->addLog($levLog);
            }else{
                return $save_status;
            }
            if($save_status){
                   return $save_status;
            }else{
                    $result=$this->db->get_where('employee_tbl',array('emp_id',$emp_id));
                    if($result->num_rows()>0){
                        $this->db->where('emp_id', $emp_id);
                        $this->db->delete('employee_tbl');
                    }
                    //TODO delete insrerted (revert first transaction)
                    return $save_status;
            }                    
    }

    public function saveLeaveAddedByAdmin(){
        $leave_type=$this->input->post('leave_type');
            $sdate=$this->input->post('sdate');
            $edate=$this->input->post('edate');
            $empId=$this->input->post('emp_id');
            if(!($this->input->post('leave_type')=='Short Leave')){
                $num_days=$this->input->post('num_days');
            }else{
                $num_days=0;
            }
            $reason=$this->input->post('reason');

            $uid=$this->session->userdata('id');
 
                $data = array(
                    'lev_emp_id' => $empId,
                    'lev_type' => $leave_type,
                    'lev_start_date' => $sdate,
                    'lev_end_date' => $edate,
                    'lev_net_days' => $num_days,
                    'lev_reason' => $reason,
                    'lev_approved_status'=>'Approved',
                    'lev_approved_by'=>$uid
                    );
                    if($this->db->insert('leave_tbl', $data)){
                        $this->session->set_flashdata('success',"Leave applied Successfully");
                        $levLog="LeaveApplied-id". $uid;
                        $this->addLog($levLog);
				        return true; 
                    }else{
                        $this->session->set_flashdata('error', 'Somthing worng. Error!!');
					    return false;
                    }   
    }

    public function getEligibleleaves($emp_id){
        $this->db->select('emp_anual, emp_casual, emp_short_leave');
        $query = $this->db->get_where('employee_tbl', array('emp_id' => $emp_id));
        return $query->result();
    }

    //get employees for approvel
    public function getOverLookOfficers($dept,$user_type){
		
        if($user_type=='FRONT'){
             $query=$this->db->get_where('employee_tbl',array('emp_dept'=>$dept,'emp_user_type'=>$user_type));
             return $query->result();
        }else{ 
            $query=$result=$this->db->get_where('employee_tbl',array('emp_user_type'=>$user_type));
            return $query->result();
        }
        
    }
    //get all executive users.
    function getExecutiveOfficers(){
        //$this->db->select('emp_id','emp_name');
        $query=$this->db->get_where('employee_tbl',array('emp_user_type'=>'HOD'));   
        return $query->result();
    }

    public function changePassword(){
        $uid=$this->session->userdata('id');
        $pw=$this->input->post('pw');
        $data = array(
            'user_pw'=> sha1($pw)
        );
        $this->db->where('emp_id', $uid);
        $result=$this->db->update('employee_tbl', $data);
        $levLog="passwordchanged-id". $uid;
        $this->addLog($levLog);
		return $result;
    }
    
    
    function addLog($logString){
        $data = array(
            'log_detail' => $logString,
        );
        $save_status=$this->db->insert('log_tbl`', $data); 
    }

    //ajax count
    function getAvailableLeaveCountViaCategory($uid,$lev_type){
        $year=date('Y');
        $num_leaves=0;
        $query = $this->db->get_where('leave_summery_tbl', array('emp_id' => $uid, 'emp_year'=>$year));
        if($query->num_rows()>0){
            $result=$query->row_array();
            if($lev_type=='Casual'){
                $num_leaves=$result['emp_casual'];
            }else{
                $num_leaves=$result['emp_anual'];
            }
        }
        return $num_leaves;
    }
}