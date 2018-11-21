<?php include("header.php"); ?>
	
<nav class="c-navigation">
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
</nav>


<?php

$this_term = get_queried_object();
 $args = array(
'parent' => $this_term->term_id,
'orderby' => 'slug',
'hide_empty' => false
 );
 $child_terms = get_terms( $this_term->taxonomy, $args );
 echo '<ul>';
 foreach ($child_terms as $term) {

 // List the child topic
 echo '<li><h3><a href="' . get_term_link( $term->name, $this_term->taxonomy ) . '">' . $term->name . '</a></h3>'; 

 // Get posts from that child topic  
$query = new WP_Query( array(
  'post_type' => 'team',
  'tax_query' => array(
    'relation' => 'AND',
    array(
      'taxonomy' => $this_term->taxonomy,
      'field'    => 'slug',
      'terms'    => array( $term->slug )
    )
  )
) );

 // List the posts
 if($query->have_posts()) {
      while($query->have_posts()) : $query->the_post(); ?>
           <li><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></li><?php
      endwhile;
 } else  { 
	 echo "no posts";
	}


 // close our <li>
 echo '</li>';
 } //end foreach
 ?>

<?php

// $post_id = get_the_ID();

// // get the assigned taxonomy terms for "property-city"
// $assigned_terms = wp_get_post_terms($post_id, 'location', [
// 	'fields' => 'all'
// ]);

// // loop through the term objects
// foreach($assigned_terms as $term) {

// 	// display child term name
// 	echo 'Child term:'.$term->name.'<br>';

// 	// display parent term name
// 	if( $term->parent != 0 ){
// 		$parent = get_term_by( 'id', $term->parent , 'location' );
// 		echo 'Parent term:'.$parent->name.'<br>';
// 	}
// }

?>


<nav class="c-sub-navigation">
	<?php
		//Sub items
		$taxonomy_name = get_queried_object()->taxonomy;
		$term_id = get_queried_object_id(); // Get the id of the taxonomy
		$term_children = get_term_children( $term_id, $taxonomy_name ); // Get the children of said taxonomy

		$current_child_term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );

		// Display the children 
		foreach ( $term_children as $child ) {
			
			//echo $current_child_term;

			$term = get_term_by( 'id', $child, $taxonomy_name );
			echo '<a href="' . get_term_link( $term->name, $taxonomy_name ) . '" class="c-sub-navigation__item active-term"><span>' . $term->name . '</span></a>';
		}
	?>
</nav>

<?php get_template_part('loop'); ?>



<?php include("footer.php"); ?>