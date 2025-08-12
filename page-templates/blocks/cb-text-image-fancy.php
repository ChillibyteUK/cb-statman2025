<?php
/**
 * Block template for CB Text Image Fancy.
 *
 * @package cb-statman2025
 */

defined( 'ABSPATH' ) || exit;

if ( 'Fancy' === get_field( 'fanciness' ) ) {
	$fancy = array(
		'class'    => 'text_image_fancy__image',
		'data-aos' => 'scale-up-bottom',
	);
	$fancybox = '<div class="text_image_fancy__image-box"></div>';
} else {
	$fancy = array(
		'class' => 'text_image_fancy__image',
		'data-aos' => 'fade',
	);
	$fancybox = '';
}

?>
<section class="text_image_fancy">
	<div class="container py-5">
		<div class="row g-5">
			<div class="col-md-6 text-center text_image_fancy__image-container">
				<?= $fancybox; ?>
				<?=
				wp_get_attachment_image(
					get_field( 'image' ),
					'full',
					false,
					$fancy
				);
				?>
			</div>
			<div class="col-md-6 my-auto d-flex flex-column text_image_fancy__text" data-aos="fade">
				<h2 class="text_image_fancy__title"><?= esc_html( get_field( 'title' ) ); ?></h2>
				<div class="text_image_fancy__content">
					<?= wp_kses_post( get_field( 'content' ) ); ?>
				</div>
				<?php
				if ( get_field( 'link' ) ) {
					$l = get_field( 'link' );
					?>
					<a class="button button-solid align-self-end mt-4 me-0" href="<?= esc_url( $l['url'] ); ?>" target="<?= esc_attr( $l['target'] ); ?>" rel="<?= esc_attr( $l['rel'] ); ?>"
					rel="noopener noreferrer">
						<?= esc_html( $l['title'] ); ?>
					</a>
					<?php
				}
				?>
			</div>
		</div>
	</div>
</section>