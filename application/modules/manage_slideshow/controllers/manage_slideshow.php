<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Manage_slideshow extends MX_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model(array('m_slideshow'));
    }

    public function index() {
        $data['slideshow'] = $this->m_slideshow->get_slideshow();
        $this->load->view('manage_slideshow', $data);
    }

    function form_add_slideshow() {
        $this->load->view('form_add_slideshow');
    }

    function add_slideshow() {
        $this->m_slideshow->add_slideshow();
        redirect('manage_slideshow/index');
    }

    //function delete image

    function delete_slideshow() {
        $id = $this->uri->segment(3);
        if ($this->m_slideshow->delete_slideshow($id)) {
            redirect('manage_slideshow');
        } else {
            echo "Server not respond your request";
        }
    }

    function form_update_slideshow(){
        $id = $this->uri->segment(3);
        $data['data'] = $this->m_slideshow->get_slideshow_byid($id);
        $this->load->view('form_update_slideshow',$data);
    }
    
    function update_slideshow(){
        
        $this->m_slideshow->update_slideshow();
        redirect('manage_slideshow/index');
    }

}