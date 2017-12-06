<?php
  // Remove regular Posts from Admin Menu
  function remove_menus () {
     remove_menu_page('edit.php');
     remove_menu_page('edit-comments.php');
  }

  function remove_topBar_items( $wp_admin_bar ) {
      $wp_admin_bar->remove_node( 'wp-logo' );
      $wp_admin_bar->remove_menu( 'new-post' );
      $wp_admin_bar->remove_menu('comments');
  }

  add_action( 'admin_bar_menu', 'remove_topBar_items', 999 );
  add_action('admin_menu', 'remove_menus');
