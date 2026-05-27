<?php
/**
 * Block template for CB Icon Block.
 *
 * @package cb-statman2025
 */

defined( 'ABSPATH' ) || exit;

$title_slug = sanitize_title( get_field( 'title' ) );

$level = get_field( 'level' ) ?? 'h2';
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
				<<?= esc_attr( $level ); ?> class="icon_block__title"><?= esc_html( get_field( 'title' ) ); ?></<?= esc_attr( $level ); ?>>
				<div class="icon_block__content w-constrained--sm">
					<?= wp_kses_post( get_field( 'content' ) ); ?>
					<?php
					if ( get_field( 'link' ) ) {
						$page_link = get_field( 'link' );
						if ( is_array( $page_link ) && isset( $page_link['url'] ) && isset( $page_link['title'] ) ) {
							?>
							<div class="text-end mt-3">
								<a class="icon_block__link fw-bold" href="<?= esc_url( $page_link['url'] ); ?>">
									<?= esc_html( $page_link['title'] ); ?>
									<i class="fa-solid fa-angle-right"></i>
								</a>
							</div>
							<?php
						}
					}
					?>
				</div>
			</div>
		</div>
	</div>
</section>