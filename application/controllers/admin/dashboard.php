<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends Admin_Controller {

  public function __construct()
  {
    parent::__construct(); 
  }

  public function index()
  {
    $this->load->view('_layout_main', $this->data);
  }

  public function modal()
  {
    $this->load->view('_layout_modal', $this->data);
  }

}

/* End of file dashboard.php */
/* Location: ./application/controllers/admin/dashboard.php */