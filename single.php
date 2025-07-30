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
    <?php
	if ( get_field( 'podcast_id' ) ) {
		$podcast_id = get_field( 'podcast_id' );
		?>
	<div class="blog_hero">
		<div class="container">
			<div class="ratio ratio-16x9">
				<iframe src="<?= esc_url( 'https://player.vimeo.com/video/' . $podcast_id . '?title=0&byline=0&portrait=0' ); ?>"
				title="<?= esc_attr( get_the_title() ); ?>"
				allowfullscreen
				allow="autoplay; fullscreen; picture-in-picture"></iframe>
			</div>
		</div>
	</div>
		<?php
	} else {
		?>
		<div class="post_hero">
			<!-- NO PODCAST ID FOUND -->
			<?= get_the_post_thumbnail( get_the_ID(), 'full', array( 'class' => 'blog_hero__image' ) ); ?>
		</div>
		<?php
	}
	?>
    <div class="container p-5 bg--white">
        <h1 class="h2"><?= esc_html( get_the_title() ); ?></h1>
        <?php
        if ( get_field( 'post_excerpt' ) ) {
            ?>
            <p class="fs-500"><?= wp_kses_post( get_field( 'post_excerpt' ) ); ?></p>
            <?php
        }
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