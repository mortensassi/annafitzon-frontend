<?php
  function register_tags_names_field() {
      register_rest_field( 'project',
          'tag_names',
          array(
              'get_callback'    => 'get_tags_names',
              'update_callback' => null,
              'schema'          => null,
          )
      );
  }

  add_action( 'rest_api_init', 'register_tags_names_field' );

  function get_tags_names( $object, $field_name, $request ) {

      $formatted_tags = array();

      $tags = get_the_tags( $object['id'] );

      foreach ($tags as $tag) {
          $formatted_tags[] = $tag->name;
      }

      return $formatted_tags;
  }
