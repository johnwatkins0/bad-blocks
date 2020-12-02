<?php
/**
 * Plugin Name:     Bad Blocks
 * Description:     Example block written with ESNext standard and JSX support – build step required.
 * Version:         0.1.0
 * Author:          The WordPress Contributors
 * License:         GPL-2.0-or-later
 * License URI:     https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:     bad-blocks
 *
 * @package         bad-blocks
 */

/**
 * Registers all block assets so that they can be enqueued through the block editor
 * in the corresponding context.
 *
 * @see https://developer.wordpress.org/block-editor/tutorials/block-tutorial/applying-styles-with-stylesheets/
 */
function create_block_bad_blocks_block_init() {
	$dir = dirname( __FILE__ );

	$script_asset_path = "$dir/build/index.asset.php";
	if ( ! file_exists( $script_asset_path ) ) {
		throw new Error(
			'You need to run `npm start` or `npm run build` to build plugin JavaScript.'
		);
	}
	$index_js     = 'build/index.js';
	$script_asset = require( $script_asset_path );
	wp_register_script(
		'bad-blocks-block-editor',
		plugins_url( $index_js, __FILE__ ),
		$script_asset['dependencies'],
		$script_asset['version']
	);
	wp_set_script_translations( 'bad-blocks-block-editor', 'bad-blocks' );

	register_block_type( 'bad-blocks/script', array(
		'editor_script' => 'bad-blocks-block-editor',
	) );

	register_block_type( 'bad-blocks/unknown-element', array(
		'editor_script' => 'bad-blocks-block-editor',
	) );
}
add_action( 'init', 'create_block_bad_blocks_block_init' );
