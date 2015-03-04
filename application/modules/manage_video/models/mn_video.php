<?php
class Mn_video extends CI_Model{
    public function getListVideo(){
        $this->db->order_by('vid' , 'desc');
        if($this->session->userdata('level')==2){
            $this->db->where('uid' , $this->session->userdata('user_id'));
        }
        return $this->db->get('tblvideo');
    }
    public function AddVideo(){
        
        $data['en_title'] = $this->input->post('en_title');
        $data['kh_title'] = $this->input->post('kh_title');
        $data['uid'] = $this->session->userdata('user_id');
        $data['is_youtube'] = $this->input->post('is_youtube');
        $data['youtube_url'] = $this->input->post('url');
        $this->db->insert('tblvideo' , $data);
        $this->db->insert('tbllog',array('fullname'=>$this->session->userdata('fname'),
                'activities'=>'Added <b>'.$data['en_title'].'</b> in Video albums'));
    }
    public function getVideoById(){
        $this->db->where('vid' , $this->uri->segment(3));
        return $this->db->get('tblvideo');
    }
    public function EditVideo(){
        $this->db->where('vid' , $this->uri->segment(3));
        $this->db->set('en_title' , $this->input->post('en_title'));
        $this->db->set('kh_title' , $this->input->post('kh_title'));
        $this->db->set('youtube_url' , $this->input->post('url'));
        $this->db->set('uid' , $this->session->userdata('user_id'));
        $this->db->set('is_youtube', 1);  
        $this->db->update('tblvideo');
        $this->db->insert('tbllog',array('fullname'=>$this->session->userdata('fname'),
                'activities'=>'Updated <b>'.$data['en_title'].'</b> in Video albums'));
    }
    public function deleteVideo(){
        $this->db->where('vid' , $this->uri->segment(3));
        $this->db->delete('tblvideo');
        $this->db->insert('tbllog',array('fullname'=>$this->session->userdata('fname'),
                'activities'=>'Deleted a video in Video albums'));
    }
    
    public function count_video(){
        if($this->session->userdata('level')==2){
            $this->db->where('uid' , $this->session->userdata('user_id'));
        }
        return $this->db->get('tblvideo')->num_rows();
    }
    
    public function AddVideoUpload(){
        $data['en_title'] = $this->input->post('en_title');
        $data['kh_title'] = $this->input->post('kh_title');
        $data['uid'] = $this->session->userdata('user_id');
        $data['is_youtube'] = $this->input->post('is_youtube');
        if (isset($_FILES['video']['name'])) {
            //count how many video you added
            $count = count($_FILES['video']['name']);
            $uploads = $_FILES['video'];

            for ($i = 0; $i < $count; $i++) {
                if ($uploads['error'][$i] == 0) {
                    //your file name will generate with date of upload
                    $data['youtube_url'] = date('Y_m_d_H_i_s') . $uploads['name'][$i];
                    //move your file to directory you want
                    move_uploaded_file($uploads['tmp_name'][$i], 'videos/' . $data['youtube_url']);
                }
            }
        }
        $this->db->insert('tbllog',array('fullname'=>$this->session->userdata('fname'),
                'activities'=>'Added <b>'.$data['en_title'].'</b> in Video albums'));
        return $this->db->insert('tblvideo' , $data);
    }
     
    public function edit_upload(){
        $data['en_title'] = $this->input->post('en_title');
        $data['kh_title'] = $this->input->post('kh_title');
        $data['uid'] = $this->session->userdata('user_id');
        $id = $this->input->post('vid');
        $data['is_youtube'] = 0;
        if (isset($_FILES['video']['name'])) {
            //count how many video you added
            $count = count($_FILES['video']['name']);
            $uploads = $_FILES['video'];

            for ($i = 0; $i < $count; $i++) {
                if ($uploads['error'][$i] == 0) {
                    //your file name will generate with date of upload
                    $data['youtube_url'] = date('Y_m_d_H_i_s') . $uploads['name'][$i];
                    //move your file to directory you want
                    move_uploaded_file($uploads['tmp_name'][$i], 'videos/' . $data['youtube_url']);
                }
            }
        }
        $this->db->insert('tbllog',array('fullname'=>$this->session->userdata('fname'),
                'activities'=>'Updated <b>'.$data['en_title'].'</b> in Video albums'));
        $this->db->where('vid',$id);
        return $this->db->update('tblvideo' , $data);
    }
    
}
