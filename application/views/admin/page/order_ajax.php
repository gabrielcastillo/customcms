<?php

  echo get_ol($pages);

  function get_ol($array, $child = FALSE) 
  {
    $str = '';

    if( count($array) ){
      $str .= $child == FALSE ? '<ol class="sortable">' : '<ol>';

      foreach( $array as $item ){
        $str .= '<li id="list_' . $item['id'] . '">';
        $str .= '<div class="ui-widget-content">' . $item['title'] . '</div>';

        if( isset($item['children']) && count($item['children']) ){
          $str .= get_ol($item['children'], TRUE);
        }

        $str .= '</li>' . PHP_EOL;
      }

      $str .= '</ol>' . PHP_EOL;
    }

    return $str;
  }