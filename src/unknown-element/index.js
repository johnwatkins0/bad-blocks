import { registerBlockType } from '@wordpress/blocks';
import { __ } from '@wordpress/i18n';

/**
 * Internal dependencies
 */
import Edit from './edit';
import save from './save';

registerBlockType( 'bad-blocks/unknown-element', {
	title: __( 'Unknown Element Block', 'bad-blocks' ),
	description: __(
		'Block with an unknown element.',
		'bad-blocks'
	),
	category: 'widgets',
	icon: 'smiley',
	edit: Edit,
	save,
} );
