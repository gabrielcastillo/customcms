<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends Base_Model {

  protected $_table_name = 'users';
  protected $_order_by = 'name';

  public $rules = array(
    'email' => array('field' => 'email', 'label' => 'email', 'rules' => 'trim|required|valid_email|xss_clean'),
    'password' => array('field' => 'password', 'label' => 'password', 'rules' => 'trim|required'),
    );

  public function __construct()
  {
    parent::__construct();
  }
  

}

/* End of file user_model.php */
/* Location: ./application/models/user_model.php */