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
class Manage_faculty extends CI_Model{
    //put your code here
    public function get_all(){
       $this->db->where('deleted',0);
       $this->db->order_by('f_order','asc');
       return $this->db->get('tblfaculty');
    }
    public function get_all2(){
       $this->db->where('deleted',0);
       $this->db->where('fid !=',6);
       $this->db->order_by('f_order','asc');
       return $this->db->get('tblfaculty');
    }
    
    public function get_category_by_faculty($id){
       $this->db->where('deleted',0);
       $this->db->where('fac_id',$id);
       $this->db->where('subid',0);
       $this->db->order_by('c_order','asc');
       return $this->db->get('tblcategory'); 
    }
    public function AddFaculty(){
        $data['en_title'] = $this->input->post('en_title');
        $data['kh_title'] = $this->input->post('kh_title');
        if($this->input->post('f_order') == ""){
            $f_order = 0;
        }else {
            $f_order = $this->input->post('f_order');
        }
        $data['f_order'] = $f_order;
        $data['deleted'] = 0;
        $data['en_description'] = $this->input->post('en_des');
        $data['kh_description'] = $this->input->post('kh_des');
        $this->db->insert('tblfaculty' , $data);
        
    }
    public function getFacultyById(){
        $this->db->where('fid' , $this->uri->segment(3));
        $this->db->where('deleted' , 0);
        return $this->db->get('tblfaculty');
    }
    public function EditFaculty(){
        $this->db->where('fid' , $this->uri->segment(3));
        $this->db->set('en_title' , $this->input->post('en_title'));
        $this->db->set('kh_title' , $this->input->post('kh_title'));
        $this->db->set('en_description' , $this->input->post('en_des'));
        $this->db->set('kh_description' , $this->input->post('kh_des'));
        if($this->input->post('f_order') == ""){
            $f_order = 0;
        }else {
            $f_order = $this->input->post('f_order');
        }
        $this->db->set('f_order' , $f_order);
        $this->db->update('tblfaculty');
    }
    public function deleteFaculty(){
        $this->db->where('fid' , $this->uri->segment(3));
        $this->db->set('deleted' , 1);
        $this->db->update('tblfaculty');
    }
    
    public function count_faculty(){
      
       return $this->db->get('tblfaculty')->num_rows();
    }
    
}

?>
