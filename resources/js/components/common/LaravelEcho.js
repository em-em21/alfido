import Echo from 'laravel-echo'

window.Pusher = require('pusher-js')

window.Echo = new Echo({
	broadcaster: 'pusher',
	key: 'd2059ddf4f6dd4d07d04',
	cluster: 'ap2',
	forceTLS: true,
})
