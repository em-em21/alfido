import Swal from 'sweetalert2'
import throwAlert from '../user/Alerts'

/**
 * If price couldnt be fetched from Livewire OpenDeal component
 * at this time this component is in User/OpenDeal/Crypto
 *
 */
window.addEventListener('fetchPriceException', () => {
	throwAlert(
		'Сервер не смог обработать запрос. Пожалуйста, убедитесь, что у Вас нет проблем с соединением, обновите страницу и попробуйте снова.',
		'error',
		true,
	)
})

/**
 * Livewire sweetAlert
 * * ( confirmation modal )
 *
 */
window.addEventListener('swal:confirm', event => {
	const sent = event.detail
	const locale = document.documentElement.getAttribute('lang')
	const cancelButtonText = locale === 'en' ? 'Cancel' : 'Отменить'

	Swal.fire({
		title: sent.title,
		text: sent.text,
		icon: sent.icon,
		confirmButtonText: sent.confirmText,
		showCancelButton: true,
		cancelButtonText,
		reverseButtons: true,
		customClass: {
			title: 'title',
			cancelButton: 'cancelButton',
			confirmButton: `confirmButton ${sent.icon}`,
		},
	}).then(result => {
		if (result.isConfirmed) {
			// console.log('confirmed indeeeeeeeeeeeeeeeeeeeed')
			if (sent.model === 'algo') window.livewire.emit('toggle-algo')
			if (sent.model === 'deal:close')
				window.livewire.emit('close-deal', sent.id, sent.profit)
		}
		// opposite -> result.isDismissed
	})
})

/**
 * Listen to alerts from backend
 * reusable
 */
window.addEventListener('user:throw-alert', event =>
	throwAlert(event.detail.message, event.detail.status),
)

/**
 * User deals page:
 * listen to event for location reloading
 * can't be done seamlessly with livewire
 *
 */
window.addEventListener('user:location-reload', event => {
	throwAlert(event.detail.message, event.detail.status)

	setTimeout(() => window.location.reload(), 1000)
})
