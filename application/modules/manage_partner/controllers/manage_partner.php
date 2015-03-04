<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Manage_partner extends MX_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model(array('m_partner'));
        	
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
        $data['partner'] = $this->m_partner->get_partner();
        $this->load->view('manage_partner', $data);
    }

    function form_add_partner() {
        $this->load->view('form_add_partner');
    }

    function add_partner() {
        $this->m_partner->add_partner();
        redirect('manage_partner/index');
    }

    //function delete image
//
    function delete_partner() {
        $id = $this->uri->segment(3);
        if ($this->m_partner->delete_partner($id)) {
            redirect('manage_partner');
        } else {
            echo "Server not respond your request";
        }
    }

    function form_update_partner() {
        $id = $this->uri->segment(3);
        $data['data'] = $this->m_partner->get_partner_byid($id);
        $this->load->view('form_update_partner', $data);
    }

    function update_partner() {
        $config['upload_path'] = 'images/partners/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '1000';
        $config['max_width'] = '1024';
        $config['max_height'] = '768';
        $this->load->library('upload', $config);
        $this->upload->do_upload('img_partner');
        $this->m_partner->update_partner($this->upload->data());
        redirect('manage_partner/index');
    }

}