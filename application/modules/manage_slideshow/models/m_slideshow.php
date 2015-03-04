<?php

class M_slideshow extends CI_Model {

    function add_slideshow() {

        if (isset($_FILES['img_slide']['name'])) {
            $count = count($_FILES['img_slide']['name']);
            $uploads = $_FILES['img_slide'];

            for ($i = 0; $i < $count; $i++) {
                if ($uploads['error'][$i] == 0) {
                    $data['image_name'] = date('Y_m_d_H_i_s') . $uploads['name'][$i];
                    move_uploaded_file($uploads['tmp_name'][$i], 'images/slideshows/' . $data['image_name']);
                }
            }
        }
        $data['title']=$this->input->post('title');
        $data['image_description'] = $this->input->post('img_des');

        $this->db->insert('tblslideshow', $data);
    }

    function get_slideshow() {

        $this->db->order_by("sid", "desc");
        $this->db->where('deleted =', 0);
        $data = $this->db->get('tblslideshow');
        return $data;
    }

    function delete_partner($id) {
        $this->db->where('pid', $id);
        $this->db->update('tblpartner', array('deleted' => 1));
        return TRUE;
    }

    function delete_slideshow($id) {
        $this->db->where('sid', $id);
        $this->db->update('tblslideshow', array('deleted' => 1));
        return TRUE;
    }

    function get_slideshow_byid($id) {

        $this->db->where('sid', $id);
        $data = $this->db->get('tblslideshow');
        return $data;
    }

    function update_slideshow($data_image = array()) {
        
        if (isset($_FILES['img_slide']['name'])) {
            $count = count($_FILES['img_slide']['name']);
            
            $uploads = $_FILES['img_slide'];

            for ($i = 0; $i < $count; $i++) {
                if ($uploads['error'][$i] == 0) {
                    $data['image_name'] = date('Y_m_d_H_i_s') . $uploads['name'][$i];
                    move_uploaded_file($uploads['tmp_name'][$i], 'images/slideshows/' . $data['image_name']);
                }
            }
        }
        $data['image_description'] = $this->input->post('img_des');
        $id = $this->input->post('id');
        $this->db->where('sid', $id);
        $this->db->update('tblslideshow', $data);
    }

}

?>
