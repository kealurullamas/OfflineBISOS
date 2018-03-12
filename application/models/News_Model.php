<?php
    class News_model extends CI_model
    {
        public function _contstruct()
        {
            $this->load->database();
        }
        public function get_news($slug=false)
        {
            if($slug===false)
            {
                $this->db->order_by('created_at','desc');
                $query=$this->db->get('news',6);
                return $query->result_array();
            }
            $query=$this->db->get_where('news',array('slug'=>$slug));
            return $query->row_array();
        }
        public function edit_news()
        {    

        }
        public function create_news()
        {
            $slug=url_title($this->input->post('title'));

            $config=array(
                'upload_path'=>'assets/img/',
                'allowed_types'=>'jpg|jpeg|png|bmp',
                'max_size'=>0,
                'filename'=>url_title($this->input->post('img')),
                'encrypt_name'=>true
            );
           
            $this->load->library('upload',$config);


            if($this->upload->do_upload('img'))
            {
                $data=[
                    'title'=>$this->input->post('title'),
                    'body'=>$this->input->post('body'),
                    'slug'=>$slug,
                    'image'=>$this->upload->file_name
                ];

                $this->db->insert('News',$data);
            }
        }
        public function delete_news()
        {
            
        }

    }
?>