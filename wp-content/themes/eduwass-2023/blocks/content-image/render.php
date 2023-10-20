<?php
/**
 * Content Image Block
 *
 * @package      Cultivate
 * @author       CultivateWP
 * @since        1.0.0
 * @license      GPL-2.0+
 **/

$classes = [ 'block-content-image' ];
if ( ! empty( $block['className'] ) ) {
	$classes = array_merge( $classes, explode( ' ', $block['className'] ) );
}

if ( ! empty( $block['backgroundColor'] ) ) {
	$classes[] = 'has-background';
	$classes[] = 'has-' . $block['backgroundColor'] . '-background-color';
}
if ( ! empty( $block['align'] ) ) {
    $classes[] = 'align' . $block['align'];
}
$reverse = get_field( 'reverse' );
if ( ! empty( $reverse ) && $reverse ) {
	$classes[] = 'reverse';
}

printf(
	'<div class="%s"%s>',
	esc_attr( join( ' ', $classes ) ),
	! empty( $block['anchor'] ) ? ' id="' . esc_attr( sanitize_title( $block['anchor'] ) ) . '"' : '',
);

// Block goes here

$template = array(
    array( 'core/image', array() ),
    array( 'core/group', array(),
        array(
            array( 'core/heading', array(
                'placeholder' => 'Add a heading',
            ) ),
            array( 'core/paragraph', array(
                'placeholder' => 'Add a paragraph',
            ) ),
        )
    ),
);

echo '<InnerBlocks template="' . esc_attr( wp_json_encode( $template ) ) . '" />';

echo '</div>';
