<?php 

    class Admins extends CI_Controller{
        public function login(){
            $this->form_validation->set_rules('username','Username','required');
            $this->form_validation->set_rules('password','Password','required');
            
            if($this->form_validation->run()){
                $username = $this->input->post('username');
                $password = $this->input->post('password');

                $user = $this->user_model->login_user($username, $password);

                if($user){
                    $user_data = [
                        'user_id' => $user['id'],
                        'username' => $user['username'],
                        'logged_in' => TRUE
                    ];

                    $this->session->set_userdata($user_data);
                    if($this->session->userdata('username')){
                        $this->load->view('templates/admin_header');       
                        $this->load->view('admin_pages/admin_home', $user_data);
                        $this->load->view('templates/admin_footer');
                    }
                    else{
                        redirect('admin', 'refresh');
                    }
                
                }
                else{
                    redirect('admin', 'refresh');
                }
            }   
            else{
                $data = [
                    'username_error' => form_error('username'),
                    'password_error' => form_error('password')
                ];
                $this->session->set_flashdata($data);
                redirect('admin', 'refresh');
            }
            

        }

        public function logout(){
            $user_data = [
                'user_id' => '',
                'username' => '',
                'logged_in' => ''
            ];

            $this->session->unset_userdata($user_data);
            $this->session->sess_destroy();
            redirect('admin', 'refresh');
        }

        public function createnews(){
        
            $this->form_validation->set_rules('newstitle','Title','required');
            $this->form_validation->set_rules('newsbody','Body','required');
                if($this->form_validation->run()===FALSE){
                    $data = ['error' => '* field is required'];
                    $this->session->set_flashdata($data);
                    // $this->load->view('templates/admin_header');
                    // $this->load->view('admin_pages/admin_news', $data);
                    // $this->load->view('templates/admin_footer');
                    redirect('admin_pages/addnews', $data, 'refresh');

                }
                else {
                    if($this->news_model->create_news()){
                        $data = ['success' => TRUE];
                        $this->session->set_flashdata($data);
                        redirect('admin_pages/addnews', $data);
                    
                    }
                    else{
                        $data = ['errorfiletype' => 'Invalid filetype'];
                        $this->session->set_flashdata($data);  
                        redirect('admin_pages/addnews', $data, 'refresh');
                    }
                    
               
                }
            
            }

            public function deletenews($rowid){
                    // $this->load->view('templates/admin_header');
                    // $this->load->view('admin_pages/view');
                    // $this->load->view('templates/admin_footer');
                    echo json_encode(array("status" => TRUE));
                    $this->news_model->delete_news($rowid);
                    
            }

            

            public function createannouncement(){
                $this->form_validation->set_rules('announcementtitle','Title', 'required');
                $this->form_validation->set_rules('announcementbody', 'Body', 'required');
                if($this->form_validation->run()){
                    $this->announcements_model->create_announcement();
                    $data =['success' => TRUE];
                    $this->session->set_flashdata($data);
                    redirect('admin_pages/addannouncement');
                }
                else{
                    $data = ['error' => '* field is required'];
                    $this->session->set_flashdata($data);
                    redirect('admin_pages/addannouncement', 'refresh');
                    
                }
            }

            public function deleteannouncement($id){
                echo json_encode(array("status" => TRUE));
                $this->announcements_model->delete_announcement($id);
            }

            public function updatenews($id){
                 $this->form_validation->set_rules('newstitle', 'Title', 'required');
                 $this->form_validation->set_rules('newsbody', 'Body', 'required');

                 if($this->form_validation->run()){
                    if($this->news_model->update_news($id)){
                        $data = ['success' => TRUE];
                        $this->session->set_flashdata($data);
                        redirect('admin_pages/news', 'refresh');
                    }
                }
                else{
                    $data = ['error' => '*field is required'];
                    $this->session->set_flashdata($data);
                    // $this->load->view('templates/admin_header');
                    // $this->load->view('admin_pages/admin_editnews',$data);
                    // $this->load->view('templates/admin_footer');
                    redirect('admin_pages/editnews/'.$id, $data);
                }
                
                
            }

            public function updateannouncement($id){
                $this->form_validation->set_rules('announcementtitle', 'Title', 'required');
                $this->form_validation->set_rules('announcementbody', 'Body', 'required');
                if($this->form_validation->run()){
                    $this->announcements_model->update_announcement($id);
                    $data = ['success' => TRUE];
                    $this->session->set_flashdata($data);
                    redirect('admin_pages/announcements', 'refresh');
                }
                else{
                    $data = ['error' => '*field is required'];
                    $this->session->set_flashdata($data);
                    redirect('admin_pages/editannouncement/'.$id, $data);
                }                
            }

            public function addcitizen(){
                $this->form_validation->set_rules('lastname', 'Last Name', 'required');
                $this->form_validation->set_rules('firstname', 'First Name', 'required');
                $this->form_validation->set_rules('middlename', 'Middle Name', 'required');
                $this->form_validation->set_rules('address', 'Address', 'required');
                $this->form_validation->set_rules('gender', 'Gender', 'required');
                
                if($this->form_validation->run()){
                    $lastname = $this->input->post('lastname');
                    $firstname = $this->input->post('firstname');
                    $middlename = $this->input->post('middlename');
                    $gender = $this->input->post('gender');
                    $contact = $this->input->post('contact');
                    $address = $this->input->post('address');
                    
                    $this->citizen_model->add_citizen($lastname, $firstname, $middlename, $gender, $contact, $address);
                    $data = ['success' => TRUE];
                    $this->session->set_flashdata($data);
                    redirect('admin_pages/addcitizen', 'refresh');
                }
                else{
                    $data = ['error' => '*field is required'];
                    $this->session->set_flashdata($data);
                    redirect('admin_pages/addcitizen');
                }
              
            }

            public function updatecitizen($id){
                $this->form_validation->set_rules('lastname', 'Last Name', 'required');
                $this->form_validation->set_rules('firstname', 'First Name', 'required');
                $this->form_validation->set_rules('middlename', 'Middle Name', 'required');
                $this->form_validation->set_rules('address', 'Address', 'required');
                
                if($this->form_validation->run()){
                    $lastname = $this->input->post('lastname');
                    $firstname = $this->input->post('firstname');
                    $middlename = $this->input->post('middlename');
                    $address = $this->input->post('address');
                    $contact = $this->input->post('contact');
                    $father = $this->input->post('father');
                    $mother = $this->input->post('mother');

                    $this->citizen_model->update_citizen($id, $lastname, $firstname, $middlename, $address, $contact, $father, $mother);
                    $data = ['success' => TRUE];
                    $this->session->set_flashdata($data);
                    redirect('admin_pages/citizens');
                }
                else{
                    $data = ['error' => '*field is required'];
                    $this->session->set_flashdata($data);
                    redirect('admin_pages/editcitizen/'.$id, $data);
                }
            }   
            
            public function deletecitizen($id){
                echo json_encode(['status' => TRUE]);
                $this->citizen_model->delete_citizen($id);
            }
    }
?>