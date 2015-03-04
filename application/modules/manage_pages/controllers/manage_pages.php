<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Manage_pages extends MX_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('m_mnpage');
		
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
        $data['list_page'] = $this->m_mnpage->getListPage();
        $this->load->view('manage-page', $data);
    }

    public function add_page() {
        if ($this->input->post('btn_save')) {
            
            
            $this->form_validation->set_rules('en_menu', 'English Menu', 'required');
            $this->form_validation->set_rules('kh_menu', 'Khmer Menu', 'required');
            $this->form_validation->set_rules('status', 'Status', 'required');
            if ($this->form_validation->run() == FALSE) {
                $data['list_page'] = $this->m_mnpage->getListPage();
                $this->load->view('manage-page', $data);
            } else {
               $this->m_mnpage->AddMenu();
               header('location:'.base_url().'manage_pages?success=1');
            }
          
            
        } else {
            $data['list_page'] = $this->m_mnpage->getListPage();
            $this->load->view('manage-page', $data);
        }
    }
    public function edit_page() {
        if ($this->input->post('btn_edit')) {
            $this->form_validation->set_rules('en_menu', 'English Menu', 'required');
            $this->form_validation->set_rules('kh_menu', 'Khmer Menu', 'required');
            $this->form_validation->set_rules('status', 'Status', 'required');
            if ($this->form_validation->run() == FALSE) {
                $data['menu'] = $this->m_mnpage->getMenuById();
                $this->load->view('manage-page', $data);
            } else {
               $this->m_mnpage->EditMenu();
               header('location:'.base_url().'manage_pages?success=2');
            }   
            
        } else {
            $data['menu'] = $this->m_mnpage->getMenuById();
            $this->load->view('manage-page', $data);
        }
    }
    public function delete_page(){
        $this->m_mnpage->deleteMenu();
        header('location:'.base_url().'manage_pages?success=3');
    }

}
