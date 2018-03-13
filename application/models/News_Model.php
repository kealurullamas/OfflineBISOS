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
        public function getAll($limit, $start)
        {
            $this->db->limit($limit,$start);
            $query=$this->db->get('news');
            if($query->num_rows()>0)
            {
                foreach($query->result() as $row)
                {
                    $data[]=$row;
                }
                return $data;
            }

            return false;
        }
        public function edit_news()
        {    

        }
        public function create_news()
        {
            $slug=url_title($this->input->post('newstitle'));

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
                    'title'=>$this->input->post('newstitle'),
                    'body'=>$this->input->post('newsbody'),
                    'slug'=>$slug,
                    'image'=>$this->upload->file_name
                ];

                $this->db->insert('news',$data);
            }
        }
        public function delete_news()
        {
            
        }

        public function count()
        {
            return $this->db->count_all('news');
        }

    }
?>