<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Migration_Add_parent_id extends CI_Migration {

  public function __construct()
  {
    $this->load->dbforge();
    $this->load->database();
  }

  public function up() {
    
    $fields = (array(
      'parent_id' => array(
        'type' => 'INT',
        'contraint' => 11,
        'unsigned' => TRUE,
        'default' => 0,
      ),
    ));  

    $this->dbforge->add_column('pages', $fields);
  }

  public function down() {
    $this->dbforge->drop_column('pages', 'parent_id');
  }

}

/* End of file 004_add_parent_id.php */
/* Location: ./application/migrations/004_add_parent_id.php */