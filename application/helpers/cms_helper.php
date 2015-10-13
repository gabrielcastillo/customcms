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


  function alert_message( $type, $message )
  {
    $html = '';

    $html .= '<div class="alert alert-'.$type.' alert-dismissible" role="alert">';
    $html .= '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
    $html .= $message;
    $html .= '</div>';

    return $html;
  }