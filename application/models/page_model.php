<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page_model extends Base_Model {

  protected $_table_name = 'pages';
  protected $_primary_key = 'id';
  protected $_primary_filter = 'intval';
  protected $_order_by = 'order';
  protected $_rules = array();
  protected $_timestamps = FALSE;


  public $rules = array(
    'title'      => array(
      'field' => 'title', 
      'label' => 'title', 
      'rules' => 'trim|required|max_lenght[100]|xss_clean'
      ),
    'slug'     => array(
      'field' => 'slug', 
      'label' => 'slug', 
      'rules' => 'trim|required|max_lenght[100]|url_title|xss_clean|callback__unique_slug'
      ),
    /*'order'  => array(
      'field' => 'order', 
      'label' => 'order', 
      'rules' => 'trim|is_natural|xss_clean'
      ),*/
    'body'   => array(
      'field' => 'body', 
      'label' => 'body', 
      'rules' => 'trim|required'
      ),
    );


  public function __construct()
  {
    parent::__construct();
  }
  

  public function get_new()
  {
    $page = new stdClass();

    $page->id     = '';
    $page->title  = '';
    $page->slug   = '';
    $page->order  = '';
    $page->body   = '';
    
    return $page;
  }

}

/* End of file page_model.php */
/* Location: ./application/models/page_model.php */