<section class="c-welcome__map-container" id="map">

        <div class="c-welcome__content-container">

            <div class="power-logo-container">
                <svg class="power-logo">
                    <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#shape-power-logo" viewBox="0 0 32 32"></use>
                </svg>
            </div>

            <div class="c-welcome__map">

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
                
                $map_item_count = 0;
                $marker_count = 0;

                while ( $loop->have_posts() ) : $loop->the_post();

                    $main_title = get_the_title();
                    $location_title = get_field( 'location_title' );
                    $date_time = get_field( 'date_time' );
                    $y_position = get_field( 'y_position' );
                    $x_position = get_field( 'x_position' );
                    $active = get_field( 'active' );

                    // addidas files
                    $adidas_team = get_field( 'adidas_team' );
                    $adidas_pitch = get_field( 'adidas_pitch' );
                    $adidas_video = get_field( 'adidas_video' );

                    // reebok
                    $reebok_team = get_field( 'reebok_team' );
                    $reebok_pitch = get_field( 'reebok_pitch' );
                    $reebok_video = get_field( 'reebok_video' );

                    $team = 'Team';
                    $pitch = 'Pitch';
                    $video = 'Video';


                    //$active_marker = $active === ( TRUE ) ? 'marker--active' : '';
                    if ( $active == true ) { 
                        $active_marker = 'marker--active';
                        $icon = 'marker';
                       } else {
                        $active_marker = '';
                        $icon = 'close';
                       }

                    echo '<div class="map-item map-item'. $map_item_count++ .' '. $active_marker .'" style="top: '. $y_position .'%; left: '. $x_position .'%">';
                        $marker = $marker_count++;
                        echo '<a class="marker"  href="#marker' . $marker . '">';
                            echo ' <svg><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#shape-'. $icon .'" viewBox="0 0 32 32"></use></svg>';
                            echo '<span class="u-sr-only">' . $main_title . '</span>';
                        echo '</a>';
                        echo '<aside id="' . $marker . '" class="map-popup">';
                            echo '<h3 class="popup-title">'. $main_title .'</h3>';
                            echo '<h4 class="location-title">'. $location_title .'</h4>';
                            echo '<span class="location-date">'. $date_time .'</span>';
                            if ( $adidas_team || $adidas_pitch || $adidas_video ) {
                                echo '<div class="files">';
                                if ( $reebok_team || $reebok_pitch || $reebok_video ) {
                                    echo '<div class="files__title"><span>adidas</span></div>';
                                }
                                    echo '<div class="files__wrapper">';
                                        if ( $adidas_team ) {
                                            echo '<a class="files__link" href="'. $adidas_team['url'] .'" target="_blank"><span>'. $team .'</span></a>';
                                        }
                                        if ( $adidas_pitch ) {
                                            echo '<a class="files__link" href="'. $adidas_pitch['url'] .'" target="_blank"><span>'. $pitch .'</span></a>';
                                        }
                                        if ( $adidas_video ) {
                                            echo '<a class="files__link" href="'. $adidas_video['url'] .'" target="_blank"><span>'. $video .'</span></a>';
                                        }
                                    echo '</div>';
                                echo '</div>';
                            }
                            
                            if ( $reebok_team || $reebok_pitch || $reebok_video ) {
                                echo '<div class="files">';
                                    echo '<div class="files__title"><span>Reebok</span></div>';
                                        echo '<div class="files__wrapper">';
                                            if ( $reebok_team ) {
                                                echo '<a class="files__link" href="'. $reebok_team['url'] .'" target="_blank"><span>'. $team .'</span></a>';
                                            }
                                            if ( $reebok_pitch ) {
                                                echo '<a class="files__link" href="'. $reebok_pitch['url'] .'" target="_blank"><span>'. $pitch .'</span></a>';
                                            }
                                            if ( $reebok_video ) {
                                                echo '<a class="files__link" href="'. $reebok_video['url'] .'" target="_blank"><span>'. $video .'</span></a>';
                                            }
                                        echo '</div>';
                                echo '</div>';
                            }
                        echo '</aside>';
                    echo '</div>';
                endwhile; 
            ?>

            </div>

            <div class="mediacom-logo-container">
                <svg class="mediacom-logo">
                    <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#shape-logo" viewBox="0 0 32 32"></use>
                </svg>
            </div>

        </div>
        

</section>