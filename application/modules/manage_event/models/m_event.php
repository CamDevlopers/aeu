<?php

    class M_event extends CI_Model{
        
        function add_event(){
            
            $data['en_title'] = $this->input->post('title_en');
            $data['kh_title'] = $this->input->post('title_kh');
            $data['en_short_desc'] = $this->input->post('s_des_en');
            $data['kh_short_desc'] = $this->input->post('s_des_kh');
            $data['en_long_desc'] = $this->input->post('l_des_en');
            $data['kh_long_desc'] = $this->input->post('l_des_kh');
            $data['cat_id'] = $this->input->post('cat_name');
            $data['uid']=$this->session->userdata('user_id');
            
            if (isset($_FILES['thumbnial']['name'])!='') {
                $count = count($_FILES['thumbnial']['name']);
                $uploads = $_FILES['thumbnial'];
                
                for ($i = 0; $i < $count; $i++) {
                    if ($uploads['error'][$i] == 0) {
                        $data['thumbnail'] = date('Y_m_d_H_i_s').$uploads['name'][$i];
                        move_uploaded_file($uploads['tmp_name'][$i], 'images/thumbnial/' .$data['thumbnail']);

                    }
                }
            }
            $this->db->insert('tbllog',array('fullname'=>$this->session->userdata('fname'),
                'activities'=>'Posted <b>'.$data['en_title'].'</b> in Events'));
            $this->db->insert('tblevent',$data);            
        }
        
        function get_event(){
             if($this->session->userdata('level')==2){
                    $this->db->where('uid' , $this->session->userdata('user_id'));
                }
		$this->db->order_by("eid","desc");
		$data = $this->db->get('tblevent');
		return $data;
	}
        
        function delete_event($id){
            $this->db->insert('tbllog',array('fullname'=>$this->session->userdata('fname'),
                'activities'=>'Deleted a post in Events'));
            $this->db->where('eid',$id);
            $this->db->delete('tblevent');
            return TRUE;
        }
        
        function get_event_byid($id){
            
            $this->db->where('eid',$id);
            $data = $this->db->get('tblevent'); 
            return $data;
        }
        
        function update_event(){
            
            $data['en_title'] = $this->input->post('title_en');
            $data['kh_title'] = $this->input->post('title_kh');
            $data['en_short_desc'] = $this->input->post('s_des_en');
            $data['kh_short_desc'] = $this->input->post('s_des_kh');
            $data['en_long_desc'] = $this->input->post('l_des_en');
            $data['kh_long_desc'] = $this->input->post('l_des_kh');
            $data['cat_id'] = $this->input->post('cat_name');
            $data['uid']=$this->session->userdata('user_id');
            
            if (isset($_FILES['thumbnial']['name'])) {
                $count = count($_FILES['thumbnial']['name']);
                $uploads = $_FILES['thumbnial'];
                
                for ($i = 0; $i < $count; $i++) {
                    if ($uploads['error'][$i] == 0) {
                        $data['thumbnail'] = date('Y_m_d_H_i_s').$uploads['name'][$i];
                        move_uploaded_file($uploads['tmp_name'][$i], 'images/thumbnial/' .$data['thumbnail']);

                    }
                
                
                    }
            }
            $this->db->insert('tbllog',array('fullname'=>$this->session->userdata('fname'),
                'activities'=>'Updated <b>'.$data['en_title'].'</b> in Events'));
            $id = $this->input->post('id');
            $this->db->where('eid',$id);
            $this->db->update('tblevent',$data);
        }
        
        function count_event(){
            if($this->session->userdata('level')==2){
                    $this->db->where('uid' , $this->session->userdata('user_id'));
            }
            return $this->db->get('tblevent')->num_rows();
        }
        
    }
?>
