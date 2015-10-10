<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends Admin_Controller {

  public function __construct()
  {
    parent::__construct();
  }

  public function login()
  {
    $dashboard = 'admin/dashboard';
    $this->user_model->loggedin() == FALSE || redirect($dashboard);

    $rules = $this->user_model->rules;
    $this->form_validation->set_rules($rules);
    if( $this->form_validation->run() == TRUE ){
      if( $this->user_model->login() == TRUE ){
        redirect($dashboard);
      }else{
        $this->session->set_flashdata('error', 'Failed login');
        redirect('admin/user/login', 'refresh');
      }
    }

    $this->data['subview'] = 'admin/user/login';
    $this->load->view('admin/_layout_modal', $this->data);;
  }

  public function logout()
  {
    $this->user_model->logout();
    redirect('admin/user/login');
  }

  public function password()
  {
    echo $this->user_model->hash('password');
  }
}

/* End of file user.php */
/* Location: ./application/controllers/admin/user.php */