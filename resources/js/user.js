import './components/common/LaravelEcho'
import './components/common/WindowEventListeners'
import Crypto from './components/user/markets/Crypto'
import Forex from './components/user/markets/Forex'
import { copyToClipboard } from './components/utils'
import checkPermissions from './components/user/CheckPermissions'

document.addEventListener('DOMContentLoaded', () => {
	// Copy btc code to clipboard
	copyToClipboard()

	// Check permissions
	checkPermissions()

	// Chat
	const pusher = new Pusher('3f2bf46fc51f63908064', {
		cluster: 'ap2',
	})

	const channel = pusher.subscribe('chat-room')

	channel.bind('chat-message-sent', () => {
		Livewire.emit('refetch')
	})

	// Crypto
	if (document.querySelector('.market_crypto')) {
		Crypto()
	}

	// Forex and Commo
	if (document.querySelector('.market_forex') || document.querySelector('.market_commo')) {
		Forex()
	}

	// // commo
	// if (document.querySelector('.market_commo')) {
	// 	Commodity()
	// }

	// ICO
	if (document.querySelector('.inv-modal')) {
	}

	// User profile page
	if (document.querySelector('.payInfoForm')) {
	}
})
