<?php

class M_partner extends CI_Model {

    function add_partner($data_image = array()) {

        if (isset($_FILES['img_partner']['name'])) {
            $count = count($_FILES['img_partner']['name']);
            $uploads = $_FILES['img_partner'];

            for ($i = 0; $i < $count; $i++) {
                if ($uploads['error'][$i] == 0) {
                    $data['image_name'] = date('Y_m_d_H_i_s') . $uploads['name'][$i];
                    move_uploaded_file($uploads['tmp_name'][$i], 'images/partners/' . $data['image_name']);
                }
            }
        }
        $data['image_description'] = $this->input->post('en_des');
        $data['kh_description'] = $this->input->post('kh_des');
        $data['link'] = $this->input->post('link');
         $data['en_name'] = $this->input->post('en_name');
         $data['kh_name'] = $this->input->post('kh_name');
        $this->db->insert('tblpartner', $data);
    }

    function get_partner() {
        $this->db->order_by("pid", "desc");
        $this->db->where('deleted =', 0);
        $data = $this->db->get('tblpartner');
        return $data;
    }

    function delete_partner($id) {
        $this->db->where('pid', $id);
        $this->db->update('tblpartner', array('deleted' => 1));
        return TRUE;
    }

    function get_partner_byid($id) {

        $this->db->where('pid', $id);
        $data = $this->db->get('tblpartner');
        return $data;
    }

    function update_partner($data_image = array()) {
        if (isset($_FILES['img_partner']['name'])) {
            $count = count($_FILES['img_partner']['name']);
            if ($count < 1 or $count == '' or $count == 0) {
                
            } else {
                $uploads = $_FILES['img_partner'];

                for ($i = 0; $i < $count; $i++) {
                    if ($uploads['error'][$i] == 0) {
                        $data['image_name'] = date('Y_m_d_H_i_s') . $uploads['name'][$i];
                        move_uploaded_file($uploads['tmp_name'][$i], 'images/partners/' . $data['image_name']);
                    }
                }
            }
        }
        $data['link'] = $this->input->post('link');
        $data['en_name'] = $this->input->post('en_name');
        $data['kh_name'] = $this->input->post('kh_name');
        $data['image_description'] = $this->input->post('en_des');
        $data['kh_description'] = $this->input->post('kh_des');
        $id = $this->input->post('id');
        $this->db->where('pid', $id);
        $this->db->update('tblpartner', $data);
    }

}

?>
