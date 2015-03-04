<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Manage_document extends MX_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model(array('manage_documents','manage_faculties/manage_faculty'));
    }

    public function index() {
        $data['albums'] = $this->manage_documents->get_album();
        $this->load->view('manage_albums', $data);
    }

    function form_add_album() {
        $data['fac'] = $this->manage_faculty->get_all2();
        $this->load->view('form_album',$data);
    }

    function add_albums() {
        if (isset($_FILES['userfile']['name'])) {
            $count = count($_FILES['userfile']['name']);
            $uploads = $_FILES['userfile'];
            $data['album_name'] = $this->input->post('title');
            $data['user_id'] = $this->session->userdata('user_id');
            $data['gid'] = $this->input->post('fac');
            for ($i = 0; $i < $count; $i++) {
                if ($uploads['error'][$i] == 0) {
                    $data['img_name'] = date('Y_m_d_H_i_s').$uploads['name'][$i];
                    move_uploaded_file($uploads['tmp_name'][$i], 'documents/' .$data['img_name']);
                   
                    $this->manage_documents->add_album($data);
                }
            }
            $this->db->insert('tbllog',array('fullname'=>$this->session->userdata('fname'),
                'activities'=>'Added <b>'.$data['album_name'].'</b> in Documents'));
            redirect('manage_document');
        }
    }

    //function delete image

    function delete_album() {
        $id = $this->uri->segment(3);
        if ($this->manage_documents->delete_album($id)) {
            redirect('photo_albums');
        } else {
            echo "Server not respond your request";
        }
    }
    
    function delete_img(){
        $this->db->insert('tbllog',array('fullname'=>$this->session->userdata('fname'),
                'activities'=>'Deleted an File in Documents'));
        $this->db->where('album_id',$this->input->post('key'));
        $this->db->delete('tbldocument');
        return true;
    }

    function form_update_album(){
        $id = $this->uri->segment(3);
        $data['fac'] = $this->manage_faculty->get_all();
        $data['img_data'] = $this->manage_documents->get_album_byid($id);
        $this->load->view('form_update_album',$data);
    }
    
//    function update_slideshow(){
//        $config['upload_path'] = 'images/slideshows/';
//        $config['allowed_types'] = 'gif|jpg|png';
//        $config['max_size'] = '1000';
//        $config['max_width'] = '1024';
//        $config['max_height'] = '768';
//        $this->load->library('upload', $config);
//        $this->upload->do_upload('img_slide');
//
//        $this->manage_documents->update_slideshow($this->upload->data());
//        redirect('manage_slideshow/index');
//    }

}