<?php

    class M_news extends CI_Model{
        
        function add_news(){
            
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
                        $data['thumbnial'] = date('Y_m_d_H_i_s').$uploads['name'][$i];
                        move_uploaded_file($uploads['tmp_name'][$i], 'images/thumbnial/' .$data['thumbnial']);

                    }
                }
            }
            $this->db->insert('tblnews',$data);   
            $this->db->insert('tbllog',array('fullname'=>$this->session->userdata('fname'),
                'activities'=>'Posted <b>'.$data['en_title'].'</b> in hot news'));
        }
        
        function get_news(){
            
		$this->db->order_by("nid","desc");
                if($this->session->userdata('level')==2){
                    $this->db->where('uid' , $this->session->userdata('user_id'));
                }
		$data = $this->db->get('tblnews');
		return $data;
	}
        
        function delete_news($id){
            $this->db->insert('tbllog',array('fullname'=>$this->session->userdata('fname'),
                'activities'=>'Deleted a post in hot news'));
            $this->db->where('nid',$id);
            $this->db->delete('tblnews');
            return TRUE;
        }
        
        function get_news_byid($id){
            
            $this->db->where('nid',$id);
            $data = $this->db->get('tblnews'); 
            return $data;
        }
        
        function update_news(){
            
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
                        $data['thumbnial'] = date('Y_m_d_H_i_s').$uploads['name'][$i];
                        move_uploaded_file($uploads['tmp_name'][$i], 'images/thumbnial/' .$data['thumbnial']);

                    }
                    }
            
                }
            $this->db->insert('tbllog',array('fullname'=>$this->session->userdata('fname'),
                'activities'=>'Updated <b>'.$data['en_title'].'</b> in hot news'));
            $id = $this->input->post('id');
            $this->db->where('nid',$id);
            $this->db->update('tblnews',$data);
        }
        
        function count_new(){
            if($this->session->userdata('level')==2){
                    $this->db->where('uid' , $this->session->userdata('user_id'));
            }
            return $this->db->get('tblnews')->num_rows();
        }
        
    }
?>
