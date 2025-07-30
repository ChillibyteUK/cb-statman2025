<?php
/**
 * Template for displaying the blog index page.
 *
 * @package cb-statman2025
 */

defined( 'ABSPATH' ) || exit;

$page_for_posts = get_option( 'page_for_posts' );

get_header();
?>
<main id="main">
	<section class="hero">
		<div class="container h-100">
			<div class="row h-100">
				<div class="col-md-6 my-auto">
					<h1 class="hero__title" data-aos="fade">News &amp; Advice</h1>
					<p class="hero__subtitle" data-aos="fade">Insightful updates and straight-talking advice on property, deals, and strategy</p>
				</div>
				<div class="col-md-6 px-0 hero__image-container">
					<?= get_the_post_thumbnail( 
						$page_for_posts, 
						'full', 
						array(
							'class'    => 'hero__image',
							'data-aos' => 'zoom-out',
						)
					); ?>
				</div>
			</div>
		</div>
	</section>
    <section class="latest_posts mt-5">
        <div class="container pb-5">
            <div class="row g-4 w-100">
            <?php
            // Custom query to include both published and scheduled posts
            $args = array(
                'post_type'      => 'post',
                'post_status'    => array( 'publish', 'future' ), // Include published and scheduled posts.
                'orderby'        => 'date',
                'order'          => 'ASC', // Ascending order.
                'posts_per_page' => -1,    // Get all posts.
            );

            $q = new WP_Query( $args );

            if ( $q->have_posts() ) {
				while ( $q->have_posts() ) {
					$q->the_post();
					?>
					<div class="col-md-6 col-lg-4" data-aos="fade" data-aos-delay="<?= esc_attr( $d ); ?>">
						<a class="latest_posts__item" href="<?= esc_url( get_permalink() ); ?>">
							<div class="latest_posts__image">
								<?= get_the_post_thumbnail( get_the_ID(), 'medium', array( 'class' => 'img-fluid' ) ); ?>
							</div>
							<div class="post_meta">
								<span><i class="fa-regular fa-calendar"></i> <?= esc_html( get_the_date( 'jS F Y' ) ); ?></span>
								<span><i class="fa-regular fa-clock"></i> <?= esc_html( estimate_reading_time_in_minutes( get_the_content() ) ); ?> minute read</span>

							</div>
							<h3 class="latest_posts__title"><?= esc_html( get_the_title() ); ?></h3>
						</a>
					</div>
					<?php
					$d += 100;
                }
            } else {
                echo '<p>No posts found.</p>';
            }

            // Reset post data
            wp_reset_postdata();
            ?>
            </div>
        </div>
    </section>
</main>
<?php

get_footer();
?>