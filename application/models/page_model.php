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
    'parent_id'     => array(
      'field' => 'parent_id', 
      'label' => 'parent page', 
      'rules' => 'trim|intval'
      ),
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
    $page->parent_id = 0;

    return $page;
  }

  public function get_with_parent( $id = NULL, $single = FALSE)
  {
    $this->db->select('pages.*, p.slug as parent_slug, p.title as parent_title');
    $this->db->join('pages as p', 'pages.parent_id=p.id', 'left');
    return parent::get(  $id, $single);
  }

  public function get_no_parents( $id )
  {
    
    $this->db->select('id, title');
    $this->db->where('id !=', $id);
    $pages = parent::get();

    $array = array(0 => 'No Parent');

    if( count($pages) ){
      foreach( $pages as $page ){
        $array[$page->id] = $page->title;
      }
    }

    return $array;
  }

  public function get_nested()
  { 
    $this->db->order_by('order');
    $pages = $this->db->get('pages')->result_array();

    $array = array();

    foreach( $pages as $page ){
      if( !$page['parent_id']){
        $array[$page['id']] = $page;
      }else{
        $array[$page['parent_id']]['children'][] = $page;
      }
    }

    return $array;
  }

  public function save_order( $pages)
  { 
    if( count($pages) ){
      foreach( $pages as $order => $page ){
        if( $page['item_id'] != '' ){
          $data = array('parent_id' => (int) $page['parent_id'], 'order' => $order);
          $this->db->set($data)->where($this->_primary_key, $page['item_id'])->update($this->_table_name);
        }
      }
    }
  }

  public function delete( $id )
  {
    parent::delete($id);

    $this->db->set(array('parent_id' => 0))->where('parent_id', $id)->update($this->_table_name);
  }




}

/* End of file page_model.php */
/* Location: ./application/models/page_model.php */