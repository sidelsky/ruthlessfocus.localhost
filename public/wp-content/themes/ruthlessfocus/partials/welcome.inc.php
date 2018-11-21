<section class="c-welcome" id="welcome">
		
    <div class="c-welcome__content-container c-welcome__content-container--height">

        <?php

            //$title = get_field( 'title' );
            //$subtitle = get_field( 'subtitle' );

            $title = 'Welcome to';
            $subtitle = 'Welcome to our online portal and interactive presentation map';
            $paragraph_desktop = 'Collateral including presentation files, information on teams and videos. Text to be updated and added.';
            $paragraph_mobile = 'Collateral including presentation files, information on teams and videos. Text to be updated and added.. <br /><br /><small style="font-size: 12px;">NOTE: For full content please display on your desktop.</small>';

            echo '<div class="c-welcome__title-container">';
                echo '<div data-welcome-message>';
                    //echo '<h1 class="c-welcome__title">'. $title .'</h1>';
                    echo '<h2 class="c-welcome__sub-title">'. $subtitle .'</h2>';
                    echo '<p class="c-welcome__para c-welcome__para--desktop">'. $paragraph_desktop .'</p>';
                    echo '<p class="c-welcome__para c-welcome__para--mobile">'. $paragraph_mobile .'</p>';

                echo '</div>'; ?>

                <nav class="c-navigation">


                
                <?php 

                    $terms = get_terms([
                        'taxonomy' => 'location',
                        'childless' => false,
                        'hide_empty' => false,
                        'parent' => 0
                    ]);
                    
                    $is_active = '';
                    $count = count($terms);
                    
                    //Check for Empty terms

                    //print_r($terms);


                    if ( $count > 0 ){

                        foreach ($terms as $term) {

                            $is_active = $term->count >= 1 ? 'active-term' : '' ;

                            $termname = strtolower($term->name);
                            $termname = str_replace(' ', '-', $termname);
                            echo '<a href="'. get_term_link( $term ) .'" class="c-navigation__item '. $is_active .'"><span>' . $term->name . '</span></a>';
                            //echo '<li data-filter=".' . $termname . '" class="o-course-filter__item item">' . $term->name . '</li>';
                        };

                    };

                ?>
                </nav>

            <?php echo '</div>'; ?>

        <a href="#map" class="down-arrow" data-chevron>
            <svg>
                <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#shape-down-arrow" viewBox="0 0 32 32"></use>
            </svg>
        </a>

    </div>
		
</section>