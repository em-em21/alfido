import { table } from './../deals/DealsTable'
import { loading } from './../deals/DealsLoading'
import { DealCheckers } from './../deals/DealsCheckers'
import throwAlert from '../Alerts'
import { commo } from './Peers'

export default function Commodity() {
	// choises.js
	const choicesElement = $('.stocks-select')[0]
	const choices = new Choices(choicesElement, {
		searchEnabled: true,
		itemSelectText: 'Выбрать',
		choices: commo.items,
	})

	async function getStocksVol(stock) {
		const apiKey = '6d7ef0fe3fe93347cbef0f14bd4345b6'
		let response = await fetch(`https://api.marketstack.com/v1/eod?access_key=${apiKey}&symbols=${stock}`)
		let data = await response.json()
		let curPrice = data.data[0].close
		return curPrice
	}

	DealCheckers(storeTheDeal)

	async function storeTheDeal() {
		loading(1)
		const query = parseFloat(document.getElementById('value').value),
			choosedCoinNaming = choices.getValue().label,
			choosedCoinAlias = choices.getValue().value,
			dest = document.querySelector('.checked').value,
			curPrice = await getStocksVol(choosedCoinAlias),
			balance = parseFloat(document.querySelector('.toFixed').innerText),
			ne = document.querySelectorAll('.ne')

		document.querySelector('input[name="price_when_bought"]').value = curPrice
		document.querySelector('input[name="choosed_coin_alias"]').value = choosedCoinAlias
		document.querySelector('input[name="choosed_coin_naming"]').value = choosedCoinNaming
		document.querySelector('input[name="balance"]').value = balance - query
		document.querySelector('input[name="side"]').value = dest

		const notAllowed = element => element.value == '' || element.value == undefined
		if (Array.from(ne).some(notAllowed)) {
			throwAlert(
				'Произошла непредвиденная ошибка, попробуйте ещё раз через некоторое время. Если ошибка повторяется, пожалуйста обратитесь в тех. поддержку.',
				'error'
			)
		} else {
			document.querySelector('#trade-form').submit()
		}
	}

	if (table.data().any()) {
		document
			.getElementById('tBody')
			.querySelectorAll('tr')
			.forEach(e => {
				let isPegged = e.querySelector('.pegged').textContent,
					profitCont = e.querySelector('.current-profit'),
					currentProfit = profitCont.textContent,
					id = e.querySelector('.deal-id').textContent,
					dest = e.querySelector('.dest').textContent

				if (isPegged == 0) {
					profitCont.innerText = parseFloat(currentProfit.toFixed(2))
				} else {
					setTimeout(() => {
						axios.put('/update-profit/' + id, {
							profit: profitCont.innerText,
						})
					}, 5000)

					let value = e.querySelector('.value').textContent,
						pwb = parseFloat(e.querySelector('.pwb').textContent),
						alias = e.querySelector('.als').textContent

					const longPoll = async () => {
						let resp = await getStocksVol(alias),
							margin = ((resp * value) / pwb).toFixed(2),
							diff = margin - value

						if (resp) {
							if (dest == 'sell') {
								profitCont.innerText = value - diff
							} else if (dest == 'buy') {
								profitCont.innerText = margin
							}
						} else {
							profitCont.innerText = parseFloat(currentProfit.toFixed(2))
						}
					}

					setInterval(() => longPoll(), 120000)
					longPoll()
				}
			})
	}
}