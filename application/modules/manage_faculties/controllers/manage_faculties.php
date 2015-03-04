<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Manage_faculties extends MX_Controller {
	  public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('manage_faculty');
		
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
		$data['faculty'] = $this->manage_faculty->get_all();
        $this->load->view('dashboard' , $data);
	}
	public function add(){
		 if ($this->input->post('btn_save')) {
            $this->form_validation->set_rules('en_title', 'English Title', 'required');
            $this->form_validation->set_rules('kh_title', 'Khmer Title', 'required');
            if ($this->form_validation->run() == FALSE) {
                $data['faculty'] = $this->manage_faculty->get_all();
				$this->load->view('dashboard' , $data);
		
            } else {
               $this->manage_faculty->AddFaculty();
               header('location:'.base_url().'manage_faculties?success=1');
            }   
            
        } else {
            $data['faculty'] = $this->manage_faculty->get_all();
			$this->load->view('dashboard' , $data);
		
        }

	}
	public function edit(){
		 if ($this->input->post('btn_save')) {
            $this->form_validation->set_rules('en_title', 'English Title', 'required');
            $this->form_validation->set_rules('kh_title', 'Khmer Title', 'required');
            if ($this->form_validation->run() == FALSE) {
                $data['faculty'] = $this->manage_faculty->getFacultyById();
				$this->load->view('dashboard' , $data);
		
            } else {
               $this->manage_faculty->EditFaculty();
               header('location:'.base_url().'manage_faculties?success=2');
            }   
            
        } else {
            $data['faculty'] = $this->manage_faculty->getFacultyById();
			$this->load->view('dashboard' , $data);
		
        }

	}
	public function delete(){
		$this->manage_faculty->deleteFaculty();
		header('location:'.base_url().'manage_faculties?success=3');
	}
}
