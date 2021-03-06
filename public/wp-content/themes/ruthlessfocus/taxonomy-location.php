<?php include("header.php"); ?>


	<section class="u-section">
		<div class="u-l-container--center" data-in-viewport>
			<div class="u-l-container u-l-container--row u-l-horizontal-padding u-l-vertical-padding u-l-vertical-padding--bottom background-color--white">
				
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

				<div class="c-team-list__header">
					<div class="c-team-list__column">
						<h2 class="h2 faq-cat"><?= $name; ?></h2>
						<h1 class="c-team-list__title">Meet the UK client team</h1>
						<h2 class="c-team-list__subtitle">Click below to view team biographies</h2>
					</div>
				</div>
				
				<!-- Start: team memebers -->
				<div class="c-team-list__person-list">
					<?php

					// 	$terms = get_terms( 'faqs_cat', array(
					// 		'orderby'    => 'id',
					// 		'hide_empty' => 1 // hide categories with no posts
					// 	) 
					// );
					
					$this_term = get_queried_object();

					$terms = get_terms( $this_term->taxonomy, [
						'parent' => $this_term->term_id,
						'orderby' => 'slug',
						'hide_empty' => false
					] );
					
					foreach( $terms as $term ) {

						// Define the query
		
						$query = new WP_Query( [
							'post_type' => 'team',
							'tax_query' => [
								'relation' => 'AND',
								[
								'taxonomy' => $this_term->taxonomy,
								'field'    => 'slug',
								'terms'    => array( $term->slug )
								]
							]
						] );
				  
						// output the category in a heading              
						//echo'<h2 class="h2 faq-cat">' . $term->name . '</h2>';
				  
							 // Start the post loop
							 while ( $query->have_posts() ) : $query->the_post(); ?>

								<a href="<?php the_permalink(); ?>" id="post-<?php the_ID(); ?>" class="c-team-list__person-list__card">
									<div class="c-team-list__person-list__inner-card">
										<div class="c-team-list__person-list__thumb" style="background-image: url('<?php echo get_the_post_thumbnail_url() ?>')"></div>
										<h3 class="c-team-list__person-list__title">
											<?php the_title(); ?>
											<span><?php the_field('title'); ?></span>
										</h3>
									</div>
								</a>
				  
							 <?php endwhile;
				  
						// use reset postdata to restore the original query
						wp_reset_postdata();
					}
						?>
				</div>

			</div>	
		</div>
	</section>


<?php include("footer.php"); ?>