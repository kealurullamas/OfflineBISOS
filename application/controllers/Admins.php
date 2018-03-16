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
                        redirect('admin_pages/addnews');
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
                    redirect('admin_pages/addannouncement');
                }
                else{
                    $data = ['error' => '* field is required'];
                    $this->session->set_flashdata($data);
                    redirect('admin_pages/addannouncement', $data, 'refresh');
                }
            }

            public function deleteannouncement($id){
                echo json_encode(array("status" => TRUE));
                $this->announcements_model->delete_announcement($id);
            }

            public function updatenews($id){
                // $this->form_validation->set_rules('newstitle', 'Title', 'required');
                // $this->form_validation->set_rules('newsbody', 'Body', 'required');

                // if($this->form_validation->run()){
                    $this->news_model->update_news($id);
                    // redirect('admin_pages/news', 'refresh');
                // }
                // else{
                //     $data = ['error' => '*field is required'];
                //     $this->session->set_flashdata($data);
                //     redirect();
                // }
                
                
            }
        
    }
?>