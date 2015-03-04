<?php

    class M_photo_albums extends CI_Model{
        
        function add_album($data){
            $this->db->insert('tblalbum',$data);            
        }
        
        function get_album(){
                $this->db->select("tblalbum.*, count(tblalbum.img_name) as number,tbluser.fullname as name");
                $this->db->from('tblalbum');
                $this->db->join('tbluser','tbluser.uid=tblalbum.user_id');
                if($this->session->userdata('level')==2){
                    $this->db->where('user_id',$this->session->userdata('user_id'));
                }
                $this->db->group_by('album_name');
		$this->db->order_by("album_id","desc");
		$data = $this->db->get();
		return $data;
	}
        
        function delete_album($id){
            $this->db->insert('tbllog',array('fullname'=>$this->session->userdata('fname'),
                'activities'=>'Deleted an album in Photo albums'));
            $this->db->where('gid',$id);
            $this->db->delete('tblalbum');
            return TRUE;
        }
        
        function get_album_byid($id){
            
            $this->db->where('gid',$id);
            $data = $this->db->get('tblalbum'); 
            return $data;
        }
        
        function update_slideshow($data_image = array()){
            
            $data['image_name'] = $data_image['file_name'];
            $data['image_description'] = $this->input->post('img_des');
            $id = $this->input->post('id');
            $this->db->where('sid',$id);
            $this->db->update('tblslideshow',$data);
        }
        
      public function count_photo_album(){
       $this->db->group_by('gid');
       if($this->session->userdata('level')==2){
            $this->db->where('user_id',$this->session->userdata('user_id'));
        }
       return $this->db->get('tblalbum')->num_rows();
    }
        
    }
?>
