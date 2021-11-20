import 'alpinejs'
// axios
import axios from 'axios'
import throwAlert from './components/user/Alerts'
import Swal from 'sweetalert2'

axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest'

// datatable defaults
$.extend($.fn.dataTable.defaults, {
	responsive: true,
	language: {
		emptyTable: 'На данный момент записей нет.',
		lengthMenu: 'Показать _MENU_ записей',
		zeroRecords: 'Ничего не найдено',
		info: 'Страница _PAGE_ из _PAGES_',
		infoEmpty: 'Записей нет',
		infoFiltered: '(filtered from _MAX_ total records)',
		search: 'Поиск:',
		paginate: {
			previous: 'Пред.',
			next: 'След.'
		}
	}
})

// Keep Active
$(function ($) {
	$(document).on('click', 'a', function (e) {
		if ($(this).attr('href') == '#') {
			e.preventDefault()
		}
	})
	let url = window.location.href
	$('.sidebar .nav-link').each(function () {
		if (this.href === url) {
			$(this).closest('a').addClass('active')
		}
	})
})

// hide php alerts
$('.alert-success span, .alert-danger span').on('click', () => {
	$('.alert-success').hide(250)
	$('.alert-danger').hide(250)
})

// confirm user deletion or ban
/**
 * Livewire sweetAlert
 * * ( confirmation modal )
 *
 */
window.addEventListener('swal:confirm', event => {
	const sent = event.detail

	Swal.fire({
		title: sent.title,
		text: sent.text,
		icon: sent.icon,
		confirmButtonText: sent.confirmText,
		showCancelButton: true,
		cancelButtonText: 'Отменить',
		reverseButtons: true,
		customClass: {
			confirmButton: `confirmButton ${sent.icon}`
		}
	}).then(result => {
		if (result.isConfirmed) {
			// console.log('confirmed indeeeeeeeeeeeeeeeeeeeed')
			if (sent.model === 'user:delete')
				window.livewire.emit('user:delete')
			if (sent.model === 'user:ban') window.livewire.emit('user:ban')
			if (sent.model === 'user:revive')
				window.livewire.emit('user:revive')
			if (sent.model === 'deal:delete')
				window.livewire.emit('deal:delete', sent.id)
			if (sent.model === 'trans:delete')
				window.livewire.emit('trans:delete', sent.id)
			if (sent.model === 'manager:delete')
				window.livewire.emit('manager:delete', sent.id)
		}
		// opposite -> result.isDismissed
	})
})

//https://github.com/livewire/livewire/issues/920
// window.livewire.hook('element.updating', () => {
// 	window.Alpine.discoverUninitializedComponents(el => {
// 		window.Alpine.initializeComponent(el)
// 	})
// })

// Alpine.js Listeners
window.addEventListener('admin:user-operations', event => {
	throwAlert(event.detail.message, event.detail.status)
})

/////////////////////// SIMPLE TABLE
$(document).ready(function () {
	$('.simple-table').each(function (i) {
		var id = $(this).attr('id')

		$(this)
			.find('th')
			.each(function (i) {
				$('#' + id + ' td:nth-child(' + (i + 1) + ')').prepend(
					'<span class="simple-table-thead">' +
						$(this).text() +
						':</span> '
				)
				$('.simple-table-thead').hide()
			})
	})

	$('.simple-table').each(function () {
		var thCount = $(this).find('th').length
		var rowGrow = 100 / thCount + '%'
		$(this).find('th, td').css('flex-basis', rowGrow)
	})

	function flexTable() {
		if ($(window).width() < 900) {
			$('.simple-table').each(function (i) {
				$(this).find('.simple-table-thead').show()
				$(this).find('thead').hide()
			})

			// window is less than 768px
		} else {
			$('.simple-table').each(function (i) {
				$(this).find('.simple-table-thead').hide()
				$(this).find('thead').show()
			})
		}
	}

	flexTable()

	window.onresize = function (event) {
		flexTable()
	}
})

/**
 * Init datatables and stuff
 *
 */
window.addEventListener('DOMContentLoaded', () => {
	// index page
	if (document.querySelector('.admin-index-page')) {
		$('.users-table').DataTable()
	}

	// chattyk
	if (document.querySelector('.chat')) {
		let receiverID = ''
		const messages = document.getElementById('messages'),
			messageInput = document.getElementById('messageInput'),
			submitMessage = document.getElementById('submitMessage'),
			inputWrapper = document.querySelector('.chat__window--input'),
			usersCont = document.querySelector('.chat__users--list')

		/*
		 * Initialise
		 */
		// Pusher.logToConsole = false
		const pusher = new Pusher('d2059ddf4f6dd4d07d04', {
			cluster: 'ap2',
			forceTLS: true
		})
		const channel = pusher.subscribe('chat-room')

		/*
		 * Handle event
		 */
		channel.bind('chat-message-sent', function (data) {
			let msg = data.message
			let messageTo = document.getElementById(msg.to)
			let messageFrom = document.getElementById(msg.from)

			if (msg.from == 999) {
				messageTo.click()
			} else if (msg.from == receiverID) {
				messageFrom.click()
			} else {
				// let pending = messageFrom.querySelector('.pending');
				// if (pending != null) {
				// 	let pendingCount = parseInt(pending.innerHTML);
				// 	messageFrom.querySelector('.pending').innerHTML = pendingCount + 1;
				// } else {
				// 	let pendingSpan = `<span class="pending">1</span>`;
				// 	messageFrom.insertAdjacentHTML('beforeend', pendingSpan);
				// }
				fetchUsers()
			}
		})

		/*
		 * Submit message
		 */
		submitMessage.addEventListener('click', e => {
			e.preventDefault()
			const message = messageInput.value
			if (message != '' && receiverID != '') {
				axios
					.post('/admin/chat/send-message', {
						receiverID,
						message
					})
					.then(r => fetchMessages())
					.catch(err => console.log(err))
				messageInput.value = ''
			}
		})

		/*
		 * Fetch users
		 */
		fetchUsers()
		function fetchUsers() {
			axios
				.get('/admin/chat/fetch-users')
				.then(r => {
					usersCont.innerHTML = r.data
					let users = usersCont.querySelectorAll('.user')
					iterateUsers(users)
				})
				.catch(err => console.error(err))
		}

		/*
		 * Fetch messages
		 */
		function fetchMessages() {
			axios
				.get('/admin/chat/fetch-messages/' + receiverID)
				.then(r => {
					messages.innerHTML = r.data
					messages.scrollTop = messages.scrollHeight
				})
				.catch(err => console.error(err))
		}

		/*
		 * Iterate through users
		 */
		function iterateUsers(TARGETS) {
			for (let i = 0; i < TARGETS.length; i++) {
				let self = TARGETS[i]

				self.addEventListener('click', e => {
					document
						.querySelectorAll('.user')
						.forEach(i => i.classList.remove('active')) // geniusly, right?

					let thisUser = e.target.closest('.chat__users--item')
					thisUser.classList.add('active')

					if (thisUser.querySelector('.pending') != null) {
						thisUser.querySelector('.pending').remove()
					}

					receiverID = thisUser.id
					fetchMessages()
				})
			}
		}

		/*
		 * Send message
		 */
		messageInput.addEventListener('keyup', e => {
			if (e.keyCode == 13) {
				submitMessage.click()
			}
		})

		/*
		 * Input box-shadow
		 */
		messageInput.addEventListener('focusin', e => {
			inputWrapper.style.boxShadow = '0 0 4px 1px #59dae2'
		})

		messageInput.addEventListener('focusout', e => {
			inputWrapper.style.boxShadow = 'none'
		})

		/*
		 * Responsive chat
		 */
		function showHideChats() {
			const chatUsersContainer = document.querySelector('.chat__users'),
				chatWindow = document.querySelector('.chat__window'),
				chatMenu = document.querySelector('.chat__menu'),
				chatUsers = document.querySelectorAll('.user')

			if (window.innerWidth < 700) {
				chatMenu.style.display = 'flex'
				chatUsersContainer.classList.add('hide')
				chatMenu.addEventListener('click', e => {
					if (chatUsersContainer.classList.contains('hide')) {
						chatUsersContainer.classList.remove('hide')
						chatWindow.classList.add('hide')
					} else {
						chatWindow.classList.remove('hide')
						chatUsersContainer.classList.add('hide')
					}
				})
				chatUsers.forEach((el, i) => {
					el.addEventListener('click', () => {
						if (chatWindow.classList.contains('hide')) {
							chatMenu.click()
						}
					})
				})
			} else {
				chatMenu.style.display = 'none'
				chatUsersContainer.classList.remove('hide')
				chatWindow.classList.remove('hide')
			}
		}

		showHideChats()
		window.addEventListener('resize', showHideChats)
	}
})
