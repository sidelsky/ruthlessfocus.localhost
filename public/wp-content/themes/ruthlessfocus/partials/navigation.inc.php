<div class="c-team-list__header">
   <div class="c-navigation c-navigation--team-list c-team-list__column">
      <?php 

         // your taxonomy name
         $terms = get_terms([
            'taxonomy' => 'location',
            'childless' => false,
            'hide_empty' => false,
            'parent' => 0
         ]);

         $current_term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );

         foreach ($terms as $term) {
            $is_active = $term->count >= 1 ? 'active-term' : '' ;	
            $is_focused = $current_term->slug == $term->slug ? 'focused-term' : '' ;	  
            echo '<a href="'. get_term_link( $term ) .'" class="c-navigation__item '. $is_focused . ' ' . $is_active . '"><span>' . $term->name . '</span></a>';
         }

      ?>
      
      <!-- START: Sub Navigation -->
      <div class="c-sub-navigation">
         <?php
            //Sub items
            $taxonomy_name = get_queried_object()->taxonomy;
            $term_id = get_queried_object_id(); // Get the id of the taxonomy
            $term_children = get_term_children( $term_id, $taxonomy_name ); // Get the children of said taxonomy

            $current_child_term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );

            // Display the children 
            foreach ( $term_children as $child ) {
               $term = get_term_by( 'id', $child, $taxonomy_name );
               echo '<a href="' . get_term_link( $term->name, $taxonomy_name ) . '" class="c-sub-navigation__item active-term"><span>' . $term->name . '</span></a>';
            }
         ?>
      </div>
      <!-- END: Sub Navigation -->

   </div>

   <div class="c-team-list__column">
      <a href="/welcome">
         <img class="c-team-list__logo" src="<?php bloginfo('template_url'); ?>/assets/build/img/logo.png" alt="Mediacom" >
      </a>
   </div>
   
</div>