<?php
/**
 * Template name: Welcome template
 */
?>

<?php include("header.php"); ?>
	
	<section class="c-welcome">
		
        <div class="c-welcome__content-container c-welcome__content-container--height">
            
            <div class="c-welcome__logo">
                <svg>
                    <use xlink:href="#shape-logo"></use>
                </svg>
            </div>

            <h1 class="c-welcome__title">Welcome to our online portal and interactive presentation map</h1>
            <h2 class="c-welcome__sub-title">Once presentations have been delivered, collateral including presentation files, information on teams and videos will be made available to download</h2>

            <a href="" class="down-arrow">
                <svg>
                    <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#shape-down-arrow" viewBox="0 0 32 32"></use>
                </svg>
            </a>

        </div>
		
    </section>
    
    <section class="c-welcome__map-container">

        <div class="c-welcome__content-container">
            <div class="c-welcome__map map">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/build/img/map.png" alt="">
                
            <?php 
                /**
                 * Map markers
                 */
                $args = array(
                    'post_type' => 'meetings',
                    'posts_per_page' => -1,
                    'orderby' => 'post_date',
                    'order' => 'ASC'
                );
                $loop = new WP_Query( $args );
                
                $map_item_count = 1;
                $marker_count = 1;

                while ( $loop->have_posts() ) : $loop->the_post();

                    $main_title = get_the_title();
                    $location_title = get_field( 'location_title' );
                    $date_time = get_field( 'date_time' );
                    $y_position = get_field( 'y_position' );
                    $x_position = get_field( 'x_position' );
                    $active = get_field( 'active' );


                    //$active_marker = $active === ( TRUE ) ? 'marker--active' : '';
                    if ( $active == true ) { 
                        $active_marker = 'marker--active';
                       } else {
                        $active_marker = '';
                       }

                    echo '<div class="map-item map-item'. $map_item_count++ .' '. $active_marker .'" style="top: '. $y_position .'%; left: '. $x_position .'%">';
                        $marker = $marker_count++;
                        echo '<a class="marker"  href="#marker' . $marker . '">';
                            echo ' <svg><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#shape-marker" viewBox="0 0 32 32"></use></svg>';
                            echo '<span class="u-sr-only">' . $main_title . '</span>';
                        echo '</a>';
                        echo '<aside id="' . $marker . '" class="map-popup">';
                            echo '<h3 class="popup-title">'. $main_title .'</h3>';
                            echo '<h4 class="location-title">'. $location_title .'</h4>';
                            echo '<span class="location-date">'. $date_time .'</span>';
                        echo '</aside>';
                    echo '</div>';
                endwhile; 
            ?>

            </div>

            <svg class="mediacom-logo">
                <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#shape-mediacom" viewBox="0 0 32 32"></use>
            </svg>

        </div>

    </section>

<?php include("footer.php"); ?>