<?php

    class Manage_documents extends CI_Model{
        
        function add_album($data){
            $this->db->insert('tbldocument',$data);            
        }
        
        function get_album(){
                $this->db->select("tbldocument.*, count(tbldocument.img_name) as number,tbluser.fullname as name");
                $this->db->from('tbldocument');
                $this->db->join('tbluser','tbluser.uid=tbldocument.user_id');
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
            if($this->session->userdata('level')==2){
                    $this->db->where('user_id',$this->session->userdata('user_id'));
                }
            $data = $this->db->get('tbldocument'); 
            return $data;
        }
        
    public function count_photo_album(){
       $this->db->group_by('album_name');
       if($this->session->userdata('level')==2){
            $this->db->where('user_id',$this->session->userdata('user_id'));
        }
       return $this->db->get('tbldocument')->num_rows();
    }
        
}
?>
