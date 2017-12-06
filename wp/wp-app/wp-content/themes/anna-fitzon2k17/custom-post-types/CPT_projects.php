<?php
  add_action( 'init', 'portfolio_projects' );
        function portfolio_projects() {
          $labels = array(
              'name'               => __( 'Projekte' ),
              'singular_name'      => __( 'Projekt' ),
              'menu_name'          => __( 'Projekte' ),
              'name_admin_bar'     => __( 'Projekt' ),
              'add_new'            => __( 'Neues Projekt', 'projekt' ),
              'add_new_item'       => __( 'Neues Projekt anlegen' ),
              'new_item'           => __( 'Neues Projekt' ),
              'edit_item'          => __( 'Projekt bearbeiten' ),
              'view_item'          => __( 'Projekt anschauen' ),
              'all_items'          => __( 'Alle Projekte' ),
              'search_items'       => __( 'Projekte durchsuchen' ),
              'parent_item_colon'  => __( 'Elternprojekte:' ),
              'not_found'          => __( 'Kein Projekt gefunden' ),
              'not_found_in_trash' => __( 'Kein Projekt im Papierkorb gefunden.' )
          );

          $args = array(
              'labels'                => $labels,
              'description'           => __( 'Beschreibung.'),
              'public'                => true,
              'publicly_queryable'    => true,
              'show_ui'               => true,
              'show_in_menu'          => true,
              'query_var'             => true,
              'rewrite'               => array( 'slug' => 'project' ),
              'capability_type'       => 'post',
              'has_archive'           => true,
              'hierarchical'          => false,
              'menu_position'         => null,
              'show_in_rest'          => true,
              'rest_base'             => 'projects',
              'rest_controller_class' => 'WP_REST_Posts_Controller',
              'supports'              => array( 'title', 'thumbnail', 'editor'),
              'taxonomies'            => array('post_tag', 'category')
          );

          register_post_type( 'project', $args );
      }
