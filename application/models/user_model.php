<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends Base_Model {

  protected $_table_name = 'users';
  protected $_order_by = 'name';

  public $rules = array(
    'email'     => array(
      'field' => 'email', 
      'label' => 'email', 
      'rules' => 'trim|required|valid_email|xss_clean'
      ),
    'password'  => array(
      'field' => 'password', 
      'label' => 'password', 
      'rules' => 'trim|required'
      ),
    );

  public $rules_admin = array(
    'name'      => array(
      'field' => 'name', 
      'label' => 'name', 
      'rules' => 'trim|required|xss_clean'
      ),
    'email'     => array(
      'field' => 'email', 
      'label' => 'email', 
      'rules' => 'trim|required|valid_email|xss_clean|callback__unique_email'
      ),
    'password'  => array(
      'field' => 'password', 
      'label' => 'password', 
      'rules' => 'trim'
      ),
    'confirm'   => array(
      'field' => 'confirm', 
      'label' => 'confirm', 
      'rules' => 'trim|matches[password]'
      ),
    );

  public function __construct()
  {
    parent::__construct();
  }

  public function login()
  {
    $user = $this->user_model->get_by(array(
      'email' => $this->input->post('email', TRUE),
      'password' => $this->hash($this->input->post('password', TRUE))
    ), TRUE);

    if( count($user) ){
      $data = array(
        'name' => $user->name,
        'email' => $user->email,
        'id' => $user->id,
        'loggedin' => TRUE,
        );
      $this->session->set_userdata($data);
    }
  }

  public function logout()
  {
    $this->session->sess_destroy();
  }

  public function loggedin()
  {
    return (bool) $this->session->userdata('loggedin');
  }
  
  public function hash( $string )
  {
    return hash('sha512', $string . config_item('encryption_key'));
  }

  public function get_new()
  {
    $user = new stdClass();

    $user->id       = '';
    $user->name     = '';
    $user->email    = '';
    $user->password = '';
    
    return $user;
  }

}

/* End of file user_model.php */
/* Location: ./application/models/user_model.php */