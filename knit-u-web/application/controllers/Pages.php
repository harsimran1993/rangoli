<?php
class Pages extends CI_Controller{
	
	public function __construct(){
		
		parent::__construct();
		//$this->load->model('News_model');
		$this->load->helper('url_helper');
	}
		
	public function view($page ='home')
	{
        if ( ! file_exists(APPPATH.'views/pages/'.$page.'.php'))
        {
                // Whoops, we don't have a page for that!
                show_404();
        }
        $data['title'] = ucfirst($page); // Capitalize the first letter

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->about();
        $this->contenta();
        $this->load->view('templates/footer', $data);
	}
	public function about()
	{
        $data['about_title']= "KNIT-a-WEB";
        $data['about_head'] = "Realize your Dream Website, blog or forum";
        $this->load->view('pages/intro', $data);
	}
	
	public function contenta()
	{
        $data['content_heading']="my content";
        $data['content_a'] = "this is made by";
        $data['content_a_link_ref']="#about";
        $data['content_a_link_name']="knit-u-web";
        $data['content_b']="exclusively for you.";
        $data['src']="assets/image/ipad.png";
        $this->load->view('pages/content', $data);
		
	}
} 
?>
