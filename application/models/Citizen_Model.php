
<?php 
    class Citizen_Model extends CI_Model{
        public function add_citizen($lastname, $firstname, $middlename, $contact, $address){
            $data = [
                'lastname' => $lastname,
                'firstname' => $firstname,
                'middlename' => $middlename,
                'contact' => $contact,
                'address' => $address
            ];
            $this->db->insert('citizen', $data);
        }

        public function get_citizens(){
            $query = $this->db->get('citizen');
            return $query->result_array();
        }
    }

?>