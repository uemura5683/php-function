<?php
/**
* array_filter function
* prev function
* next function
* end function sample
**/

$target_key = '270';

/**
* array
**/
$news = array( 
  10 => array( 'id' => 210, 'title' => 'aaa' ),
  30 => array( 'id' => 250, 'title' => 'bbb' ),
  50 => array( 'id' => 260, 'title' => 'ccc' ),
  70 => array( 'id' => 270, 'title' => 'ddd' ),
  90 => array( 'id' => 300, 'title' => 'eee' )
);

/**
* array_filter function
**/
$filter_next = array_filter( $news, function ( $entry ) {
    if($entry['id'] == '250' ) {
      return true;
    } else {
      return false;
    }
  }
);

/**
* prev end function
**/
function array_prev_pointer( $array, $target ) {
    $length = count( $array ); $return = current($array); $li = 1;
    foreach( $array as $key => $value ) {
      $return = next($array);
      if( $value['id'] == $target ) {
         if( $length == $li ) {
            $return = end($array);
         } else {
            $return = prev($array);
            $return = prev($array);
         }
         return $return;
      }
      $li++;
    }
}

/**
* next end function
**/
function array_next_pointer( $array, $target ) {
    $length = count( $array ); $return = current($array); $li = 1;
    foreach( $array as $key => $value ) {
      $return = next($array);
      if( $length == $li ) {
          return false;
      } else {
        if( $value['id'] == $target ) {
          return $return;
        }
      }
    }
}

$prev_data = array_prev_pointer($news, $target_key);
$next_tada = array_next_pointer($news, $target_key);

var_dump($prev_data['id']); //  250
var_dump($next_tada['id']); //  300

?>