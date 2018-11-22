<?php include("header.php"); ?>


<section class="u-section">
   <div class="u-l-container--center" data-in-viewport>
      <div class="u-l-container u-l-container--row u-l-horizontal-padding u-l-vertical-padding u-l-vertical-padding--bottom background-color--white">
         <div class="c-team-list__header">
            <div class="c-navigation c-navigation--team-list c-team-list__column">
               nav here
            </div>
            <div class="c-team-list__column">
               <a href="/welcome">
                  <img class="c-team-list__logo" src="<?php bloginfo('template_url'); ?>/assets/build/img/logo.png" alt="Mediacom" >
               </a>
            </div>
         </div>

         <div class="c-team-list__header">
            <div class="c-team-list__column">
               <h1 class="c-team-list__title">Meet the UK client team</h1>
            </div>
         </div>

         <!--START: Content -->
         <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
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
                  <div class="c-team-content__inner-column">sdsdds</div>
                  <div class="c-team-content__inner-column">sdsdds</div>
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