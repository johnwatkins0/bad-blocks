import './script';
import './unknown-element';

registerBlockType(
	'test/bad-static-block', {
		title: 'Bad static block',
		category: 'widgets',
		edit() {
			return (
				<div>
					{ 'Static block with invalid attribute' }
				</div>
			);
		},
		save() {
			return <div bad-attribute="True" />;
		},
	},
);