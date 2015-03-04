<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Manage_users extends MX_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model(array('manage_user','manage_faculties/manage_faculty'));
    }
 
    public function index()
    {
        $data['user_data'] = $this->manage_user->get_all();
        $this->load->view('table_data',$data);
    }
    //view form register user
    public function view(){
        $this->load->view('form-users');
    }
    //register process
    public function save(){
            $data['level'] = $this->input->post('user_level');
            $data['fullname'] = $this->input->post('fullname');
            $data['email'] = $this->input->post('email');
            $data['username'] = $this->input->post('username');
            $data['phone'] = $this->input->post('phone');
            $data['password'] = md5($this->input->post('password'));
            $permission = $this->input->post('permission');
            $repassword = $this->input->post('re-password');
            $this->form_validation->set_rules('fullname', 'Full Name', 'required');
            $this->form_validation->set_rules('email', 'Email', 'valid_email|required|is_unique[tbluser.email]');
            $this->form_validation->set_rules('username', 'Username', 'required|is_unique[tbluser.username]');
            $this->form_validation->set_rules('user_level', 'user_level', 'required');
            $this->form_validation->set_rules('phone', 'Phone', 'numeric');
            $this->form_validation->set_rules('password', 'Password', 'min_length[5]|required|md5');
            $this->form_validation->set_rules('re-password', 'Re-Password', 'matches[password]|required');
            if ($this->form_validation->run() == FALSE) {
                 $this->load->view('form-users',$data);
            }else{
                 if($this->manage_user->save($data,$permission)){
                     redirect('manage_users');
                 }else{
                      echo "Server not respond your request!";
                 }
            }
    }
    
    //view form update
    function view_user(){
        isset($_GET['user_id'])?$this->session->set_userdata('user',$_GET['user_id']):'';
        $user['user_info'] = $this->manage_user->user_info($this->session->userdata('user'));
        
        if($this->input->post('save')){
            $data['level'] = $this->input->post('user_level')?$this->input->post('user_level'):2;
            $data['fullname'] = $this->input->post('fullname');
            $data['email'] = $this->input->post('email');
            $data['username'] = $this->input->post('username');
            $permission = $this->input->post('permission');
            if($this->input->post('password')!=''){
               $data['password'] = md5($this->input->post('password')); 
            }
            $data['phone'] = $this->input->post('phone');
            $repassword = $this->input->post('re-password');
            $this->form_validation->set_rules('fullname', 'Full Name', 'required');
            $this->form_validation->set_rules('email', 'Email', 'valid_email|required');
            $this->form_validation->set_rules('username', 'Username', 'required');
            $this->form_validation->set_rules('phone', 'Phone', 'numeric');
            $this->form_validation->set_rules('password', 'Password', 'min_length[5]');
            $this->form_validation->set_rules('re-password', 'Re-Password','matches[password]');
            if ($this->form_validation->run() == FALSE) {
                 $this->load->view('form-users-edit',$user);
            }else{
                 if($this->manage_user->update($data,$permission,$this->session->userdata('user'))){
                         redirect('manage_users/success');
                 }else{
                      echo "Server not respond your request!";
                 }
            }
        }else{
            $this->load->view('form-users-edit',$user);
        }
    }
    //do update user
    public function update(){
            $data['level'] = $this->input->post('user_level');
            $data['fullname'] = $this->input->post('fullname');
            $data['email'] = $this->input->post('email');
            $data['username'] = $this->input->post('username');
            $data['phone'] = $this->input->post('phone');
            $data['password'] = md5($this->input->post('password'));
            $repassword = $this->input->post('re-password');
            $this->form_validation->set_rules('fullname', 'Full Name', 'required');
            $this->form_validation->set_rules('email', 'Email', 'valid_email|required');
            $this->form_validation->set_rules('username', 'Username', 'required');
            $this->form_validation->set_rules('user_level', 'user_level', 'required');
            $this->form_validation->set_rules('phone', 'Phone', 'numeric');
            $this->form_validation->set_rules('password', 'Password', 'min_length[5]|required|md5');
            $this->form_validation->set_rules('re-password', 'Re-Password', 'matches[password]|required');
            if ($this->form_validation->run() == FALSE) {
                 $this->load->view('form-users-edit');
            }else{
                 if($this->manage_user->update($data)){
                     redirect('manage_users');
                 }else{
                      echo "Server not respond your request!";
                 }
            }
    }
    // delete user from table
    function delete(){
        $id = $this->uri->segment(3);
        if($this->manage_user->delete($id)){
            redirect('manage_users');
        }else{
            echo "Server not respond your request";
        }
    }
    function success(){
        $this->load->view('update_success');
    }
    function logs(){
        $this->db->order_by('date','desc');
        $data['log'] = $this->db->get('tbllog');
        $this->load->view('logs',$data);
    }
    
}
