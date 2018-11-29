<section class="c-welcome" id="welcome">
		
    <div class="c-welcome__content-container c-welcome__content-container--height">

        <?php

            //$title = get_field( 'title' );
            //$subtitle = get_field( 'subtitle' );

            $title = 'Welcome to';
            $subtitle = 'Welcome to MediaCom’s online portal';
            $paragraph_desktop = 'We have brought together the cultures of the adidas groupe and MediaCom by creating this online portal that connects all our teams across the globe, and introduces you to over 200 adidas Groupe dedicated MediaCommers from our network. <br /><br />To learn more about the people that are working on your business day to day, and what drives them to deliver outstanding work for you, please click on the region below to get started and then filter by market. By scrolling down this page you still have access to our interactive map and pitch collateral.';
            $paragraph_mobile = 'We have brought together the cultures of the adidas groupe and MediaCom by creating this online portal that connects all our teams across the globe, and introduces you to over 200 adidas Groupe dedicated MediaCommers from our network. <br /><br />To learn more about the people that are working on your business day to day, and what drives them to deliver outstanding work for you, please click on the region below to get started and then filter by market. By scrolling down this page you still have access to our interactive map and pitch collateral.</br></br><small style="font-size: 12px;">NOTE: For full content please display on your desktop.</small>';

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