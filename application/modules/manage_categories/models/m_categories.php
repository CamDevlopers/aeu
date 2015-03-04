<?php

class M_categories extends CI_Model {

    function add_categories() {

        $data['en_title'] = $this->input->post('title_en');
        $data['kh_title'] = $this->input->post('title_kh');
        $data['en_description'] = $this->input->post('en_des');
        $data['kh_description'] = $this->input->post('kh_des');
        $data['fac_id'] = $this->input->post('fac_name');

        $this->db->insert('tblcategory', $data);
    }

    function get_categories() {
        $this->db->select('tblcategory.en_title as et, tblcategory.kh_title as kt,tblcategory.cid as cid,tblfaculty.en_title as fet');
        $this->db->from('tblcategory');
        $this->db->join('tblfaculty','tblcategory.fac_id=tblfaculty.fid');
        $this->db->where('subid', 0);
        $this->db->order_by("cid", "desc");
        return $this->db->get();
    }

    function delete_categories($id) {
        $this->db->where('cid', $id);
        $this->db->delete('tblcategory');
        return TRUE;
    }

    function get_categories_byid($id) {

        $this->db->where('cid', $id);
        $data = $this->db->get('tblcategory');
        return $data;
    }

    function update_categories() {

        $data['en_title'] = $this->input->post('title_en');
        $data['kh_title'] = $this->input->post('title_kh');
        $data['en_description'] = $this->input->post('en_des');
        $data['kh_description'] = $this->input->post('kh_des');
        $data['fac_id'] = $this->input->post('fac_name');

        $id = $this->input->post('id');
        $this->db->where('cid', $id);
        $this->db->update('tblcategory', $data);
    }

    function get_faculties() {
        $this->db->where('deleted', 0);
        $data = $this->db->get('tblfaculty');
        return $data;
    }
    
    function count_cat(){
        $this->db->where('subid',0);
        return $this->db->get('tblcategory')->num_rows();
    }

}

?>
