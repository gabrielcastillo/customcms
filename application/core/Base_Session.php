<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Base_Session extends CI_Session {

  public function sess_update()
  {
    if( isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] != 'XMLHttpRequest' ) {
      parent::sess_update();
    }
  }

}

/* End of file Base_Session.php */
/* Location: ./application/core/Base_Session.php */