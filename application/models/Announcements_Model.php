<?php
    class Announcements_Model extends CI_model
    {
        public function __construct()
        {
            $this->load->database();
        }
        public function get_announcement($slug=false)
        {
            if($slug===false)
            {
                $this->db->order_by('created_at','desc');
                $query=$this->db->get('announcements',5);
                return $query->result_array();
            }
            $query=$this->db->get_where('announcements',array('slug'=>$slug));
            return $query->row_array();
        }
        public function getAllAnnouncements()
        {
            $query=$this->db->get('announcements');
            return $query->result_array();
        }
        public function edit_announcement()
        {

        }
        public function create_announcement()
        {
            $slug=url_title($this->input->post('title'));

            $data=[
                'title'=>$this->input->post('title'),
                'body'=>$this->input->post('body'),
                'slug'=>$slug
                
            ];

            $this->db->insert('announcements',$data);
        }
        public function delete_announcement()
        {
            
        }
    }
?>