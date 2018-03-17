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
       
        public function create_announcement()
        {
            $slug=url_title($this->input->post('announcementtitle'));

            $data=[
                'title'=>$this->input->post('announcementtitle'),
                'body'=>$this->input->post('announcementbody'),
                'slug'=>$slug
                
            ];

            $this->db->insert('announcements',$data);
        }
        public function delete_announcement($id)
        {
            $this->db->where('id', $id);
            $this->db->delete('announcements');
        }

        public function get_rowannouncement($id){
            $this->db->where('id', $id);
            $query = $this->db->get('announcements');
            return $query->row_array();

        }

        public function update_announcement($id){
            $data = [
                'title' => $this->input->post('announcementtitle'),
                'body' => $this->input->post('announcementbody'),
                'slug' => url_title($this->input->post('announcementtitle'))
            ];

            $this->db->where('id', $id);
            $this->db->update('announcements', $data);
        }
    }
?>