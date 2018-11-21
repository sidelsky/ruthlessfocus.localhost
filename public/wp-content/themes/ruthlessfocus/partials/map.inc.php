<section class="c-welcome__map-container" id="map">

        <div class="c-welcome__content-container">

            <div class="power-logo-container">
                <svg class="power-logo">
                    <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#shape-power-logo" viewBox="0 0 32 32"></use>
                </svg>
            </div>

            <div class="c-welcome__map">
                
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/build/img/map.png" alt="">

                <script>
                    function track_pdf_click() {
                        //_gaq.push(['_trackEvent','Download','PDF', this.href]);
                        ga('send', 'event', 'Downloads', 'Click', 'PDF downloaded', '0');
                    }
                    function track_zip_click() {
                        //_gaq.push(['_trackEvent','Download','ZIP', this.href]);
                        ga('send', 'event', 'Downloads', 'Click', 'ZIP downloaded', '0');
                    }
                    function track_mp4_click() {
                        //_gaq.push(['_trackEvent','Download','ZIP', this.href]);
                        ga('send', 'event', 'Downloads', 'Click', 'MP4 downloaded', '0');
                    }
                </script>
                
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
                    $adidas_demo = get_field( 'adidas_demos' );
                    $adidas_zip = get_field( 'adidas_zip' );
                    $adidas_plan = get_field( 'adidas_plan' );

                    // reebok
                    $reebok_team = get_field( 'reebok_team' );
                    $reebok_pitch = get_field( 'reebok_pitch' );
                    $reebok_video = get_field( 'reebok_video' );
                    $reebok_demo = get_field( 'reebok_demos' );
                    $reebok_zip = get_field( 'reebok__zip' );

                    $team = 'Team';
                    $pitch = 'Pres';
                    $video = 'Video';
                    $demo = 'Demos';
                    $zip = 'Videos';
                    $plan = 'Plan';


                    //$active_marker = $active === ( TRUE ) ? 'marker--active' : '';
                    if ( $active == true ) { 
                        $active_marker = 'marker--active';
                        $icon = 'marker';
                        $staus = 'UNLOCKED';
                       } else {
                        $active_marker = '';
                        $icon = 'close';
                        $staus = 'LOCKED';
                       }

                    echo '<div class="map-item map-item'. $map_item_count++ .' '. $active_marker .'" style="top: '. $y_position .'%; left: '. $x_position .'%">';
                        $marker = $marker_count++;
                        
                        echo '<a class="marker"  href="#marker' . $marker . '" >';
                            echo ' <svg><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#shape-'. $icon .'" viewBox="0 0 32 32"></use></svg>';
                            echo '<span class="on-mobile">' . $main_title . '</span>';
                        echo '</a>';

                        echo '<aside id="' . $marker . '" class="map-popup">';
                            echo '<a href="#" class="close">';
                                echo '<svg><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#shape-close" viewBox="0 0 32 32"></use></svg>';
                            echo '</a>';
                            echo '<small">'. $staus .'</small>';
                            echo '<h3 class="popup-title">'. $main_title .'</h3>';
                            echo '<h4 class="location-title">'. $location_title .'</h4>';
                            echo '<span class="location-date">'. $date_time .'</span>';

                            $clickPDF = '_gaq.push(["_trackEvent","Download","PDF", this.href]);';
                            $clickZIP = '_gaq.push(["_trackEvent","Download","PDF", this.href]);';

                            if ( $adidas_team || $adidas_pitch || $adidas_video ) {
                                echo '<div class="files">';
                                if ( $reebok_team || $reebok_pitch || $reebok_video ) {
                                    echo '<div class="files__title"><span>adidas</span></div>';
                                }
                                    echo '<div class="files__wrapper">';
                                        if ( $adidas_team ) {
                                            echo '<a class="files__link" href="'. $adidas_team['url'] .'" target="_blank" onclick="track_pdf_click();"><span>'. $team .'</span></a>';
                                        }
                                        if ( $adidas_pitch ) {
                                            echo '<a class="files__link" href="'. $adidas_pitch['url'] .'" target="_blank" onclick="track_pdf_click();"><span>'. $pitch .'</span></a>';
                                        }
                                        if ( $adidas_video ) {
                                            echo '<a class="files__link" href="'. $adidas_video['url'] .'" target="_blank" onclick="track_mp4_click();"><span>'. $video .'</span></a>';
                                        }
                                        if ( $adidas_demo ) {
                                            echo '<a class="files__link" href="'. $adidas_demo['url'] .'" target="_blank" onclick="track_pdf_click();"><span>'. $demo .'</span></a>';
                                        }
                                        if ( $adidas_zip ) {
                                            echo '<a class="files__link" href="'. $adidas_zip['url'] .'" target="_blank" onclick="track_zip_click();"><span>'. $zip .'</span></a>';
                                        }
                                        if ( $adidas_plan) {
                                            echo '<a class="files__link" href="'. $adidas_plan['url'] .'" target="_blank" onclick="track_zip_click();"><span>'. $plan .'</span></a>';
                                        }
                                    echo '</div>';
                                echo '</div>';
                            }
                            
                            if ( $reebok_team || $reebok_pitch || $reebok_video ) {
                                echo '<div class="files">';
                                    echo '<div class="files__title"><span>Reebok</span></div>';
                                        echo '<div class="files__wrapper">';
                                            if ( $reebok_team ) {
                                                echo '<a class="files__link" href="'. $reebok_team['url'] .'" target="_blank" onclick="track_pdf_click();"><span>'. $team .'</span></a>';
                                            }
                                            if ( $reebok_pitch ) {
                                                echo '<a class="files__link" href="'. $reebok_pitch['url'] .'" target="_blank" onclick="track_pdf_click();"><span>'. $pitch .'</span></a>';
                                            }
                                            if ( $reebok_video ) {
                                                echo '<a class="files__link" href="'. $reebok_video['url'] .'" target="_blank" onclick="track_mp4_click();"><span>'. $video .'</span></a>';
                                            }
                                            if ( $reebok_demo ) {
                                                echo '<a class="files__link" href="'. $reebok_demo['url'] .'" target="_blank" onclick="track_pdf_click();"><span>'. $demo .'</span></a>';
                                            }
                                            if ( $reebok_zip ) {
                                                echo '<a class="files__link" href="'. $reebok_demo['url'] .'" target="_blank" onclick="track_zip_click();"><span>'. $zip .'</span></a>';
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