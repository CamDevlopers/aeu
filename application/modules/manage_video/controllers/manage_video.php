<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Manage_video extends MX_Controller {

      public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('mn_video');
      }
    public function index() {
        
        $this->load->model('mn_video');	
     
     $data['list'] = $this->mn_video->getListVideo();
        $this->load->view('manage-video' , $data);
    }

    public function add() {
        if ($this->input->post('btn_save')) {
            
            
            $this->form_validation->set_rules('url', 'Youtube URL', 'required');
            if ($this->form_validation->run() == FALSE) {
                $data['list'] = $this->mn_video->getListVideo();
                $this->load->view('manage-page', $data);
            } else {
               $this->mn_video->AddVideo();
               header('location:'.base_url().'manage_video?success=1');
            }
  
        } else {
            $data['list'] = $this->mn_video->getListVideo();
            $this->load->view('manage-video', $data);
        }
    }
    public function edit() {
        if ($this->input->post('btn_save')) {
            $this->form_validation->set_rules('url', 'Youtube URL', 'required');
            if ($this->form_validation->run() == FALSE) {
                $data['video'] = $this->mn_video->getVideoById();
                $this->load->view('manage-video', $data);
            } else {
               $this->mn_video->EditVideo();
               header('location:'.base_url().'manage_video?success=2');
            }
            
            
            
        } else {
            $data['video'] = $this->mn_video->getVideoById();
            $this->load->view('manage-video', $data);
        }
    }
    public function delete(){
        $this->mn_video->deleteVideo();
        header('location:'.base_url().'manage_video?success=3');
    }
    
    public function add_select(){
        $this->load->view('select');
    }
    
    public function upload_form(){
        $this->load->view('upload');
    }
    
    public function add_upload(){
        if($this->mn_video->AddVideoUpload()){
        redirect('manage_video');
        }
    }
    public function edite_upload(){
        $data['video'] = $this->mn_video->getVideoById();
        $this->load->view('edit_upload', $data);
    }
    
    public function edit_upload(){
        if($this->mn_video->edit_upload()){
        redirect('manage_video');
        }
    }
    
}
