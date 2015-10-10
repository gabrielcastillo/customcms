<?php

  function btn_edit( $uri )
  {
    return anchor($uri, '<i class="glyphicon glyphicon-edit"></i>');
  }

  function btn_delete( $uri )
  {
    return anchor($uri, '<i class="glyphicon glyphicon-remove"></i>', array('onclick' => "return confirm('Are you sure you want to delete this record? This cannot be undone.');"));
  }

  function var_checker( $variable, $stop = FALSE )
  { 
    echo '<pre>';
    print_r($variable);
    echo '</pre>';
    if($stop == TRUE){
      exit;
    }
  }