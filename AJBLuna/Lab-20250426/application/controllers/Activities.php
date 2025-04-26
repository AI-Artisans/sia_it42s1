<?php
class Activities extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('Blogs_model', 'blogs');
    }

    public function view(){
        $data['query'] = $this->blogs->getSome(5);
        $this->load->view('msgview', $data);
    }
}
?>
