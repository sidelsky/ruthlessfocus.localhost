<section class="c-welcome" id="welcome">
		
    <div class="c-welcome__content-container c-welcome__content-container--height">

        <?php
            echo '<div class="c-welcome__title-container">';
                echo '<h1 class="c-welcome__title">'. $title .'</h1>';
                echo '<h2 class="c-welcome__sub-title">'. $subtitle .'</h2>';
            echo '</div>';
        ?>

        <a href="#map" class="down-arrow" data-chevron>
            <svg>
                <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#shape-down-arrow" viewBox="0 0 32 32"></use>
            </svg>
        </a>

    </div>
		
</section>