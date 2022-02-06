// keep links active
export function keepLinksActive() {
	const url = window.location.href
	$('.links-wrapper__common a').each(function () {
		if (this.href === url) {
			$(this).closest('a').addClass('active')
			if (!$(this).hasClass('loged-main_nav--logo')) {
				const ddTrigger = $(this).parent().parent().prev('.dd-triggers')
				if (ddTrigger) {
					ddTrigger.addClass('active')
				}
			}
		}
	})
	$('.burger a').each(function () {
		if (this.href === url) {
			$(this).closest('a').addClass('active')
		}
	})
}

// mini fade effect
export function miniFadeEffect() {
	document.body.classList.add('body__loaded')
}

// copy to clipboard
export function copyToClipboard() {
	const message =
		document.documentElement.getAttribute('lang') === 'en' ? 'Copied!' : 'Скопировано!'

	const copyListener = (btn, e) => {
		btn.addEventListener('click', () => {
			const tempInput = document.createElement('input'),
				tempInputCont = document.body

			tempInputCont.appendChild(tempInput)
			tempInput.value = e.innerHTML.trim()
			tempInput.select()
			document.execCommand('copy')
			tempInputCont.removeChild(tempInput)

			btn.querySelector('span').innerText = message
			btn.style.background = '#366C3C'
		})
	}

	const btcBtn = document.querySelector('.copy-btn__btc'),
		btcWallet = document.getElementById('btc_wallet'),
		usdtBtn = document.querySelector('.copy-btn__usdt'),
		usdtWallet = document.getElementById('usdt_wallet');

	if (btcBtn && btcWallet) copyListener(btcBtn, btcWallet);
	if (usdtBtn && usdtWallet) copyListener(usdtBtn, usdtWallet);
}

// remove hashtag from url
export function removeHashtag() {
	$(document).on('click', 'a', function (e) {
		if ($(this).attr('href') == '#') {
			e.preventDefault()
		}
	})
}

// if baned or not verified
import throwAlert from './user/Alerts'
export function ifBaned() {
	const bnd = document.querySelector('.bnd')
	const notVerified = document.querySelector('.not-verified')

	if (bnd) {
		bnd.addEventListener('click', e => {
			e.preventDefault()
			throwAlert('Команда отклонена. Обратитесь в техническую поддержку.', 'error')
		})
	}

	if (notVerified) {
		notVerified.addEventListener('click', e => {
			e.preventDefault()
			throwAlert(
				'Для того чтобы осуществить вывод средств, пожалуйста верифицируйте свой аккаунт.',
				'error',
			)
		})
	}
}

// close php alerts
export function closePhpAlerts() {
	$('.alert-success span, .alert-danger span').on('click', () => {
		$('.alert-success').hide(250)
		$('.alert-danger').hide(250)
	})
}
