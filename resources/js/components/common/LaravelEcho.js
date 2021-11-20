import Echo from 'laravel-echo'

window.Pusher = require('pusher-js')

window.Echo = new Echo({
	broadcaster: 'pusher',
	key: '3f2bf46fc51f63908064',
	cluster: 'ap2',
	forceTLS: true,
})
