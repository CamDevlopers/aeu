<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Login extends MX_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('logins');
    }
    
    public function index()
    {
        if($this->session->userdata('user_id')){
            redirect('dashboard');
        }else{
            $this->load->view('login'); 
        }
    }
    
    //this function use for login process
    public function process(){
        $data['username'] = $this->input->post('username');
        $data['password'] = md5($this->input->post('password'));
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('login');
        } else {
           if($this->logins->validation($data)->num_rows()>0){
             $session_userdata = array(
                 'username'=>$this->logins->validation($data)->row()->username,
                 'user_id'=>$this->logins->validation($data)->row()->uid,
                 'fname'=>$this->logins->validation($data)->row()->fullname,
                 'level'=>$this->logins->validation($data)->row()->level);
             $this->session->set_userdata($session_userdata);
             redirect('dashboard');
           }else{
               $data['form_error'] = "Sorry, Your password or username are not match!";
               $this->load->view('login',$data);
           }
        }
    } 
    
    public function logout(){
        $session_userdata = array(
                 'username'=>"",
                 'user_id'=>"",
                 'fname'=>"",
                 'level'=>"");
        $this->session->unset_userdata($session_userdata);
        redirect('login');
    }
}
