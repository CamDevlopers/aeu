<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Page extends MX_Controller {

    public function __construct() {
        parent::__construct();

        if (isset($_GET["lang"])) {
            $lang = $_GET['lang'];
            $this->session->set_userdata('language', $lang);
        } elseif ($this->session->userdata('language') == 'khmer' or $this->session->userdata('language') == 'english') {
            
        } else {
            $lang = "english";
            $this->session->set_userdata('language', $lang);
        }
        $this->load->model('pages');
    }

    //function home
    public function index() {
        $data['new'] = $this->pages->get_news_for_home();
        $data['event'] = $this->pages->get_event_for_home();
        $data['video'] = $this->pages->get_videos_for_home();
        $data['photo'] = $this->pages->get_photos_for_home();
        $this->load->view('home', $data);
    }

    function p() {
        $pid = $this->uri->segment(3);
        $data['content'] = $this->pages->get_content($pid);
        $this->load->view('page', $data);
    }

    //view faculties 
    function fac() {
        $data['event'] = $this->pages->get_event_for_home();
        $data['fac'] = $this->pages->get_fac($this->uri->segment(3));
        $data['category'] = $this->pages->get_category($this->uri->segment(3));
        $this->load->view('fac', $data);
    }

    function cat() {
        $data['event'] = $this->pages->get_event_for_home();
        $data['fac'] = $this->pages->get_c($this->uri->segment(4));
        $data['category'] = $this->pages->get_category($this->uri->segment(3));
        $this->load->view('fac', $data);
    }

    function album_detail() {
        $data['photo'] = $this->pages->get_album_byid($this->uri->segment(3));
        $data['title'] = $this->pages->get_album_title($this->uri->segment(3));
        $this->load->view('detail_photo', $data);
    }

    function all_album() {
        $data['photo'] = $this->pages->get_photos_for_album();
        $this->load->view('view_all_album', $data);
    }

    function search() {
        $item = isset($_GET['search']) ? $_GET['search'] : '';
        $data['new'] = $this->pages->search($item);
        $this->load->view('search', $data);
    }

    ///// Srey leark
    function all_news() {
        $this->load->library('pagination');
        $config = array();
        $config["base_url"] = base_url() . "page/all_news/";
        $config["total_rows"] = $this->pages->getCountNews();
        $config["per_page"] = 10;
        $config['first_link'] = 'First';
        $config['cur_tag_open'] = '<a style="color: #D57606;">';
        $config['cur_tag_close'] = '</a>';
        $config["uri_segment"] = 3;
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data["all_news"] = $this->pages->getAllNews($config["per_page"], $page);


        $data["links"] = $this->pagination->create_links();
        $data['news'] = $this->pages->get_news_for_home();

        $this->load->view('all_news', $data);
    }

    function news() {
        $data['news'] = $this->pages->get_news_detail();

        $this->load->view('news_detail', $data);
    }
    
    function news1() {
        $data['news'] = $this->pages->get_news_detail();

        $this->load->view('news_detail_1', $data);
    }

    function all_events() {
        $this->load->library('pagination');
        $config = array();
        $config["base_url"] = base_url() . "page/all_events/";
        $config["total_rows"] = $this->pages->getCountEvent();
        $config["per_page"] = 10;
        $config['first_link'] = 'First';
        $config['cur_tag_open'] = '<a style="color: #D57606;">';
        $config['cur_tag_close'] = '</a>';
        $config["uri_segment"] = 3;
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data["all"] = $this->pages->getAllEvent($config["per_page"], $page);


        $data["links"] = $this->pagination->create_links();
        $data['news'] = $this->pages->get_news_for_home();

        $this->load->view('all_events', $data);
    }

    function event() {
        $data['events'] = $this->pages->get_event_detail();

        $this->load->view('event_detail', $data);
    }
    function event1() {
        $data['events'] = $this->pages->get_event_detail();

        $this->load->view('event_detail_1', $data);
    }
    
    
                function all_videos() {
        $this->load->library('pagination');
        $config = array();
        $config["base_url"] = base_url() . "page/all_videos/";
        $config["total_rows"] = $this->pages->getCountVideo();
        $config["per_page"] = 9;
        $config['first_link'] = 'First';
        $config['cur_tag_open'] = '<a style="color: #D57606;">';
        $config['cur_tag_close'] = '</a>';
        $config["uri_segment"] = 3;
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data["all"] = $this->pages->getAllVideo($config["per_page"], $page);


        $data["links_video"] = $this->pagination->create_links();
        $data['news'] = $this->pages->get_news_for_home();

        $this->load->view('all_videos', $data);
    }

    function video() {
        $data['video'] = $this->pages->get_video_detail();

        $this->load->view('video', $data);
    }
    
    
    function document(){
        $id = $this->uri->segment(3);
        $data['file']= $this->pages->get_all_file($id);
        $data['event'] = $this->pages->get_event_for_home();
        $data['fac'] = $this->pages->get_fac($this->uri->segment(3));
        $data['category'] = $this->pages->get_category($this->uri->segment(3));
        $this->load->view('fac',$data);
    }
    
    function send(){
        $name = $this->input->post('name');
        $stu_id = $this->input->post('stu_id')?$this->input->post('stu_id'):'';
        $year = $this->input->post('year')?$this->input->post('year'):'';
        $aeu = $this->input->post('aeu');
        $message = $stu_id?'Student ID: '.$stu_id.', Year: '.$year.'<br/>'.$this->input->post('message'):$this->input->post('message');
       // $email = $this->pages->get_admin();
        $config['mailtype'] = 'html';
        $this->email->initialize($config);
        $this->load->library('email',$config);
        $this->email->from($this->input->post('email'),$name);
        $this->email->to($aeu);
        $this->email->subject($this->input->post('subject'));
        $this->email->message($message);
        if($this->email->send()){
            redirect('page/sent');
        }else{
            show_error($this->email->print_debuge);
        }
    }
    
    function sent(){
        $this->load->view('sent');
    }
    
    function admin(){
        echo $this->pages->get_admin();
    }
    
    
    function partner(){
         $data['partner'] = $this->pages->get_partner_detail();
        $this->load->view('partner_detail', $data);
    }

}
