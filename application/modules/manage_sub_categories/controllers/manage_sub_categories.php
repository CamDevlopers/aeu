<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Manage_sub_categories extends MX_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model(array('m_sub_categories'));
        $fckeditorConfig = array(
            'instanceName' => 'items[]',
            'BasePath' => base_url() . 'fckeditor/',
            'ToolbarSet' => 'Basic',
            'Width' => '100%',
            'Height' => '500',
            'Value' => ''
        );
        $this->load->library('fckeditor', $fckeditorConfig);
    }

    public function index() {
        $data['cat'] = $this->m_sub_categories->get_sub_categories();
        $this->load->view('manage_sub_categories', $data);
    }

    public function form_add_sub_categories() {
        $data['cat'] = $this->m_sub_categories->get_categories();
        $this->load->view('form_add_sub_categories', $data);
    }

    public function add_sub_categories() {
        $this->m_sub_categories->add_sub_categories();
        redirect('manage_sub_categories/index');
    }

    function delete_sub_categories() {
        $id = $this->uri->segment(3);
        if ($this->m_sub_categories->delete_sub_categories($id)) {
            redirect('manage_sub_categories');
        } else {
            echo "Server not respond your request";
        }
    }

    function form_update_sub_categories() {
        $id = $this->uri->segment(3);
        $data['cat'] = $this->m_sub_categories->get_categories();
        $data['data'] = $this->m_sub_categories->get_sub_categories_byid($id);
        $this->load->view('form_update_sub_categories', $data);
    }

    public function update_sub_categories() {
        $this->m_sub_categories->update_sub_categories();
        redirect('manage_sub_categories/index');
    }

 

}
