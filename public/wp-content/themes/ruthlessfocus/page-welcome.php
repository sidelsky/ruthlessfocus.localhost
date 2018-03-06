<?php
/**
 * Template name: Welcome template
 */
?>

<?php include("header.php"); ?>
	
	<section class="c-welcome">
		
        <div class="c-welcome__content-container">
            
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
            <div class="c-welcome__map">
                
            <?php
            /**
             * Map markers
             */
            ?>

            </div>
        </div>

    </section>

<?php include("footer.php"); ?>