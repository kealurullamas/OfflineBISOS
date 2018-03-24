<?php

    Class Blotter_Model extends CI_Model
    {
        public function __construct()
        {
            $this->load->database();
        }

        public function get_blotter($id = false)
        {
            if($id == false)
            {
                $this->db->order_by('created_at','desc');
                $query = $this->db->get('blotters', 6);
                return $query->result_array();
            }
            else
            {
                $query = $this->db->get_where('blotters', array('id' => $id, 'status' => "UNRESOLVED"));
                return $query->row_array();
            }
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

        public function index()
        {

        }
    }


?>