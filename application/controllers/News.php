<?php

class News extends CI_controller
{
    public function index()
    {
        $data=[
            'title'=>"News Flash",
            'News'=>$this->news_model->get_news(),
        ];
        $this->load->view('templates/header');
        $this->load->view('News/index',$data);
        $this->load->view('templates/footer');
    }
    public function view_all()
    {
        $config=[
            'base_url'=>base_url().'news/view_all',
            'total_rows'=>$this->news_model->count(),
            'per_page'=>2,
            'uri_segment'=>3,
        ];

        $this->pagination->initialize($config);

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        $data=[
            'title'=>"News Flash",
            'News'=>$this->news_model->getAll($config['per_page'],$page),
            'links'=>$this->pagination->create_links(),
        ];

        $this->load->view('templates/header');
        $this->load->view('News/index',$data);
        $this->load->view('templates/footer');
    }
    public function view($slug=null)
    {
        $data=[
            'news'=>$this->news_model->get_news($slug),
            'title'=>'Barangay News'
        ];
        if(empty($data['news']))
        {
            show_404();
        }
        
        $this->load->view('templates/header');
        $this->load->view('News/view',$data);
        $this->load->view('templates/footer');
    }
    public function create()
    {
        $data['title']='Create Post';
        $this->form_validation->set_rules('title','Title','required');
        $this->form_validation->set_rules('body','Body','required');
        if($this->form_validation->run()===FALSE)
        {
            $this->load->view('templates/header');
            $this->load->view('News/create',$data);
            $this->load->view('templates/footer');
        }
        else {
           $this->news_model->create_news();
           redirect('news/view_all');
        }
        
    }
    
    

 
}
?>