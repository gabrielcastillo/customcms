<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends Admin_Controller {

  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    $this->data['users'] = $this->user_model->get();
    $this->data['subview'] = 'admin/user/index';
    $this->load->view('admin/_layout_main', $this->data);
  }

  public function edit( $id = NULL )
  {
    $id == NULL || $this->data['user'] =  $this->user_model->get( $id );

    $rules = $this->user_model->rules_admin;

    $id || $rules['password']['rules'] .= '|required';

    $this->form_validation->set_rules($rules);

    if( $this->form_validation->run() == TRUE ){

      if( $this->user_model->login() == TRUE ){

        redirect($dashboard);

      }else{

        $this->session->set_flashdata('error', 'Failed login');
        redirect('admin/user/login', 'refresh');

      }

    }

    $this->data['subview'] = 'admin/user/edit';
    $this->load->view('admin/_layout_main', $this->data);
  }

  public function delete()
  {

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

  //Check is email is unique when creating new user, and or when updating, if updating user, email will not be checked.
  public function _unique_email( $str )
  {
    $id = $this->uri->segment(4);
    $this->db->where('email', $this->input->post('email', TRUE));
    !$id || $this->db->where('id !=', $id);
    $user = $this->user_model->get();

    if(count($user)){
      $this->form_validation->set_message('_unique_email', '%s should be unique');
      return FALSE;
    }

    return TRUE;
  }

}

/* End of file user.php */
/* Location: ./application/controllers/admin/user.php */