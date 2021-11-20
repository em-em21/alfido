import axios from 'axios'
axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest'
// alerts
import throwAlert from './components/user/Alerts'
// swiper
import Swiper, { Pagination, Autoplay } from 'swiper'
Swiper.use([Pagination, Autoplay])
import 'swiper/swiper-bundle.css'

/**
 * Submit outreach form on contacts page
 */
if (document.getElementById('outreachForm')) {
	const contactForm = document.getElementById('outreachForm')

	contactForm.addEventListener('submit', e => {
		e.preventDefault()

		const url = e.target.getAttribute('action')
		const [name, email, message] = ['name', 'email', 'message'].map(
			id => document.getElementById(id).value
		)

		axios
			.post(url, {
				name,
				message,
				email
			})
			.then(r => {
				throwAlert(r.data.msg, r.data.status)
				contactForm.reset()
				window.dispatchEvent(new CustomEvent('contact-form-submitted'))
			})
			.catch(err => {
				throwAlert(err.response.data.msg, err.response.data.status)
			})
	})
}

/**
 * Sliders on index page
 *
 */
if (document.querySelector('.has-sliders')) {
	const sliders = document.querySelectorAll('.sliderrr')
	sliders.forEach(slider => {
		const swiper = new Swiper(slider, {
			autoplay: {
				delay: 2500
			},
			loop: true,
			slidesPerView: 1,
			pagination: {
				el: '.swiper-pagination',
				clickable: true
			}
		})
	})
}

/**
 * Change header background and paddings on scroll
 * @return sticky-icky!
 */
window.addEventListener('scroll', function () {
	let headerNav = document.querySelector('header .nav')

	if (window.pageYOffset > 0) {
		headerNav.classList.add('sticky')
	} else {
		headerNav.classList.remove('sticky')
	}
})

// Animation/Sliding Items ------------------------
const animItems = document.querySelectorAll('._anim-items')

if (animItems.length > 0) {
	window.addEventListener('scroll', animOnScroll)

	function animOnScroll() {
		for (let index = 0; index < animItems.length; index++) {
			const animItem = animItems[index],
				animItemHeight = animItem.offsetHeight,
				animItemOffset = offset(animItem).top,
				animStart = 4

			let animItemPoint = window.innerHeight - animItemHeight / animStart

			if (animItemHeight > window.innerHeight) {
				animItemPoint =
					window.innerHeight - window.innerHeight / animStart
			}

			if (
				pageYOffset > animItemOffset - animItemPoint &&
				pageYOffset < animItemOffset + animItemHeight
			) {
				animItem.classList.add('_active')
			} else {
				if (!animItem.classList.contains('_anim-stop')) {
					animItem.classList.remove('_active')
				}
			}
		}
	}

	function offset(el) {
		const rect = el.getBoundingClientRect(),
			scrollLeft =
				window.pageXOffset || document.documentElement.scrollLeft,
			scrollTop = window.pageYOffset || document.documentElement.scrollTop
		return { top: rect.top + scrollTop, left: rect.left + scrollLeft }
	}

	setTimeout(() => {
		animOnScroll()
	}, 300)
}

/**
 * * * Chat Box
 * vars
 * initialise pusher
 * handle websocket connection event
 * trigger chat
 * fetch messages
 * submit message
 * send message with enter key
 */
// document.addEventListener('DOMContentLoaded', function() {
// 	const messages = document.getElementById('messages'),
// 		messageInput = document.getElementById('messageInput'),
// 		chatHeader = document.querySelector('.chat__header'),
// 		chatWindow = document.querySelector('.chat__window'),
// 		submitMessage = document.getElementById('submitMessage')

// 	const ranNum = Math.floor(Math.random() * Math.floor(10000))
// 	let guestID

// 	guestID = localStorage.getItem('id')

// 	if (guestID !== null) {
// 		axios
// 			.get(`/prefetch/${guestID}`)
// 			.then(r => {
// 				const count = r.data
// 				if (count > 0) {
// 					let pendingSpan = `<span class="pending">${count}</span>`
// 					chatHeader.insertAdjacentHTML('afterbegin', pendingSpan)
// 				}
// 			})
// 			.catch(err => console.log(err))
// 	} else {
// 		let pendingSpan = `<span class="pending">1</span>`
// 		chatHeader.insertAdjacentHTML('afterbegin', pendingSpan)
// 	}

// 	function createGuest() {
// 		if (guestID == null) {
// 			localStorage.setItem('id', ranNum)
// 			guestID = localStorage.getItem('id')
// 			axios.post(`/create-guest/${guestID}`).catch(err => console.log(err))
// 		}
// 	}

// 	/* *
// 	 * * * Functions
// 	 * fetch
// 	 * send
// 	 * toggle chat
// 	 */

// 	function fetchMessages() {
// 		axios
// 			.get(`/fetch/${guestID}`)
// 			.then(r => {
// 				console.log('fetched and updated!!!')
// 				let messagesList = r.data
// 				messages.innerHTML = messagesList
// 				messages.scrollTop = messages.scrollHeight
// 			})
// 			.catch(err => console.log(err))
// 	}

// 	/*
// 	 * Initialise
// 	 */
// 	var pusher = new Pusher('035d45ffa9e799ae72b2', {
// 		cluster: 'eu',
// 		forceTLS: true,
// 	})
// 	Pusher.logToConsole = false
// 	var channel = pusher.subscribe('my-channel')

// 	/*
// 	 * Handle message rcvd event
// 	 */
// 	channel.bind('my-event', function(data) {
// 		let msg = data.message
// 		if (guestID != msg.from && !chatWindow.classList.contains('is-expanded')) {
// 			let pending = chatHeader.querySelector('.pending')
// 			if (pending != null) {
// 				let pendingCount = parseInt(pending.innerHTML)
// 				chatHeader.querySelector('.pending').innerHTML = pendingCount + 1
// 			} else {
// 				let pendingSpan = `<span class="pending">1</span>`
// 				chatHeader.insertAdjacentHTML('afterbegin', pendingSpan)
// 			}
// 		} else {
// 			fetchMessages()
// 		}
// 	})

// 	// Trigger chat
// 	chatHeader.addEventListener('click', () => {
// 		if (!chatHeader.classList.contains('is-expanded')) {
// 			createGuest()
// 			fetchMessages()
// 		}

// 		setTimeout(() => {
// 			chatWindow.classList.toggle('is-expanded')
// 			chatHeader.classList.toggle('is-expanded')
// 			if (chatHeader.querySelector('.pending') != null) {
// 				chatHeader.querySelector('.pending').remove()
// 			}
// 		}, 300)
// 	})

// 	/*
// 	 * Submit message
// 	 */
// 	submitMessage.addEventListener('click', e => {
// 		e.preventDefault()
// 		let message = messageInput.value
// 		if (message != '') {
// 			axios
// 				.post(`/send/${guestID}`, {
// 					message: message,
// 				})
// 				.catch(err => console.log(err))
// 			messageInput.value = ''
// 		}
// 	})

// 	/*
// 	 * Send message
// 	 */
// 	messageInput.addEventListener('keyup', e => {
// 		if (e.keyCode == 13) {
// 			submitMessage.click()
// 		}
// 	})
// })
