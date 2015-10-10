<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_controller extends Base_Controller {

  public function __construct()
  {
    parent::__construct();

    $this->load->library('form_validation');
    $this->load->model('user_model');
  }

}

/* End of file Admin_controller.php */
/* Location: ./application/libraries/Admin_controller.php */