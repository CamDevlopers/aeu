<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of login
 *
 * @author MAO Vannakpanha
 */
class Logins extends CI_Model{
    //put your code here
    
    public function validation($data){
        $this->db->where('username',$data['username']);
        $this->db->where('password',$data['password']);
        $this->db->where('deleted',0);
        return $this->db->get('tbluser');
   
    }
}

?>
