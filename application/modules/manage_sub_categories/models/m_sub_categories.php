<?php

    class M_sub_categories extends CI_Model{
        
        function add_sub_categories(){
            
            $data['en_title'] = $this->input->post('title_en');
            $data['kh_title'] = $this->input->post('title_kh');
            $data['en_description'] = $this->input->post('en_des');
            $data['kh_description'] = $this->input->post('kh_des');
            $data['subid'] = $this->input->post('subid');

            $this->db->insert('tblcategory',$data);            
        }
        
        function get_sub_categories(){
            
		$this->db->order_by("cid","desc");
                $this->db->where('subid !=',0);
		$data = $this->db->get('tblcategory');
		return $data;
	}
        
        function delete_sub_categories($id){
            $this->db->where('cid',$id);
            $this->db->delete('tblcategory');
            return TRUE;
        }
        
        function get_sub_categories_byid($id){
            
            $this->db->where('cid',$id);
            $data = $this->db->get('tblcategory'); 
            return $data;
        }
        
        function update_sub_categories(){
            
            $data['en_title'] = $this->input->post('title_en');
            $data['kh_title'] = $this->input->post('title_kh');
            $data['en_description'] = $this->input->post('en_des');
            $data['kh_description'] = $this->input->post('kh_des');
            $data['subid'] = $this->input->post('subid');
            
            $id = $this->input->post('id');
            $this->db->where('cid',$id);
            $this->db->update('tblcategory',$data);
        }
        
        function get_categories(){
            
            $this->db->where('subid',0);
            $data = $this->db->get('tblcategory');
            return $data;
	}
        
         function count_sub_cat(){
            $this->db->where('subid !=',0);
            return $this->db->get('tblcategory')->num_rows();
    }
        function get_main_cat($sid){
            $this->db->where('cid',$sid);
            return $this->db->get('tblcategory')->row()->en_title;
        }
    }
?>
