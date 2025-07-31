<?php
/**
 * Block template for CB Icon Block.
 *
 * @package cb-statman2025
 */

defined( 'ABSPATH' ) || exit;

$title_slug = sanitize_title( get_field( 'title' ) );

?>
<section class="icon_block" id="<?= esc_attr( $title_slug ); ?>">
	<div class="container py-5">
		<div class="row">
			<div class="col-md-2 my-auto">
				<div class="icon_block__icon-container" data-aos="zoom-out">
					<div class="icon_block__icon text-md-center">
						<i class="<?= esc_attr( get_field( 'glyph' ) ); ?>"></i>
					</div>
				</div>
			</div>
			<div class="col-md-10" data-aos="fade-left">
				<h2 class="icon_block__title"><?= esc_html( get_field( 'title' ) ); ?></h2>
				<div class="icon_block__content w-constrained--sm"><?= wp_kses_post( get_field( 'content' ) ); ?></div>
			</div>
		</div>
	</div>
</section>