<?php

// MENU REGISTRATION
register_nav_menus(
  array(
    'menu' => 'Main Site Menu'
  )
);
class Main_Menu_Walker extends Walker_Nav_Menu{
    function end_el( &$output, $item, $depth = 0, $args = array() ) {
      $output .= "</li>\n";
      if ($depth == 0) { $output .="<lin></lin>\n"; }
    }
}

?>