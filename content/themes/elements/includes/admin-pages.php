<?php
// Creates ACF options pages
if( function_exists('acf_add_options_page') ){

    acf_add_options_page( array(
      'page_title'  => 'Website',
      'menu_title'  => 'Website',
      'menu_slug'   => 'website',
      'redirect'    => false
    ));

    acf_add_options_page( array(
      'page_title'  => 'Footer',
      'menu_title'  => 'Footer',
      'menu_slug'   => 'footer',
      'redirect'    => false
    ));

}
