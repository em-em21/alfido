export default function throwAlert(msg, status, persistent = false) {
	let alertsWrapper = document.querySelector('.alert-box'),
		alertBox = document.createElement('div'),
		alertContent = document.createElement('div'),
		alertMsg = document.createElement('p'),
		alertClose = document.createElement('a'),
		alertSign = document.createElement('div')

	alertBox.classList.add('ab')
	alertContent.classList.add('ab_inner')
	alertMsg.classList.add('ab_inner--msg')
	alertMsg.innerText = msg
	alertClose.classList.add('ab_inner--close')
	alertClose.setAttribute('href', '#')
	alertClose.innerText = '✕'
	alertSign.classList.add('ab_inner--sign')
	alertSign.classList.add(status)

	alertSign.innerHTML += `<svg class="ab_svg"><use xlink:href="/extra.svg#fa-${status}"></use></svg>`
	alertContent.appendChild(alertMsg)
	alertContent.appendChild(alertClose)
	alertContent.appendChild(alertSign)
	alertBox.appendChild(alertContent)
	alertsWrapper.appendChild(alertBox)

	alertClose.addEventListener('click', e => {
		const thisBox = e.target.closest('.ab')
		thisBox.classList.add('hide')
		thisBox.parentNode.removeChild(thisBox)
	})

	if (!persistent) {
		setTimeout(() => {
			alertBox.classList.add('hide')
		}, 3000)
		setTimeout(() => {
			if (alertBox.parentNode) {
				alertBox.parentNode.removeChild(alertBox)
			}
		}, 3400)
	}
}
