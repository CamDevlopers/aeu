<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Photo_albums extends MX_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model(array('m_photo_albums'));
    }

    public function index() {
        $data['albums'] = $this->m_photo_albums->get_album();
        $this->load->view('manage_albums', $data);
    }

    function form_add_album() {
        $this->load->view('form_album');
    }

    function add_albums() {
        if (isset($_FILES['userfile']['name'])) {
            $count = count($_FILES['userfile']['name']);
            $uploads = $_FILES['userfile'];
            $data['album_name'] = $this->input->post('title');
            $data['user_id'] = $this->session->userdata('user_id');
            $data['gid'] = $this->input->post('gid')?$this->input->post('gid'):random_string('alnum', 5);
            for ($i = 0; $i < $count; $i++) {
                if ($uploads['error'][$i] == 0) {
                    $data['img_name'] = date('Y_m_d_H_i_s').$uploads['name'][$i];
                    move_uploaded_file($uploads['tmp_name'][$i], 'images/photo_albums/' .$data['img_name']);
                   
                    $this->m_photo_albums->add_album($data);
                }
            }
            $this->db->insert('tbllog',array('fullname'=>$this->session->userdata('fname'),
                'activities'=>'Added <b>'.$data['album_name'].'</b> in Photo albums'));
            redirect('photo_albums');
        }
    }

    //function delete image

    function delete_album() {
        $id = $this->uri->segment(3);
        if ($this->m_photo_albums->delete_album($id)) {
            redirect('photo_albums');
        } else {
            echo "Server not respond your request";
        }
    }
    
    function delete_img(){
        $this->db->insert('tbllog',array('fullname'=>$this->session->userdata('fname'),
                'activities'=>'Deleted an image in Photo albums'));
        $this->db->where('album_id',$this->input->post('key'));
        $this->db->delete('tblalbum');
        return true;
    }

    function form_update_album(){
        $id = $this->uri->segment(3);
        $data['img_data'] = $this->m_photo_albums->get_album_byid($id);
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
//        $this->m_photo_albums->update_slideshow($this->upload->data());
//        redirect('manage_slideshow/index');
//    }

}