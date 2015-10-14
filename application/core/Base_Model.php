<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Base_Model extends CI_Model {

  protected $_table_name = '';
  protected $_primary_key = 'id';
  protected $_primary_filter = 'intval';
  protected $_order_by = '';
  protected $_rules = array();
  protected $_timestamps = FALSE;

  public function __construct()
  {
    parent::__construct();
  }
  
  public function get( $id = NULL, $single = FALSE){

    if( $id != NULL ){

      $filter = $this->_primary_filter;
      $id = $filter($id);
      $this->db->where($this->_primary_key, $id);
      $method = 'row';

    }elseif( $single == TRUE ){

      $method = 'row';

    }else{

      $method = 'result';

    }

    if( !count($this->db->ar_orderby) ){

      $this->db->order_by($this->_order_by);

    }

    return $this->db->get($this->_table_name)->$method();
  }

  /**
  * Get By Records
  * @param $id int
  * @param $single BOOL 
  * @return TEXT return record in the where clause.
  */
  public function get_by( $where, $single = FALSE ){
    
    $this->db->where($where);

    return $this->get(NULL, $single);

  }


  /**
  * Save Records
  * @param $data array 
  * @param $id int Optional for updates
  * @return INT last insert id is returned.
  */
  public function save( $data, $id = NULL){

    if( $this->_timestamps == TRUE ){

      $now = date('Y-m-d H:i:s');
      $id || $data['created'] = $now;
      $data['modified'] = $now;

    }
    
    if( $id === NULL ){
      
      !isset($data[$this->_primary_key]) || $data[$this->_primary_key] == NULL;
      $this->db->set($data);
      $this->db->insert($this->_table_name);
      $id = $this->db->insert_id();

    }else{
      
      $filter = $this->_primary_filter;
      $id = $filter($id);
      $this->db->set($data);
      $this->db->where($this->_primary_key, $id);
      $this->db->update($this->_table_name);

    }

    if( $this->db->affected_rows() > 0 ){
      return $id;
    }else{
      return FALSE;
    }

  }



  /**
  * Delete Records
  * @param $id int
  * @return NULL
  */
  public function delete($id){
    $filter = $this->_primary_filter;
    $id = $filter($id);

    if( !$id ){
      return FALSE;
    }

    $this->db->where($this->_primary_key, $id);
    $this->db->limit(1);
    $this->db->delete($this->_table_name);

  }

  public function array_from_post($fields)
  {

    $data = array();

    foreach( $fields as $field ){
      if( $field == 'body' ){
        $data[$field] = $this->input->post($field);
      }else{
        $data[$field] = $this->input->post($field, TRUE);
      }
    }

    return $data;
  }

}

/* End of file Base_Model.php */
/* Location: ./application/core/Base_Model.php */