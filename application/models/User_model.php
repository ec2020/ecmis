<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @author J.A.S.S. Jayasinghe
 * @organization Election Commission Sri Lanka
 * @date 12/5/2019
 */
class User_model extends CI_Model {

    //user validation direct access
    function loginValidation($data){
        $this->db->where('user_name',$data['user_name']);
        $query=$this->db->get('employee_tbl');
        if($query->num_rows()>0){
            foreach($query->result() as $row){
                   $pw=sha1($data['user_pw']);
                   if($pw==$row->user_pw){
                    $this->session->set_userdata('id',$row->emp_id);
                    $this->session->set_userdata('user_name',$row->emp_name);
                    $this->session->set_userdata('user_role',$row->emp_user_type);
                    $this->session->set_userdata('user_dept',$row->emp_dept);
                    $userRole=$row->emp_user_type;
                    $logString="Login-id-".$row->emp_id." ";
                    $this->addLog($logString);
                    switch($userRole){
                        case 'ADMIN':
                            $this->session->set_userdata('user_type','admin');
                            break;
                        case 'CC':
                            //set user type as Cheif clasr 
                            $this->session->set_userdata('user_type','cc');
                            break;
                        case 'HD':
                            //set user type as Head of the Department
                            $this->session->set_userdata('user_type','hd');
                            break;
                        case 'CG':
                            //set user type as Commissionar Genaral
                            $this->session->set_userdata('user_type','cg');
                            break;
                        case 'HM':
                            //set user type as Head of Maintanace
                            $this->session->set_userdata('user_type','hm');
                            break;
                        case 'TO':
                            //set user type as Technical Officer
                            $this->session->set_userdata('user_type','to');
                            break;
                        default:
                        $array_items = array('id' => '', 'user_name' => '', 'user_role' => '','user_dept'=>'');
                        $this->session->unset_userdata($array_items);
                        $this->session->sess_destroy();
                        $data['title']="EC-MMS";
                        $data['subtitle']="Election Commision Maintenance Management System";
                        $this->load->view('login_v',$data);
                    }
                    $this->session->set_userdata('user_status',true);
                    return true;
                }else{
                    return false;           
                }
            }
        }else{
            return false;
            //to do set error
        }
    }

    // user validation if use common login for MIS
    public function userValidationPortalAccess($id){

        $this->db->where('emp_id',$id);
        $query=$this->db->get('employee_tbl');
        if($query->num_rows()>0){
            foreach($query->result() as $row){
                   
                    $this->session->set_userdata('id',$row->emp_id);
                    $this->session->set_userdata('user_name',$row->emp_name);
                    $this->session->set_userdata('user_role',$row->emp_user_type);
                    $this->session->set_userdata('user_dept',$row->emp_dept);
                    $userRole=$row->emp_user_type;
                    $logString="Login-id-".$row->emp_id." ";
                    $this->addLog($logString);
                    switch($userRole){
                        case 'ADMIN':
                            $this->session->set_userdata('user_type','admin');
                            break;
                        case 'CC':
                            //set user type as Cheif clasr 
                            $this->session->set_userdata('user_type','cc');
                            break;
                        case 'HD':
                            //set user type as Head of the Department
                            $this->session->set_userdata('user_type','hd');
                            break;
                        case 'CG':
                            //set user type as Commissionar Genaral
                            $this->session->set_userdata('user_type','cg');
                            break;
                        case 'HM':
                            //set user type as Head of Maintanace
                            $this->session->set_userdata('user_type','hm');
                            break;
                        case 'TO':
                            //set user type as Head of Maintanace
                            $this->session->set_userdata('user_type','to');
                            break;
                        default:
                        $array_items = array('id' => '', 'user_name' => '', 'user_role' => '','user_dept'=>'');
                        $this->session->unset_userdata($array_items);
                        $this->session->sess_destroy();
                        $data['title']="EC-MMS";
                        $data['subtitle']="Election Commision Maintenance Management System";
                        $this->load->view('login_v',$data);
                    }
                    $this->session->set_userdata('user_status',true);
                    return true;
                
            }
        }else{
            return false;
            //to do set error
        }
    }

    function addLog($logString){
        $data = array(
            'log_detail' => $logString,
        );
        $save_status=$this->db->insert('log_tbl`', $data); 
    }
}