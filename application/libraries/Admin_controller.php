<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_controller extends Base_Controller {

  public function __construct()
  {
    parent::__construct();

    $this->load->library('form_validation');
    
    $this->load->model('user_model');
    $this->load->model('page_model');


    //Urls not to be checked for loggedin users.
    $exception_urls = array(
      'admin/user/login',
      'admin/user/logout',
      'admin/user/reset-password',
      );

    //Check if user is loggedin, else redirect.
    if( in_array(uri_string(), $exception_urls) == FALSE ){
      if( $this->user_model->loggedin() == FALSE ){
        redirect('admin/user/login');
      }
    }

  }

}

/* End of file Admin_controller.php */
/* Location: ./application/libraries/Admin_controller.php */