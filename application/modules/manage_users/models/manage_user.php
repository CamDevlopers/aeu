<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of manage_user
 *
 * @author Vannakpanha MAO
 */
class Manage_user extends CI_Model{
    //put your code here
    public function get_all(){
       $this->db->where('deleted',0);
       $this->db->where('uid !=',$this->session->userdata('user_id'));
       return $this->db->get('tbluser');
    }
    public function count_users(){
       $this->db->where('deleted',0);
       $this->db->where('uid !=',$this->session->userdata('user_id'));
       return $this->db->get('tbluser')->num_rows();
    }
    //insert user registration
    public function save($data,$permission){
       $this->db->insert('tbluser',$data);
       $id = $this->db->insert_id();
       return $this->set_permission($permission,$id)==TRUE?TRUE:FALSE;
    }
    //set permission for user
    public function set_permission($permission,$id){
        foreach ($permission as $p){
            $data_permission = array(
                'cid' => $p,
                'uid' => $id
            );
            $this->db->insert('tblcat_user',$data_permission);
        }
        return TRUE;
    }
    //delete user from db
    public function delete($id){
        $this->db->where('uid',$id);
        $data['deleted']=1;
        $this->db->update('tbluser',$data);
        return TRUE;
    }
    //get user 
    public function user_info($id){
       $this->db->where('uid',$id);
       return $this->db->get('tbluser')->row();
    }
    //update user
    public function update($data,$permmission,$id){
      if($permmission){
       if($this->delete_permission($id)){
          $this->db->where('uid',$id);
          $this->db->update('tbluser',$data);
          $this->set_permission($permmission, $id);
          return TRUE;  
        }else{
            return FALSE;
        }
      }else{
          $this->db->where('uid',$id);
          $this->db->update('tbluser',$data);
           return TRUE;  
      }
    }
    
    public function delete_permission($id){
        $this->db->where('uid',$id);
        $this->db->delete('tblcat_user');
        return TRUE;
    }
    
    //this function use for get permission from user when update
    public function get_permission($cat_id,$user_id){
        $this->db->where('cid',$cat_id);
        $this->db->where('uid',$user_id);
       return $this->db->get('tblcat_user')->num_rows();
    }
}

?>
