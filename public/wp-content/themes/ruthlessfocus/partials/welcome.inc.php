<section class="c-welcome" id="welcome">
		
    <div class="c-welcome__content-container c-welcome__content-container--height">

        <?php

            //$title = get_field( 'title' );
            //$subtitle = get_field( 'subtitle' );

            $title = 'Welcome to';
            $subtitle = 'The Power of Ruthless Focus';
            $paragraph_desktop = 'Following each of our meetings over the next 5 weeks, content will be unlocked, allowing you to download our pitch presentations and videos. Scroll down and take a look.';
            $paragraph_mobile = 'Following each of our meetings over the next 5 weeks, content will be unlocked, allowing you to download our pitch presentations and videos. Scroll down and take a look. <br /><br /><small style="font-size: 12px;">NOTE: For full content please display on your desktop.</small>';

            echo '<div class="c-welcome__title-container">';
                echo '<div data-welcome-message>';
                    echo '<h1 class="c-welcome__title">'. $title .'</h1>';
                    echo '<h2 class="c-welcome__sub-title">'. $subtitle .'</h2>';
                    echo '<p class="c-welcome__para c-welcome__para--desktop">'. $paragraph_desktop .'</p>';
                    echo '<p class="c-welcome__para c-welcome__para--mobile">'. $paragraph_mobile .'</p>';

                echo '</div>';
            echo '</div>';
        ?>

        <a href="#map" class="down-arrow" data-chevron>
            <svg>
                <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#shape-down-arrow" viewBox="0 0 32 32"></use>
            </svg>
        </a>

    </div>
		
</section>