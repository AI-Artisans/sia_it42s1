<?php
class Activities extends CI_Controller{
	public function __construct() {
		parent::__construct();
	}

	public function view(){
		$this->load->model('Blogs_model', 'blogs');
			
		$data['query'] = $this->blogs->getSome (5);
			
		$this->load->view('msgview', $data);
	}
}

?>

