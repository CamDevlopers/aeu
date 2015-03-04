<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Dashboard extends MX_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model(array('manage_users/manage_user',
            'photo_albums/m_photo_albums',
            'manage_pages/m_mnpage',
            'manage_faculties/manage_faculty',
            'manage_categories/m_categories',
            'manage_sub_categories/m_sub_categories',
            'manage_video/mn_video',
            'manage_news/m_news',
            'manage_document/manage_documents',
            'manage_event/m_event'));
    }
    public function index()
    {
        if($this->session->userdata('level')){
             $data['count_users']=$this->manage_user->count_users();
             $data['count_album']=$this->m_photo_albums->count_photo_album();
             $data['count_doc']=$this->manage_documents->count_photo_album();
             $data['count_pages']=$this->m_mnpage->count_menu();
             $data['count_faculty']=$this->manage_faculty->count_faculty();
             $data['count_category']=$this->m_categories->count_cat();
             $data['count_video']=$this->mn_video->count_video();
             $data['count_sub_category']=$this->m_sub_categories->count_sub_cat();
             
             $data['count_news']=$this->m_news->count_new();
             $data['count_events']=$this->m_event->count_event();
             
             
             $this->load->view('dashboard',$data);
        }else{
            redirect('login');
        }
       
    }
}
