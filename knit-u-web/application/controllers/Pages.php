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
        $this->load->view('pages/intro', $data);
        $this->load->view('templates/footer', $data);
	}
} 
?>