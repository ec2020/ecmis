<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @author J.A.S.S. Jayasinghe
 * @organization Election Commission Sri Lanka
 * @date 12/5/2019
 */
class Report_model extends CI_Model {
    public function getDetails($type,$sdate,$edate){
        $uid=$this->session->userdata('id');
        $this->db->from('employee_tbl');
        $this->db->join('leave_tbl', 'leave_tbl.lev_approved_by = employee_tbl.emp_id');
        $opt1="leave_tbl.lev_emp_id='".$uid."' and leave_tbl.lev_type='".$type."' and ((leave_tbl.lev_start_date >= '".$sdate."' and leave_tbl.lev_start_date < '".$edate."') OR (leave_tbl.lev_end_date > '".$sdate."' and leave_tbl.lev_end_date < '".$edate."'))";
        $this->db->where($opt1);
        $query = $this->db->get();
        return $query->result();
    }

    public function printLeave($lev_id){
        //get leave 
        $emp_name="";
        $emp_designation="";
        $emp_dept="";
        $emp_first_appoinment_date;
        $lev_type="";
        $lev_num_days=0;
        $lev_taken_anual=0;
        $lev_taken_casual=0;
        $lev_taken_duty=0;
        $lev_apply_date;
        $lev_start_date;
        $lev_end_date;
        $lev_reason="";
        $lev_over_look_status="";
        $lev_over_look_by="";
        $lev_over_look_date;
        $lev_apprve_status="";
        $lev_apprve_by="";
        $lev_apprve_date;
        $leave_applied_date;
        $uid=$this->session->userdata('id');
        //start of html doccument
        $html_content="<h4>APPLICATION FOR LEAVE</h4>";
        $uid=$this->session->userdata('id');
        $query = $this->db->get_where('leave_tbl', array('lev_id'=>$lev_id));
        $leaveResult=$query->result();
        if(isset($leaveResult)){
            foreach($leaveResult as $a){
                $lev_type=$a->lev_type;
                $lev_num_days=$a->lev_net_days;
                $lev_apply_date=$a->lev_applied_date;
                $lev_start_date=$a->lev_start_date;
                $lev_end_date=$a->lev_end_date;
                $lev_reason=$a->lev_reason;
                $lev_over_look_status=$a->lev_act_status;
                $lev_over_look_by=$a->lev_act_by;
                $lev_over_look_date=$a->lev_act_date;
                $lev_apprve_status=$a->lev_approved_status;
                $lev_apprve_by=$a->lev_approved_by;
                $lev_apprve_date=$a->lev_approved_date;
                $lev_apprve_comment=$a->lev_approve_comm;
                $leave_applied_date=$a->lev_applied_date;
            }
        }
        //user details
    
        $query1 = $this->db->get_where('employee_tbl', array('emp_id'=>$uid));
        $leaveResult1=$query1->result();
        
        if(isset($leaveResult1)){
            foreach($leaveResult1 as $b){
                 
                $emp_name=$b->emp_name;
                
                $emp_designation=$b->emp_designation;

                $emp_dept=$b->emp_dept;
                
                $emp_first_appoinment_date=$b->emp_start_date;
                
            }
        }
        
        //get leave summery details Changes are required
        $query2 = $this->db->get_where('leave_summery_tbl', array('emp_id'=>$uid));
        $userResult2=$query2->result();
        if(isset($userResult2)){
            foreach($userResult2 as $c){
                $lev_taken_anual=$c->emp_anual_taken;
                $lev_taken_casual=$c->emp_casual_taken;
                $lev_taken_duty=$c->emp_duty_leave_taken;
            }
        } 
        $lev_count;
        if($lev_type=='Anual'){
            $lev_count=$this->getTotLeaveByEmpId($uid,'Anual');
        }else if($lev_type=='Dutyleave'){
            $lev_count=$this->getTotLeaveByEmpId($uid,'Dutyleave');
        }else{
            $lev_count=$this->getTotLeaveByEmpId($uid,'Casual');;
        }
        // get overlooked
        $over_looked_emp_name="";
        $over_looked_emp_designation="";
        $query4=$this->db->get_where('employee_tbl', array('emp_id'=>$lev_over_look_by));
        $result4=$query4->result();
        if(isset($result4)){
            foreach($result4 as $n){
                $over_looked_emp_name=$n->emp_name;
                $over_looked_emp_designation=$n->emp_designation;
            }

        }
        //get appove details
        $over_approve_emp_name="";
        $over_approve_emp_designation="";
        $query5=$this->db->get_where('employee_tbl', array('emp_id'=>$lev_apprve_by));
        $result5=$query5->result();
        if(isset($result5)){
            foreach($result5 as $x){
                $over_approve_emp_name=$x->emp_name;
                $over_approve_emp_designation=$x->emp_designation;
            }

        }

        //$html_content=$html_content."-".$lev_type."-".$emp_name."-".$lev_taken_anual;
        $html_content="<html><head><style>
        table {
            border-collapse: collapse;
            width:100%;
          }
          
          table, th, td {
            border: 1px solid black;
          }

          th, td {
            padding: 5px;
            text-align: left;
          }
          th {
            background-color: #7E7B7A;
            color: white;
            text-align: left;
          }
          .watermark {
            position: fixed;
            bottom:   0px;
            left:     0px;
            /** The width and height may change 
                according to the dimensions of your letterhead
            **/
            width:    21.8cm;
            height:   28cm;

            /** Your watermark should be behind every content**/
            z-index:  -1000;
        }


          tr:nth-child(even) {background-color: #f2f2f2;}
        </style></head><body> 
        <h4>APPLICATION FOR LEAVE</h4>
        <table>
        <tr>Name<td>Name</td><td>".$emp_name."</td><td>Date of First Appoinment</td><td>".$emp_first_appoinment_date."</td></tr>
        <tr><td>Designation</td><td>".$emp_designation."</td><td>Date of Commencing leave</td><td>".$lev_start_date."</td></tr>
        <tr><td>Ministry/Dept.</td><td>".$emp_dept."</td><td>Date of resuming duties</td><td>".$lev_end_date."</td></tr>
        <tr><td>Number of days leave applied for</td><td>".$lev_type." - ".$lev_num_days."</td><td>Reasons for leave</td><td>".$lev_reason."</td></tr>
        <tr><td>Leave taken in current year</td><td>".$lev_type." - ".$lev_count."</td><td rowspan='2'>Signature of Applicant</td><td rowspan='2'></td></tr>
        <tr><td>Date</td><td>".$leave_applied_date."</td></tr></table><table style='margin-top:5px;'>
        <tr><td>Agree to act for the applicant</td><td>".$lev_over_look_status."</td><td>".$over_looked_emp_name." - ".$over_looked_emp_designation."</td><td>".$lev_over_look_date."</td></tr>
        <tr><td>Leave allowed / Not allowed </td><td>".$lev_apprve_status."</td><td>". $over_approve_emp_name." - ".$over_approve_emp_designation."</td><td>".$lev_apprve_date."</td></tr>
        
        </table> <hr></body></html>";
        return $html_content;
    }

    //print all leaves
    public function printAll($sdate,$edate,$type){

        $uid=$this->session->userdata('id');
        //$query = $this->db->get('leave_tbl');
        //$query = $this->db->get_where('leave_tbl', array('lev_emp_id' => $uid, 'lev_type' =>$type));
        //$result=$query->result();
        
        $this->db->from('employee_tbl');
        $this->db->join('leave_tbl', 'leave_tbl.lev_approved_by = employee_tbl.emp_id');
        //$this->db->where(array('leave_tbl.lev_emp_id' => $uid, 'leave_tbl.lev_type' =>$type));
        //$this->db->where(array('leave_tbl.lev_emp_id' => $uid, 'leave_tbl.lev_type' =>$type));
        // $this->db->where(array('leave_tbl.lev_start_date >=' =>$sdate,'leave_tbl.lev_end_date <' =>$edate ));;
        $opt1="leave_tbl.lev_emp_id='".$uid."' and leave_tbl.lev_type='".$type."' and ((leave_tbl.lev_start_date >= '".$sdate."' and leave_tbl.lev_start_date < '".$edate."') OR (leave_tbl.lev_end_date > '".$sdate."' and leave_tbl.lev_end_date < '".$edate."'))";
        $this->db->where($opt1);
        $query = $this->db->get();
        $result=$query->result();

        //$html_content=$html_content."</tbody></table>";
        $baseurl=base_url();
        $html_content="<html><head><style>
        table {
            border-collapse: collapse;
            width:100%;
          }
          
          table, th, td {
            border: 1px solid black;
          }

          th, td {
            padding: 5px;
            text-align: left;
          }
          th {
            background-color: #7E7B7A;
            color: white;
            text-align: left;
          }
          .watermark {
            position: fixed;
            bottom:   0px;
            left:     0px;
            /** The width and height may change 
                according to the dimensions of your letterhead
            **/
            width:    21.8cm;
            height:   28cm;

            /** Your watermark should be behind every content**/
            z-index:  -1000;
        }


          tr:nth-child(even) {background-color: #f2f2f2;}
        </style></head><body><h4>Leave report from ".$sdate." To ".$edate."</h4>";
        $html_content=$html_content."<div class='watermark'>ECLeaves</div><table><tr><th>Id</th><th>Leave Type</th><th>Start Date</th><th>End Date</th><th>Num. Dates</th><th>Reason</th><th>Status</th><th>Apprved By</th></tr>";
        if(isset($result)){
        foreach($result as $r){
            $html_content=$html_content."<tr>";
            $html_content=$html_content."<td style='width:5%'>".$r->lev_id."</td>";
            $html_content=$html_content."<td style='width:8%'>".$r->lev_type."</td>";
            $html_content=$html_content."<td style='width:10%'>".$r->lev_start_date."</td>";
            $html_content=$html_content."<td style='width:10%'>".$r->lev_end_date."</td>";
            $html_content=$html_content."<td style='width:5%'>".$r->lev_net_days."</td>";
            $html_content=$html_content."<td>".$r->lev_reason."</td>";
            $html_content=$html_content."<td style='width:12%'>".$r->lev_approved_status."</td>";
            $html_content=$html_content."<td style='width:25%'>".$r->emp_name." - ".$r->emp_designation."</td>";
            $html_content=$html_content."</tr>";
        }}
        $html_content=$html_content."</table></body></html>";
        return $html_content;
    }


    //print all via emp_id
    public function printAdminLeave($type,$sdate,$edate,$empId){

        $uid=$this->session->userdata('id');
        //$query = $this->db->get('leave_tbl');
        //$query = $this->db->get_where('leave_tbl', array('lev_emp_id' => $uid, 'lev_type' =>$type));
        //$result=$query->result();
        
        $this->db->from('employee_tbl');
        $this->db->join('leave_tbl', 'leave_tbl.lev_approved_by = employee_tbl.emp_id');
        //$this->db->where(array('leave_tbl.lev_emp_id' => $uid, 'leave_tbl.lev_type' =>$type));
        //$this->db->where(array('leave_tbl.lev_emp_id' => $uid, 'leave_tbl.lev_type' =>$type));
        // $this->db->where(array('leave_tbl.lev_start_date >=' =>$sdate,'leave_tbl.lev_end_date <' =>$edate ));;
        $opt1="leave_tbl.lev_emp_id='".$empId."' and leave_tbl.lev_approved_status='Approved' and leave_tbl.lev_type='".$type."' and ((leave_tbl.lev_start_date >= '".$sdate."' and leave_tbl.lev_start_date < '".$edate."') OR (leave_tbl.lev_end_date > '".$sdate."' and leave_tbl.lev_end_date < '".$edate."'))";
        $this->db->where($opt1);
        $query = $this->db->get();
        $result=$query->result();

        //$html_content=$html_content."</tbody></table>";
        $baseurl=base_url();
        $html_content="<html><head><style>
        table {
            border-collapse: collapse;
            width:100%;
          }
          
          table, th, td {
            border: 1px solid black;
          }

          th, td {
            padding: 5px;
            text-align: left;
          }
          th {
            background-color: #7E7B7A;
            color: white;
            text-align: left;
          }
          .watermark {
            position: fixed;
            bottom:   0px;
            left:     0px;
            /** The width and height may change 
                according to the dimensions of your letterhead
            **/
            width:    21.8cm;
            height:   28cm;

            /** Your watermark should be behind every content**/
            z-index:  -1000;
        }


          tr:nth-child(even) {background-color: #f2f2f2;}
        </style></head><body><h4>Leave report from ".$sdate." To ".$edate."</h4>";
        $html_content=$html_content."<div class='watermark'>ECLeaves</div><table><tr><th>Id</th><th>Leave Type</th><th>Start Date</th><th>End Date</th><th>Num. Dates</th><th>Reason</th><th>Status</th><th>Apprved By</th></tr>";
        if(isset($result)){
        foreach($result as $r){
            $html_content=$html_content."<tr>";
            $html_content=$html_content."<td style='width:5%'>".$r->lev_id."</td>";
            $html_content=$html_content."<td style='width:8%'>".$r->lev_type."</td>";
            $html_content=$html_content."<td style='width:10%'>".$r->lev_start_date."</td>";
            $html_content=$html_content."<td style='width:10%'>".$r->lev_end_date."</td>";
            $html_content=$html_content."<td style='width:5%'>".$r->lev_net_days."</td>";
            $html_content=$html_content."<td>".$r->lev_reason."</td>";
            $html_content=$html_content."<td style='width:12%'>".$r->lev_approved_status."</td>";
            $html_content=$html_content."<td style='width:25%'>".$r->emp_name." - ".$r->emp_designation."</td>";
            $html_content=$html_content."</tr>";
        }}
        $html_content=$html_content."</table></body></html>";
        return $html_content;
    }

    //print all via dept
    public function printAdminDeptLeave($job_type,$sdate2,$edate2,$dept_id){

      $uid=$this->session->userdata('id');
      
      $this->db->from('employee_tbl');
      $this->db->join('leave_tbl', 'leave_tbl.lev_approved_by = employee_tbl.emp_id');
      $opt1="employee_tbl.emp_dept='".$dept_id."' and leave_tbl.lev_approved_status='Approved' and employee_tbl.emp_user_type='".$job_type."' and ((leave_tbl.lev_start_date >= '".$sdate2."' and leave_tbl.lev_start_date < '".$edate2."') OR (leave_tbl.lev_end_date > '".$sdate."' and leave_tbl.lev_end_date < '".$edate."'))";
      $this->db->where($opt1);
      $query = $this->db->get();
      $result=$query->result();

      $baseurl=base_url();
      $html_content="<html><head><style>
      table {
          border-collapse: collapse;
          width:100%;
        }
        
        table, th, td {
          border: 1px solid black;
        }

        th, td {
          padding: 5px;
          text-align: left;
        }
        th {
          background-color: #7E7B7A;
          color: white;
          text-align: left;
        }
        .watermark {
          position: fixed;
          bottom:   0px;
          left:     0px;
          /** The width and height may change 
              according to the dimensions of your letterhead
          **/
          width:    21.8cm;
          height:   28cm;

          /** Your watermark should be behind every content**/
          z-index:  -1000;
      }


        tr:nth-child(even) {background-color: #f2f2f2;}
      </style></head><body><h4>Leave report from ".$sdate." To ".$edate."</h4>";
      $html_content=$html_content."<div class='watermark'>ECLeaves</div><table><tr><th>Id</th><th>Leave Type</th><th>Start Date</th><th>End Date</th><th>Num. Dates</th><th>Reason</th><th>Status</th><th>Apprved By</th></tr>";
      if(isset($result)){
      foreach($result as $r){
          $html_content=$html_content."<tr>";
          $html_content=$html_content."<td style='width:5%'>".$r->lev_id."</td>";
          $html_content=$html_content."<td style='width:8%'>".$r->lev_type."</td>";
          $html_content=$html_content."<td style='width:10%'>".$r->lev_start_date."</td>";
          $html_content=$html_content."<td style='width:10%'>".$r->lev_end_date."</td>";
          $html_content=$html_content."<td style='width:5%'>".$r->lev_net_days."</td>";
          $html_content=$html_content."<td>".$r->lev_reason."</td>";
          $html_content=$html_content."<td style='width:12%'>".$r->lev_approved_status."</td>";
          $html_content=$html_content."<td style='width:25%'>".$r->emp_name." - ".$r->emp_designation."</td>";
          $html_content=$html_content."</tr>";
      }}
      $html_content=$html_content."</table></body></html>";
      return $html_content;
  }

  public function getTotLeaveByEmpId($id, $lev_type){
    $this->db->select("SUM(lev_net_days) AS tot");
    $this->db->where('lev_emp_id',$id);
    $this->db->where('lev_type',$lev_type);
    $this->db->where('lev_approved_status','Approved');
    $query=$this->db->get('leave_tbl');
    if($query->num_rows()>0){
        $result=$query->row_array();
        return $result['tot'];
    }
    //print_r($data);
    //die();
    return 0.0;
}

}