<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Manage_event extends MX_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model(array('m_event','manage_sub_categories/m_sub_categories'));
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
        $data['event'] = $this->m_event->get_event();
        $this->load->view('event',$data);
    }

    public function form_add_event(){
        $data['cat'] = $this->m_sub_categories->get_categories();
        $this->load->view('form_add_event',$data);
    }

    public function add_event(){
        $this->m_event->add_event();
        redirect('manage_event/index');
    }
    
    function delete_event() {
        $id = $this->uri->segment(3);
        if ($this->m_event->delete_event($id)) {
            redirect('manage_event');
        } else {
            echo "Server not respond your request";
        }
    }
    
    function form_update_event(){
        $id = $this->uri->segment(3);
        $data['cat'] = $this->m_sub_categories->get_categories();
        $data['data'] = $this->m_event->get_event_byid($id);
        $this->load->view('form_update_event',$data);
    }
    
    public function update_event(){
        $this->m_event->update_event();
        redirect('manage_event/index');
    }
    
    
    
    
        
        
}
