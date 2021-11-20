import throwAlert from './Alerts'

// Check permissions for withdrawals and deal opening
export default function checkPermissions() {
	const checkerButtons = document.querySelectorAll('button[data-type="check"]')

	if (checkerButtons) {
		checkerButtons.forEach(button => {
			button.addEventListener('click', handleClick)
		})
	}

	function handleClick(e) {
		// Handle error messages
		const currentLocale = document.documentElement.getAttribute('lang')

		const messageBaned =
			currentLocale === 'en'
				? 'Action rejected. Please contact technical support for details.'
				: 'Команда отклонена. Пожалуйста, обратитесь в техническую поддержку за подробностями.'

		const messageNotVerified =
			currentLocale === 'en'
				? 'To make withdrawals, your account must be verified.'
				: 'Для того, чтобы выводить деньги, вам нужно верифицировать свой аккаунт.'

		// Handle permissions
		const isPassing = e.target.dataset.pass

		if (isPassing === 'false') {
			if (e.target.dataset.spec === 'not-verified') {
				throwAlert(messageNotVerified, 'error')
				return false
			}

			if (e.target.dataset.spec === 'baned') {
				throwAlert(messageBaned, 'error')
				return false
			}
		}

		// if function wasn't returned, then everything is OK
	}
}
