<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page_model extends Base_Model {

  protected $_table_name = 'pages';
  protected $_primary_key = 'id';
  protected $_primary_filter = 'intval';
  protected $_order_by = 'order';
  protected $_rules = array();
  protected $_timestamps = FALSE;

  public function __construct()
  {
    parent::__construct();
  }
  



}

/* End of file page_model.php */
/* Location: ./application/models/page_model.php */