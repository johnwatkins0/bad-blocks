import { registerBlockType } from '@wordpress/blocks';
import { __ } from '@wordpress/i18n';

/**
 * Internal dependencies
 */
import Edit from './edit';
import save from './save';

registerBlockType( 'bad-blocks/script', {
	title: __( 'Inline Script Block', 'bad-blocks' ),
	description: __(
		'Block with an inline script tag.',
		'bad-blocks'
	),
	category: 'widgets',
	icon: 'smiley',
	edit: Edit,
	save,
} );
