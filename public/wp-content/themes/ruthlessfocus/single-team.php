<?php include("header.php");

global $post

?>


<section class="u-section">
   <div class="u-l-container--center" data-in-viewport>
      <div class="u-l-container u-l-container--row u-l-horizontal-padding u-l-vertical-padding u-l-vertical-padding--bottom background-color--white">
        <!--START: Content -->
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

         <div class="c-team-list__header">
            <div class="c-navigation c-navigation--team-list c-team-list__column">
              <div class="c-navigation c-navigation--team-list c-team-list__column">
                <?php
                  $currentPostTerms = wp_get_object_terms($post->ID, 'location');

                  // your taxonomy name
                  $allTerms = get_terms([
                    'taxonomy' => 'location',
                    'hide_empty' => false,
                    'parent' => 0
                  ]);

                  foreach ($currentPostTerms as $term) {
                    if ($term->parent === 0) {
                      $current_term = $term;
                    } else {
                      $current_child_term = $term;
                    }
                  }

                  foreach ($allTerms as $term) {
                    $is_active = $term->count >= 1 ? 'active-term' : '' ;

                    $is_focused = $current_term->slug == $term->slug ? 'focused-term' : '' ;
                    echo '<a href="'. get_term_link( $term ) .'" class="c-navigation__item '. $is_focused . ' ' . $is_active . '"><span>' . $term->name . '</span></a>';
                  }
                ?>

                <!-- START: Sub Navigation -->
                <div class="c-sub-navigation">
                  <?php
                    $term_children = get_term_children( $current_term->term_id, 'location');

                    // Display the children
                    foreach ( $term_children as $childId ) {
                      $term = get_term_by('id', $childId, 'location');
                      $is_focused = $current_child_term->slug == $term->slug ? 'focused-term' : '' ;
                      echo '<a href="' . get_term_link( $term->name, 'location' ) . '" class="c-sub-navigation__item active-term ' . $is_focused . ' "><span>' . $term->name . '</span></a>';
                    }
                  ?>
                </div>
              </div>
            </div>
            <div class="c-team-list__column">
               <a href="/welcome">
                  <img class="c-team-list__logo" src="<?php bloginfo('template_url'); ?>/assets/build/img/logo.png" alt="Mediacom" >
               </a>
            </div>
         </div>

         <div class="c-team-list__header">
            <div class="c-team-list__column">
               <h1 class="c-team-list__title">Meet: <?= get_the_title($post->ID); ?></h1>
            </div>
         </div>


         <section class="c-team-content">

            <div class="c-team-content__column">
               <img class="c-team-content__thumb" src="<?php echo get_the_post_thumbnail_url() ?>" alt="">
               <div class="c-team-content__meta">
                  <h3 class="c-team-list__person-list__title">
                     <?php the_title(); ?>
                     <span><?php the_field('title'); ?></span>
                  </h3>
                  <div class="c-team-content__thumb-detail">
                     <?php the_field('thumb_detail'); ?>
                  </div>
               </div>
            </div>

            <div class="c-team-content__column">
               <div class="c-team-content__the-content">
               <h3 class="c-team-content__title">Biography</h3>
                  <?php the_content(); ?>
               </div>
               <div class="c-team-content__inner">
                  <div class="c-team-content__inner-column">
                     <div class="c-team-content__fun-fact">
                        <h3 class="c-team-content__title">Fun fact</h3>
                        <?php the_field('fun_fact'); ?>
                     </div>
                  </div>
                  <div class="c-team-content__inner-column">
                     <div class="c-team-content__achievement">
                        <h3 class="c-team-content__title">Favourite sport, team or proudest sporting achievement</h3>
                        <?php the_field('achievement'); ?>
                     </div>
                  </div>
               </div>
            </div>

         </section>
         <?php endwhile; else : ?>
	         <p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
         <?php endif; ?>
         <!--END: Content -->

      </div>
   </div>
</section>


<?php include("footer.php"); ?>
