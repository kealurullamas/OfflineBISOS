<?php 

    class User_Model extends CI_Model{
        public function login_user($username, $password){
            $this->db->where(['username' => $username, 'password' => $password]);
            $result = $this->db->get('user');

            //if($result->num_rows() >= 1){
            if($result->num_rows() >= 1)
            {
                $user = $result->result_array();
                //$user = $result->row_array(0); same
                return $user[0];
            }
            else{
                return FALSE;
            }
        }
    }
?>
