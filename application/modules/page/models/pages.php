<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of pages
 *
 * @author MAO Vannakpanha
 */
class pages extends CI_Model {

    //put your code here

    function get_news_for_home() {
        if ($this->session->userdata('language') == 'khmer') {
            $this->db->select('tblnews.kh_title as title,
                tblnews.kh_short_desc as sort_desc, tblnews.date as date,
                tblnews.kh_long_desc, tblnews.thumbnial as thumbnial, tblnews.nid as nid, tbluser.fullname as fullname');
        } else if ($this->session->userdata('language') == 'english') {
            $this->db->select('tblnews.en_title as title,
                tblnews.en_short_desc as sort_desc,tblnews.date as date,
                tblnews.en_long_desc, tblnews.thumbnial as thumbnial, tblnews.nid as nid, tbluser.fullname as fullname');
        }
        $this->db->order_by('nid', 'desc');
        $this->db->limit(3);
        $this->db->from('tblnews');
        $this->db->join('tbluser', 'tblnews.uid = tbluser.uid');
        return $this->db->get();
    }

    // get event for home page
    function get_event_for_home() {
        if ($this->session->userdata('language') == 'khmer') {
            $this->db->select('tblevent.kh_title as title,
                tblevent.kh_short_desc as sort_desc,tblevent.date as date,
                tblevent.kh_long_desc, tblevent.thumbnail as thumbnial, tblevent.eid as eid, tbluser.fullname as fullname');
        } else if ($this->session->userdata('language') == 'english') {
            $this->db->select('tblevent.en_title as title,
                tblevent.en_short_desc as sort_desc,tblevent.date as date,
                tblevent.en_long_desc, tblevent.thumbnail as thumbnial, tblevent.eid as eid, tbluser.fullname as fullname');
        }
        $this->db->order_by('eid', 'desc');
        $this->db->limit(3);
        $this->db->from('tblevent');
        $this->db->join('tbluser', 'tblevent.uid = tbluser.uid');
        return $this->db->get();
    }

    //get videos for home page
    function get_videos_for_home() {
        if ($this->session->userdata('language') == 'khmer') {
            $this->db->select('tblvideo.kh_title as title, tblvideo.youtube_url as url, tblvideo.is_youtube as is_youtube, tblvideo.vid as vid');
        } else if ($this->session->userdata('language') == 'english') {
            $this->db->select('tblvideo.en_title as title, tblvideo.youtube_url as url, tblvideo.is_youtube as is_youtube, tblvideo.vid as vid');
        }
        $this->db->order_by('vid', 'desc');
        $this->db->limit(3);
        $this->db->from('tblvideo');
        return $this->db->get();
    }

    // get all photo
    function get_photos_for_home() {
        $this->db->select('tblalbum.album_name as title, tblalbum.img_name as img, tblalbum.gid as gid');
        $this->db->order_by('album_id', 'desc');
        $this->db->group_by('gid');
        $this->db->limit(4);
        $this->db->from('tblalbum');
        return $this->db->get();
    }

    //get all slide
    function get_all_slide() {
        return $this->db->get('tblslideshow');
    }

    function get_all_fac() {
        if ($this->session->userdata('language') == 'khmer') {
            $this->db->select('tblfaculty.kh_title as title, tblfaculty.fid as fid');
        } else if ($this->session->userdata('language') == 'english') {
            $this->db->select('tblfaculty.en_title as title, tblfaculty.fid as fid');
        }
        $this->db->where('deleted', 0);
        $this->db->where('fid !=', 6);
        $this->db->order_by('f_order', 'asc');
        $this->db->from('tblfaculty');
        return $this->db->get();
    }

    function get_all_menu() {
        if ($this->session->userdata('language') == 'khmer') {
            $this->db->select('tblmenu.kh_menu as title, tblmenu.mid as mid');
        } else if ($this->session->userdata('language') == 'english') {
            $this->db->select('tblmenu.en_menu as title, tblmenu.mid as mid');
        }
        $this->db->where('m_status', 1);
        $this->db->order_by('m_order', 'asc');
        $this->db->from('tblmenu');
        return $this->db->get();
    }

    function get_content($id) {
        if ($this->session->userdata('language') == 'khmer') {
            $this->db->select('tblmenu.kh_menu as title, tblmenu.mid as mid, tblmenu.kh_description as content');
        } else if ($this->session->userdata('language') == 'english') {
            $this->db->select('tblmenu.en_menu as title, tblmenu.mid as mid, tblmenu.en_description as content');
        }
        $this->db->where('mid', $id);
        return $this->db->get('tblmenu')->row();
    }

    //get main facultiy 
    function get_fac($id) {

        if ($this->session->userdata('language') == 'khmer') {
            $this->db->select('tblfaculty.kh_title as title, tblfaculty.fid as fid, tblfaculty.kh_description as description');
        } else if ($this->session->userdata('language') == 'english') {
            $this->db->select('tblfaculty.en_title as title, tblfaculty.fid as fid, tblfaculty.en_description as description');
        }
        $this->db->where('fid', $id);
        return $this->db->get('tblfaculty')->row();
    }

    function get_category($id) {
        if ($this->session->userdata('language') == 'khmer') {
            $this->db->select('tblcategory.kh_title as title, tblcategory.cid as cid, tblcategory.kh_description as description');
        } else if ($this->session->userdata('language') == 'english') {
            $this->db->select('tblcategory.en_title as title, tblcategory.cid as cid, tblcategory.en_description as description');
        }
        $this->db->where('fac_id', $id);
        $this->db->where('subid', 0);
        $this->db->where('deleted', 0);
        $this->db->order_by("cid", "asc");
        return $this->db->get('tblcategory');
    }

    function get_sub_category($id) {
        if ($this->session->userdata('language') == 'khmer') {
            $this->db->select('tblcategory.kh_title as title, tblcategory.cid as cid, tblcategory.kh_description as description');
        } else if ($this->session->userdata('language') == 'english') {
            $this->db->select('tblcategory.en_title as title, tblcategory.cid as cid, tblcategory.en_description as description');
        }
        $this->db->where('subid', $id);
        $this->db->where('deleted', 0);
        $this->db->order_by("cid", "asc");
        return $this->db->get('tblcategory');
    }

    function get_c($id) {
        if ($this->session->userdata('language') == 'khmer') {
            $this->db->select('tblcategory.kh_title as title, tblcategory.cid as cid, tblcategory.kh_description as description');
        } else if ($this->session->userdata('language') == 'english') {
            $this->db->select('tblcategory.en_title as title, tblcategory.cid as cid, tblcategory.en_description as description');
        }
        $this->db->where('cid', $id);
        return $this->db->get('tblcategory')->row();
    }

    function get_album_byid($id) {

        $this->db->where('gid', $id);
        $data = $this->db->get('tblalbum');
        return $data;
    }

    function get_album_title($id) {

        $this->db->where('gid', $id);
        $this->db->group_by('gid');
        $data = $this->db->get('tblalbum')->row()->album_name;
        return $data;
    }

    // get all photo
    function get_photos_for_album() {
        $this->db->select('tblalbum.album_name as title, tblalbum.img_name as img, tblalbum.gid as gid');
        $this->db->order_by('album_id', 'desc');
        $this->db->group_by('gid');
        $this->db->from('tblalbum');
        return $this->db->get();
    }

    function search($term) {
        if ($this->session->userdata('language') == 'khmer') {
            $this->db->select('tblnews.kh_title as title,
                tblnews.kh_short_desc as sort_desc,
                tblnews.kh_long_desc, tblnews.thumbnial as thumbnial, tblnews.nid as nid');
        } else if ($this->session->userdata('language') == 'english') {
            $this->db->select('tblnews.en_title as title,
                tblnews.en_short_desc as sort_desc,
                tblnews.en_long_desc, tblnews.thumbnial as thumbnial, tblnews.nid as nid');
        }
        $this->db->order_by('nid', 'desc');
        $this->db->from('tblnews');
        $this->db->like('en_title', $term);
        $this->db->or_like('kh_title', $term);
        $this->db->or_like('en_short_desc', $term);
        $this->db->or_like('kh_short_desc', $term);
        return $this->db->get();
    }

    // srey leark
    public function getCountNews() {
        return $this->db->count_all("tblnews");
    }

    public function getAllNews($limit, $start) {

        if ($this->session->userdata('language') == 'khmer') {
            $this->db->select('tblnews.kh_title as title,
                tblnews.kh_short_desc as sort_desc,tblnews.date as date,
                tblnews.kh_long_desc, tblnews.thumbnial as thumbnial, tblnews.nid as nid,tbluser.fullname as fullname');
        } else if ($this->session->userdata('language') == 'english') {
            $this->db->select('tblnews.en_title as title,
                tblnews.en_short_desc as sort_desc,tblnews.date as date,
                tblnews.en_long_desc, tblnews.thumbnial as thumbnial, tblnews.nid as nid, tbluser.fullname as fullname');
        }
        $this->db->order_by('nid', 'desc');
        $this->db->limit($limit, $start);
        $this->db->from('tblnews');
        $this->db->join('tbluser', 'tblnews.uid = tbluser.uid');
        return $this->db->get();
    }

    public function get_news_detail() {
        if ($this->session->userdata('language') == 'khmer') {
            $this->db->select('tblnews.kh_title as title,
                tblnews.kh_short_desc as sort_desc,tblnews.date as date,
                tblnews.kh_long_desc as long_desc, tblnews.thumbnial as thumbnial, tblnews.nid as nid , tbluser.fullname as fullname');
        } else if ($this->session->userdata('language') == 'english') {
            $this->db->select('tblnews.en_title as title,tblnews.date as date,
                tblnews.en_short_desc as sort_desc,
                tblnews.en_long_desc as long_desc, tblnews.thumbnial as thumbnial, tblnews.nid as nid , tbluser.fullname as fullname');
        }
        $this->db->where('nid', $this->uri->segment(3));
        $this->db->from('tblnews');
        $this->db->join('tbluser', 'tblnews.uid = tbluser.uid');
        return $this->db->get();
    }

    public function getCountEvent() {
        return $this->db->count_all("tblevent");
    }

    public function getAllEvent($limit, $start) {

        if ($this->session->userdata('language') == 'khmer') {
            $this->db->select('tblevent.kh_title as title,
                tblevent.kh_short_desc as sort_desc,tblevent.date as date,
                tblevent.kh_long_desc, tblevent.thumbnail as thumbnial, tblevent.eid as eid, tbluser.fullname as fullname');
        } else if ($this->session->userdata('language') == 'english') {
            $this->db->select('tblevent.en_title as title,tblevent.date as date,
                tblevent.en_short_desc as sort_desc,
                tblevent.en_long_desc, tblevent.thumbnail as thumbnial, tblevent.eid as eid, tbluser.fullname as fullname');
        }
        $this->db->order_by('eid', 'desc');
        $this->db->limit($limit, $start);
        $this->db->from('tblevent');
        $this->db->join('tbluser', 'tblevent.uid = tbluser.uid');
        return $this->db->get();
    }

    public function get_event_detail() {
        if ($this->session->userdata('language') == 'khmer') {
            $this->db->select('tblevent.kh_title as title,
                tblevent.kh_short_desc as sort_desc, tblevent.date as date,
                tblevent.kh_long_desc as long_desc, tblevent.thumbnail as thumbnial, tblevent.eid as eid , tbluser.fullname as fullname');
        } else if ($this->session->userdata('language') == 'english') {
            $this->db->select('tblevent.en_title as title,
                tblevent.en_short_desc as sort_desc,tblevent.date as date,
                tblevent.en_long_desc as long_desc, tblevent.thumbnail as thumbnial, tblevent.eid as eid , tbluser.fullname as fullname');
        }
        $this->db->where('eid', $this->uri->segment(3));
        $this->db->from('tblevent');
        $this->db->join('tbluser', 'tblevent.uid = tbluser.uid');
        return $this->db->get();
    }

    public function getCountVideo() {
        return $this->db->count_all("tblvideo");
    }

    public function getAllVideo($limit, $start) {

        if ($this->session->userdata('language') == 'khmer') {
            $this->db->select('tblvideo.kh_title as title, tblvideo.youtube_url as url, tblvideo.is_youtube as is_youtube, tblvideo.vid as vid');
        } else if ($this->session->userdata('language') == 'english') {
            $this->db->select('tblvideo.en_title as title, tblvideo.youtube_url as url, tblvideo.is_youtube as is_youtube, tblvideo.vid as vid');
        }
        $this->db->order_by('vid', 'desc');
        $this->db->limit($limit, $start);
        $this->db->from('tblvideo');
        return $this->db->get();
    }

    public function get_video_detail() {
        if ($this->session->userdata('language') == 'khmer') {
            $this->db->select('tblvideo.kh_title as title, tblvideo.youtube_url as url, tblvideo.is_youtube as is_youtube, tblvideo.vid as vid , tbluser.fullname as fullname');
        } else if ($this->session->userdata('language') == 'english') {
            $this->db->select('tblvideo.en_title as title, tblvideo.youtube_url as url, tblvideo.is_youtube as is_youtube, tblvideo.vid as vid , tbluser.fullname as fullname');
        }
        $this->db->where('vid', $this->uri->segment(3));
        $this->db->from('tblvideo');
        $this->db->join('tbluser', 'tblvideo.uid = tbluser.uid');
        return $this->db->get();
    }
    
    public function get_all_file($id){
        $this->db->where('gid',$id);
        return $this->db->get('tbldocument');
    }
    
    public function get_admin(){
        $this->db->where('uid',1);
        return $this->db->get('tbluser')->row()->email;
    }
    
    public function get_partner_detail(){
         if ($this->session->userdata('language') == 'english') {
            $this->db->select('tblpartner.en_name as name , tblpartner.image_description as des , tblpartner.link as link');
        } else if ($this->session->userdata('language') == 'khmer') {
            $this->db->select('tblpartner.kh_name as name , tblpartner.kh_description as des , tblpartner.link as link');
        }
        $this->db->where('deleted', 0);
        $this->db->where('pid' , $this->uri->segment(3));
        return $this->db->get('tblpartner');
    }

}

?>
