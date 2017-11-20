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
            'rest_controller_class' => 'theme_rest_post_controller',
            'supports'              => array( 'title', 'thumbnail', 'editor'),
            'taxonomies'            => array('post_tag', 'category')
      	);

      	register_post_type( 'project', $args );
    }


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


    /**
    * Category data
    */
    class theme_rest_post_controller extends WP_REST_Posts_Controller
    {

       public function init()
       {
           add_action( 'rest_api_init', array($this, 'add_category_data' ));
       }

       /**
        * Add the category data
        */
       public function add_category_data()
       {
           register_rest_field( 'project', 'category_data', [
               'get_callback' => array($this, 'get_all_category_data')
           ] );
       }

       /**
        * Get all the category data
        *
        * @param $object
        * @param $field_name
        * @param $request
        *
        * @return array
        */
       public function get_all_category_data( $object, $field_name, $request )
       {
           return get_the_category( $object['id'] );
       }
    }
