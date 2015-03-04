<?php
class M_mnpage extends CI_Model{
    public function getListPage(){
        $this->db->order_by('mid' , 'DESC');
        return $this->db->get('tblmenu');
    }
    public function AddMenu(){
        $data['en_menu'] = $this->input->post('en_menu');
        $data['kh_menu'] = $this->input->post('kh_menu');
        $data['en_description'] = $this->input->post('en_des');
        $data['kh_description'] = $this->input->post('kh_des');
        $data['m_status'] = $this->input->post('status');
        if($this->input->post('m_order') == ""){
            $m_order = 0;
        }else {
            $m_order = $this->input->post('m_order');
        }
        $data['m_order'] = $m_order;
        $this->db->insert('tblmenu' , $data);
    }
    public function getMenuById(){
        $this->db->where('mid' , $this->uri->segment(3));
        return $this->db->get('tblmenu');
    }
    public function EditMenu(){
        $this->db->where('mid' , $this->uri->segment(3));
        $this->db->set('en_menu' , $this->input->post('en_menu'));
        $this->db->set('kh_menu' , $this->input->post('kh_menu'));
        $this->db->set('en_description' , $this->input->post('en_des'));
        $this->db->set('kh_description' , $this->input->post('kh_des'));
        $this->db->set('m_status' , $this->input->post('status'));
        if($this->input->post('m_order') == ""){
            $m_order = 0;
        }else {
            $m_order = $this->input->post('m_order');
        }
        $this->db->set('m_order' , $m_order);
        $this->db->update('tblmenu');
    }
    public function deleteMenu(){
        $this->db->where('mid' , $this->uri->segment(3));
        $this->db->delete('tblmenu');
    }
    
    public function count_menu(){
      
       return $this->db->get('tblmenu')->num_rows();
    }
    
}
