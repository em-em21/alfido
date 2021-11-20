import axios from 'axios'
import { runSpinner, stopSpinner } from './../LoadingSpinner'

export default function Stocks() {
	async function getStocksVol(stock) {
		const apiKey = '09fb70d23ec2c8a1be423fe9021458b2'
		let response = await fetch(
			// `http://api.marketstack.com/v1/eod?access_key=${apiKey}&symbols=${stock}`
			`https://api.marketstack.com/v1/eod?access_key=${apiKey}&symbols=${stock}`
		)
		let data = await response.json()
		let curPrice = data.data[0].close
		return curPrice
	}

	window.addEventListener('reindex-table', (spinner = true) => {
		if (spinner) {
			runSpinner()
		}

		setTimeout(() => {
			fetchPrices()

			if (spinner) {
				stopSpinner()
			}
		}, 2222)
	})

	/**
	 * Constantly update deal profit for each deal,
	 * so admin can see fresh data.
	 * TODO: try with laravel queues if any bugs or cons
	 *
	 */
	function updateProfits(payload) {
		try {
			setInterval(() => {
				axios.post(`/user/update-profit`, {
					payload
				})
			}, 5000)
		} catch (error) {
			// ...
		}
	}

	const fetchPrices = function () {
		const tableRows = document.querySelectorAll('#dealsTable tbody tr')
		const payload = {}

		for (let i = tableRows.length - 1; i >= 0; i--) {
			const tr = tableRows[i]

			const dealInvestment = tr
					.querySelector('.deal__inv')
					.innerText.trim(),
				dealDest = tr.querySelector('.deal__dest').innerText.trim(),
				dealAlias = tr.querySelector('.deal__als').innerText.trim(),
				dealProfitWrapper = tr.querySelector('.deal-profit'),
				dealProfit = tr.querySelector('.deal-profit__profit')

			/**
			 * Store key => value pair in payload variable.
			 * This payload then will be sent to controller via axios.
			 * @key id, @value profit
			 */
			const dealID = tr.getAttribute('data-id').trim()

			/**
			 * Fetch tickers, update profits respectfully.
			 * Add classess to indicate if profit goes up || down.
			 */
			const longPoll = async () => {
				try {
					let resp = await getStocksVol(dealAlias),
						margin = (
							(resp * dealInvestment) /
							tr.getAttribute('data-pwb')
						).toFixed(2),
						diff = margin - dealInvestment

					dealProfitWrapper.classList.add('bg-price')
					setTimeout(
						() => dealProfitWrapper.classList.remove('bg-price'),
						150
					)

					if (dealDest === 'Sell') {
						let resultSell = parseFloat(
							dealInvestment - diff
						).toFixed(2)
						dealProfit.innerText = resultSell
						payload[dealID] = resultSell
					} else {
						let resultBuy = parseFloat(margin).toFixed(2)
						dealProfit.innerText = resultBuy
						payload[dealID] = resultBuy
					}

					// todo: dry this thing up
					if (dealProfit.innerText > dealInvestment) {
						dealProfitWrapper.classList.add('up')
						dealProfitWrapper.classList.remove('down')
					} else {
						dealProfitWrapper.classList.remove('up')
						dealProfitWrapper.classList.add('down')
					}
				} catch (err) {
					// ...
				}
			}

			updateProfits(payload)
			setInterval(() => longPoll(), 10000)
			longPoll()
		}
	}

	fetchPrices()
}
