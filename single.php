<?php
/**
 * Template for displaying single posts.
 *
 * @package cb-statman2025
 */

defined( 'ABSPATH' ) || exit;
get_header();
?>
<main id="main" class="blog">
	<div class="post_hero">
		<?= get_the_post_thumbnail( get_the_ID(), 'full', array( 'class' => 'blog_hero__image' ) ); ?>
	</div>
    <div class="container p-5 bg--white">
        <h1 class="h2"><?= esc_html( get_the_title() ); ?></h1>
        <?php
        // phpcs:disable
        // no read time at the moment as the articles are very short
        // $count = estimate_reading_time_in_minutes(get_the_content(), 200, true, true) ?? null;
        // if ($count) {
        //     echo $count;
        // }
        // phpcs:enable
        ?>
        <div class="post_meta">
            <span class="post_meta__date"><?= esc_html( get_the_date( 'jS F Y' ) ); ?></span>
        </div>
        <?php
        echo wp_kses_post( get_the_content() );
        ?>
    </div>
</main>
<?php
get_footer();
?>