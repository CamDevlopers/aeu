<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of log_helper
 *
 * @author MAO Vannakpanha
 */
class log_helper {
    //put your code here
    function getUser(){
        $ci=& get_instance();
        $ci->load->database(); 

        $sql = "select * from tbluser"; 
        $query = $ci->db->query($sql);
        $row = $query->result()->num_rows();
   }
}

?>
