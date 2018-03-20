
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

        public function get_citizen($id){
            $this->db->where('id', $id);
            $query =  $this->db->get('citizen');
            return $query->row_array();
        }

        public function update_citizen($id, $lastname, $firstname, $middlename, $address, $contact){
            $data = [
                'lastname' => $lastname,
                'firstname' => $firstname,
                'middlename' => $middlename,
                'address' => $address,
                'contact' => $contact
            ];

            $this->db->where('id', $id);
            $this->db->update('citizen', $data);
        }

        public function delete_citizen($id){
            $this->db->where('id', $id);
            $this->db->delete('citizen');
        }
    }

?>