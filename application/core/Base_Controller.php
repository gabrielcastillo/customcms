<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Base_Controller extends CI_Controller {

  public $data = array();

  public function __construct()
  {
    parent::__construct();
    $this->data['site_name'] = 'Custom CMS';
  }

}

/* End of file Base_Controller.php */
/* Location: ./application/core/Base_Controller.php */