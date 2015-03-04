<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Manage_categories extends MX_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model(array('m_categories',
            'manage_faculties/manage_faculty'));
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
        $data['cat'] = $this->m_categories->get_categories();
        $this->load->view('manage_categories', $data);
    }

    public function form_add_categories() {
        $data['faculty']=$this->manage_faculty->get_all();
        $this->load->view('form_add_categories',$data);
    }

    public function form_select_faculty() {
        $data['fac'] = $this->m_categories->get_faculties();
        $this->load->view('form_add_categories', $data);
    }

    public function add_categories() {
        $this->m_categories->add_categories();
        redirect('manage_categories/index');
    }

    function delete_categories() {
        $id = $this->uri->segment(3);
        if ($this->m_categories->delete_categories($id)) {
            redirect('manage_categories');
        } else {
            echo "Server not respond your request";
        }
    }

    function form_update_categories() {
        $id = $this->uri->segment(3);
        $data['faculty']=$this->manage_faculty->get_all();
        $data['data'] = $this->m_categories->get_categories_byid($id);
        $this->load->view('form_update_categories', $data);
    }

    public function update_categories() {
        $this->m_categories->update_categories();
        redirect('manage_categories/index');
    }


}
