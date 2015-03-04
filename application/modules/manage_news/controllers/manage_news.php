<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Manage_news extends MX_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model(array('m_news','manage_sub_categories/m_sub_categories'));
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
 
    public function index()
    {
        $data['news'] = $this->m_news->get_news();
        $this->load->view('news',$data);
    }

    public function form_add_news(){
        $data['cat'] = $this->m_sub_categories->get_categories();
        $this->load->view('form_add_news',$data);
    }

    public function add_news(){
        $this->m_news->add_news();
        redirect('manage_news/index');
    }
    
    function delete_news() {
        $id = $this->uri->segment(3);
        if ($this->m_news->delete_news($id)) {
            redirect('manage_news');
        } else {
            echo "Server not respond your request";
        }
    }
    
    function form_update_news(){
        $id = $this->uri->segment(3);
        $data['cat'] = $this->m_sub_categories->get_categories();
        $data['data'] = $this->m_news->get_news_byid($id);
        $this->load->view('form_update_news',$data);
    }
    
    public function update_news(){
        $this->m_news->update_news();
        redirect('manage_news/index');
    }
    
    
    
        
        
}
