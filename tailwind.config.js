const colors = require('tailwindcss/colors')

module.exports = {
	mode: 'jit',
	purge: [
		'./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
		'./storage/framework/views/*.php',
		'./resources/views/**/*.blade.php',
	],
	theme: {
		important: true,
		extend: {
			colors: {
				transparent: 'transparent',
				current: 'currentColor',
				gray: colors.trueGray,
				green: colors.green,
				'slightly-lighter': 'rgba(255, 255, 255, .03)',
				'dark-secondary': '#26292E',
				'dark-19': '#191919',
				purpleish: '#b39ddb',
			},
			width: {
				120: '30rem',
			},
			maxWidth: {
				0: '0',
				'1/4': '25%',
				'1/2': '50%',
				'3/4': '75%',
				full: '100%',
			},
			minWidth: {
				0: '0',
				'1/4': '25%',
				'1/2': '50%',
				'3/4': '75%',
				full: '100%',
			},
			container: {
				center: true,
				padding: {
					DEFAULT: '2rem',
					sm: '2rem',
					lg: '4rem',
					xl: '5rem',
					'2xl': '6rem',
				},
			},
			transitionTimingFunction: {
				'in-expo': 'cubic-bezier(0.95, 0.05, 0.795, 0.035)',
				'out-expo': 'cubic-bezier(0.19, 1, 0.22, 1)',
			},
		},
	},
	plugins: [require('@tailwindcss/forms')],
}
