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
                $query=$this->db->get('announcements');
                return $query->result_array();
            }
            $query=$this->db->get_where('announcements',array('slug'=>$slug));
            return $query->row_array();
        }
        public function edit_announcement()
        {

        }
        public function create_announcement()
        {
        }
        public function delete_announcement()
        {
            
        }
    }
?>