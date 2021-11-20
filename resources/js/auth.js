import 'intl-tel-input/build/css/intlTelInput.css'
import intlTelInput from 'intl-tel-input'
import throwAlert from './components/user/Alerts'

document.addEventListener('DOMContentLoaded', () => {
	/**
	 * Intl tel input plugin for international phone numbers
	 * reference: https://github.com/jackocnr/intl-tel-input
	 * initializes plugin and prevents form from submitting
	 */
	if (document.querySelector('.reg')) {
		const input = document.getElementById('phone')
		const successMessage = document.querySelector('.intl-success-message')
		const errorMessage = document.querySelector('.intl-error-message')
		const output = document.querySelector('.intl-result')

		const reset = () => {
			input.classList.remove('error')
			errorMessage.classList.add('hidden')
			successMessage.classList.add('hidden')
			output.innerHTML = ''
		}

		const iti = intlTelInput(input, {
			utilsScript:
				'https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.0/js/utils.js',
			initialCountry: 'ru',
			hiddenInput: 'full',
			separateDialCode: !0,
			dropdownContainer: null
		})

		// on blur: validate
		input.addEventListener('blur', function () {
			reset()

			if (input.value.trim()) {
				output.innerHTML = iti.getNumber()

				if (iti.isValidNumber()) {
					// console.log(1)
					successMessage.classList.remove('hidden')
					successMessage.classList.add('flex')
				} else {
					// console.log(0)
					errorMessage.classList.remove('hidden')
					errorMessage.classList.add('flex')
					input.classList.add('error')
				}
			}
		})

		// on keyup / change flag: reset
		input.addEventListener('change', reset)
		input.addEventListener('keyup', reset)

		/**
		 * Prevent form from submitting if number is invalid
		 *
		 * To still have an ability to translate an error message,
		 * blade expression with translation is located in hidden input file.
		 *
		 */
		const registerForm = document.getElementById('registerForm')
		const numberToBeStored = document.getElementById('phone_db')
		const phoneErrorMessage = document.getElementById('phoneErrorMessage')

		registerForm.addEventListener('submit', e => {
			e.preventDefault()

			if (!iti.isValidNumber()) {
				input.focus()
				return throwAlert(phoneErrorMessage.value, 'error')
			}

			numberToBeStored.value = iti.getNumber()
			registerForm.submit()
		})
	}
})
