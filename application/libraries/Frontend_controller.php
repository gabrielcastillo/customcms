<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Frontend_controller extends Base_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->data['frontend'] = 'this->is the frontend controller';
  }

}

/* End of file Frontend_controller.php */
/* Location: ./application/libraries/Frontend_controller.php */