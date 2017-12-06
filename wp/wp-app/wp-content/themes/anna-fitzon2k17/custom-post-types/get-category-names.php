<?php
  function register_categories_names_field() {
      register_rest_field( 'project',
          'category_names',
          array(
              'get_callback'    => 'get_categories_names',
              'update_callback' => null,
              'schema'          => null,
          )
      );
  }

  add_action( 'rest_api_init', 'register_categories_names_field' );

  function get_categories_names( $object, $field_name, $request ) {

      $formatted_categories = array();

      $categories = get_the_category( $object['id'] );

      foreach ($categories as $category) {
          $formatted_categories[] = $category->name;
      }

      return $formatted_categories;
  }
