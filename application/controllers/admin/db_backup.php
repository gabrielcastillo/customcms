<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Db_backup extends Admin_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->dbutil();
  }

  public function index()
  {
    $backup_file =  date('Y-m-d-H-i-s') . '.zip';
    $prefs = array(
              'tables'      => array(),  // Array of tables to backup.
              'ignore'      => array(),           // List of tables to omit from the backup
              'format'      => 'zip',             // gzip, zip, txt
              'filename'    => $backup_file,    // File name - NEEDED ONLY WITH ZIP FILES
              'add_drop'    => TRUE,              // Whether to add DROP TABLE statements to backup file
              'add_insert'  => TRUE,              // Whether to add INSERT data to backup file
              'newline'     => "\n"               // Newline character used in backup file
            );

    $backup =& $this->dbutil->backup($prefs);

    $this->load->helper('file');
    $backup_location = '/backups/';
  
    write_file($backup_location . $backup_file, $backup);
    $this->load->helper('download');
    force_download($backup_file, $backup);
  }

}

/* End of file db_backup.php */
/* Location: ./application/controllers/admin/db_backup.php */